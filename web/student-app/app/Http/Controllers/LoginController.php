<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $input = $request->all();
        $data =  Http::post('localhost:8001/auth/login',[
            'email' => $input['email'],
            'password' => $input['password']
        ]);
        if(isset($data['access_token'])){
            session()->put('access_token',$data['access_token']);
            return json_decode($data, true);
        }else{
            return $data;
        }
      
    }

    public function getUser()
    {
        $token = session('access_token');
        if($token != null){
            $response = Http::withToken($token)->get('localhost:8001/auth/user-profile');
            if($response->json() != null){
                return json_decode($response, true);
            }else{
                return response()->json([
                    'message' => 'token expires'
                ]);
            }
           
        }else{
            return response()->json([
                'message' => 'token_fail'
            ]);
        }
        
    }

    public function addSinhvien()
    {
        $token = session('access_token');
        if($token != null){
            $response = Http::withToken($token)->post('localhost:8001/auth/addInfo',[
                'name' => 'bac',
                'age' => '18',
                'address' => 'HN',
                'phone' => '08312312',
                'imgae' =>'dấdasd',
                'id_monhoc' =>'1',
                'id_lop' => '1'
            ]);
            if($response->json() != null){
                return json_decode($response, true);
            }else{
                return response()->json([
                    'message' => 'token expires'
                ]);
            }
           
        }else{
            return response()->json([
                'message' => 'token_fail'
            ]);
        }
    }

    //
}
