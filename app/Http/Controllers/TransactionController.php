<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index(){
        
       $trans = Transaction::get();

        return view ('transactions.transaction',[
            'trans' => $trans
        ]);
    }
    

    
}
