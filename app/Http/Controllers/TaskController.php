<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\AccountType;
use App\Models\Enquiry;
use App\Models\Task;
use App\Models\Itinerary;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\ProductDescription;
use App\Models\ProductPricing;
use App\Models\Currency;
use App\Models\CategoryTag;
use App\Models\Category;
use App\Models\Region;
use App\Models\Country;
use App\Models\City;
use App\Models\Task_Type;
use App\Models\Language;
use App\Models\ItineraryDaily;
use App\Models\ItineraryTemplate;
use App\Models\Confirmation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DB;
use Mail;
use PDF;

class TaskController extends Controller
{
  public function task_management($itinerary_id, $type){
      $pageConfigs = ['pageHeader' => true];
      // $breadcrumbs = [
      //   ["link" => "/", "name" => "Home"],["name" => "Task List"]
      // ];
      $account = Account::all();
      $task_type = Task_Type::all();
      $task_list = Task::where('itinerary_id',$itinerary_id)->get();
      $itinerary = Itinerary::find($itinerary_id);

      // dd($task_list);
      return view('pages.task_management',compact('itinerary', 'itinerary_id', 'task_list', 'task_type', 'pageConfigs', 'type'));
  }

  public function edit_task(Request $request) {
    $pageConfigs = ['pageHeader' => true];
    // $breadcrumbs = [
    //   ["link" => "/", "name" => "Home"],["name" => "Task Create"]
    // ];
    $task = Task::find($request->task_id);
    $task_type = Task_Type::all();

    $itinerary_id = $request->itinerary_id;
    $itinerary = Itinerary::find($task->itinerary_id);
    $enquiry_id = $itinerary->enquiry_id;
    $enquiry = Enquiry::where('id',$enquiry_id)->get()->first();

    $account =  DB::table('account')
    ->leftjoin('account_type', 'account.account_type', '=', 'account_type.id')->where('title', 'staff')->orWhere('title', 'admin')->get();
    $current_user = Auth::user();
    $current_account = DB::table('account')->leftjoin('account_type', 'account.account_type', '=', 'account_type.id')->where('user_id', $current_user->id)->first();

    $itinerary_daily = ItineraryDaily::find($task->service_id);

    $data = array();

    $data['account'] = $account;
    $data['current_account'] = $current_account;
    if(empty($itinerary_daily))
    {
      $data['product_title'] = "For Only Itinerary";
    }
    else{
      $product = Product::find($itinerary_daily->product_id);
      $data['product_title'] = $product->title;
    }
    $data['itinerary'] = $itinerary;
    $data['enquiry_id'] = $enquiry;
    $data['task_type'] = $task_type;
    $data['task'] = $task;
    $data['itinerary_ref_num'] = $itinerary->reference_number;
    $data['result'] = "success";
    echo json_encode($data);
  }

  public function delete_task(Request $request) {
    $task_id = $request->task_id;

    if(Task::find($task_id)) {
      Task::find($task_id)->delete();

      Confirmation::where('task_id', $task_id)->delete();
      echo 'success';
    }
  }
  public function task_detail(Request $request) {
    $product_id = $request->product_id;
    $itinerary_id = $request->itinerary_id;
    $itinerary = Itinerary::find($itinerary_id);
    $task_type = Task_Type::all();
    $account =  DB::table('account')
    ->leftjoin('account_type', 'account.account_type', '=', 'account_type.id')->where('title', 'staff')->orWhere('title', 'admin')->get();
    $current_user = Auth::user();
    $current_account = DB::table('account')->leftjoin('account_type', 'account.account_type', '=', 'account_type.id')->where('user_id', $current_user->id)->first();

    $data = array();
    $data['account'] = $account;
    $data['current_account'] = $current_account;
    $data['task_type'] = $task_type;
    $data['result'] = "success";
    $data['itinerary_ref_num'] = $itinerary->reference_number;
    echo json_encode($data);
  }
  public function task_product_detail(Request $request) {
    $service_id = $request->service_id;
    $itinerary_id = $request->itinerary_id;
    $task_id = $request->task_id;

    $task_content = array();
    if($task_id != NULL) {
      $task_content = Task::find($task_id);
    }

    $itinerary = Itinerary::find($itinerary_id);
    $task_type = Task_Type::all();
    $account =  DB::table('account')
    ->leftjoin('account_type', 'account.account_type', '=', 'account_type.id')->where('title', 'staff')->orWhere('title', 'admin')->get();
    $current_user = Auth::user();
    $current_account = DB::table('account')->leftjoin('account_type', 'account.account_type', '=', 'account_type.id')->where('user_id', $current_user->id)->first();

    $data = array();
    $data['task_content'] = $task_content;
    $data['account'] = $account;
    $data['current_account'] = $current_account;
    $data['task_type'] = $task_type;
    $data['result'] = "success";
    $data['itinerary_ref_num'] = $itinerary->reference_number;

    if($service_id != 0)
    {
      $itinerary_daily = ItineraryDaily::find($service_id);
      $product = Product::find($itinerary_daily->product_id);
      $data['product_title'] = $product->title;
    }

    echo json_encode($data);
  }

  public function save_task(Request $request){

    $task_id = $request->task_id;
    $service_id = $request->service_id;

    $data = array();
    $data = $request->task_data;

    $account_id = Account::where('user_id', Auth::user()->id)->first()->id;

    $data['assigned_by'] = $account_id;

    $data['service_id'] = 0;
    if(!empty($service_id)) {
      $data['service_id'] = $service_id;
    }

    if(!empty($data['itinerary_id']))
    {
      $account_id = Itinerary::find($data['itinerary_id'])->account_id;
      $data['customer'] = $account_id;
    }

    if($task_id != 0)
    {
      $task = Task::find($task_id);

      if(empty($data['itinerary_id']))
      {
        $account_id = Itinerary::find($task->itinerary_id)->account_id;
        $data['customer'] = $account_id;
      }

      $data['itinerary_id'] = $task->itinerary_id;
      $task->update($data);
      $data['mode'] = "update";
    }
    else
    {
      $task = new Task();
      $task->fill($data);
      $task->save();

      if($data['service_id'] == 0)
      {
        $task_itinerary_id = $task->itinerary_id;
        $itinerary_dailys = ItineraryDaily::where('itinerary_id', $task_itinerary_id)->get();
        if(!empty($itinerary_dailys))
        {
          foreach($itinerary_dailys as $itinerary_daily)
          {
            $existing_record = Confirmation::where('itinerary_daily_id', $itinerary_daily->id)->first();
            if(!empty($existing_record)) {
              continue;
            }

            $confirm = new Confirmation();
            $confirm->itinerary_daily_id = $itinerary_daily->id;
            $confirm->task_id = $task->id;
            $confirm->product_id = $itinerary_daily->product_id;
            $confirm->flag = 1;
            $confirm->status = 0;
            $confirm->save();
          }
        }
      }
      else {
        $itinerary_daily = ItineraryDaily::find($data['service_id']);
        if(!empty($itinerary_daily))
        {
            $confirm = new Confirmation();
            $confirm->itinerary_daily_id = $itinerary_daily->id;
            $confirm->task_id = $task->id;
            $confirm->product_id = $itinerary_daily->product_id;
            $confirm->flag = 0;
            $confirm->status = 0;
            $confirm->save();
        }
      }

      $data['mode'] = "create";
    }
    $data['result'] = "success";
    return json_encode($data);
  }
}

