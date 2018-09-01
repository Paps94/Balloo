<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class ActivationController extends Controller
{
    public function activate(Request $request){
      $user = User::ByActivationColumns($request->email, $request->token)->first();
      $user->update([
          'active' => true,
          'activation_token' => null
      ]);

      Auth::loginUsingId($user->id);

      return redirect()->route('home')->withSuccess('Activated! You are now signed in. Feel free to edit your profile and add new properties in order to create contracts. Accessible through the above panel!');
    }
}
