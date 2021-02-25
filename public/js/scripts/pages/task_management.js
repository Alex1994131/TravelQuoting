$(window).on("load", function () {
    var $primary = '#5A8DEE';
    var $success = '#39DA8A';
    var $danger = '#FF5B5C';
    var $warning = '#FDAC41';
    var $info = '#00CFDD';
    var $label_color = '#475f7b';
    var $primary_light = '#E2ECFF';
    var $danger_light = '#ffeed9';
    var $gray_light = '#828D99';
    var $sub_label_color = "#596778";
    var $radial_bg = "#e7edf3";
    var $secondary = '#828D99';
    var $secondary_light = '#e7edf3';
    var $light_primary = "#E2ECFF";
    var analyticsBarChartOptions = {
        chart: {
          height: 204,
          type: 'bar',
          toolbar: {
            show: false
          }
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '20%',
            endingShape: 'rounded'
          },
        },
        legend: {
          horizontalAlign: 'right',
          offsetY: -10,
          markers: {
            radius: 50,
            height: 8,
            width: 8
          }
        },
        dataLabels: {
          enabled: false
        },
        colors: [$primary, $primary_light],
        fill: {
          type: 'gradient',
          gradient: {
            shade: 'light',
            type: "vertical",
            inverseColors: true,
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 70, 100]
          },
        },
        series: [{
          name: '2019',
          data: [80, 95, 150, 210, 140, 230, 300, 280, 130]
        }, {
          name: '2018',
          data: [50, 70, 130, 180, 90, 180, 270, 220, 110]
        }],
        xaxis: {
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false
          },
          labels: {
            style: {
              colors: $gray_light
            }
          }
        },
        yaxis: {
          min: 0,
          max: 300,
          tickAmount: 3,
          labels: {
            style: {
              color: $gray_light
            }
          }
        },
        legend: {
          show: false
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return "$ " + val + " thousands"
            }
          }
        }
    }

    var analyticsBarChart = new ApexCharts(
    document.querySelector("#analytics-bar-chart"),
    analyticsBarChartOptions
    );

    analyticsBarChart.render();

    var multiRadialOptions = {
        chart: {
          height: 220,
          type: "radialBar",
        },
        colors: [$primary, $danger, $warning],
        series: [75, 80, 85],
        plotOptions: {
            radialBar: {
            offsetY: -10,
            hollow: {
                size: "40%"
            },
            track: {
                margin: 10,
                background: '#fff',
            },
            dataLabels: {
                name: {
                fontSize: '12px',
                color: [$secondary],
                fontFamily: "IBM Plex Sans",
                offsetY: 25,
                },
                value: {
                fontSize: '30px',
                fontFamily: "Rubik",
                offsetY: -15,
                },
                total: {
                show: true,
                label: 'Total Visits',
                color: $secondary
                }
            }
            }
        },
        stroke: {
            lineCap: "round",
        },
        labels: ['Target', 'Mart', 'Ebay']
    };

    var multiradialChart = new ApexCharts(
    document.querySelector("#multi-radial-chart"),
    multiRadialOptions
    );
    multiradialChart.render();
});
function enquiry_del(val){
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        confirmButtonClass: 'btn btn-warning',
        cancelButtonClass: 'btn btn-danger ml-1',
        buttonsStyling: false,
      }).then(function (result) {
        if (result.value) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            jQuery.ajax({
            url: base_url + '/del_enquiry',
            method: 'get',
            data: {
                enquiry_id:val,
            },
            success: function(data){
                if(data == "Success!")
                {
                    Swal.fire({
                        type: "success",
                        title: 'Deleted!',
                        text: 'Selected Enquiry has been deleted.',
                        confirmButtonClass: 'btn btn-success',
                    }).then(function (result){
                        if(result.value){
                            var url = '../';
                            window.location.href = url;
                        }
                    });


                }
            }});
        }
        else if (result.dismiss === Swal.DismissReason.cancel) {
        }
      });
}

function task_del(val){
  Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!',
      confirmButtonClass: 'btn btn-warning',
      cancelButtonClass: 'btn btn-danger ml-1',
      buttonsStyling: false,
    }).then(function (result) {
      if (result.value) {
          $.ajax({
          url: base_url + '/del_task',
          method: 'post',
          data: {
            _token: $("[name='_token']").val(),
            task_id: val,
          },
          success: function(data){
              if(data == "success")
              {
                  Swal.fire({
                      type: "success",
                      title: 'Deleted!',
                      text: 'Selected task has been deleted.',
                      confirmButtonClass: 'btn btn-success',
                  }).then(function (result){
                      if(result.value){
                          location.reload();
                      }
                  });


              }
          }});
      }
      else if (result.dismiss === Swal.DismissReason.cancel) {
      }
    });
}

