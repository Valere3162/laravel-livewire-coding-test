<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QuoteController extends Controller
{
    /**
     * Fetch and return 5 random Kanye West quotes.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $quotes = [];
        for ($i = 0; $i < 5; $i++) {
            $response = Http::get('https://api.kanye.rest/');
            $quotes[] = $response->json()['quote'];
        }
        return response()->json($quotes);
    }
}
