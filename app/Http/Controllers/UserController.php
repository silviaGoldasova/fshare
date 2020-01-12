<?php
namespace App\Http\Controllers;

use App\User;
use App\Offer;
use App\Saved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    public function postSignUp(Request $request) {
        $this -> validate($request, [
            'email_up' => 'required|email|unique:users,email',
            'name' => 'required|max:120',
            'password' => 'required|min:4'
        ]);
        $email = $request['email_up'];
        $name = $request['name'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user->email = $email;
        $user->name = $name;
        $user->password = $password;

        $user->save();

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function postSignIn(Request $request) {
        $this -> validate($request, [
            'email_in' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt(['email'=>$request['email_in'], 'password'=>$request['password']])) {
            //if (Auth::attempt(['email'=>$request['email']])) {
            return redirect()->route('dashboard');
        }
        return redirect()->back();
    }

    public function getLogOut() {
        Auth::logout();
        return redirect()->route('home');
    }

    public function getProfile() {
        $saved_off_ids_arr = Saved::where('user_id', '=', Auth::id())->pluck('offer_id');
        $saved_offers = Offer::whereIn('id', $saved_off_ids_arr)->get();
        $my_offers = Offer::where('user_id', '=', Auth::id() )->get();
        return view('profile', ['saved_offers' => $saved_offers, 'my_offers' => $my_offers]);
    }

}

