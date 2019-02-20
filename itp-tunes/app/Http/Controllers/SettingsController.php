<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SettingsController extends Controller
{
    function index(){

      $maintenance = DB::table('configurations')->where('name', '=', 'maintainence')->first();

      $inMaintenance = ($maintenance->value == 'on');

      return view('settings', [
        'isOn' => $inMaintenance
      ]);
    }

    function update(Request $request){

      $input = $request->all();

      if(array_key_exists('maintenance', $input)){
        $maintenance = DB::table('configurations')->where('name', '=', 'maintainence')->update(['value' => 'on']);
      }else{
        $maintenance = DB::table('configurations')->where('name', '=', 'maintainence')->update(['value' => 'off']);
      }

      return redirect('/settings');
    }
}
