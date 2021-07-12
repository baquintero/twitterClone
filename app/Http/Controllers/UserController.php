<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller{

    public function register(Request $request){
        
        /* $json = $request->input('json',null);
        $params = json_decode($json);
        $params_array = json_decode($json, true); */
        $params_array = $request->all();

        if(!empty($params_array)){
            //Limpiar los datos
            $params_array = array_map('trim', $params_array);
             
            //Validar los datos
            $validate = \Validator::make($params_array, [
                'name'      => 'required',
                'surname'   => 'required',
                'name_user' => 'required|unique:users',
                'email'     => 'required|email|unique:users',
                'password'  => 'required'
            ]);

            if($validate->fails()){
                //La validacion ha fallado
                $signin = array(
                    'status'    => 'error',
                    'code'      =>  404,
                    'message'   =>  'El usuario no se ha podido registrar',
                    'errors'    => $validate->errors()
                );

            }else{
                //Cifrar la password
                $pwd = hash('sha256', $params_array['password']);

                //Crear el usuario 
                $user = new User();
                $user->name             = $params_array['name'];
                $user->surname          = $params_array['surname'];
                $user->name_user        = $params_array['name_user'];
                $user->email            = $params_array['email'];
                $user->created          = date("Y-m-d H:i:s");
                $user->update_session   = date("Y-m-d H:i:s"); 
                $user->password         = $pwd;

                //Guardar el usuario
                $user->save();

                //Validacion correcta
                $signin = array(
                    'status'    => 'success',
                    'code'      =>  202,
                    'message'   =>  'El usuario se registro correctamente'
                );


            }
        }else{
            $signin = array(
                'status'    => 'error',
                'code'      =>  404,
                'message'   =>  'Los datos enviados no son correctos',
                'errors'    => $validate->errors()
            );
        }
       return $signin;
    }

    public function login(Request $request){
        
        $jwtAuth  = new \JwtAuth();

        $params_array = $request->all();
        

        //Validar los datos
        $validate = \Validator::make($params_array, [
                                'email'     => 'required',
                                'password'  => 'required'
                            ]);

        if($validate->fails()){
            
            //La validacion ha fallado
            $signup = array(
                'status'    => 'error',
                'code'      =>  404,
                'message'   =>  'El usuario no se ha podido identificar',
                'errors'    => $validate->errors()
            );
        
        }else{
            
            //Cifrar la password
            $pwd = hash('sha256', $params_array['password']);

            //Devolver token o datos
            $signup = $jwtAuth->signup($params_array['email'], $pwd);

            if(!empty($params->getToken)){
                $signup = $jwtAuth->signup($params_array['email'], $pwd, true);
            }

        }

        return $signup;
    }

    public function update(Request $request){
        
        $token      = $request->header('Authorization');
        $jwtAuth    = new \JwtAuth();
        $checkToken = $jwtAuth->checkToken($token);

        if($checkToken){
            echo 'login correcto';
        }else{
            echo 'login incorrecto';
        }

        die();
    }

    
}
