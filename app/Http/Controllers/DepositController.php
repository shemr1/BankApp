<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index()
    { 
        return view ('deposit');
    }

    public function update(Request $request)
    {
        $table = 'sav_accs';
        $this->validate($request,[
            'amount' => 'required',
        ]);

        if (($request->sav_accs) == 'on') 
            {
                $table = 'sav_accs';
            }
        elseif (($request->chq_accs) == 'on') 
            {
                $table = 'chq_accs' ; 
             } 
         else if (($request->inv_accs) == 'on') 
            {
                $table = 'inv_accs';
            }

        $current = DB::table($table)->where('user_id', auth()->user()->id)->value('balance');

        $new = $current + $request->amount;
      
        if (($request->sav_accs) == 'on')
       {SavAccs::where('user_id',auth()->user()->id)->where('balance', $current)->update(['balance'=> $new]);}
       elseif(($request->chq_accs) == 'on')
       {ChqAccs::where('user_id',auth()->user()->id)->where('balance', $current)->update(['balance'=> $new]);}
       else if (($request->inv_accs) == 'on') 
       {InvAccs::where('user_id',auth()->user()->id)->where('balance', $current)->update(['balance'=> $new]);}

       return redirect()->route('accounts')->with(['message'=>'Deposit complete']);

    }
}
