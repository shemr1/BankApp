<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ChqAccs;
use App\Models\InvAccs;
use App\Models\SavAccs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransferController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index()
    { 
        return view ('transfer');
    }

    public function transfer(Request $request)
    {
        $tablef = 'sav_accs';
        $tablet = 'sav_accs';
        
        $this->validate($request,[
            'amount' => 'required',
        ]);

        
        if (($request->transfer_from) == 'Savings') 
        {
            $tablef = 'sav_accs';
            $tbl_f_val = DB::table($tablef)->where('user_id', auth()->user()->id)->value('balance');
            $newfrom = $tbl_f_val - $request->amount;
            SavAccs::where('user_id',auth()->user()->id)->where('balance', $tbl_f_val)->update(['balance'=> $newfrom]);

        }
    elseif (($request->transfer_from) == 'Chequing') 
        {
            $tablef = 'chq_accs' ;
            $tbl_f_val = DB::table($tablef)->where('user_id', auth()->user()->id)->value('balance');
            $newfrom = $tbl_f_val - $request->amount;
            ChqAccs::where('user_id',auth()->user()->id)->where('balance', $tbl_f_val)->update(['balance'=> $newfrom]);
         } 
     else if (($request->transfer_from) == 'Investment') 
        {
            $tablef = 'inv_accs';
            $tbl_f_val = DB::table($tablef)->where('user_id', auth()->user()->id)->value('balance');
            $newfrom = $tbl_f_val - $request->amount;
            InvAccs::where('user_id',auth()->user()->id)->where('balance', $tbl_f_val)->update(['balance'=> $newfrom]);
        }

        if (($request->transfer_to) == 'Savings') 
        {
            $tablet = 'sav_accs';
            $tbl_t_val = DB::table($tablet)->where('user_id', auth()->user()->id)->value('balance');
            $newto = $tbl_t_val + $request->amount;
            SavAccs::where('user_id',auth()->user()->id)->where('balance', $tbl_t_val)->update(['balance'=> $newto]);
        }
    elseif (($request->transfer_to) == 'Chequing') 
        {
            $tablet = 'chq_accs' ; 
            $tbl_t_val = DB::table($tablet)->where('user_id', auth()->user()->id)->value('balance');
            $newto = $tbl_t_val + $request->amount;
            ChqAccs::where('user_id',auth()->user()->id)->where('balance', $tbl_t_val)->update(['balance'=> $newto]);
         } 
     else if (($request->transfer_to) == 'Investment') 
        {
            $tablet = 'inv_accs';
            $tbl_t_val = DB::table($tablet)->where('user_id', auth()->user()->id)->value('balance');
            $newto = $tbl_t_val + $request->amount;
            InvAccs::where('user_id',auth()->user()->id)->where('balance', $tbl_t_val)->update(['balance'=> $newto]);
        }

        return redirect()->route('accounts')->with(['message'=>'Account transfer complete']);

    }
}
