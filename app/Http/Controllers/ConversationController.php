<?php
namespace App\Http\Controllers;

use App\Conversation;
use App\Offer;
use App\Interest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller {

    public function postCreateConversation(Request $request) {
        //  IBA AK UZ NEEXISTUJE
        //validation
        $this->validate($request, [
            'body' => 'required|max:1000'
        ]);

        $offer_id = $request['offer_id'];
        $buyer_id = $request['user_id'];
        $seller_id = $request['seller_id'];


        $past_converse = Conversation::where([
            ['offer_id', '=', $offer_id],
            ['buyer_id', '=', $buyer_id],
            ['seller_id', '=', $seller_id]
        ])->get();

        if (!empty($past_converse)) {
            $message = "Conversation already exists";
            return redirect()->route('dashboard')->with(['message' => $message]);
        }

        $conversation = new Conversation();
        $conversation->buyer_id = $buyer_id;
        $conversation->seller_id = $seller_id;
        $conversation->offer_id = $offer_id;

        $message = 'There was an error.';
        if (save($conversation)){      //if successfully inserted
            $message = 'Offer successfully created.';
        }
        return redirect()->route('conversation')->with(['message' => $message]);
    }

    public function postCreateMessage(Request $request) {


    }



}