$(document).ready(function() {
  if ($("#task_table").length) {
    var taskListView = $("#task_table").DataTable({
      columnDefs: [
        {
          targets: 0,
          className: "control"
        },
        {
          orderable: true,
          targets: 1,
          // checkboxes: { selectRow: true }
        },
        {
          targets: [0, 1],
          orderable: false
        },
      ],
      order: [2, 'asc'],
      dom:
        '<"top d-flex flex-wrap"<"action-filters flex-grow-1"f><"actions action-btns d-flex align-items-center">><"clear">rt<"bottom"p>',
      language: {
        search: "",
        searchPlaceholder: "Search Task"
      },
      select: {
        style: "multi",
        selector: "td:first-child",
        items: "row"
      },
      responsive: {
        details: {
          type: "column",
          target: 0
        }
      }
    });
  }
  $(".current").find(".step-icon").addClass("bx bx-time-five");
  $(".current").find(".fonticon-wrap .livicon-evo").updateLiviconEvo({
    strokeColor: '#5A8DEE'
  });

  CKEDITOR.replace("note");
});


function task_detail(product_id){
  //task section
  var itinerary_id = $('#itinerary_id').val();
  var str_assign_by = '<option value="">--- Please select ---</option>'
  var accounts = [];
  $('#product_id').val(product_id);
  $.ajax({
    url: '/task_detail',
    method: 'get',
    data: {
      product_id: product_id,
      itinerary_id: itinerary_id,
    },
    dataType: 'JSON',
    success: function(data){
      icon_array = [];
      icon_array = ['bx bx-phone', 'bx bxs-user-voice', 'bx bx-timer', 'bx bx-mail-send'];
      if(data['result'] == 'success') {

          $('#task_id').val(0);
          console.log(data);
          var task_type_str = "";
          for(var i = 0; i < data.task_type.length; i++)
          {
            task_type_str += '<li class="nav-item"><a class=" nav-link" style="text-align: center;" d="category-tab" data-toggle="tab" href="javascript:void(0)" aria-controls="category"  role="tab" aria-selected="true" onclick="select_task(' + data.task_type[i]['id'] + ')"><i class="'+ icon_array[i] + '" ></i><br>' + data.task_type[i]["title"] + '</a></li>'

          }
          $('#task_type_ul').empty();
          $('#task_type_ul').append(task_type_str);


          current_account_str = data.current_account.first_name + ' ' + data.current_account.last_name + ', ' + data.current_account.main_email + ', ' + data.current_account.title;
          $('#assign_by').val(current_account_str);
          $('#assign_to').empty();
          $('#assign_to').append(str_assign_by);
          var accounts = data.account;
          for(index = 0; index < accounts.length; index ++)
          {
            str_assign_by= '<option value = "' + accounts[index].user_id + '">' + accounts[index].first_name + ' ' + accounts[index].last_name + ', ' + accounts[index].main_email + ', ' + accounts[index].title + '</option>';

              $('#assign_to').append(str_assign_by);
          }
          $('#itinerary_ref_num').val(data.itinerary_ref_num);
          $('#product_title').hide();
          $('#head_title').hide();

          $('#myModalLabel17').show();

      }
    }
  });
  $('#task_detail_modal').modal();
}

function save_task(){
  //task section
  var task_id = $('#task_id').val();
  var task_data = {};
  var itinerary_id = $('#itinerary_id').val();
  var product_id = $('#product_id').val();
  var task_name = $('#task_name').val();
  var from_date = $('#from_date').val();
  var start_time =$('#start_time').val();
  var end_date = $('#end_date').val();
  var end_time =$('#end_time').val();
  var priority = $('input[name="radioPriority"]:checked').val();
  var status = $('input[name="radioStatus"]:checked').val();
  var assign_to = $('#assign_to').val();
  var note_value = CKEDITOR.instances.note.getData();
  var task_type = $('#task_type').val();
  task_data['itinerary_id'] = itinerary_id;
  task_data['service_id'] = product_id;
  task_data['task_name'] = task_name;
  task_data['start_date'] = from_date;
  task_data['start_time'] = start_time;
  task_data['end_date'] = end_date;
  task_data['end_time'] = end_time;
  task_data['priority'] = priority;
  task_data['status'] = status;
  task_data['assigned_to'] = assign_to;
  task_data['task_des'] = note_value;
  task_data['task_type'] = task_type;
  task_data['reference_number'] = $('#itinerary_ref_num').val();
  task_data['customer'] = 0;
  task_data['tags'] = "aa";

  if(task_type=="")
  {
    toastr.warning('Please select the Task Type now!', 'warning', {'closeButton': true, timeOut: 2000});

  }
  else if(task_name=="")
  {
    toastr.warning('The Task Name is empty! Please fill that!', 'warning', {'closeButton': true, timeOut: 2000});

  }
  else if(start_time=="")
  {
    toastr.warning('The Start Time is empty! Please fill that!', 'warning', {'closeButton': true, timeOut: 2000});

  }
  else if(end_time=="")
  {
    toastr.warning('The End Time is empty! Please fill that!', 'warning', {'closeButton': true, timeOut: 2000});

  }
  else if(assign_to=="")
  {
    toastr.warning('The Assign To is empty! Please fill that!', 'warning', {'closeButton': true, timeOut: 2000});

  }
  else if(note_value=="")
  {
    toastr.warning('The Description is empty! Please fill that!', 'warning', {'closeButton': true, timeOut: 2000});

  }
  else
  {
    var start_date = from_date.split("/");
    var date1 = new Date( start_date[2], start_date[0] - 1, start_date[1]);

    end_date = end_date.split("/");
    var date2 = new Date(end_date[2], end_date[0] - 1, end_date[1]);

    var delta = date2.getTime() - date1.getTime();
    if(delta < 0)
    {
      toastr.warning('The end date must be greater than start date!', 'warning', {'closeButton': true, timeOut: 2000});
    }
    else {
      $.ajax({
        url: base_url + '/save_task',
        method: 'get',
        data: {
          _token: $("[name='_token']").val(),
          task_data: task_data,
          task_id: task_id,
        },
        dataType: "JSON",
        success: function(data){
          if(data.result == 'success') {
            console.log(data);
            if(data.mode == 'create')
                  toastr.success('Saved New Task Successfully!', 'Success', {'closeButton': true, timeOut: 2000});
            else if(data.mode == 'update')
                  toastr.success('Updated The Task Successfully!',  'Success', {'closeButton': true, timeOut: 2000});

            location.reload();
          }
          else if(data.result == 'error'){
            toastr.warning('The task already exist!', 'warning', {'closeButton': true, timeOut: 2000});
          }

        }
      });
    }
  }
}
function select_task(type_id)
{
  console.log(type_id);
  $('#task_type').val(type_id);
}

