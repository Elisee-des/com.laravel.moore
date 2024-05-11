<?php

namespace App\Http\Controllers\private\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TableauBordController extends Controller
{
   public function index(){
    return view("private.admin.index");
   }
}
