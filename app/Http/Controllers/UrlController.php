<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;
use Tuupola\Base62Proxy as Base62;

class UrlController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|url|max:255',
        ]);

        $link = Link::whereUrl(request('url'))->first();

        if($link !== null) {
            $hash = $link->hash;
        } else {
            $link = new Link;
            $link->url = request('url');
            $link->save();

            $hash = Base62::encode($link->id);
            $link->hash = $hash;
            $link->save();
        }

        return redirect('/')->with('hash', $hash);
    }

    public function get($hash)
    {
        $link = \Cache::rememberForever("url.$hash", function () use ($hash) {
            return Link::whereHash($hash)->first();
        });
        if ($link !== null) {
            return redirect()->away($link->url, 301);
        }
        abort(404);
    }
}
