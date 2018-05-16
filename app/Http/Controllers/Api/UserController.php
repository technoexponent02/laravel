<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ParentApiController;

use App\Mail\ConfirmationMail;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Image;
use File;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Password;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

//use Techno\Transformers\UserTransformer;

use DB;
use App\City;

use Illuminate\Pagination\LengthAwarePaginator;



class UserController extends ParentApiController
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    protected $countryId;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['only' => [
            'authUser'
        ]]);
    }

    public function test()
    {
        echo "test"; exit;
    }


    public function register(Request $request)
    {
        $opstatus = 0;
        $input = $request->all();
        //dd($input);
        $messages = [
            'older_than' => 'Age must be greater than 18.',
        ];
        $rules = [
            'seeking_for' => [
                'required',
                Rule::in(["M", "F"]),
            ],
            'first_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            //'date_of_birth' => 'required|date|olderThan:18',
            'dob' => 'required|date',
            'country_id' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'ip_address' => 'required|string',
            'lat' => 'required',
            'lng' => 'required',
            'is_terms_accepted' => 'required'
        ];

        $validator = Validator::make($input, $rules, $messages);
        if($validator->fails()) {
            $response = [
                'status' => $opstatus,
                'errors' => $validator->errors()
            ];
            return response()->json($response, 400);
        }

        $getCityByName = City::where('country_id', $input['country_id'])
                        ->where('city_name', $input['city'])
                        ->where('city_status', 'Y')
                        ->first();
        if($getCityByName)
        {
            $input['city_id'] = $getCityByName->id;
        }
        else
        {
            $cityDet = new City;
            $cityDet->country_id = $input['country_id'];
            $cityDet->city_name = $input['city'];
            $cityDet->city_status = 'Y';
            $cityDet->created_at = date('Y-m-d H:i:s');
            $cityDet->save();
            $input['city_id'] = $cityDet->id;
        }

        //dd($input);
        event(new Registered($user = $this->create($input)));
        //$confirm_link = env('SITE_URL').'/register/confirm-email/'.$user->email_verification_token;
        //Mail::to($user)->send(new ConfirmationMail($user, $confirm_link));
        if($user->api_token==null)
        {
            $opstatus = 1;
            $user->api_token = create_api_token($user);
            $user->save();
        }
        $user = User::find($user->id);
        if($user->id)
        {
            $opstatus = 1;
        }
        return response()->json([
            'status' => $opstatus,
            'user' => $user
        ], 201);
    }

    /**
     * Create a new talent user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        //dd($data);
        if($data['seeking_for']=='M')
        {
            $gender = 'F';
        }
        elseif($data['seeking_for']=='F')
        {
            $gender = 'M';
        }
        $userName = str_replace(' ', '-', strtolower($data['first_name']));

        $input_data = [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'seeking_for' => $data['seeking_for'],
            'gender' => $gender,
            'dob' => $data['dob'],
            'country_id' => $data['country_id'],
            'city_id' => $data['city_id'],
            'lat' => $data['lat'],
            'lng' => $data['lng'],
            'ip_address' => $data['ip_address'],
        ];
        //dd($input_data);
        $user = User::create($input_data);
        $user->username = $userName.$user->id;
        $user->save();
        return $user;
    }

    public function authenticate(Request $request)
    {
        $input = $request->all();
        $opstatus = 0;
        //dd($input);

        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];

        $validator = Validator::make($input, $rules);
        if($validator->fails())
        {
            $response = [
                'status' => $opstatus,
                'errors' => $validator->errors()
            ];
            return response()->json($response, 400);
        }
        $user = User::where('email', $input['email'])->first();

        if($user !== null && Hash::check($input['password'], $user->password))
        {
            if($user->status == 'N')
            {
                $response = [
                    'status' => $opstatus,
                    'errors' => 'Account is not blocked.'
                ];
                return response()->json($response, 400);
            }
            // if($user->status == 'E')
            // {
            //     $response = [
            //         'status' => $opstatus,
            //         'errors' => 'Account is not activated.'
            //     ];
            //     return response()->json($response, 400);
            // }
            // create the api token if its null
            if($user->api_token==null)
            {
                $opstatus = 1;
                $user->api_token = create_api_token($user);
                $user->save();
            }
            /*register the fcm token*/
            /*if($request->has('fcm_token') && $input['fcm_token'] != null)
            {
                UserDevice::saveFcmToken( $input['fcm_token'],
                                            $request->device_information ?? null,
                                            $user->id
                                        );
            }*/
            return response()->json([
                'status' => $opstatus,
                'user' => $user
            ] , 200);
        }
        else
        {
            $response = [
                'status' => $opstatus,
                'errors' => 'Login credentials do not match our records.'
            ];
            return response()->json($response, 400);
        }
    }

    /**
     * Display authenticated user information.
     *
     * @return \Illuminate\Http\Response
     */
    public function authUser()
    {
        $response = Auth::user();
        return response()->json($response, 200);
    }
}
