<?php

namespace App\Http\Controllers\private\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserTableauBordController extends Controller
{
   public function index(){
    return view("private.user.index");
   }
}
