<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortUrl;
use Illuminate\Support\Str;

class UrlShortenerController extends Controller
{
    public function index()
    {
        return view('shortener');
    }
    // Generate a short URL
    public function create(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
        ]);

        $originalUrl = $request->url;

        // Check if the URL is already shortened
        $existing = ShortUrl::where('original_url', $originalUrl)->first();
        if ($existing) {
            return response()->json([
                'short_url' => url($existing->short_code),
            ]);
        }
        // Generate a unique short code
        // $shortCode = Str::random(6);
        do {
            $shortCode = Str::random(6);
        } while (ShortUrl::where('short_code', $shortCode)->exists());


        // Save the data to the database
        $shortUrl = ShortUrl::create([
            'original_url' => $originalUrl,
            'short_code' => $shortCode,
        ]);


        if ($request->isMethod('post')) {
            return redirect()->back()->with('short_url', $shortUrl);
        }
        return response()->json(['short_url' => $shortUrl]);
        // return response()->json(['short_url' => url($shortUrl->short_code)]);
    }

    // Redirect to the original URL
    public function redirect($code)
    {
        $shortUrl = ShortUrl::where('short_code', $code)->firstOrFail();

        return redirect($shortUrl->original_url);
    }
}
