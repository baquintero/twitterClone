<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tweet;
use App\user;

/*CONTROLADOR PARA HACER PRUEBAS CON LOS DATOS EN LA BASE DE DATOS*/

class TestController extends Controller{

      public function testOrm(){
            
            $tweet  = Tweet::all();
            $users   = User::all();
            //var_dump($tweet);

            foreach($tweet as $tweets){
                  echo "<h2> {$tweets->descripcion} </h2>";
            }

            foreach($users as $user){
                  echo "<h2> {$user->email} </h2>";
            }
            
            die();
      }

}
