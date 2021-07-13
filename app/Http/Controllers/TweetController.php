<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UserController;
use App\Tweet;


class TweetController extends Controller{
    
    public function tweet(Request $request){

        /* $json = $request->input('json', null);
        $params= json_decode($json);
        $params_array = json_decode($json, true); */

        $params_array = $request->all();

        if(!empty($params_array)){
            //Limpiar los datos
            //$params_array = array_map('trim', $params_array);
             
            //Validar los datos
            $validate = \Validator::make($params_array, [
                'description'      => 'required',
                'fk_user'          => 'required'   
            ]);

            if($validate->fails()){
                //La validacion ha fallado
                $signin = array(
                    'status'    => 'error',
                    'code'      =>  404,
                    'message'   =>  'No se ha podido publicar el tweet',
                    'errors'    => $validate->errors()
                );

            }else{
              

                //Crear el usuario 
                $tweet = new Tweet();
                $tweet->descripcion      = $params_array['description'];
                $tweet->created          = date('Y-m-d H:i:s');
                $tweet->fk_user          = $params_array['fk_user'];
          

                //Guardar el usuario
                $tweet->save();

                //Validacion correcta
                $tweetPublish = array(
                    'status'    => 'success',
                    'code'      =>  202,
                    'message'   =>  'El tweet se registro correctamente'
                );


            }
        }else{
            $tweetPublish = array(
                'status'    => 'error',
                'code'      =>  404,
                'message'   =>  'Los datos enviados no son correctos',
                'errors'    => $validate->errors()
            );
        }
       return $tweetPublish;
    }

    public function allTweets(){
        $tweets     = Tweet::all();
        $tweet      = array();
        $user       = new \UserInfo();
        
        foreach ($tweets as $tw){
            $username           = $user->detailUserName($tw->fk_user);
            $name               = $user->detailName($tw->fk_user);
            $time               = $user->detailTime($tw->fk_user);
            $objectTweet    =  array(
                'user'          => $username,
                'name'          => $name,
                'time'          => $time,
                'descripcion'   => $tw->descripcion
            );

            $tweet[]= $objectTweet;
        }

        $tweet = array_reverse($tweet);
        

        if(is_object($tweet)){
            $data = array(
                'code' => 202,
                'status'=> 'success',
                'user' => $tweet
            );
        } else {
            $data =  array(
                'code' => 202,
                'status'=> 'success',
                'message' => 'El usuario no existe'
            );
        }

        return view('home', compact('tweet'));
    }
}
