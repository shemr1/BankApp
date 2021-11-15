<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SavAccs;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MigrateController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index()
    { 
        $users = User::get();

        return view ('migrate',[
            'users' => $users
        ]);
    }

    public function migrate(Request $request)
    {

        $id = DB::table('users')->where('name', $request->recipient)->value('id');

        $this->validate($request,[
            'amount' => 'required',
            'recipient' => "required",
        ]);

        Transaction::create([
            'user_id' => auth()->id(),
            'amount' => $request->amount,
            'sender' =>  auth()->user()->name,
            'description' => $request->description,
            'tag'=> 'debit' ,
            'recipient' => $request->recipient,
           
        ]);
        $current = DB::table('sav_accs')->where('user_id', auth()->user()->id)->value('balance');
            $new = $current - $request->amount;
            SavAccs::where('user_id',auth()->user()->id)->where('balance', $current)->update(['balance'=> $new]);
            
        Transaction::create([
            'user_id' =>  $id,
            'amount' => $request->amount,
            'sender' => $request-> recipient,
            'description' => $request->description,
            'tag'=> 'credit' ,
            'recipient' =>  auth()->user()->name,  
        ]);

        $current = DB::table('sav_accs')->where('user_id', $id)->value('balance');
            $new_ = $current + $request->amount;
            SavAccs::where('user_id', $id)->where('balance', $current)->update(['balance'=> $new_]);

          return redirect()->route("accounts");

    }
}
