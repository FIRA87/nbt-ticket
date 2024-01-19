<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ActiveUserController extends Controller
{


    public function AllUser(){
        $users = User::where('role','user')->latest()->get();
        return view('backend.user.user_all_data',compact('users'));

    } // End Mehtod

    public function AllManager(){
        $managers = User::where('role','manager')->latest()->get();
        return view('backend.user.vendor_all_data',compact('managers'));

    } // End Mehtod


}
