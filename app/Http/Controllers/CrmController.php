<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\AccountType;
use App\Models\Enquiry;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Validator;

class CrmController extends Controller
{
    public function index(){
        $pageConfigs = ['pageHeader' => true];
        $breadcrumbs = [
            ["link" => "/", "name" => "Home"],["name" => "CRM"]
        ];

        $accounts = Account::orderBy('created_at', 'desc')->get();;

        return view('pages.crm',compact('pageConfigs','breadcrumbs','accounts'));
    }

    public function customer_create(){
        return view('pages.customer_create');
    }

    public function edit_customer(Request $request){
        $customer = Account::where('id', $request->account_id)->first();
        return view('pages.customer_edit',compact('customer'));
    }

    public function account_create(){
        return view('pages.account_create');
    }

    public function edit_account(Request $request){
        $account = Account::where('id', $request->account_id)->first();
        return view('pages.account_edit',compact('account'));
    }

    public function add_account(Request $request){
        $msg_result = "";
        if($request->account_type == 1)
        {
            $account = new Account;
            $account->first_name = $request->first_name;
            $account->last_name = $request->last_name;
            $account->account_type = $request->account_type;

            $account->main_region_state = $request->main_region_state;
            $account->main_postal_code = $request->main_postal_code;
            $account->main_country = $request->main_country;
            $account->main_city = $request->main_city;
            $account->main_street_address = $request->main_street_address;
            $account->main_street_number = $request->main_street_number;
            $account->main_email = $request->main_email;
            $account->main_office_phone = $request->main_office_phone;

            $account->status = 0;
            $account->user_id = 0;
            $account->save();
            $msg_result = "customer add success";
        }
        else if($request->account_type == 2){
            $account = new Account;
            $account->first_name = $request->first_name;
            $account->last_name = $request->last_name;
            $account->account_type = $request->account_type;

            $account->main_region_state = $request->main_region_state;
            $account->main_postal_code = $request->main_postal_code;
            $account->main_country = $request->main_country;
            $account->main_city = $request->main_city;
            $account->main_street_address = $request->main_street_address;
            $account->main_street_number = $request->main_street_number;
            $account->main_email = $request->main_email;
            $account->main_office_phone = $request->main_office_phone;

            $account->status = 0;

            $account->billing_postal_code = $request->billing_postal_code;
            $account->billing_state_region = $request->billing_region_state;
            $account->billing_country = $request->billing_country;
            $account->billing_city = $request->billing_city;
            $account->billing_street_number = $request->billing_street_number;
            $account->billing_street_address = $request->billing_street_address;
            $account->billing_email = $request->billing_email;
            $account->billing_office_phone = $request->billing_office_phone;

            $account->billing_company_name = $request->company_name;
            $account->billing_status = 0;

            $account->user_id = 0;
            $account->save();
            $msg_result = "customer add success";
        }
        else if($request->account_type == 3){

            $account = new Account;
            $account->first_name = $request->first_name;
            $account->last_name = $request->last_name;
            $account->account_type = $request->account_type;
            $account->avatar_path = $request->avatar_path;

            $account->main_region_state = $request->main_region_state;
            $account->main_postal_code = $request->main_postal_code;
            $account->main_country = $request->main_country;
            $account->main_city = $request->main_city;
            $account->main_street_address = $request->main_street_address;
            $account->main_street_number = $request->main_street_number;
            $account->main_email = $request->main_email;
            $account->main_office_phone = $request->main_office_phone;

            $account->status = 0;

            $account->billing_postal_code = $request->billing_postal_code;
            $account->billing_state_region = $request->billing_region_state;
            $account->billing_country = $request->billing_country;
            $account->billing_city = $request->billing_city;
            $account->billing_street_number = $request->billing_street_number;
            $account->billing_street_address = $request->billing_street_address;
            $account->billing_email = $request->billing_email;
            $account->billing_office_phone = $request->billing_office_phone;

            $account->billing_company_name = $request->company_name;
            $account->billing_status = 0;

            $account->category = $request->category;
            
            $user = User::create([
                'name' => $request->username,
                'email' => $request->main_email,
                'password' => Hash::make($request->password),
                'role' => 0,
                'permission' => 0
            ]);
            $account->user_id = $user->id;
            $account->save();
            $msg_result = "account add success";
        }
        else if($request->account_type == 4)
        {
            $account = new Account;
            $account->first_name = $request->first_name;
            $account->last_name = $request->last_name;
            $account->account_type = $request->account_type;
            $account->avatar_path = $request->avatar_path;

            $account->main_region_state = $request->main_region_state;
            $account->main_postal_code = $request->main_postal_code;
            $account->main_country = $request->main_country;
            $account->main_city = $request->main_city;
            $account->main_street_address = $request->main_street_address;
            $account->main_street_number = $request->main_street_number;
            $account->main_email = $request->main_email;
            $account->main_office_phone = $request->main_office_phone;
            
            $account->status = 0;

            $user = User::create([
                'name' => $request->username,
                'email' => $request->main_email,
                'password' => Hash::make($request->password),
                'role' => 0,
                'permission' => 0
            ]);
            $account->user_id = $user->id;
            $account->save();
            $msg_result = "account add success";
        }
        return redirect()->route('crm_index')->with('msg', $msg_result);
    }

