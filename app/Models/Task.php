<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Task extends Model
{
    protected $table = 'task';
    protected $primaryKey = 'id';

    protected $fillable = ["id", "itinerary_id", "reference_number", "task_name", "task_type", "customer", "task_des", "assigned_by", "assigned_to", "start_date", "start_time", "end_date", "end_time", "priority", "status", "tags"];

    public function get_itinerary() {
        return $this->hasOne('App\Models\itinerary', 'id', 'itinerary_id');
    }

    public function get_customer() {
      $itinerary = Itinerary::find($this->itinerary_id);
      $account = Account::find($itinerary->account_id);
      $customer = $account->first_name . " " . $account->last_name;
      return  $customer;
    }
    public function get_task_type() {
      $task_type = Task_Type::find($this->task_type);
      return  $task_type->title;
    }
    public function get_assigned_by() {
      $account = Account::find($this->assigned_by);
      $assigned_by = $account->first_name . " " . $account->last_name;
      return  $assigned_by;
    }
    public function get_assigned_to() {
      $account = Account::where('user_id', $this->assigned_to)->first();
      $assigned_to = $account->first_name . " " . $account->last_name;
      return  $assigned_to;
    }
    public function get_priority() {
      return $this->priority;
    }
    public function get_status() {
      return $this->status;
    }
    
    public function get_service() {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
}
