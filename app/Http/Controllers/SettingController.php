<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

use App\Models\Category;
use App\Models\CategoryTag;
use App\Models\Account;
use App\Models\AccountType;
use App\Models\Language;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\ProductDescription;
use App\Models\ProductPricing;
use App\Models\Region;
use App\Models\Country;
use App\Models\City;
use App\Models\Currency;
use App\Models\Customer;
use App\Models\Task_Type;

use DB;

class SettingController extends Controller
{
    public function index(Request $request) {
        $pageConfigs = ['pageHeader' => true];
        $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["name" => "Settings"]
        ];
        $account_types = AccountType::all();
        $task_types = Task_Type::all();
        $currencys = Currency::all();
        $customers = Customer::all();
        $languages = Language::all();
        $categorys = Category::all();
        $category_tags = CategoryTag::all();
        $citys = City::all();
        $countrys = Country::all();



        return view('pages.settings_general',compact(
            'pageConfigs', 'breadcrumbs', 'account_types', 'task_types', 'currencys', 'customers', 'languages', 'categorys', 'category_tags', 'citys', 'countrys',
        ));
    }
    /** account_type */
    public function detail_account_type(Request $request)
    {
      $id = $request->account_type_id;
      $data = array();
      if($id == 0)
      {
        $data['mode'] = "create";
      }
      else{

        $data['mode'] = "edit";
        $account_type = AccountType::find($id);
        if(!empty($account_type))
           $data['title'] = $account_type->title;
      }
      $data['result'] = "success";
      return json_encode($data);
    }
    public function save_account_type(Request $request)
    {
      $id = $request->account_type_id;
      $name = $request->account_type_name;
      $data['title'] = $name;
      if($id == 0)
      {
        $account_type = AccountType::where('title', $name)->first();
        if(!empty($account_type))
          $data['result'] = "error_exist";
        else{
          $account_type = new AccountType();
          $account_type->title = $name;
          $account_type->save();
          $data['result'] = "success";
        }
      }
      else{
        $account_type = AccountType::find($id);
        if(!empty($account_type))
        {
          $account_type->title = $name;
          $account_type->update();
        }
        $data['result'] = "success";
      }

      return json_encode($data);
    }


    public function account_type_del(Request $request) {
      $id = $request->account_type_id;

      if(AccountType::find($id)) {
        AccountType::find($id)->delete();
        echo 'success';
      }
    }

    /**task_type */
    public function detail_task_type(Request $request)
    {
      $id = $request->task_type_id;
      $data = array();
      if($id == 0)
      {
        $data['mode'] = "create";
      }
      else{

        $data['mode'] = "edit";
        $task_type = Task_Type::find($id);
        if(!empty($task_type))
           $data['title'] = $task_type->title;
      }
      $data['result'] = "success";
      return json_encode($data);
    }
    public function save_task_type(Request $request)
    {
      $id = $request->task_type_id;
      $name = $request->task_type_name;
      $data['title'] = $name;
      if($id == 0)
      {
        $task_type = Task_Type::where('title', $name)->first();
        if(!empty($task_type))
          $data['result'] = "error_exist";
        else{
          $task_type = new Task_Type();
          $task_type->title = $name;
          $task_type->save();
          $data['result'] = "success";
        }
      }
      else{
        $task_type = Task_Type::find($id);
        if(!empty($task_type))
        {
          $task_type->title = $name;
          $task_type->update();
        }
        $data['result'] = "success";
      }

      return json_encode($data);
    }
    public function task_type_del(Request $request) {
      $id = $request->task_type_id;

      if(Task_Type::find($id)) {
        Task_Type::find($id)->delete();
        echo 'success';
      }
    }

    /**currency */
    public function detail_currency(Request $request)
    {
      $id = $request->currency_id;
      $data = array();
      if($id == 0)
      {
        $data['mode'] = "create";
      }
      else{

        $data['mode'] = "edit";
        $currency = Currency::find($id);
        if(!empty($currency))
           $data['title'] = $currency->title;
      }
      $data['result'] = "success";
      return json_encode($data);
    }
    public function save_currency(Request $request)
    {
      $id = $request->currency_id;
      $name = $request->currency_name;
      $data['title'] = $name;
      if($id == 0)
      {
        $currency = Currency::where('title', $name)->first();
        if(!empty($currency))
          $data['result'] = "error_exist";
        else{
          $currency = new currency();
          $currency->title = $name;
          $currency->default_currency = 0;
          $currency->save();
          $data['result'] = "success";
        }
      }
      else{
        $currency = Currency::find($id);
        if(!empty($currency))
        {
          $currency->title = $name;
          $currency->update();
        }
        $data['result'] = "success";
      }

      return json_encode($data);
    }
    public function currency_del(Request $request) {
      $id = $request->currency_id;

      if(Currency::find($id)) {
        Currency::find($id)->delete();
        echo 'success';
      }
    }


    /**customer */
    public function detail_customer(Request $request)
    {
      $id = $request->customer_id;
      $data = array();
      if($id == 0)
      {
        $data['mode'] = "create";
      }
      else{

        $data['mode'] = "edit";
        $customer = Customer::find($id);
        if(!empty($customer))
           $data['title'] = $customer->title;
      }
      $data['result'] = "success";
      return json_encode($data);
    }
    public function save_customer(Request $request)
    {
      $id = $request->customer_id;
      $name = $request->customer_name;
      $data['title'] = $name;
      if($id == 0)
      {
        $customer = Customer::where('title', $name)->first();
        if(!empty($customer))
          $data['result'] = "error_exist";
        else{
          $customer = new customer();
          $customer->title = $name;
          $customer->save();
          $data['result'] = "success";
        }
      }
      else{
        $customer = Customer::find($id);
        if(!empty($customer))
        {
          $customer->title = $name;
          $customer->update();
        }
        $data['result'] = "success";
      }

      return json_encode($data);
    }
    public function customer_del(Request $request) {
      $id = $request->customer_id;

      if(Customer::find($id)) {
        Customer::find($id)->delete();
        echo 'success';
      }
    }

    /**language */
    public function detail_language(Request $request)
    {
      $id = $request->language_id;
      $data = array();
      if($id == 0)
      {
        $data['mode'] = "create";
      }
      else{

        $data['mode'] = "edit";
        $language = Language::find($id);
        if(!empty($language))
        {
           $data['title'] = $language->title;
           $data['name'] = $language->name;
        }
      }
      $data['result'] = "success";
      return json_encode($data);
    }
    public function save_language(Request $request)
    {
      $id = $request->language_id;
      $name = $request->language_name;
      $title = $request->language_title;

      $data['name'] = $name;
      $data['title'] = $title;

      if($id == 0)
      {
        $language = Language::where('name', $name)->orWhere('title', $title)->first();
        if(!empty($language))
          $data['result'] = "error_exist";
        else{
          $language = new language();
          $language->name = $name;
          $language->title = $title;

          $language->save();
          $data['result'] = "success";
        }
      }
      else{
        $language = Language::find($id);
        if(!empty($language))
        {
          $language->title = $title;
          $language->name = $name;

          $language->update();
        }
        $data['result'] = "success";
      }

      return json_encode($data);
    }
    public function language_del(Request $request) {
      $id = $request->language_id;

      if(Language::find($id)) {
        Language::find($id)->delete();
        echo 'success';
      }
    }

    /**category */
    public function detail_category(Request $request)
    {
      $category_parents = [1, 2, 3, 4, 5];
      $id = $request->category_id;
      $data = array();
      $data['category_parents'] = $category_parents;

      if($id == 0)
      {
        $data['mode'] = "create";
      }
      else{

        $data['mode'] = "edit";
        $category = Category::find($id);
        if(!empty($category))
        {
           $data['title'] = $category->title;
           $data['category_parent'] = $category->parent_id;

        }
      }
      $data['result'] = "success";
      return json_encode($data);
    }
    public function save_category(Request $request)
    {
      $id = $request->category_id;
      $name = $request->category_name;
      $data['title'] = $name;
      $parent = $request->category_parent;
      $data['parent_id'] = $parent;
      if($id == 0)
      {
        $category = Category::where('title', $name)->first();
        if(!empty($category))
          $data['result'] = "error_exist";
        else{
          $category = new category();
          $category->title = $name;
          $category->parent_id = $parent;
          $category->save();
          $data['result'] = "success";
        }
      }
      else{
        $category = Category::find($id);
        if(!empty($category))
        {
          $category->title = $name;
          $category->parent_id = $parent;
          $category->update();
        }
        $data['result'] = "success";
      }

      return json_encode($data);
    }
    public function category_del(Request $request) {
      $id = $request->category_id;

      if(Category::find($id)) {
        Category::find($id)->delete();
        echo 'success';
      }
    }

    /**category */
    public function detail_category_tag(Request $request)
    {
      $category_tag_parents = [1, 2, 3, 4, 5];
      $id = $request->category_tag_id;
      $data = array();
      $data['category_tag_parents'] = $category_tag_parents;

      if($id == 0)
      {
        $data['mode'] = "create";
      }
      else{

        $data['mode'] = "edit";
        $category_tag = CategoryTag::find($id);
        if(!empty($category_tag))
        {
           $data['title'] = $category_tag->title;
           $data['name'] = $category_tag->value;

           $data['category_tag_parent'] = $category_tag->parent_id;

        }
      }
      $data['result'] = "success";
      return json_encode($data);
    }
    public function save_category_tag(Request $request)
    {
      $id = $request->category_tag_id;
      $title = $request->category_tag_title;
      $name = $request->category_tag_name;
      $data['title'] = $title;
      $data['name'] = $name;

      $parent = $request->category_tag_parent;
      $data['parent_id'] = $parent;
      if($id == 0)
      {
        $category_tag = CategoryTag::where('title', $title)->orWhere('value', $name)->first();
        if(!empty($category_tag))
          $data['result'] = "error_exist";
        else{
          $category_tag = new CategoryTag();
          $category_tag->value = $name;
          $category_tag->title = $title;

          $category_tag->parent_id = $parent;
          $category_tag->save();
          $data['result'] = "success";
        }
      }
      else{
        $category_tag = CategoryTag::find($id);
        if(!empty($category_tag))
        {
          $category_tag->value = $name;
          $category_tag->title = $title;

          $category_tag->parent_id = $parent;
          $category_tag->update();
        }
        $data['result'] = "success";
      }

      return json_encode($data);
    }
    public function category_tag_del(Request $request) {
      $id = $request->category_tag_id;

      if(CategoryTag::find($id)) {
        CategoryTag::find($id)->delete();
        echo 'success';
      }
    }

    /**city */
    public function detail_city(Request $request)
    {
      $region_name = Region::all();
      $country_name = Country::all();

      $id = $request->city_id;
      $data = array();
      $data['region_names'] = $region_name;
      $data['country_names'] = $country_name;


      if($id == 0)
      {
        $data['mode'] = "create";
      }
      else{

        $data['mode'] = "edit";
        $city = City::find($id);
        if(!empty($city))
        {
           $data['title'] = $city->title;

           $data['region_id'] = $city->region_id;
           $data['country_id'] = $city->country_id;


        }
      }
      $data['result'] = "success";
      return json_encode($data);
    }
    public function save_city(Request $request)
    {
      $id = $request->city_id;
      $title = $request->city_title;
      $data['title'] = $title;

      $region_id = $request->region_id;
      $country_id = $request->country_id;

      if($id == 0)
      {
        $city = City::where('title', $title)->first();
        if(!empty($city))
          $data['result'] = "error_exist";
        else{
          $city = new City();
          $city->title = $title;

          $city->region_id = $region_id;
          $city->country_id = $country_id;

          $city->save();
          $data['result'] = "success";
        }
      }
      else{
        $city = City::find($id);
        if(!empty($city))
        {
          $city->title = $title;

          $city->region_id = $region_id;
          $city->country_id = $country_id;

          $city->update();
        }
        $data['result'] = "success";
      }

      return json_encode($data);
    }
    public function city_del(Request $request) {
      $id = $request->city_id;

      if(City::find($id)) {
        City::find($id)->delete();
        echo 'success';
      }
    }

    /**country */
    public function detail_country(Request $request)
    {
      $region_name = Region::all();

      $id = $request->country_id;
      $data = array();
      $data['region_names'] = $region_name;

      if($id == 0)
      {
        $data['mode'] = "create";
      }
      else{

        $data['mode'] = "edit";
        $country = country::find($id);
        if(!empty($country))
        {
           $data['title'] = $country->title;

           $data['region_id'] = $country->region_id;
           $data['code_title'] = $country->code;
           $data['phonecode_title'] = $country->phonecode;

        }
      }
      $data['result'] = "success";
      return json_encode($data);
    }
    public function save_country(Request $request)
    {
      $id = $request->country_id;
      $title = $request->country_title;
      $code = $request->code_title;
      $phonecode = $request->phonecode_title;

      $data['title'] = $title;
      $data['code_title'] = $code;
      $data['phonecode_title'] = $phonecode;

      $region_id = $request->region_id;

      if($id == 0)
      {
        $country = country::where('title', $title)->orWhere('code', $code)->orWhere('phonecode', $phonecode)->first();
        if(!empty($country))
          $data['result'] = "error_exist";
        else{
          $country = new country();
          $country->title = $title;

          $country->region_id = $region_id;
          $country->code = $code;
          $country->phonecode = $phonecode;

          $country->save();
          $data['result'] = "success";
        }
      }
      else{
        $country = country::find($id);
        if(!empty($country))
        {
          $country->title = $title;

          $country->region_id = $region_id;
          $country->code = $code;
          $country->phonecode = $phonecode;
          $country->update();
        }
        $data['result'] = "success";
      }

      return json_encode($data);
    }
    public function country_del(Request $request) {
      $id = $request->country_id;

      if(country::find($id)) {
        country::find($id)->delete();
        echo 'success';
      }
    }
    public function save_default_settings(Request $request){
      $data = array();
      $language_id = $request->current_language;
      $currency_id = $request->current_currency;
      Language::where('default_language', '=', 1)->update(['default_language' => 0]);
      Currency::where('default_currency', '=', 1)->update(['default_currency' => 0]);
      $language = Language::find($language_id);
      $currency = Currency::find($currency_id);
      if(empty($language) || empty($currency))
        $data['result'] = "error";
      else {
        $language->default_language = 1;
        $language->update();
        $currency->default_currency = 1;
        $currency->update();
        $data['result'] = "success";
      }
      return json_encode($data);
    }
}
