<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\AccountType;
use App\Models\Enquiry;
use App\Models\Itinerary;
use App\Models\Task;

use Auth;


class DashboardController extends Controller
{
    public function index(){
        $pageConfigs = ['pageHeader' => true];
        $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["name" => "Dashboard"]
        ];
        $enquiries = Enquiry::orderBy('created_at', 'desc')->get();
        $itineraries = Itinerary::orderBy('created_at', 'desc')->get();

        $user_id = Auth::user()->id;

        $task_list = Task::where('assigned_to', $user_id)->orderBy('created_at', 'desc')->get();

        $msg = '';
        //dd(compact('enquiries', 'itineraries', 'pageConfigs', 'breadcrumbs', 'msg'));
        return view('pages.dashboard',compact('task_list', 'enquiries', 'itineraries', 'pageConfigs', 'breadcrumbs', 'msg'));
    }
}
