<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\AccountType;
use App\Models\Enquiry;
use App\Models\Itinerary;
use App\Models\Task;


class DashboardController extends Controller
{
    public function index(){
        $pageConfigs = ['pageHeader' => true];
        $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["name" => "Dashboard"]
        ];
        $enquiries = Enquiry::all();
        $itineraries = Itinerary::all();
        $task_list = Task::all();

        $msg = '';
        //dd(compact('enquiries', 'itineraries', 'pageConfigs', 'breadcrumbs', 'msg'));
        return view('pages.dashboard',compact('task_list', 'enquiries', 'itineraries', 'pageConfigs', 'breadcrumbs', 'msg'));
    }
}
