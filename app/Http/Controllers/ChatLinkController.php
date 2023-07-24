<?php

namespace App\Http\Controllers;

use App\Models\ChatLink;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ChatLinkController extends Controller
{
    public function generateWaLink(Request $request){
        try {
            $request->validate([
                'phone'   => 'required|numeric',
            ]);
    
            $builder = new \AshAllenDesign\ShortURL\Classes\Builder();
    
            $shortURLObject = $builder->destinationUrl('https://wa.me/'.$request->phone.'?text='.urlencode($request->message))->make();
            
            //accept emoji in message
            $message = urlencode($request->message);
            $phone   = Crypt::encryptString($request->phone);
            $content = $request->message ? Crypt::encryptString($request->message) : '';
            $wa_id   = Str::remove('+', $request->phone);
            $wa_link = Crypt::encryptString('https://api.whatsapp.com/send/?phone='.$wa_id.'&text='.$message);
    
            ChatLink::create([
                'phone'      => $phone,
                'message'    => $content,
                'wa_link'    => $wa_link,
                'short_url'  => $shortURLObject->default_short_url,
            ]);
    
            $shortURL = $shortURLObject->default_short_url;
            return response()->json([
                'short_url' => $shortURL,
                'wa_link'   => Crypt::decryptString($wa_link),
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], 500);
        }
    }
}
