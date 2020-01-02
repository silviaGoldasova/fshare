<?php
namespace App\Http\Controllers;

use App\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller {

    public function getDashboard() {
        $offers = Offer::orderBy('created_at', 'desc')->get();
        return view('dashboard', ['offers' => $offers]);
    }

    public function postCreateOffer(Request $request) {
        //validation
        $this->validate($request, [
            'body' => 'required|max:1000'
        ]);

        $offer = new Offer();
        $offer->body = $request['body'];
        $offer->commodity = $request['commodity'];

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

}
