<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShortUrlController extends Controller
{
    public function create(Request $request)
    {
        $user = $request->user();
        if (!in_array($user->role, ['Admin', 'Member'])) {
            return response()->json(['error' => 'Only Admin or Member can create short URLs.'], 403);
        }
        $request->validate([
            'original_url' => 'required|url',
        ]);
        $shortCode = substr(md5(uniqid()), 0, 6);
        $shortUrl = \App\Models\ShortUrl::create([
            'user_id' => $user->id,
            'original_url' => $request->original_url,
            'short_code' => $shortCode,
        ]);
        return redirect('/short-urls')->with('success', 'Short URL created!');
    }

    public function index(Request $request)
    {
        $user = $request->user();
        if ($user->role === 'SuperAdmin') {
            $urls = \App\Models\ShortUrl::all();
        } elseif ($user->role === 'Admin') {
            $urls = \App\Models\ShortUrl::whereHas('user', function($q) use ($user) {
                $q->where('company_id', $user->company_id);
            })->get();
        } elseif ($user->role === 'Member') {
            $urls = \App\Models\ShortUrl::where('user_id', $user->id)->get();
        } else {
            return response()->json(['error' => 'Unauthorized.'], 403);
        }
        return response()->json($urls);
    }

    public function show(Request $request)
    {
        $user = $request->user();
        if ($user->role === 'SuperAdmin') {
            $shortUrls = \App\Models\ShortUrl::with('user')->get();
        } elseif ($user->role === 'Admin') {
            $shortUrls = \App\Models\ShortUrl::with('user')->whereHas('user', function($q) use ($user) {
                $q->where('company_id', $user->company_id);
            })->get();
        } elseif ($user->role === 'Member') {
            $shortUrls = \App\Models\ShortUrl::with('user')->where('user_id', $user->id)->get();
        } else {
            $shortUrls = collect();
        }
        return view('short-urls', compact('shortUrls'));
    }

    public function redirect($short_code)
    {
        $shortUrl = \App\Models\ShortUrl::where('short_code', $short_code)->first();
        if (!$shortUrl) {
            abort(404);
        }
        return redirect()->away($shortUrl->original_url);
    }
}
