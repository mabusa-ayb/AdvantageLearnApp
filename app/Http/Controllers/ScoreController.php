<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ScoreController extends Controller
{
    public function index(){
        //Display root route
        return Inertia::render('Index');
    }

    public function score(Request $request){
        //Validate Form Input
        $request->validate([
          'playerOne' => 'required|integer',
           'playerTwo' => 'required|integer'
          ]);

        //Convert request input to method variables
        $one = $request->playerOne;
        $two = $request->playerTwo;

        //Initialise result variable
        $result = 0;

        //Condition if both players score less than or equal 3
        if(($one <= 3) && ($two <= 3)){

            //Associative array containing scores 0 to 3
            $scores = ['Love'=>0, 'Fifteen'=>1, 'Thirty'=>2, 'Forty'=>3];

            foreach($scores as $key => $value){
                //set player one score
                if($one == $value){
                    $one = $key;
                }
                //set player two score
                if($two == $value){
                    $two = $key;
                }
            }

            //set result to display
            if($one == $two){
                $result = $one.' All';
            }else{
                $result = $one.' : '.$two;
            }

            //direct view to the Result display page
            return Inertia::render('Result', [
                'result' => $result,
            ]);
        }

        //Condition if both players score more than or equal 3
        if(($one >= 3) && ($two >= 3)){

            //Equal score
            if($one == $two){
                $result = 'Dueces';
            }

            //Player one scores more than player two difference being 1
            if(($one - $two) == 1){
                $result = 'Advantage Player One';
            }

            //Player two scores more than player one difference being 1
            if(($two - $one) == 1){
                $result = 'Advantage Player Two';
            }

            //Player one scores more than player two difference being more than one - 2 points and above
            if(($one - $two) > 1){
                $result = 'Player One Wins';
            }

            //Player two scores more than player one difference being more than one - 2 points and above
            if(($two - $one) > 1){
                $result = 'Player Two Wins';
            }

            //direct view to the Result display page
            return Inertia::render('Result', [
                'result' => $result,
            ]);
        }else{

            //Instances where difference in scores is above 2 points, regardless of whether score is above or below 3
            if($one > $two){
                $result = 'Player One Wins';
            }
            if($one < $two){
                $result = 'Player Two Wins';
            }

            //direct view to the Result display page
            return Inertia::render('Result', [
                'result' => $result,
            ]);
        }

    }

}
