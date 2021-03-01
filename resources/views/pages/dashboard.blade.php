@extends('layouts.contentLayoutMaster')

{{-- title --}}
@section('title','Dashboard')
{{-- venodr style --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/charts/apexcharts.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/datatables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/responsive.bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/pickadate/pickadate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/daterange/daterangepicker.css')}}">
@endsection
@section('custom-horizontal-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/core/menu/menu-types/horizontal-menu.css')}}">
@endsection

{{-- page style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-invoice.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-analytics.css')}}">

<style>
@media (min-width: 992px){
  .modal-lg, .modal-xl {
      max-width: 1410px;
  }
}
.mr-2, .mx-2 {
    margin-right: 0.5rem !important;
}
label{
  font-size: 0.86rem;
}
</style>
@endsection

@section('content')
<!-- Dashboard Analytics Start -->
<!-- modal section -->

<input type="hidden" name="task_id" id="task_id">
<input type="hidden" name="task_type" id="task_type">
<div class="modal fade text-left" id="task_detail_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
    aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel17">Task Details</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="bx bx-x"></i>
        </button>
      </div>
      <div class="modal-body">
          <div class="card widget-state-multi-radial">
            <div class="card-header d-sm-flex justify-content-between">
              <ul class="nav nav-tabs mt-sm-0 mt-50 mb-0" class="task_type_ul" id="task_type_ul" role="tablist">
              </ul>
            </div>
            <div class="card-content">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 d-flex flex-column justify-content-around">
                    <div class="tab-content">
                      <div class="row mb-1">
                        <div class="col-md-2">
                          <label>Task Name</label>
                        </div>
                        <div class="col-md-10 form-group" style = "padding-left: 70px;">
                          <input type="text" id="task_name" name="task_name" class="form-control" placeholder="Task Name" required>
                        </div>
                      </div>
                      <div class="row mb-1">
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-4">
                              <label>Start Date & Time</label>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group position-relative has-icon-left w-75 ml-auto">
                                <input type="text" class="form-control single-daterange" id="from_date" name="from_date">
                                <div class="form-control-position">
                                  <i class='bx bx-calendar'></i>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <fieldset class="form-group position-relative has-icon-left">
                                  <input type="text" class="form-control pickatime" placeholder="Start Time" id="start_time" name="start_time" required>
                                  <div class="form-control-position">
                                      <i class='bx bx-history'></i>
                                  </div>
                              </fieldset>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-4">
                              <label>End Date & Time</label>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group position-relative has-icon-left w-75 ml-auto">
                                <input type="text" class="form-control single-daterange" id="end_date" name="end_date">
                                <div class="form-control-position">
                                  <i class='bx bx-calendar'></i>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <fieldset class="form-group position-relative has-icon-left">
                                  <input type="text" class="form-control pickatime" placeholder="End Time" id="end_time" name="end_time" required>
                                  <div class="form-control-position">
                                      <i class='bx bx-history'></i>
                                  </div>
                              </fieldset>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-1">
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <label>Priority</label>
                            </div>
                            <div class="col-md-7">
                              <ul class="list-unstyled mb-0">
                                <li class="d-inline-block mr-2 mb-1">
                                  <fieldset>
                                    <div class="radio radio-primary radio-glow">
                                        <input type="radio" id="radioPriority1" name="radioPriority" checked value="1">
                                        <label for="radioPriority1" >HIGH</label>
                                    </div>
                                  </fieldset>
                                </li>
                                <li class="d-inline-block mr-2 mb-1">
                                  <fieldset>
                                    <div class="radio radio-secondary radio-glow">
                                        <input type="radio" id="radioPriority2" name="radioPriority" value="2">
                                        <label for="radioPriority2">MEDIUM</label>
                                    </div>
                                  </fieldset>
                                </li>
                                <li class="d-inline-block mr-2 mb-1">
                                  <fieldset>
                                      <div class="radio radio-success radio-glow">
                                          <input type="radio" id="radioPriority3" name="radioPriority" value="3">
                                          <label for="radioPriority3">LOW</label>
                                      </div>
                                  </fieldset>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <label>Status</label>
                            </div>
                            <div class="col-md-7">
                              <ul class="list-unstyled mb-0">
                                <li class="d-inline-block mr-2 mb-1">
                                  <fieldset>
                                    <div class="radio radio-primary radio-glow">
                                        <input type="radio" id="radioStatus1" name="radioStatus" checked value="1">
                                        <label for="radioStatus1">Open</label>
                                    </div>
                                  </fieldset>
                                </li>
                                <li class="d-inline-block mr-2 mb-1">
                                  <fieldset>
                                    <div class="radio radio-secondary radio-glow">
                                        <input type="radio" id="radioStatus2" name="radioStatus" value="2">
                                        <label for="radioStatus2">Close</label>
                                    </div>
                                  </fieldset>
                                </li>
                                <li class="d-inline-block mr-2 mb-1">
                                  <fieldset>
                                      <div class="radio radio-success radio-glow">
                                          <input type="radio" id="radioStatus3" name="radioStatus" value="3">
                                          <label for="radioStatus3">On Hold</label>
                                      </div>
                                  </fieldset>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-1">
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <label>Assign By</label>
                            </div>
                            <div class="col-md-7">
                              <div class="form-group">
                                  <div class="controls">
                                    <input type="text" disabled id="assign_by" name="assign_by" class="form-control">

                                  </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <label>Assign To</label>
                            </div>
                            <div class="col-md-7">
                              <select class="select2 form-control" id="assign_to" name="assign_to" required data-validation-required-message="This title field is required">

                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-1">
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <label>Linked To</label>
                            </div>
                            <div class="col-md-4">
                              <input type="text" readonly id="service_name" name="service_name" class="form-control" value="Quotation">
                            </div>
                            <div class="col-md-3">
                              <input type="text" readonly id="itinerary_ref_num" name="itinerary_ref_num" class="form-control">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-1">
                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-md-2">
                              <label>Description</label>
                            </div>
                            <div class="col-md-10" style = "padding-left: 65px;">
                              <textarea class="form-control" rows="6" placeholder="Please type note about enquiry." id="note" name="note" required>

                              </textarea>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                  <div class="col-md-12 text-center">
                    <fieldset class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">Add Documents</label>
                        </div>
                    </fieldset>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" onClick="save_task()" class="btn btn-primary ml-1">
          <i class="bx bx-check d-block d-sm-none"></i>
          <span class="d-none d-sm-block">Save</span>
        </button>
        <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
          <i class="bx bx-x d-block d-sm-none"></i>
          <span class="d-none d-sm-block">Close</span>
        </button>

      </div>
    </div>
  </div>
</div>


<section id="dashboard-analytics">
  <div class="row">
    <!-- Greetings Content Starts -->
    <div class="col-xl-3 col-12 dashboard-users">
      <div class="row  ">
        <!-- Statistics Cards Starts -->
        <div class="col-12">
          <div class="row">
            <div class="col-sm-6 col-12 dashboard-users-success">
              <div class="card text-center" onclick="window.location.href='/create_enquiry'">
                <div class="card-content">
                  <div class="card-body py-1">
                    <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50" style="margin-top: 16px;">
                      <!-- <i class="bx bx-briefcase-alt font-medium-5"></i> -->
                      <i class="bx bx-help-circle font-medium-5"></i>
                    </div>
                    <div class="text-muted line-ellipsis" style="margin-bottom: 15px;"><h7>Create Enquiry</h7></div>
                    <!-- <h3 class="mb-0">{{count($enquiries)}}</h3> -->
                    <!-- <button type="button" class="btn btn-outline-success round" onclick="window.location.href='/create_enquiry'">Create</button> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-12 dashboard-users-danger">
              <div class="card text-center" onclick="window.location.href='/crm'">
                <div class="card-content">
                  <div class="card-body py-1">
                    <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto mb-50" style="margin-top: 16px;">
                      <i class="bx bx-user font-medium-5"></i>
                    </div>
                    <div class="text-muted line-ellipsis" style="margin-bottom: 15px;"><h7>CRM</h7></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-12 dashboard-users-warning">
              <div class="card text-center">
                <div class="card-content">
                  <div class="card-body py-1">
                    <div class="badge-circle badge-circle-lg badge-circle-light-warning mx-auto mb-50" style="margin-top: 16px;">
                      <i class="bx bx-cog font-medium-5"></i>
                    </div>
                    <div class="text-muted line-ellipsis" style="margin-bottom: 15px;"><h7>Setting</h7></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-12 dashboard-users-info">
              <div class="card text-center" onclick="window.location.href='/product'">
                <div class="card-content">
                  <div class="card-body py-1">
                    <div class="badge-circle badge-circle-lg badge-circle-light-info mx-auto mb-50" style="margin-top: 16px;">
                      <i class="bx bxs-gift font-medium-5"></i>
                    </div>
                    <div class="text-muted line-ellipsis" style="margin-bottom: 15px;"><h7>Product</h7></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Revenue Growth Chart Starts -->
      </div>
    </div>
    <div class="col-md-5 col-sm-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="card-title">Website Analytics</h4>
          <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
        </div>
        <div class="card-content">
          <div class="card-body">
            <div id="analytics-bar-chart"></div>
          </div>
        </div>
      </div>

    </div>
    <!-- Multi Radial Chart Starts -->
    <div class="col-xl-4 col-md-6 col-12 dashboard-visit">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="card-title">Visits of 2019</h4>
          <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
        </div>
        <div class="card-content">
          <div class="card-body">
            <div id="multi-radial-chart"></div>
            <ul class="list-inline d-flex justify-content-around mb-0">
              <li> <span class="bullet bullet-xs bullet-primary mr-50"></span>Target</li>
              <li> <span class="bullet bullet-xs bullet-danger mr-50"></span>Mart</li>
              <li> <span class="bullet bullet-xs bullet-warning mr-50"></span>Ebay</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

  </div>


  <div class="row">
    <div class="col-12 col-xl-12">
      <div class="card">
        <div class="card-header" style="border-left: 5px solid #ffdede">
          <h5 class="card-title" style="color: #FF5B5C">Task List</h5>
          <div class="heading-elements">
            <ul class="list-inline">
              <li><span class="badge badge-pill badge-light-danger">
               Tasks for quotation..
              </span></li>
              <li><i class="bx bx-dots-vertical-rounded font-medium-3 align-middle"></i></li>
            </ul>
          </div>
        </div>
        <!-- datatable start -->
        <div class="card-content">
          <div class="card-body">
            <div class="invoice-list-wrapper">
              <div class="action-dropdown-btn d-none">
                <div class="dropdown invoice-filter-action"></div>
              </div>
              <div class="table-responsive">
                <table id="task_table" class="table invoice-data-table dt-responsive nowrap">
                  <thead>
                    <tr>
                      <th></th>
                      <th>REF.NO</th>
                      <th>Product Name</th>
                      <th>Task Name</th>
                      <th>Task Type</th>
                      <th>Customer</th>
                      <th>Assigned By</th>
                      <th>Assigned To</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Priority</th>
                      <th>Status</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                  <tbody>
                  @foreach($task_list as $task)
                  <tr>
                    <td></td>
                    <td>{{$task->reference_number}}</td>

                    <td>{{$task->get_product_title()}}</td>

                    <td>{{$task->task_name}}</td>
                    <td>{{$task->get_task_type()}}</td>
                    <td>{{$task->get_customer()}}</td>
                    <td>{{$task->get_assigned_by()}}</td>
                    <td>{{$task->get_assigned_to()}}</td>
                    <td>{{$task->start_date}}</td>
                    <td>{{$task->end_date}}</td>
                    <td><button class="btn btn-outline-danger">{{$task->get_priority()}}</button></td>
                    <td><button class="btn btn-outline-danger">{{$task->get_status()}}</button></td>

                    <td>
                      <div class="dropdown">
                        <span class="bx bx-slider-alt font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="javascript:void(0)" onClick="task_edit({{$task->id}})"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                          <a class="dropdown-item" href="javascript:void(0)" onClick="task_del({{$task->id}})"><i class="bx bx-trash mr-1"></i> delete</a>
                        </div>
                      </div>
                    </td>

                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- datatable ends -->
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12 col-xl-12">
      <div class="card">
        <div class="card-header" style="border-left: 5px solid #ffdede">
          <h5 class="card-title" style="color: #FF5B5C">Enquiry List</h5>
          <div class="heading-elements">
            <ul class="list-inline">
              <li><span class="badge badge-pill badge-light-danger">
                <?php
                  $count_not_created = 0;
                  for($i = 0; $i < count($enquiries); $i ++)
                    if($enquiries[$i]->is_created_itinerary == 0)
                      $count_not_created ++;
                  echo $count_not_created;
                ?>
                Enquiries
              </span></li>
              <li><i class="bx bx-dots-vertical-rounded font-medium-3 align-middle"></i></li>
            </ul>
          </div>
        </div>
        <!-- datatable start -->
        <div class="card-content">
          <div class="card-body">
            <div class="invoice-list-wrapper">
              <div class="action-dropdown-btn d-none">
                <div class="dropdown invoice-filter-action"></div>
              </div>
              <div class="table-responsive">
                <table id="enquiry_table" class="table invoice-data-table dt-responsive nowrap">
                  <thead>
                    <tr>
                      <th></th>
                      <th></th>
                      <th>Title</th>
                      <th>Ref.No</th>
                      <th>Customer Name</th>
                      <th>Created By</th>
                      <th>Updated By</th>
                      <th>Travelers</th>
                      <th>Budget</th>
                      <th>Duration</th>
                      <th>Rooms</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($enquiries as $enquiry)
                  <tr>
                    <td></td>
                    <td></td>

                    <td class="text-bold-600">{{$enquiry->title}}</td>

                    <td>{{$enquiry->reference_number}}</td>

                    <td>{{$enquiry->get_account->first_name.' '.$enquiry->get_account->last_name}}</td>
                    <td>{{$enquiry->get_created_by->first_name.' '.$enquiry->get_created_by->last_name}}</td>
                    <td>
                      @if(!empty($enquiry->get_updated_by))
                        {{ $enquiry->get_updated_by->first_name.' '.$enquiry->get_updated_by->last_name}}
                      @else
                        ---
                      @endif

                    </td>
                    <td class="text-bold-600"><span>{{$enquiry->travel_number}}</span>
                    </td>
                    <td class="text-bold-600">
                      {{$enquiry->budget}}
                      @if($enquiry->budget_per_total)
                        (per person)
                      @else
                        (total)
                      @endif
                    </td>
                    <td>{{$enquiry->from_date}} - {{$enquiry->to_date}}</td>
                    <td>{{$enquiry->single_count + $enquiry->double_count + $enquiry->twin_count + $enquiry->triple_count + $enquiry->family_count}} rooms</td>
                    <td>
                      <div class="dropdown">
                        <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="../edit_enquiry/{{$enquiry->id}}"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                          <a class="dropdown-item" href="javascript:void(0)" onClick="enquiry_del({{$enquiry->id}})"><i class="bx bx-trash mr-1"></i> delete</a>
                          <a class="dropdown-item" href="../itinerary_add_info/{{$enquiry->id}}/0"><i class="bx bx-building mr-1"></i>Itinerary</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- datatable ends -->
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-12 col-xl-12">
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="itinerary-tab" data-toggle="tab" href="#itinerary-pan" aria-controls="itinerary-pan" role="tab"
            aria-selected="true">
            <i class="bx bx-help-circle align-middle"></i>
            <span class="align-middle">Itinerary</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="booking-tab" data-toggle="tab" href="#booking-pan" aria-controls="booking-pan" role="tab"
            aria-selected="false">
            <i class="bx bxs-data align-middle"></i>
            <span class="align-middle">Booking</span>
          </a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="itinerary-pan" aria-labelledby="itinerary-tab" role="tabpanel">
          <div class="card">
            <div class="card-header" style="border-left: 5px solid #ccf5f8">
              <h5 class="card-title" style="color: #00CFDD">All Itinerary</h5>
            </div>
            <div class="card-content">
              <div class="card-body">
                <div class="invoice-list-wrapper">
                      <div class="action-dropdown-btn d-none"></div>
                      <div class="table-responsive">
                        @if(count($itineraries) == 0)
                          <h5>Nothing found.</h5>
                        @else
                          <table id="itinerary_table" class="table invoice-data-table dt-responsive nowrap">
                            <thead>
                              <tr>
                                <th></th>
                                <th></th>
                                <th>Title</th>
                                <th>Staff Name</th>
                                <th>REF.NO</th>
                                <th>Budget</th>
                                <th>Margin(%)</th>
                                <th>Currency</th>
                                <th>Duration</th>
                                <th>Persons</th>
                                <th>Rooms</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($itineraries as $itinerary)
                              <tr>
                                <td></td>
                                <td>
                                  {{$itinerary->id}}
                                </td>
                                <td class="text-bold-500">
                                  {{$itinerary->title}}
                                </td>
                                <td>
                                  {{$itinerary->get_account->first_name.' '.$itinerary->get_account->last_name}}
                                </td>
                                <td class="text-bold-500">
                                  <span>{{$itinerary->reference_number}}</span>
                                </td>
                                <td class="text-bold-500">
                                  <span>{{$itinerary->budget}}</span>
                                </td>
                                <td class="text-bold-500">
                                  @if($itinerary->margin_price == 0)
                                    ----
                                  @else
                                    {{ $itinerary->margin_price }}(%)
                                  @endif
                                </td>
                                <td class="text-bold-500">
                                  @if($itinerary->currency == '0')
                                    ---
                                  @else
                                    {{$itinerary->currency}}
                                  @endif
                                </td>
                                <td>
                                  {{$itinerary->from_date}} - {{$itinerary->to_date}}
                                </td>
                                <td>
                                  adult({{ $itinerary->adult_number}}people), children({{ $itinerary->children_number}}people)
                                </td>
                                <td>
                                  {{$itinerary->single_count + $itinerary->double_count + $itinerary->twin_count + $itinerary->triple_count + $itinerary->family_count}} rooms
                                </td>
                                <td>
                                  <div class="dropdown">
                                    <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                                    <div class="dropdown-menu dropdown-menu-right">
                                       <a class="dropdown-item" href="{{ route('add_itinerary_info', ['id' => $itinerary->id, 'type' => 1]) }}"><i class="bx bx-edit-alt mr-1"></i> Edit</a>
                                      <a class="dropdown-item" href="javascript:void(0)" onClick="itinerary_del({{$itinerary->id}})"><i class="bx bx-trash mr-1"></i> Delete</a>
                                      <a class="dropdown-item" href="{{ route('send_itinerary', ['itinerary_id' => $itinerary->id]) }}"><i class="bx bxs-right-arrow-square mr-1"></i>Send Itinerary</a>

                                    </div>
                                  </div>
                                </td>
                              </tr>
                            @endforeach
                            </tbody>
                          </table>
                        @endif
                      </div>
                    </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="booking-pan" aria-labelledby="booking-tab" role="tabpanel">
          <div class="card">
            <div class="card-header" style="border-left: 5px solid #ccf5f8">
              <h5 class="card-title" style="color: #00CFDD">All Booking</h5>
            </div>
            <div class="card-content">
              <div class="card-body">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  <!-- Dashboard Analytics end -->
@endsection
{{-- vendor scripts --}}
@section('vendor-scripts')

<script src="{{asset('vendors/js/charts/apexcharts.min.js')}}"></script>
<script src="{{asset('vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/responsive.bootstrap.min.js')}}"></script>
<script src="{{asset('vendors/js/ckeditor/ckeditor.js')}}"></script>

<script src="{{asset('vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset('vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{asset('vendors/js/pickers/pickadate/picker.time.js')}}"></script>
<script src="{{asset('vendors/js/pickers/pickadate/legacy.js')}}"></script>
<script src="{{asset('vendors/js/pickers/daterange/moment.min.js')}}"></script>
<script src="{{asset('vendors/js/pickers/daterange/daterangepicker.js')}}"></script>
<script src="{{asset('vendors/js/ckeditor/ckeditor.js')}}"></script>
@endsection

@section('page-scripts')
<script>
  var base_url = "{{ url('/') }}";
  var msg = <?php if(json_encode(session()->get('msg'))) echo json_encode(session()->get('msg'));  ?>;
</script>
<script src="{{asset('js/scripts/pages/dashboard.js')}}"></script>
<script src="{{asset('js/scripts/pickers/dateTime/pick-a-datetime.js')}}"></script>
@endsection
