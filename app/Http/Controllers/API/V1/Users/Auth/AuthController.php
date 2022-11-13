<?php

namespace App\Http\Controllers\API\V1\Users\Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Jobs\SendMail;
use App\Models\Verify;
use GuzzleHttp\Client;
use App\Jobs\SendVerifyMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Azimo\Apple\Api\AppleApiClient;
use Azimo\Apple\Auth\Jwt\JwtParser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Azimo\Apple\Auth\Jwt\JwtVerifier;
use Azimo\Apple\Auth\Jwt\JwtValidator;
use Lcobucci\JWT\Validation\Validator;
use Laravel\Socialite\Facades\Socialite;
use Azimo\Apple\Api\Factory\ResponseFactory;
use App\Http\Interfaces\Senders\SenderFactory;
use App\Http\Resources\Users\UserTinyResource;
use Lcobucci\JWT\Validation\Constraint\IssuedBy;
use App\Http\Resources\Users\NewUserTinyResource;
use App\Http\Requests\Api\Users\Auth\LoginRequest;
use App\Http\Requests\Api\Users\Auth\VerifyRequest;
use Azimo\Apple\Auth\Factory\AppleJwtStructFactory;
use Lcobucci\JWT\Validation\Constraint\PermittedFor;
use App\Http\Requests\Api\Users\Auth\RegisterRequest;
use Azimo\Apple\Auth\Service\AppleJwtFetchingService;
use App\Http\Requests\Api\Users\Auth\ChangePasswordRequest;
use App\Http\Requests\Api\Users\Auth\RegisterSocialMediaRequest;
use App\Models\Profile;

class AuthController extends Controller
{
    /**
     * Register new user
     * @param  RegisterRequest $request
     * @return mixed
     */
    public function register(RegisterRequest $request)
    {
        $request['code'] = generateRandomCode('USR');
        $request['password'] = bcrypt($request->password);

        $user = User::create($request->all());

        $token =  $user->createToken('Token-Login')->accessToken;

        $user->update([
            'remember_token' => $token
        ]);
        $user->userToken()->create([
            'token' => $token,
            'device_id' => $request->device_id,
            'device_type' => $request->device_type,
        ]);

        if ($request->apple_token != null) {
            $user->update(['verified_at' => now()]);
            return $this->successStatus(__('account is verified'));
        }
        return $this->sendCode($request->email, $user->id, 'register');

        //return $this->respondWithItem(new UserTinyResource($user));
        //return $this->successStatus(__("send code to your number - 4444"));
    }
    /**
     * Register new user use Social Media
     * @param  RegisterRequest $request
     * @return mixed
     */
    public function registerUseSocialMedia(RegisterSocialMediaRequest $request)
    {
        if ($request['type'] == 'facebook') {
            $user = User::where('facebook_token', $request->social_token)->first();
        } elseif ($request['type'] == 'google') {
            $user = User::where('google_token', $request->social_token)->first();
            // dd($user);
        } elseif ($request['type'] == 'apple') {
            $user = User::where('apple_token', $request->social_token)->first();
            if (!$user) {
                return $this->respondWithItemName('is_new', true);
            }
        }
        if (!$user) {
            $request['code'] = generateRandomCode('USR');
            if ($request['type'] == 'facebook') {
                $request['facebook_token'] = $request->social_token;
            } elseif ($request['type'] == 'google') {
                $request['google_token'] = $request->social_token;
            } elseif ($request['type'] == 'apple') {
                $request['apple_token'] = $request->social_token;
            }
            $user = User::create($request->all());

            $token = $user->createToken('Token-Login')->accessToken;

            $user->update([
                'remember_token' => $token,
                'device_token' => $request->device_token,
            ]);

            $user->userToken()->update([
                'token' => $token,
                'device_id' => '$request->device_id',
                'device_type' => '$request->device_type',
            ]);

            return $this->respondWithItem(new NewUserTinyResource($user));
        }

        $token = $user->createToken('Token-Login')->accessToken;

        $user->update([
            'remember_token' => $token,
            'device_token' => $request->device_token,
        ]);

        $user->userToken()->update([
            'token' => $token,
            'device_id' => $request->device_id,
            'device_type' => $request->device_type,
        ]);

        return $this->respondWithItem(new UserTinyResource($user));
    }


