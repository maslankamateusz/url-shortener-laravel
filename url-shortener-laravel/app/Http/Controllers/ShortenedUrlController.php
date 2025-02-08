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
                'shortened_url' => url('/api/expand/' . $existing->short_code)
            ], 200);
        }
    
        $shortCode = Str::random(6);
    
        $shortenedUrl = ShortenedUrl::create([
            'original_url' => $request->url,
            'short_code' => $shortCode
        ]);
    
        return response()->json([
            'shortened_url' => url('/api/expand/' . $shortenedUrl->short_code)
        ], 201);
    }
  

    public function expand($shortCode)
    {
        $shortenedUrl = ShortenedUrl::where('short_code', $shortCode)->first();

        if (!$shortenedUrl) {
            return response()->json(['error' => 'URL not found'], 404);
        }

        return response()->json(['original_url' => $shortenedUrl->original_url], 200);
    }
}
