<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUrlRequest;

use App\Models\ShortUrl;

class UrlShorterCntroller extends Controller
{
    public function createView()
    {
        try {
            return view('url.create-short');
        }
        catch(\Exception $e) {
            return view('common.server-error');
        }
    }

    public function create(CreateUrlRequest $request)
    {
        try {
            $result = ShortUrl::create([
                'url' => $request->url,
                'short_url' => time()
            ]);
            $short_url = url('/url')."/$result->short_url";
            return $this->SendResponse($short_url, 'Url Created', Response::HTTP_OK);
        }
        catch(\Exception $e) {
            return $this->SendResponse(null, 'Oops! Something Went Wrong', Response::HTTP_ACCEPTED); 
        }
    }

    public function viewUrl(Request $request)
    {
        try {
            $redirect = ShortUrl::select('url')->where('short_url', $request->code)->first();

            if($redirect) return redirect()->to($redirect->url); 
            else return view('common.not-found');
        }
        catch(\Exception $e) {
            return view('common.server-error');
        }
    }
}
