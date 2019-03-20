<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DOMDocument;

class DocController extends Controller
{
    public function index(){
      return view('doc');
    }
}
