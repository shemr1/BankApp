<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ChqAccs;
use App\Models\InvAccs;
use App\Models\SavAccs;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index(){
        
       $users = User::get();

        return view ('accounts',[
            'users' => $users
        ]);
    }

  

   
}