    public function add_account_enquiry(Request $request){
        $msg_result = "";
        if($request->account_type == 1)
        {
            $account = new Account;
            $account->first_name = $request->first_name;
            $account->last_name = $request->last_name;
            $account->account_type = $request->account_type;

            $account->main_region_state = $request->main_region_state;
            $account->main_postal_code = $request->main_postal_code;
            $account->main_country = $request->main_country;
            $account->main_city = $request->main_city;
            $account->main_street_address = $request->main_street_address;
            $account->main_street_number = $request->main_street_number;
            $account->main_email = $request->main_email;
            $account->main_office_phone = $request->main_office_phone;

            $account->status = 0;
            $account->user_id = 0;

            $account->save();
            $msg_result = "customer add success";
            $data['result']="success";
        }
        else if($request->account_type == 2){
            $account = new Account;
            $account->first_name = $request->first_name;
            $account->last_name = $request->last_name;
            $account->account_type = $request->account_type;

            $account->main_region_state = $request->main_region_state;
            $account->main_postal_code = $request->main_postal_code;
            $account->main_country = $request->main_country;
            $account->main_city = $request->main_city;
            $account->main_street_address = $request->main_street_address;
            $account->main_street_number = $request->main_street_number;
            $account->main_email = $request->main_email;
            $account->main_office_phone = $request->main_office_phone;
            
            $account->status = 0;
            
            $account->billing_postal_code = $request->billing_postal_code;
            $account->billing_state_region = $request->billing_region_state;
            $account->billing_country = $request->billing_country;
            $account->billing_city = $request->billing_city;
            $account->billing_street_number = $request->billing_street_number;
            $account->billing_street_address = $request->billing_street_address;
            $account->billing_email = $request->billing_email;
            $account->billing_office_phone = $request->billing_office_phone;

            $account->billing_company_name = $request->company_name;
            $account->billing_status = 0;

            $account->user_id = 0;
            $account->save();
            $msg_result = "customer add success";
            $data['result']="success";
        }
        else if($request->account_type == 3){

            $account = new Account;
            $account->first_name = $request->first_name;
            $account->last_name = $request->last_name;
            $account->account_type = $request->account_type;
            $account->avatar_path = $request->avatar_path;

            $account->main_region_state = $request->main_region_state;
            $account->main_postal_code = $request->main_postal_code;
            $account->main_country = $request->main_country;
            $account->main_city = $request->main_city;
            $account->main_street_address = $request->main_street_address;
            $account->main_street_number = $request->main_street_number;
            $account->main_email = $request->main_email;
            $account->main_office_phone = $request->main_office_phone;

            $account->status = 0;

            $account->billing_postal_code = $request->billing_postal_code;
            $account->billing_state_region = $request->billing_region_state;
            $account->billing_country = $request->billing_country;
            $account->billing_city = $request->billing_city;
            $account->billing_street_number = $request->billing_street_number;
            $account->billing_street_address = $request->billing_street_address;
            $account->billing_email = $request->billing_email;
            $account->billing_office_phone = $request->billing_office_phone;

            $account->billing_company_name = $request->company_name;
            $account->billing_status = 0;

            $account->category = $request->category;
            
            $user = User::create([
                'name' => $request->username,
                'email' => $request->main_email,
                'password' => Hash::make($request->password),
                'role' => 0,
                'permission' => 0
            ]);
            $account->user_id = $user->id;
            $account->save();
            $msg_result = "account add success";
            $data['result']="success";
        }
        else if($request->account_type == 4)
        {
            $account = new Account;
            $account->first_name = $request->first_name;
            $account->last_name = $request->last_name;
            $account->account_type = $request->account_type;
            $account->avatar_path = $request->avatar_path;

            $account->main_region_state = $request->main_region_state;
            $account->main_postal_code = $request->main_postal_code;
            $account->main_country = $request->main_country;
            $account->main_city = $request->main_city;
            $account->main_street_address = $request->main_street_address;
            $account->main_street_number = $request->main_street_number;
            $account->main_email = $request->main_email;
            $account->main_office_phone = $request->main_office_phone;
            
            $account->status = 0;

            $user = User::create([
                'name' => $request->username,
                'email' => $request->main_email,
                'password' => Hash::make($request->password),
                'role' => 0,
                'permission' => 0
            ]);
            $account->user_id = $user->id;
            $account->save();
            $msg_result = "account add success";
            $data['result']="success";
        }
        return json_encode($data);
    }