    /**
     * Login
     * @param  LoginRequest $request
     * @return mixed
     */
    public function login(LoginRequest $request)
    {
        if (!Auth::guard('users')->attempt($request->only('email', 'password'))) {
            return $this->errorStatus(__('Your Email or Password are Wrong'));
        }

        $user = Auth::guard('users')->user();
        if ($user->verified_at == null) {
            return $this->errorStatus(__('account is not verified'));
        }

        $token = $user->createToken('Token-Login')->accessToken;

        $user->update([
            'remember_token' => $token,
            'device_token' => $request->device_token,
        ]);

        $user->userToken()->update([
            'token' => $token,
            'device_id' => '$request->device_id',
            'device_type' => '$request->device_type',
        ]);
        /*
        $data = DB::table('oauth_access_tokens')->where('user_id', $captain->id)->get();
        if ($data) {
            DB::table('oauth_access_tokens')->where('user_id', $captain->id)->delete();
        }
        */
        return $this->respondWithItem(new UserTinyResource($user));
    }

    public function resendCode(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        Verify::where('user_id', $user->id)->delete();

        return $this->sendCode($user->email, $user->id, 'register');
    }

    /**
     * Send Code Use SMS 
     * @param  LoginRequest $request
     * @return mixed
     */
    public function sendCode($email, $user_id, $type)
    {
        //  $verificationCode = 4444;
        $verificationCode = mt_rand(1000, 9999);
        Verify::create([
            'user_id' => $user_id,
            'system' => $email,
            'verification_code' => $verificationCode,
            'type' => $type,
            'verification_expiry_minutes' => Carbon::now()->addMinute(5),
        ]);
        $user = User::find($user_id);


        SendVerifyMail::dispatch($user, $verificationCode);


        // SMS 
        //  $senderFactory = new SenderFactory();
        // $senderFactory->initialize('email', $email, $message);

        return $this->successStatus(__('Send SMS Successfully Please Check Your Phone ' . $verificationCode));
    }

    /**
     * Send Code Use SMS 
     * @param  LoginRequest $request
     * @return mixed
     */
    public function verifyChangePassword(ChangePasswordRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) return $this->errorStatus(__("User not found....!"));

        $this->sendCode($request->email, $user->id, 'change-password');

        return $this->successStatus(__('Send SMS Successfully Please Check Your Phone'));
    }
    /**
     * change Password 
     * @param  LoginRequest $request
     * @return mixed
     */
    public function changePassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $user->update(['password' => bcrypt($request->new_password)]);

        return $this->respondWithItem(new UserTinyResource($user));
    }
    /**
     * change Password 
     * @param  LoginRequest $request
     * @return mixed
     */
    public function changeOldPassword(Request $request)
    {
        $user = User::find(Auth::id());

        if (!(Hash::check($request->old_password, $user->password))) {
            return $this->errorStatus('old password is wrong..!');
        }

        if ((Hash::check($request->new_password, $user->password))) {
            return $this->errorStatus('new password is same old..!');
        }

        $user->update(['password' => bcrypt($request->new_password)]);

        return $this->respondWithItem(new UserTinyResource($user));
    }
    /**
     * change Password 
     * @param  LoginRequest $request
     * @return mixed
     */
    public function forgetPassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) return $this->errorStatus(__("User not found....!"));

        return  $this->sendCode($request->email, $user->id, 'change-password');

        //return $this->successStatus();
    }
    /**
     * Check Captains 
     * @param  VerifyRequest $request
     * @return mixed
     */
    public function check(VerifyRequest $request)
    {
        $user = User::whereEmail($request->email)->first();

        //check if provider has verification code
        $verify = Verify::where('user_id', $user->id)->latest()->first();

        if (empty($verify->verification_code)) {
            return $this->errorStatus(__('Verification code is missing'));
        }

        if ($verify->verification_code != $request->verification_code) {
            return $this->errorStatus(__('Verification code is wrong'));
        }

        if (Carbon::parse($verify->verification_expiry_minutes)->lte(Carbon::now())) {
            return $this->errorStatus(__('Verification code is expired'));
        }

        $verify->delete();

        if ($request->type == 'change-password') {
            return $this->successStatus(__('Verification code is valid'));
        }

        $user->update(['verified_at' => now()]);

        return $this->respondWithItem(new UserTinyResource($user));
    }


    /**
     * Logout Passenger
     * @return mixed
     */
    public function logout()
    {
        Auth::user()->token()->revoke();

        return $this->successStatus(__('successfully logout'));
    }

    /**
     * Logout Passenger
     * @return mixed
     */
    public function deleteAccount()
    {
        Auth::user()->token()->revoke();
        User::find(Auth::id())->delete();
        Profile::where('user_id', Auth::id())->delete();

        return $this->successStatus(__('Delete Successfully'));
    }
}
