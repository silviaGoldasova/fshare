<?php
namespace App\Http\Controllers;

use App\Offer;
use App\Interest;
use App\User;
use \Datetime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


/*
 * OfferController
 * role: to provide the view for the routes concerning the management of the offers with correct data from the database,
 * includes creation of the offers, editing, ordering
 */

class OfferController extends Controller {

    //gets view for the dashboard, provides it with offers to load
    public function getDashboard() {
        $offers = Offer::orderBy('created_at', 'desc')->paginate(5);
        return view('dashboard', ['offers' => $offers]);
    }

    public function getDashboardWoJS() {
        $offers = Offer::orderBy('created_at', 'desc')->paginate(5);
        return view('dashboardWoJS', ['offers' => $offers]);
    }

    public function postCreateOffer(Request $request) {
        //validation
        $this->validate($request, [
            'body' => 'required|max:1000',
            'commodity' => 'required|max:25'
        ]);

        $offer = new Offer();
        $offer->body = $request['body'];
        $offer->commodity = $request['commodity'];
        $offer->num_of_interested = 0;

        $message = 'There was an error.';
        if ($request->user()->offers()->save($offer)){      //if successfully inserted
            $message = 'Offer successfully created.';
        }
        return redirect()->route('dashboard')->with(['message' => $message]);
    }

    public function getDeleteOffer($offer_id){
        $offer = Offer::where('id', $offer_id)->first();

        if (Auth::user() != $offer->user) {
            return redirect()->back();
        }

        $offer -> delete();
        return redirect()->route('dashboard')->with(['message' => 'Successfully deleated.']);
    }

    public function postEditOffer(Request $request) {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $offer = Offer::find($request['offer_id']);
        if (Auth::user() != $offer->user) {
            return redirect()->back();
        }
        $offer->body = $request['body'];
        $offer->update();
        return response()->json(['updated_body' => $offer->body], 200);
    }

    public function getOrderAlphabet(){
        $offers = Offer::orderBy('commodity')->paginate(5);
        //return redirect()->route('dashboard.filter')->with(['offers' => $offers]);
        return view('dashboard', ['offers' => $offers]);
    }

    public function postOrderDate(Request $request){
        return redirect()->route('dashboard');
    }

    public function postFilterDate(Request $request){
        $input_date = $request['example-date-input'];
        $input_date .= " 00:00:00";
        $formatted_date = Carbon::createFromFormat('Y-m-d H:i:s', $input_date);

        //$offers = Offer::whereDate('created_at', '>', $formatted_date)->paginate(5);
        $request->session()->put('date', $formatted_date);
        return redirect()->route('dashboard.filter');
        //return redirect()->route('dashboard.filter')->with(['date' => $formatted_date]);
    }

    public function getDashboardWithFilter() {
        $date = request()->session()->get( 'date' );
        $offers = Offer::whereDate('created_at', '>', $date)->paginate(5);
        return view('dashboard', ['offers' => $offers]);
    }

}
