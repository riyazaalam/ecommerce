<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BO\UserBO;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserController extends Controller
{
      public function __construct(private UserBO $bo) {}

    public function register(Request $request)
    {
       
        $validated = $request->validate([
                'first_name' => ['required', 'string', 'max:255'],
                'last_name'  => ['required', 'string', 'max:255'],
                'email'      => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                'mobile'     => ['required', 'numeric', 'digits:10', 'unique:users,mobile'],
                'password'   => ['required', 'confirmed', Rules\Password::defaults()],
            ], [
                'first_name.required' => 'Please enter first name',
                'last_name.required'  => 'Please enter last name',
                'email.required'      => 'Please enter email',
                'mobile.required'     => 'Please enter mobile',
                'password.required'   => 'Please enter password',
            ]);
       
        $user = $this->bo->createUser($request->all());

        $token = $user->createToken('authToken')->accessToken;
        return response()->json([
            'status' => true,
            'message' => 'User registered successfully',
            'token' => $token,
            'data' => $user
        ], 201);
       
    }

    public function login(Request $request){
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $customMessages = [
            'email.required' => 'Please enter email',
            'email.email' => 'Please enter valid email',
            'password.required' => 'Please enter password',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ], 400);
        }

        // Attempt login
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {

        $user = Auth::user();

        // Create Passport Token
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }

        $token->save();

        return response()->json([
            'message' => 'User logged in successfully',
            'user' => $user,
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString(),
        ], 200);

        } else {
            return response()->json([
                'message' => 'Invalid email or password'
            ], 401);
        }
    }
}
