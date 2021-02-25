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
use App\Models\Confirmation;

use App\Models\ItineraryDaily;
use App\Models\ItineraryTemplate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DB;
use Mail;
use PDF;

class ContactController extends Controller
{
  public function Contact_management($task_id){
      $product_gallery_model = new ProductGallery;
      $pageConfigs = ['pageHeader' => true];
      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["name" => "Contact Management"]
      ];
      $task = Task::find($task_id);
      $itinerary_id = Task::find($task_id)->itinerary_id;
      $itinerary = Itinerary::find($itinerary_id);
      if($task->service_id == 0)
      {
        $itinerary_dailys = ItineraryDaily::where('itinerary_id', $itinerary->id)->get();
        $products = array();
        foreach($itinerary_dailys as $daily)
        {
          $product = Product::find($daily->product_id);
          array_push($products, $product);
        }
      }
      else{
        $itinerary_dailys = ItineraryDaily::where('id', $task->service_id)->get();
        // dd($itinerary_dailys);
      }
      return view('pages.contact_management',compact('pageConfigs', 'breadcrumbs', 'itinerary', 'itinerary_dailys', 'product_gallery_model'));
  }
  public function save_status(Request $request){
    $confirmation = Confirmation::find($request->confirm_id);
    $confirmation->status = 1;
    $confirmation->update();
    echo "success";
  }

}

