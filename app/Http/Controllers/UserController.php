<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller {
    public function postSignUp(Request $request) {
        $email = $request['email'];
        $name = $request['name'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user->name = $name;
        $user->password = $password;

        $user->save();

        return redirect()->back();
    }

    public function postSignIn(Request $request) {

    }

}

