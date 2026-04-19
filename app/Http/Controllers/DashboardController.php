<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(request $request)
    {

		return view('admin.dashboard.index');
  	}
    public function toggle(request $request){
		$user = Auth::user();
		$user->sidebar_toggle = $request->toggle_status;
		$user->save();
		return json_encode(['msg' => 'success','data' => $user->sidebar_toggle]);
    }
}