    public function update_account(Request $request){
        $account = Account::where('id', $request->account_id)->first();
        $msg_result = '';
        if($request->account_type == 1){
            $account->first_name = $request->first_name;
            $account->last_name = $request->last_name;
            $account->account_type = $request->account_type;

            $account->main_region_state = $request->main_region_state;
            $account->main_postal_code = $request->main_postal_code;
            $account->main_country = $request->main_country;
            $account->main_city = $request->main_city;
            $account->main_street_address = $request->main_street_address;
            $account->main_street_number = $request->main_street_number;
            $account->main_email = $request->main_email;
            $account->main_office_phone = $request->main_office_phone;
            
            $account->status = 0;
            $account->user_id = 0;
            $account->save();
            $msg_result = "customer update success";
        }
        else if($request->account_type == 2){
            $account->first_name = $request->first_name;
            $account->last_name = $request->last_name;
            $account->account_type = $request->account_type;

            $account->main_region_state = $request->main_region_state;
            $account->main_postal_code = $request->main_postal_code;
            $account->main_country = $request->main_country;
            $account->main_city = $request->main_city;
            $account->main_street_address = $request->main_street_address;
            $account->main_street_number = $request->main_street_number;
            $account->main_email = $request->main_email;
            $account->main_office_phone = $request->main_office_phone;

            $account->status = 0;

            $account->billing_postal_code = $request->billing_postal_code;
            $account->billing_state_region = $request->billing_region_state;
            $account->billing_country = $request->billing_country;
            $account->billing_city = $request->billing_city;
            $account->billing_street_number = $request->billing_street_number;
            $account->billing_street_address = $request->billing_street_address;
            $account->billing_email = $request->billing_email;
            $account->billing_office_phone = $request->billing_office_phone;

            $account->billing_company_name = $request->company_name;
            $account->billing_status = 0;

            $account->user_id = 0;
            $account->save();
            $msg_result = "customer update success";
        }
        else if($request->account_type == 3){

            $account->first_name = $request->first_name;
            $account->last_name = $request->last_name;
            $account->account_type = $request->account_type;
            if($request->avatar_path != "") {
                $account->avatar_path = $request->avatar_path;
            }
            
            $account->main_region_state = $request->main_region_state;
            $account->main_postal_code = $request->main_postal_code;
            $account->main_country = $request->main_country;
            $account->main_city = $request->main_city;
            $account->main_street_address = $request->main_street_address;
            $account->main_street_number = $request->main_street_number;
            $account->main_email = $request->main_email;
            $account->main_office_phone = $request->main_office_phone;

            $account->status = 0;

            $account->billing_postal_code = $request->billing_postal_code;
            $account->billing_state_region = $request->billing_region_state;
            $account->billing_country = $request->billing_country;
            $account->billing_city = $request->billing_city;
            $account->billing_street_number = $request->billing_street_number;
            $account->billing_street_address = $request->billing_street_address;
            $account->billing_email = $request->billing_email;
            $account->billing_office_phone = $request->billing_office_phone;

            $account->billing_company_name = $request->company_name;
            $account->billing_status = 0;

            $account->category = $request->category;

            $user = User::where('id', $account->user_id)->first();
            $user->name = $request->username;
            $user->email = $request->main_email;
            $account->save();
            $user->save();
            $msg_result = "account update success";
        }
        else if($request->account_type == 4)
        {
            $account->first_name = $request->first_name;
            $account->last_name = $request->last_name;
            $account->account_type = $request->account_type;
            if($request->avatar_path != "") {
                $account->avatar_path = $request->avatar_path;
            }

            $account->main_region_state = $request->main_region_state;
            $account->main_postal_code = $request->main_postal_code;
            $account->main_country = $request->main_country;
            $account->main_city = $request->main_city;
            $account->main_street_address = $request->main_street_address;
            $account->main_street_number = $request->main_street_number;
            $account->main_email = $request->main_email;
            $account->main_office_phone = $request->main_office_phone;
            
            $account->status = 0;

            $user = User::where('id', $account->user_id)->first();
            $user->name = $request->username;
            $user->email = $request->main_email;
            $account->save();
            $user->save();
            $msg_result = "account update success";
        }
        return redirect()->route('crm_index')->with('msg', $msg_result);
    }


