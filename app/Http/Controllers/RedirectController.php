<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RedirectController extends Controller
{
    public function redirectToNewUrl($card_id, $slug)
    {
        // Fetch data from the database
        $card = DB::table('poke_cards')
            ->where('card_id', $card_id)
            ->first();

        if ($card) {
            // Prepare the new URL based on the database fields
            $newUrl = config('app.url') . "/{$card->set_slug}/{$card->slug}";

            // Redirect to the new URL with a 301 Moved Permanently status
            return redirect()->to($newUrl, 301);
        }

        // If the card is not found, redirect to a 404 page or home page as needed
        return redirect()->to(route('set-index'), 302);
    }
}
