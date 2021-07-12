<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller{
    

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
