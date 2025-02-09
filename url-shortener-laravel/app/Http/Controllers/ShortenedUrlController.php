<?php

namespace App\Http\Controllers;

use App\Models\ShortenedUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShortenedUrlController extends Controller
{
    public function shorten(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $existing = ShortenedUrl::where('original_url', $request->url)->first();
        if ($existing) {
            return response()->json([
                'shortened_url' => url('/api/expand/' . $existing->short_code),
                'redirect_url' => url('/go/' . $existing->short_code)
            ], 200);
        }

        $shortCode = Str::random(6);

        $shortenedUrl = ShortenedUrl::create([
            'original_url' => $request->url,
            'short_code' => $shortCode
        ]);

        return response()->json([
            'shortened_url' => url('/api/expand/' . $shortenedUrl->short_code),
            'redirect_url' => url('/go/' . $shortenedUrl->short_code)
        ], 201);
    }

    public function expand($shortCode)
    {
        $shortenedUrl = ShortenedUrl::where('short_code', $shortCode)->first();
    
        if (!$shortenedUrl) {
            return response()->json(['error' => 'Shortened URL not found'], 404);
        }
    
        return response()->json(['original_url' => $shortenedUrl->original_url]);
    }    

    public function redirectToUrl($shortCode)
    {
        $shortenedUrl = ShortenedUrl::where('short_code', $shortCode)->first();

        if (!$shortenedUrl) {
            return response()->json(['error' => 'Shortened URL not found'], 404);
        }

        return redirect($shortenedUrl->original_url);
    }
    public function listShortenedUrls()
    {
        $shortenedUrls = ShortenedUrl::all(['short_code', 'original_url', 'created_at']);

        return response()->json($shortenedUrls);
    }

}
