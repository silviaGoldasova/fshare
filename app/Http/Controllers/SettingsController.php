<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

/*
 * SettingsController provides views for the routes concerning the visual mode that any user can use,
 * selected at the '/mode'
 * the user's choice is saved in the session
 */

class SettingsController extends Controller
{

    public function getMode() {
        return view('mode');
    }

    public function postMode(Request $request) {

        $mode = $request['gridRadios'];
        if($request->session()->has('mode')){
            $request->session()->forget('mode');
            $request->session()->put('mode', $mode);
        }else {
            $request->session()->put('mode', $mode);
        }

        return redirect()->back();
    }

}
