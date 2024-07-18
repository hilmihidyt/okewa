<?php

namespace App\Http\Controllers;

use App\Models\ChatLink;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    
            $chatLink = ChatLink::create([
                'phone'      => $phone,
                'message'    => $content,
                'wa_link'    => $wa_link,
                'short_url'  => $shortURLObject->default_short_url,
            ]);
    
            $shortURL = $shortURLObject->default_short_url;
            return response()->json([
                'status'    => 'success',
                'id'        => $chatLink->id,
                'short_url' => $shortURL,
                'wa_link'   => Crypt::decryptString($wa_link),
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function customShortUrl(Request $request, $ulid){
        DB::beginTransaction();
        try {
            $validator = \Validator::make($request->all(), [
                'custom_url' => 'required|string|unique:short_urls,url_key',
            ]);
            
            if($validator->fails()){
                return response()->json([
                    'status' => 'error',
                    'message' => $validator->errors()->first(),
                ], 400);
            }

            $chatLink = ChatLink::firstWhere('id', $ulid);

            if(!$chatLink){
                return response()->json([
                    'message' => 'Chat link not found',
                ], 404);
            }

            $chatLink->shortUrl()->update([
                'url_key' => $request->custom_url,
                'default_short_url' => config('app.url').'/go/'.$request->custom_url,
            ]);

            $chatLink->update([
                'short_url' => config('app.url').'/go/'.$request->custom_url,
            ]);

            DB::commit();
    
            return response()->json([
                'status' => 'success',
                'short_url' => config('app.url').'/go/'.$request->custom_url,
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage(),
            ], 500);
        }
    }
}
