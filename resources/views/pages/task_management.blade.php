@extends('layouts.contentLayoutMaster')

{{-- title --}}
@section('title','Travel Quoting System | Tasks')
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

<link rel="stylesheet" type="text/css" href="{{asset('css/pages/widgets.css')}}">
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
<?php


 ?>
<input type="hidden" name="itinerary_id" id="itinerary_id" value={{$itinerary_id}}>
<input type="hidden" name="product_id" id="product_id">
<input type="hidden" name="task_id" id="task_id">
<input type="hidden" name="task_type" id="task_type">
<!-- modal section -->
<div class="modal fade text-left" id="task_detail_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
    aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel17">Task Details</h4>
        <h4 class="modal-title" id="head_title">Task Details For Product</h4>
        <input type="text" class="form-control text-center" style ="width: 200px;" disabled id = "product_title" name = "product_title"></input>
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

<!-- task list content -->
<section id="basic-tabs-components">
<div class="content-header-left col-12 mb-2 mt-1">
  <div class="row breadcrumbs-top">
    <div class = "col-6">
      <h5 class="content-header-title float-left pr-1 mb-0">@yield('title')</h5>
      <div class="breadcrumb-wrapper col-12">
      <?php
      $name = "TaskList(";
      $name .= $itinerary->reference_number;
      $name .= ")";
      $breadcrumbs1 = [
          ["link" => "/", "name" => "Home"],["name" => $name]
          ];  ?>
        <ol class="breadcrumb p-0 mb-0">
          @isset($breadcrumbs1)
            @foreach ($breadcrumbs1 as $breadcrumb)
            <li class="breadcrumb-item {{ !isset($breadcrumb['link']) ? 'active' :''}}">
              @if(isset($breadcrumb['link']))
            <a href="{{asset($breadcrumb['link'])}}">@if($breadcrumb['name'] == "Home")<i class="bx bx-home-alt"></i>@else{{$breadcrumb['name']}}@endif</a>
              @else{{$breadcrumb['name']}}@endif
            </li>
            @endforeach
          @endisset
        </ol>
      </div>
    </div>
    <div class = "col-6">
      <ul class="nav nav-tabs float-right" role="tablist">
          <li class="nav-item">
            <div class="dropdown">
            <a class="nav-link btn-primary glow white" id="account-tab" onClick="task_detail(0)" href="#">
                  <i class="bx bx-user align-middle"></i>
                  <span class="align-middle">Add</span>
              </a>
            </div>
          </li>
          <li class="nav-item">
              <a class="nav-link btn-primary glow white" id="account-tab" href="{{asset('/')}}">
                  <i class="bx bx-user align-middle"></i>
                  <span class="align-middle">Back</span>
              </a>
          </li>
      </ul>
    </div>
  </div>
</div>
</section>

<!-- Dashboard Analytics Start -->

<section id="dashboard-analytics">
  <div class="row">
    <div class="col-12 col-xl-12">
      <div class="card">
        <div class="card-header" style="border-left: 5px solid #ffdede">
          <h5 class="card-title" style="color: #FF5B5C">Task List</h5>
          <div class="heading-elements">
            <ul class="list-inline">
              <li><span class="badge badge-pill badge-light-danger">
                <?php
                  $count = count($task_list);
                  $count;
                ?>
                Tasks
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
              @if(count($task_list) == 0)
              <h5>Nothing found.</h5>
              @else
                <table id="task_table" class="table invoice-data-table dt-responsive nowrap">
                  <thead>
                    <tr>
                      <th></th>
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
                          <a class="dropdown-item" href="{{ route('contact_management', $task->id) }}"><i class="bx bx-edit-alt mr-1"></i> contact </a>
                          <a class="dropdown-item" href="javascript:void(0)" onClick="task_edit({{$task->id}})"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                          <a class="dropdown-item" href="javascript:void(0)" onClick="task_del({{$task->id}})"><i class="bx bx-trash mr-1"></i> delete</a>
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
        <!-- datatable ends -->
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
<script src="{{asset('js/scripts/pages/task_management.js')}}"></script>
<script src="{{asset('js/scripts/pickers/dateTime/pick-a-datetime.js')}}"></script>
@endsection
