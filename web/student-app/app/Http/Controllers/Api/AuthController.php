<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\StudentRepo;
use App\Models\User;

class AuthController extends Controller
{
    protected $studentRepo;
    public function __construct(StudentRepo $studentRepo) {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
        $this->studentRepo = $studentRepo;
    }

    
    public function login(Request $request){
    	
        $credentials = request(['email', 'password']);
        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Email or Passowrd false']);
        }
        return $this->createNewToken($token);
    }

   
    public function register(Request $request) {
       
        $credentials = request(['name','email', 'password']);
        $user = User::create(array_merge(
                   $credentials,
                    ['password' => bcrypt($request->password)]
                ));

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }


    
    public function logout() {
        auth()->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }

    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }

   
    public function userProfile() {
        return response()->json(auth()->user());
    }

    
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL(),
        ]);
    }

    public function addInfo(Request $request)
    {
        $data = $request->all();
        $this->studentRepo->add($data);
        return response()->json([
            'info' => $data,
        ]);
    }
}
