<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        $statusValid = \DB::table('incoming_messages')->where('status','valid')->get();
        $statusInvalid = \DB::table('incoming_messages')->where('status','invalid')->get();
        $statusOther = \DB::table('incoming_messages')->where('status','!=','invalid')->where('status','!=','valid')->get();

        $participants = \DB::table('participants')->get();

        $regions = \DB::table('regions')->get();

        $outgoingMessages = \DB::table('outgoing_messages')->get();

        
        return view('admin.dashboard',['statusValid' => $statusValid,'statusInvalid' => $statusInvalid ,
                                        'statusOther' => $statusOther, 'participants' => $participants ,
                                        'regions' => $regions, 'outgoingMessages' => $outgoingMessages
                                    ]);
    }

    //Fetch reports
    public function reports(){
        return view('admin.dashboard');
    }
}
