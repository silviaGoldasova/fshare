<?php
namespace App\Http\Controllers;

use App\User;
use App\Offer;
use App\Interest;
use App\Saved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


/*
 * InteractionController
 * role: to provide the view for the routes concerning the interaction of the user with the offers,
 * such as interests, saves
 */

class InteractionController extends Controller
{

    public function postInterestLoad(Request $request)
    {
        $user_id = $request['user_id'];
        $offers = Offer::all();

        $interests_all = Interest::all();
        if (empty($interests_all)) {
            return response()->json([], 200);
        }

        $interests_arr = array();
        $interest_instance = NULL;
        foreach ($offers as $offer) {
            $interest_instance = Interest::where([
                ['user_id', '=', $user_id],
                ['offer_id', '=', $offer->id]
            ])->first();
            if (empty($interest_instance)) {
                $is_marked = false;
            } else {
                $is_marked = true;
            }
            $interests_arr = array_add($interests_arr, $offer->id, $is_marked);
        }
        return response()->json(['interests_arr' => $interests_arr], 200);
    }


    public function postInterestUpdated(Request $request)
    {
        $offer = Offer::find($request['offer_id']);
        $logged_user = Auth::user();
        $logged_user_id = Auth::id();
        $interest = Interest::where([
            ['offer_id', '=', $offer->id],
            ['user_id', '=', $logged_user_id]
        ])->first();

        if (Auth::user() == $offer->user) {
            $to_add_interest = 0;
            return response()->json(['to_add_interest' => $to_add_interest, 'offer_id' => $offer->id], 200);
        }

        if ($interest == null) {
            $interest = new Interest;
            $interest->user_id = $logged_user_id;
            $interest->offer_id = $offer->id;
            $offer->num_of_interested = $offer->num_of_interested + 1;
            $to_add_interest = 1;
            $interest->save();
            $offer->save();
        } else {
            $interest->delete();
            $to_add_interest = -1;
            $offer->num_of_interested = $offer->num_of_interested - 1;
            $offer->save();
        }

        return response()->json(['num_of_interested' => $offer->num_of_interested, 'to_add_interest' => $to_add_interest, 'offer_id' => $offer->id], 200);

        //return response()->json([], 200);
    }

    public function postSavedLoad(Request $request)
    {
        $user_id = $request['user_id'];
        $offers = Offer::all();

        $saved_all = Saved::all();
        $arr_saved = array();
        if (empty($saved_all)) {
            return response()->json([], 200);
        }

        $saved_instance = NULL;
        foreach ($offers as $offer) {
            $saved_instance = Saved::where([
                ['user_id', '=', $user_id],
                ['offer_id', '=', $offer->id]
            ])->first();
            if (empty($saved_instance)) {
                $is_saved = false;
            } else {
                $is_saved = true;
            }
            $arr_saved = array_add($arr_saved, $offer->id, $is_saved);
        }
        return response()->json(['arr_saved' => $arr_saved], 200);
    }

    public function postSavedUpdated(Request $request)
    {
        $offer_id = $request['offer_id'];
        $user_id = $request['user_id'];
        $saved = Saved::where([
            ['offer_id', '=', $offer_id],
            ['user_id', '=', $user_id]
        ])->first();

        $offer = Offer::find($offer_id);
        $user = User::find($user_id);
        if ($offer->user_id == $user_id) {
            $to_mark = 0;
            return response()->json(['to_mark' => $to_mark], 200);
        }

        if (empty($saved)) {
            $saved = new Saved;
            $saved->user_id = $user_id;
            $saved->offer_id = $offer_id;
            $saved->save();
            $to_mark = 1;
            //$offer = Offer::find($offer_id)->first();
        } else {
            $saved->delete();
            $to_mark = -1;
        }
        return response()->json(['to_mark' => $to_mark], 200);
    }

    public function getContact($offer_id) {
        $offer = Offer::find($offer_id);
        $is_js_available = 0;
        return view('contact', ['offer' => $offer, 'is_js_available' => $is_js_available]);
    }

}
