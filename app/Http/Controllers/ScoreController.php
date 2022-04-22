<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Validator;
Use Redirect;

class ScoreController extends Controller
{
    public function index(){
        return Inertia::render('Index');
    }

    public function score(Request $request){
        //dd($request);
        $request->validate([
          'playerOne' => 'required|integer',
           'playerTwo' => 'required|integer'
          ]);

        $one = $request->playerOne;
        $two = $request->playerTwo;
        $result = 0;

        if(($one <= 3) && ($two <= 3)){
            $scores = ['Love'=>0, 'Fifteen'=>1, 'Thirty'=>2, 'Forty'=>3];
            //dd($scores);

            foreach($scores as $key => $value){
                if($one == $value){
                    $one = $key;
                }
                if($two == $value){
                    $two = $key;
                }
            }

            if($one == $two){
                $result = $one.' All';
            }else{
                $result = $one.' : '.$two;
            }

            return Inertia::render('Result', [
                'result' => $result,
            ]);
        }

        if(($one >= 3) && ($two >= 3)){
            if($one == $two){
                $result = 'Dueces';
            }

            if(($one - $two) == 1){
                $result = 'Advantage Player One';
            }

            if(($two - $one) == 1){
                $result = 'Advantage Player Two';
            }

            if(($one - $two) > 1){
                $result = 'Player One Wins';
            }

            if(($two - $one) > 1){
                $result = 'Player Two Wins';
            }

            return Inertia::render('Result', [
                'result' => $result,
            ]);
        }else{
            if($one > $two){
                $result = 'Player One Wins';
            }
            if($one < $two){
                $result = 'Player Two Wins';
            }
            return Inertia::render('Result', [
                'result' => $result,
            ]);
        }
    }

}