function task_edit(task_id)
{
  //task section
  var str_assign_by = '<option value="">--- Please select ---</option>'
  var accounts = [];
  task_id = task_id;
  $.ajax({
    url: '/task_edit',
    method: 'get',
    data: {
      task_id: task_id,
    },
    dataType: 'JSON',
    success: function(data){
      icon_array = [];
      icon_array = ['bx bx-phone', 'bx bxs-user-voice', 'bx bx-timer', 'bx bx-mail-send'];
      if(data['result'] == 'success') {

          $('#task_id').val(data.task['id']);
          $('#product_id').val(data.task['service_id']);
          console.log(data);

          var task_type_str = "";
          var active = "";
          for(var i = 0; i < data.task_type.length; i++)
          {
            active = data.task['task_type'] == data.task_type[i]['id'] ? 'active' : '';
            task_type_str += '<li class="nav-item"><a class=" nav-link ' + active + '" style="text-align: center;" d="category-tab" data-toggle="tab" href="javascript:void(0)" aria-controls="category"  role="tab" aria-selected="true" onclick="select_task(' + data.task_type[i]['id'] + ')"><i class="'+ icon_array[i] + '" ></i><br>' + data.task_type[i]["title"] + '</a></li>'

          }
          $('#task_type_ul').empty();
          $('#task_type_ul').append(task_type_str);
          $('#task_type').val(data.task['task_type']);

          $('#task_name').val(data.task['task_name']);

          $('#from_date').val(data.task['start_date']);
          $('#end_date').val(data.task['end_date']);
          $('#start_time').val(data.task['start_time']);
          $('#end_time').val(data.task['end_time']);
          var ss = 'input[name=radioPriority][value=' + data.task["priority"] + ']';
          $(ss).prop('checked', 'checked');
          ss = 'input[name=radioStatus][value=' + data.task["status"] + ']';
          $(ss).prop('checked', 'checked');

          current_account_str = data.current_account.first_name + ' ' + data.current_account.last_name + ', ' + data.current_account.main_email + ', ' + data.current_account.title;

          $('#assign_by').val(current_account_str);
          $('#assign_to').empty();
          $('#assign_to').append(str_assign_by);
          var accounts = data.account;
          for(index = 0; index < accounts.length; index ++)
          {
            var selected = data.task['assigned_to'] == accounts[index].user_id ? 'selected' : "";
            str_assign_by= '<option ' + selected + ' value = "' + accounts[index].user_id + '">' + accounts[index].first_name + ' ' + accounts[index].last_name + ', ' + accounts[index].main_email + ', ' + accounts[index].title + '</option>';

              $('#assign_to').append(str_assign_by);
          }
          $('#itinerary_ref_num').val(data.itinerary_ref_num);
          if(data.task['service_id'] != 0)
          {
            $('#product_title').val(data.product_title);

            $('#head_title').show();
            $('#product_title').show();
            $('#myModalLabel17').hide();

          }
          else
          {
            $('#product_title').hide();
            $('#head_title').hide();

            $('#myModalLabel17').show();

          }
          CKEDITOR.instances.note.setData(data.task['task_des']);
      }
    }
  });
  $('#task_detail_modal').modal();
}
