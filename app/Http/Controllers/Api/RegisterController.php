<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Auth\Events\Registered;
use Modules\Accounts\Support\AccountFactory;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Resources\UserResource;

class RegisterController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Handle a register request to the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function register(RegisterRequest $request)
    {
        $user = Customer::create($request->allWithHashedPassword());

        event(new Registered($user));

        return (new UserResource($user))->additional([
            'token' => $user->createToken('Unkown')->plainTextToken
        ]);
    }
}
