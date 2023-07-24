<?php

namespace App\Http\Controllers\Admin;

use App\Models\ChatLink;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Contracts\Encryption\DecryptException;

class ChatLinkController extends Controller
{
    public function index()
    {
        try {
            if (request()->ajax()) {
                $links = ChatLink::query();
                return DataTables::of($links)
                ->addIndexColumn()
                ->editColumn('phone', function ($item) {
                    try {
                        $phone = Crypt::decryptString($item->phone);
                    } catch (DecryptException $e) {
                        $phone = $item->phone;
                    }
                    return $phone;
                })
                ->editColumn('message', function ($item) {
                    try {
                        $message = Crypt::decryptString($item->message);
                        $message = Str::limit($message, 50);
                    } catch (DecryptException $e) {
                        $message = $item->message;
                    }
                    return $message;
                })
                ->editColumn('short_url', function ($item) {
                    $short_url = '<a href="'.$item->short_url.'" target="_blank">'.Str::limit($item->short_url, 50).'</a>';
                    return $short_url;
                })
                ->addColumn('visits', function ($item) {
                    return $item->shortUrl->visits->count();
                })
                ->addColumn('action', function ($item) {
                    $button =   '<div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="'.route('chat-link.analytic',$item->id).'">Analytic</a></li>
                                        <li><a class="dropdown-item" id="delete-confirm" href="#" role="button" data-id="'.$item->id.'">Delete</a></li>
                                    </ul>
                                </div> ';
                    return $button;
                })
                ->rawColumns(['action', 'wa_link','short_url','visits'])
                ->make();
            }
    
            return view('chat-link.index');
        } catch (\Throwable $th) {
            return back()->with('error', 'Data Not Found');
        }
    }

    public function analytic($id)
    {
        try {
            if (request()->ajax()) {
                $link = ChatLink::findOrFail($id);
                $url  = $link->shortUrl->visits()->get();

                return DataTables::of($url)
                ->addIndexColumn()
                ->addColumn('location', function ($item) {
                    $address = geoip($item->ip_address);
                    return $address->city .', ' . $address->country;
                })
                ->rawColumns(['location'])
                ->make();
            }

            return view('chat-link.analytic');
        } catch (\Throwable $th) {
            return back()->with('error', 'Data Not Found');
        }
    }

    public function destroy($id)
    {
        try {
            $link = ChatLink::findOrFail($id);
            $link->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data Deleted Successfully'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Data Deleted Failed'
            ]);
        }
    }
}
