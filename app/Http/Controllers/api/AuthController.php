<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Tymon\JWTAuth\JWT;
use Tymon\JWTAuth\Facades\JWTAuth;
use Intervention\Image\Facades\Image;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $creds = $request->only(['email', 'password']);
        if (!$token = JWTAuth::attempt($creds)) {
            return response()->json([
                'success' => false,
                'message'=>'invalid credentials'
            ],401);
        }
        return response()->json([
            'success' => true,
            'token' => $token,
            'user' => Auth::user()
        ],200);
    }
    public function register(Request $request){
        $encriptedPass = Hash::make($request->password);
        try{

            $user = new User();
            $user->name = "".time();
            $user->username = "". time();
            $user->email = $request->email;
            $user->password = $encriptedPass;
            $user->url_image = "";
            $user->save();
            ///asignamos el rol el empresario
            $role = Role::findById(3);
            $user->assignRole($role);
            return $this->login($request);
        }catch (\Exception $exception){
            return response()->json([
                'success'=>false,
                'message'=>$exception
            ]);

        }


    }
    public function logout(Request $request){
        try{
            JWTAuth::invalidate(JWTAuth::parseToken($request->token));
            return response()->json([
                'success'=>true,
                'message'=>'logout success'
            ]);
        }catch (\Exception $e){
            return response()->json([
                'success'=>false,
                'message'=>'logout fail'.$e
            ]);
        }
    }
    public function profileUser(Request $request){
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->last_name = $request->name;
        $user->password = $this->generatePassword($request->password);
        if ($request->url_image) {
            if ($user->url_image != $request->url_image) {
                $user->url_image = $this->UploadImage($request);
            }
        }
        $user->update();
        return response()->json([
            'success'=>true,
            'url_image'=>$user->url_image
        ]);
    }
    public function generatePassword($password)
    {
        $user_password = Hash::make($password);
        return $user_password;
    }


    public function UploadImage(Request $request)
    {
        $url_file = "img/users/";
        if ($request->url_image && $request->url_image != '#') {
            $foto = time().'.jpg';
            file_put_contents('img/users/'.$foto,base64_decode($request->url_image));
            return $url_file.$foto;

        } else {
            return "#";
        }
        /*if ($request->url_image && $request->url_image != '#') {
            $image = $request->get('url_image');
            $name = time() . '.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            Image::make($request->get('url_image'))->save(public_path($url_file) . $name);
            return $url_file . $name;
        } else {
            return "#";
        }
        */
    }
}
