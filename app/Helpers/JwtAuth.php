<?php

namespace App\Helpers;

use Firebase\JWT\JWT;
use Illuminate\Support\Facades\DB;
use App\User;

class JwtAuth{

      public $key;

      public function __construct() {
            $this->key = 'test_sponsor_key-120721';
      }

      public function signup($email, $password, $getToken = null){
       
      //Busca si existe el Usuario con sus credenciales
            $user = User::where([
                        'email' => $email,
                        'password' => $password
                  ])->first();

      //Comprobar si son correctos los datos obtenidos

            $signup = false;
            if(is_object($user)){
                  $signup = true;
            }
            
      //Generar el token con los datos del usuario identificado
            if($signup){

                  $token = array(
                        'sub'       =>    $user->id,
                        'email'     =>    $user->email,
                        'name'      =>    $user->name,
                        'surname'   =>    $user->surname,
                        'user_name' =>    $user->name_user,
                        'iat'       =>    time(),
                        'exp'       =>    time() + (7 * 24 * 60 * 60)
                  );

                  $jwt        = JWT::encode($token, $this->key, 'HS256');

      //Devolver los datos decodificados o el token, en funcion de un parametro
                 
                  $decode     = JWT::decode($jwt, $this->key,['HS256']);

                  if(is_null($getToken)){
                        $data = $jwt;
                  }else{
                        $data = $decode;
                  }
            }else{
                  $data = array(
                        'status'    => 'error',
                        'message'   => 'Login Incorrecto'
                  );
            }
      
            return $data;
      }


      public function checkToken($jwt, $getIdentity = false){
            $auth = false;

            try{
                  $jwt = str_replace('"', '', $jwt);
                  $decode = JWT::decode($jwt, $this->key, ['HS256']);
            }catch(\UnexpectedValueException $e){
                  $auth = false;
            }catch(\DomainException $e){
                  $auth=false;
            }

            if(!empty($decode) && is_object($decode) && isset($decode->sub)){
                  $auth = true;
            }else{
                  $auth = false;
            }

            if($getIdentity){
                  return $decode;
            }

            return $auth;
      }

}