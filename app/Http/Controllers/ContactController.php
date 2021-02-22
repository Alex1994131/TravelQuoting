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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DB;
use Mail;
use PDF;

class ContactController extends Controller
{
  public function Contact_management(){
      $pageConfigs = ['pageHeader' => true];
      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["name" => "Contact Management"]
      ];
      return view('pages.contact_management',compact('pageConfigs', 'breadcrumbs'));
  }

}

