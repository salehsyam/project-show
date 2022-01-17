<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Resources\UserResource;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->merge([
            $this->username() => $this->formatNumbers($request->input($this->username())),
        ]);
        
        $request->validate([
            $this->username() => 'required',
            'code' => 'nullable|string',
        ], [], trans('users.attributes'));
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'phone';
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        $user = User::where(function (Builder $query) use ($request) {
            $query->orWhere($this->username(), $request->input($this->username()));
        })->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            $this->incrementLoginAttempts($request);
            $this->sendFailedLoginResponse($request);
        }

        $this->guard()->loginUsingId($user->id);

        return $this->sendLoginResponse($request);
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request $request
     * @throws \Illuminate\Validation\ValidationException
     * @return \App\Http\Resources\UserResource
     */
    protected function sendLoginResponse(Request $request)
    {
        $user = $this->guard()->user();

        if ($user) {            
            return (new UserResource($user))->additional([
                'token' => $user->createToken('Unkown')->plainTextToken,
            ]);
        }

        $this->sendFailedLoginResponse($request);
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        return response()->json([]);
    }

    /**
     * Format numbers
     * 
     * @param $phone
     * @return string|int
     */
    private function formatNumbers($phone)
    {
        return strtr($phone, array('۰' => '0', '۱' => '1', '۲' => '2', '۳' => '3', '۴' => '4', '۵' => '5', '۶' => '6', '۷' => '7', '۸' => '8', '۹' => '9', '٠' => '0', '١' => '1', '٢' => '2', '٣' => '3', '٤' => '4', '٥' => '5', '٦' => '6', '٧' => '7', '٨' =>' 8', '٩' => '9'));
    }
}