    public function saveAvatarUpload(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'profile_picture' => 'required|image|max:1000',
        ]);

        if ($validator->fails()) {

            return $validator->errors();
        }

        $status = "";
        $data = array(
            'flag' => '',
            'file_path' => ''
        );

        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            // Rename image
            $filename = time().'.'.$image->guessExtension();
            $destinationPath = public_path('assets/avatar');

            // $path = $request->file('profile_picture')->storeAs(
            //      'profile_pictures', $filename
            // );

            $upload_success = $image->move($destinationPath, $filename);
            $avatar_path = 'assets/avatar/'.$filename;

            $data = array(
                'flag' => 'uploaded',
                'file_path' => $avatar_path
            );

        }

        echo json_encode($data);

    }

    public function update_password(Request $request){
        $user = User::where('id', $request->user_id_pwd)->first();
        $user->password = Hash::make($request->change_password);
        $user->save();
        return redirect()->route('crm_index')->with('msg', 'change password success');
    }

    public function del_account(Request $request)
    {
        $account = Account::where('id', $request->account_id)->first();
        if($account->user_id)
        {
            $user = User::where('id', $account->user_id)->first();
            $user->delete();
        }
        $account->delete();
        $success = "Success!";
        return $success;
    }

    public function user_profile(){
        return view('pages.user_profile');
    }

    public function update_profile(Request $request){

        $account = Auth::user()->get_account_info;
        $msg_result = "";
        if($request->account_type == 3){
            $account->first_name = $request->first_name;
            $account->last_name = $request->last_name;
            $account->account_type = $request->account_type;
            $account->avatar_path = $request->avatar_path;

            $account->main_region_state = $request->main_region_state;
            $account->main_postal_code = $request->main_postal_code;
            $account->main_country = $request->main_country;
            $account->main_city = $request->main_city;
            $account->main_street_address = $request->main_street_address;
            $account->main_street_number = $request->main_street_number;
            $account->main_email = $request->main_email;
            $account->main_office_phone = $request->main_office_phone;

            $account->status = 0;

            $account->billing_postal_code = $request->billing_postal_code;
            $account->billing_state_region = $request->billing_region_state;
            $account->billing_country = $request->billing_country;
            $account->billing_city = $request->billing_city;
            $account->billing_street_number = $request->billing_street_number;
            $account->billing_street_address = $request->billing_street_address;
            $account->billing_email = $request->billing_email;
            $account->billing_office_phone = $request->billing_office_phone;
            
            $account->billing_company_name = $request->company_name;
            $account->billing_status = 0;

            $account->category = $request->category;
            
            $user = User::where('id', $account->user_id)->first();
            $user->name = $request->username;
            $user->email = $request->main_email;
            $account->save();
            $user->save();
            $msg_result = "profile update success";
        }
        else if($request->account_type == 4)
        {
            $account->first_name = $request->first_name;
            $account->last_name = $request->last_name;
            $account->account_type = $request->account_type;
            $account->avatar_path = $request->avatar_path;

            $account->main_region_state = $request->main_region_state;
            $account->main_postal_code = $request->main_postal_code;
            $account->main_country = $request->main_country;
            $account->main_city = $request->main_city;
            $account->main_street_address = $request->main_street_address;
            $account->main_street_number = $request->main_street_number;
            $account->main_email = $request->main_email;
            $account->main_office_phone = $request->main_office_phone;
            
            $account->status = 0;

            $user = User::where('id', $account->user_id)->first();
            $user->name = $request->username;
            $user->email = $request->main_email;
            $account->save();
            $user->save();
            $msg_result = "profile update success";
        }

        else if($request->account_type == 5)
        {
            $account->first_name = $request->first_name;
            $account->last_name = $request->last_name;
            $account->account_type = $request->account_type;
            $account->avatar_path = $request->avatar_path;

            $account->main_region_state = $request->main_region_state;
            $account->main_postal_code = $request->main_postal_code;
            $account->main_country = $request->main_country;
            $account->main_city = $request->main_city;
            $account->main_street_address = $request->main_street_address;
            $account->main_street_number = $request->main_street_number;
            $account->main_email = $request->main_email;
            $account->main_office_phone = $request->main_office_phone;

            $account->status = 0;

            $user = User::where('id', $account->user_id)->first();
            $user->name = $request->username;
            $user->email = $request->main_email;
            $account->save();
            $user->save();
            $msg_result = "profile update success";
        }

        return back()->with('msg', $msg_result);
    }

    public function update_user_pwd(Request $request){
        $user = Auth::user();
        $user->password = Hash::make($request->new_user_pwd);
        $user->save();
        return back()->with('msg', 'change user password success');
    }
}

