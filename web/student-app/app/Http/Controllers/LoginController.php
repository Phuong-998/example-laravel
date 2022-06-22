<?php

namespace App\Http\Controllers;

use Exception;
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
       try {
            if(session('access_token') == null){
                throw new Exception('Erro TOken');
            }
            $token = session('access_token');
            $response = Http::withToken($token)->get('localhost:8001/auth/user-profile');
            return json_decode($response, true);
       } catch (Exception $e){
            echo $e->getMessage();
       }
        
    }

    public function addSinhvien()
    {
        try {
            if(session('access_token') == null){
                throw new Exception('Erro TOken');
            }
            $token = session('access_token');
            $response = Http::withToken($token)->post('localhost:8001/auth/addInfo',[
                'name' => 'bac',
                'age' => '18',
                'address' => 'HN',
                'phone' => '08312312',
                'imgae' =>'dấdasd',
                'id_monhoc' =>'1',
                'id_lop' => '1'
            ]);
        } catch (Exception $e){
            echo $e->getMessage();
        }
    }
    //
}
