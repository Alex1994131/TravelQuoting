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
});
$(document).ready(function() {
  if ($("#account_type_table").length) {
    var accountListView = $("#account_type_table").DataTable({
      columnDefs: [
        {
          targets: 0,
          className: "control"
        },
        {
          orderable: true,
          targets: 1,
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
        searchPlaceholder: "Search Invoice"
      },
      select: {
        style: "multi",
        selector: "td:first-child",
        items: "row"
      },
      responsive: {
        details: {
          type: "row",
          target: 0
        }
      }
    });
  }
  if ($("#task_type_table").length) {
    var taskListView = $("#task_type_table").DataTable({
      columnDefs: [
        {
          targets: 0,
          className: "control"
        },
        {
          orderable: true,
          targets: 1,
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
        searchPlaceholder: "Search Invoice"
      },
      select: {
        style: "multi",
        selector: "td:first-child",
        items: "row"
      },
      responsive: {
        details: {
          type: "row",
          target: 0
        }
      }
    });
  }
  if ($("#currency_table").length) {
    var taskListView = $("#currency_table").DataTable({
      columnDefs: [
        {
          targets: 0,
          className: "control"
        },
        {
          orderable: true,
          targets: 1,
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
        searchPlaceholder: "Search Invoice"
      },
      select: {
        style: "multi",
        selector: "td:first-child",
        items: "row"
      },
      responsive: {
        details: {
          type: "row",
          target: 0
        }
      }
    });
  }
  if ($("#customer_table").length) {
    var taskListView = $("#customer_table").DataTable({
      columnDefs: [
        {
          targets: 0,
          className: "control"
        },
        {
          orderable: true,
          targets: 1,
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
        searchPlaceholder: "Search Invoice"
      },
      select: {
        style: "multi",
        selector: "td:first-child",
        items: "row"
      },
      responsive: {
        details: {
          type: "row",
          target: 0
        }
      }
    });
  }
  if ($("#language_table").length) {
    var taskListView = $("#language_table").DataTable({
      columnDefs: [
        {
          targets: 0,
          className: "control"
        },
        {
          orderable: true,
          targets: 1,
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
        searchPlaceholder: "Search Invoice"
      },
      select: {
        style: "multi",
        selector: "td:first-child",
        items: "row"
      },
      responsive: {
        details: {
          type: "row",
          target: 0
        }
      }
    });
  }
  if ($("#category_table").length) {
    var taskListView = $("#category_table").DataTable({
      columnDefs: [
        {
          targets: 0,
          className: "control"
        },
        {
          orderable: true,
          targets: 1,
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
        searchPlaceholder: "Search Invoice"
      },
      select: {
        style: "multi",
        selector: "td:first-child",
        items: "row"
      },
      responsive: {
        details: {
          type: "row",
          target: 0
        }
      }
    });
  }
  if ($("#category_tag_table").length) {
    var taskListView = $("#category_tag_table").DataTable({
      columnDefs: [
        {
          targets: 0,
          className: "control"
        },
        {
          orderable: true,
          targets: 1,
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
        searchPlaceholder: "Search Invoice"
      },
      select: {
        style: "multi",
        selector: "td:first-child",
        items: "row"
      },
      responsive: {
        details: {
          type: "row",
          target: 0
        }
      }
    });
  }
  if ($("#city_table").length) {
    var taskListView = $("#city_table").DataTable({
      columnDefs: [
        {
          targets: 0,
          className: "control"
        },
        {
          orderable: true,
          targets: 1,
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
        searchPlaceholder: "Search Invoice"
      },
      select: {
        style: "multi",
        selector: "td:first-child",
        items: "row"
      },
      responsive: {
        details: {
          type: "row",
          target: 0
        }
      }
    });
  }
  if ($("#country_table").length) {
    var taskListView = $("#country_table").DataTable({
      columnDefs: [
        {
          targets: 0,
          className: "control"
        },
        {
          orderable: true,
          targets: 1,
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
        searchPlaceholder: "Search Invoice"
      },
      select: {
        style: "multi",
        selector: "td:first-child",
        items: "row"
      },
      responsive: {
        details: {
          type: "row",
          target: 0
        }
      }
    });
  }

});
/**account */
function detail_account_type(id)
{
  //account_type section
  $('#account_type_name').val("");

  $.ajax({
    url: base_url + '/settings/detail_account_type',
    method: 'get',
    data: {
      account_type_id: id,
    },
    dataType: 'JSON',
    success: function(data){
      if(data['result'] == 'success' && data['mode'] == 'create') {
          $('#account_type_id').val(id);
          $('#account_type_name').empty();
      }
      else if(data['result'] == 'success' && data['mode'] == 'edit') {
        $('#account_type_id').val(id);
        $('#account_type_name').val(data['title']);
      }
    }
  });

  $('#account_type_detail_modal').modal();
}

function save_account_type()
{
  //account_type section
  var account_type_id = $('#account_type_id').val();
  var account_type_name = "";
  account_type_name = $('#account_type_name').val();
  if(account_type_name == "")
    toastr.warning('The Name is empty! Please fill that!', 'warning', {'closeButton': true, timeOut: 2000});

  else{
    $.ajax({
      url: base_url + '/settings/save_account_type',
      method: 'post',
      data: {
        account_type_id: account_type_id,
        account_type_name: account_type_name,
      },
      dataType: 'JSON',
      success: function(data){
        if(data['result'] == 'success') {
            $('#account_type_id').val(account_type_id);
            toastr.success('Saved The AccountType Successfully!',  'Success', {'closeButton': true, timeOut: 2000});
            location.reload();
        }
        else if(data['result'] == "error_exist")
        {
          toastr.warning('The name exist!', 'warning', {'closeButton': true, timeOut: 2000});
        }
      }
    });
  }

}

function account_type_del(id)
{
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
        url: base_url + '/settings/account_type_del',
        method: 'post',
        data: {
          _token: $("[name='_token']").val(),
          account_type_id: id,
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

/**task */
function detail_task_type(id)
{
  //task_type section
  $('#task_type_name').val("");

  $.ajax({
    url: base_url + '/settings/detail_task_type',
    method: 'get',
    data: {
      task_type_id: id,
    },
    dataType: 'JSON',
    success: function(data){
      if(data['result'] == 'success' && data['mode'] == 'create') {
          $('#task_type_id').val(id);
          $('#task_type_name').empty();
      }
      else if(data['result'] == 'success' && data['mode'] == 'edit') {
        $('#task_type_id').val(id);
        $('#task_type_name').val(data['title']);
      }
    }
  });

  $('#task_type_detail_modal').modal();
}

function save_task_type()
{
  //task_type section
  var task_type_id = $('#task_type_id').val();
  var task_type_name = "";
  task_type_name = $('#task_type_name').val();
  if(task_type_name == "")
      toastr.warning('The Name is empty! Please fill that!', 'warning', {'closeButton': true, timeOut: 2000});

  else{
    $.ajax({
      url: base_url + '/settings/save_task_type',
      method: 'post',
      data: {
        task_type_id: task_type_id,
        task_type_name: task_type_name,
      },
      dataType: 'JSON',
      success: function(data){
        if(data['result'] == 'success') {
            $('#task_type_id').val(task_type_id);
            toastr.success('Saved The Task Type Successfully!',  'Success', {'closeButton': true, timeOut: 2000});

            location.reload();
        }
        else if(data['result'] == "error_exist")
        {
          toastr.warning('The name already exist!', 'warning', {'closeButton': true, timeOut: 2000});

        }
      }
    });
  }

}

function task_type_del(id)
{
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
        url: base_url + '/settings/task_type_del',
        method: 'post',
        data: {
          _token: $("[name='_token']").val(),
          task_type_id: id,
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


/****currency */
function detail_currency(id)
{
  //currency section
  $('#currency_name').val("");

  $.ajax({
    url: base_url + '/settings/detail_currency',
    method: 'get',
    data: {
      currency_id: id,
    },
    dataType: 'JSON',
    success: function(data){
      if(data['result'] == 'success' && data['mode'] == 'create') {
          $('#currency_id').val(id);
          $('#currency_name').empty();
      }
      else if(data['result'] == 'success' && data['mode'] == 'edit') {
        $('#currency_id').val(id);
        $('#currency_name').val(data['title']);
      }
    }
  });

  $('#currency_detail_modal').modal();
}

function save_currency()
{
  //currency section
  var currency_id = $('#currency_id').val();
  var currency_name = "";
  currency_name = $('#currency_name').val();
  if(currency_name == "")
      toastr.warning('The name is empty! Please fill that!', 'warning', {'closeButton': true, timeOut: 2000});
  else{
    $.ajax({
      url: base_url + '/settings/save_currency',
      method: 'post',
      data: {
        currency_id: currency_id,
        currency_name: currency_name,
      },
      dataType: 'JSON',
      success: function(data){
        if(data['result'] == 'success') {
            $('#currency_id').val(currency_id);
            toastr.success('Saved The Currency Successfully!',  'Success', {'closeButton': true, timeOut: 2000});
            location.reload();
        }
        else if(data['result'] == "error_exist")
        {
          toastr.warning('The name already exist!', 'warning', {'closeButton': true, timeOut: 2000});

        }
      }
    });
  }

}

function currency_del(id)
{
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
        url: base_url + '/settings/currency_del',
        method: 'post',
        data: {
          _token: $("[name='_token']").val(),
          currency_id: id,
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

/****customer */
function detail_customer(id)
{
  //customer section
  $('#customer_name').val("");

  $.ajax({
    url: base_url + '/settings/detail_customer',
    method: 'get',
    data: {
      customer_id: id,
    },
    dataType: 'JSON',
    success: function(data){
      if(data['result'] == 'success' && data['mode'] == 'create') {
          $('#customer_id').val(id);
          $('#customer_name').empty();
      }
      else if(data['result'] == 'success' && data['mode'] == 'edit') {
        $('#customer_id').val(id);
        $('#customer_name').val(data['title']);
      }
    }
  });

  $('#customer_detail_modal').modal();
}

function save_customer()
{
  //customer section
  var customer_id = $('#customer_id').val();
  var customer_name = "";
  customer_name = $('#customer_name').val();
  if(customer_name == "")
    toastr.warning('The name is empty! Please fill that!', 'warning', {'closeButton': true, timeOut: 2000});

  else{
    $.ajax({
      url: base_url + '/settings/save_customer',
      method: 'post',
      data: {
        customer_id: customer_id,
        customer_name: customer_name,
      },
      dataType: 'JSON',
      success: function(data){
        if(data['result'] == 'success') {
            $('#customer_id').val(customer_id);
            toastr.success('Saved The Customer Successfully!',  'Success', {'closeButton': true, timeOut: 2000});
            location.reload();
        }
        else if(data['result'] == "error_exist")
        {
          toastr.warning('The name already exist!', 'warning', {'closeButton': true, timeOut: 2000});

        }
      }
    });
  }

}

function customer_del(id)
{
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
        url: base_url + '/settings/customer_del',
        method: 'post',
        data: {
          _token: $("[name='_token']").val(),
          customer_id: id,
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

/****language */
function detail_language(id)
{
  //language section
  $('#language_name').val("");
  $('#language_title').val("");

  $.ajax({
    url: base_url + '/settings/detail_language',
    method: 'get',
    data: {
      language_id: id,
    },
    dataType: 'JSON',
    success: function(data){
      if(data['result'] == 'success' && data['mode'] == 'create') {
          $('#language_id').val(id);
          $('#language_name').empty();
          $('#language_title').empty();

      }
      else if(data['result'] == 'success' && data['mode'] == 'edit') {
        $('#language_id').val(id);
        $('#language_name').val(data['name']);
        $('#language_title').val(data['title']);

      }
    }
  });

  $('#language_detail_modal').modal();
}

function save_language()
{
  //language section
  var language_id = $('#language_id').val();
  var language_name = "";
  var language_title = "";
  language_name = $('#language_name').val();
  language_title = $('#language_title').val();

  if(language_name == "")
    toastr.warning('The name is empty! Please fill that!', 'warning', {'closeButton': true, timeOut: 2000});

  else if(language_title == "")
    toastr.warning('The title is empty! Please fill that!', 'warning', {'closeButton': true, timeOut: 2000});

  else{
    $.ajax({
      url: base_url + '/settings/save_language',
      method: 'post',
      data: {
        language_id: language_id,
        language_name: language_name,
        language_title: language_title,

      },
      dataType: 'JSON',
      success: function(data){
        if(data['result'] == 'success') {
            $('#language_id').val(language_id);
            toastr.success('Saved The Language Successfully!',  'Success', {'closeButton': true, timeOut: 2000});

            location.reload();
        }
        else if(data['result'] == "error_exist")
        {
          toastr.warning('The name already exist!', 'warning', {'closeButton': true, timeOut: 2000});

        }
      }
    });
  }

}

function language_del(id)
{
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
        url: base_url + '/settings/language_del',
        method: 'post',
        data: {
          _token: $("[name='_token']").val(),
          language_id: id,
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

/****category */
function detail_category(id)
{
  //category section
  var str_category_parent = '<option value="">--- Please select ---</option>';
  $('#category_name').val("");

  $.ajax({
    url: base_url + '/settings/detail_category',
    method: 'get',
    data: {
      category_id: id,
    },
    dataType: 'JSON',
    success: function(data){
      if(data['result'] == 'success' && data['mode'] == 'create') {
          $('#category_id').val(id);
          $('#category_name').empty();
          $('#category_parent').empty();
          $('#category_parent').append(str_category_parent);
          var category_parents = data.category_parents;
          for(index = 0; index < category_parents.length; index ++)
          {
            str_category_parent = '<option value = "' + (index+1) + '">' + category_parents[index] + '</option>';

              $('#category_parent').append(str_category_parent);
          }
      }
      else if(data['result'] == 'success' && data['mode'] == 'edit') {
        $('#category_id').val(id);
        $('#category_name').val(data['title']);
        $('#category_parent').empty();
        $('#category_parent').append(str_category_parent);
        var category_parents = data.category_parents;
        for(index = 0; index < category_parents.length; index ++)
        {
          var selected = (index+1) == data.category_parent ? 'selected' : "";
          str_category_parent= '<option ' + selected + ' value = "' + (index+1) + '">' + category_parents[index] + '</option>';

            $('#category_parent').append(str_category_parent);
        }
      }
    }
  });

  $('#category_detail_modal').modal();
}

function save_category()
{
  //category section
  var category_id = $('#category_id').val();
  var category_name = "";
  category_name = $('#category_name').val();
  var category_parent = "";
  category_parent= $('#category_parent').val();

  if(category_name == "")
    toastr.warning('The name is empty! Please fill that!', 'warning', {'closeButton': true, timeOut: 2000});

  else if(category_parent == "")
    toastr.warning('The parent is empty! Please fill that!', 'warning', {'closeButton': true, timeOut: 2000});

  else{
    $.ajax({
      url: base_url + '/settings/save_category',
      method: 'post',
      data: {
        category_id: category_id,
        category_name: category_name,
        category_parent: category_parent,

      },
      dataType: 'JSON',
      success: function(data){
        if(data['result'] == 'success') {
            $('#category_id').val(category_id);
            toastr.success('Saved The Category Successfully!',  'Success', {'closeButton': true, timeOut: 2000});

            location.reload();
        }
        else if(data['result'] == "error_exist")
        {
          toastr.warning('The name already exist!', 'warning', {'closeButton': true, timeOut: 2000});

        }
      }
    });
  }

}

function category_del(id)
{
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
        url: base_url + '/settings/category_del',
        method: 'post',
        data: {
          _token: $("[name='_token']").val(),
          category_id: id,
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

/****category_tag */
function detail_category_tag(id)
{
  //category_tag section
  var str_category_tag_parent = '<option value="">--- Please select ---</option>';
  $('#category_tag_name').val("");
  $('#category_tag_title').val("");


  $.ajax({
    url: base_url + '/settings/detail_category_tag',
    method: 'get',
    data: {
      category_tag_id: id,
    },
    dataType: 'JSON',
    success: function(data){
      if(data['result'] == 'success' && data['mode'] == 'create') {
          $('#category_tag_id').val(id);
          $('#category_tag_name').empty();
          $('#category_tag_title').empty();

          $('#category_tag_parent').empty();
          $('#category_tag_parent').append(str_category_tag_parent);
          var category_tag_parents = data.category_tag_parents;
          for(index = 0; index < category_tag_parents.length; index ++)
          {
            str_category_tag_parent = '<option value = "' + (index+1) + '">' + category_tag_parents[index] + '</option>';

            $('#category_tag_parent').append(str_category_tag_parent);
          }
      }
      else if(data['result'] == 'success' && data['mode'] == 'edit') {
        $('#category_tag_id').val(id);
        $('#category_tag_name').val(data['name']);
        $('#category_tag_title').val(data['title']);

        $('#category_tag_parent').empty();
        $('#category_tag_parent').append(str_category_tag_parent);
        var category_tag_parents = data.category_tag_parents;
        for(index = 0; index < category_tag_parents.length; index ++)
        {
          var selected = (index+1) == data.category_tag_parent ? 'selected' : "";
          str_category_tag_parent= '<option ' + selected + ' value = "' + (index+1) + '">' + category_tag_parents[index] + '</option>';

            $('#category_tag_parent').append(str_category_tag_parent);
        }
      }
    }
  });

  $('#category_tag_detail_modal').modal();
}

function save_category_tag()
{
  //category_tag section
  var category_tag_id = $('#category_tag_id').val();
  var category_tag_name = "";
  category_tag_name = $('#category_tag_name').val();
  var category_tag_parent = "";
  category_tag_title = $('#category_tag_title').val();
  var category_tag_parent = "";
  category_tag_parent= $('#category_tag_parent').val();

  if(category_tag_title == "")
    toastr.warning('The name is empty! Please fill that!', 'warning', {'closeButton': true, timeOut: 2000});

  else if(category_tag_name == "")
    toastr.warning('The value is empty! Please fill that!', 'warning', {'closeButton': true, timeOut: 2000});

  else if(category_tag_parent == "")
    toastr.warning('The parent is empty! Please fill that!', 'warning', {'closeButton': true, timeOut: 2000});

  else{
    $.ajax({
      url: base_url + '/settings/save_category_tag',
      method: 'post',
      data: {
        category_tag_id: category_tag_id,
        category_tag_name: category_tag_name,
        category_tag_title: category_tag_title,
        category_tag_parent: category_tag_parent,

      },
      dataType: 'JSON',
      success: function(data){
        if(data['result'] == 'success') {
            $('#category_tag_id').val(category_tag_id);
            toastr.success('Saved The Category Tag Successfully!',  'Success', {'closeButton': true, timeOut: 2000});

            location.reload();
        }
        else if(data['result'] == "error_exist")
        {
          toastr.warning('The name already exist!', 'warning', {'closeButton': true, timeOut: 2000});

        }
      }
    });
  }

}

function category_tag_del(id)
{
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
        url: base_url + '/settings/category_tag_del',
        method: 'post',
        data: {
          _token: $("[name='_token']").val(),
          category_tag_id: id,
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

/****city */
function detail_city(id)
{
  //city section
  var str_region = '<option value="">--- Please select ---</option>';
  var str_country = '<option value="">--- Please select ---</option>';
  $('#city_title').val("");


  $.ajax({
    url: base_url + '/settings/detail_city',
    method: 'get',
    data: {
      city_id: id,
    },
    dataType: 'JSON',
    success: function(data){
      if(data['result'] == 'success' && data['mode'] == 'create') {
          $('#city_id').val(id);
          $('#city_title').empty();

          $('#region_name').empty();
          $('#region_name').append(str_region);
          $('#country_name').empty();
          $('#country_name').append(str_country);
          var region_names = data.region_names;
          var country_names = data.country_names;
          for (key in region_names)
          {

            str_region = '<option value = "' + region_names[key]['id'] + '">' + region_names[key]['title'] + '</option>';

            $('#region_name').append(str_region);
          }
          for (key in country_names)
          {
            str_country = '<option value = "' + country_names[key].id + '">' + country_names[key].title + '</option>';

            $('#country_name').append(str_country);
          }
      }
      else if(data['result'] == 'success' && data['mode'] == 'edit') {
        $('#city_id').val(id);
        $('#city_title').val(data['title']);
        $('#region_name').empty();
        $('#region_name').append(str_region);
        var region_names = data.region_names;
        for (key in region_names)
        {
          var selected = region_names[key].id == data.region_id ? 'selected' : "";
          str_region= '<option ' + selected + ' value = "' + region_names[key].id + '">' + region_names[key].title + '</option>';

            $('#region_name').append(str_region);
        }


        $('#country_name').empty();
        $('#country_name').append(str_country);
        var country_names = data.country_names;
        for (key in country_names)
        {
          var selected = country_names[key].id == data.country_id ? 'selected' : "";
          str_country= '<option ' + selected + ' value = "' + country_names[key].id + '">' + country_names[key].title + '</option>';

            $('#country_name').append(str_country);
        }
      }
    }
  });

  $('#city_detail_modal').modal();
}

function save_city()
{
  //city section
  var city_id = $('#city_id').val();
  var city_title = "";
  city_title = $('#city_title').val();
  var region_id = "";
  region_id = $('#region_name').val();
  var country_id = "";
  country_id = $('#country_name').val();

  if(city_title == "")
    toastr.warning('The Name is empty! Please fill that!', 'warning', {'closeButton': true, timeOut: 2000});

  else if(region_id == "")
    toastr.warning('The Region is empty! Please fill that!', 'warning', {'closeButton': true, timeOut: 2000});

  else if(country_id == "")
      toastr.warning('The Country is empty! Please fill that!', 'warning', {'closeButton': true, timeOut: 2000});

  else{
    $.ajax({
      url: base_url + '/settings/save_city',
      method: 'post',
      data: {
        city_id: city_id,
        city_title: city_title,
        region_id: region_id,
        country_id: country_id,

      },
      dataType: 'JSON',
      success: function(data){
        if(data['result'] == 'success') {
            $('#city_id').val(city_id);
            toastr.success('Saved The City Successfully!',  'Success', {'closeButton': true, timeOut: 2000});

            location.reload();
        }
        else if(data['result'] == "error_exist")
        {
          toastr.warning('The name already exist!', 'warning', {'closeButton': true, timeOut: 2000});

        }
      }
    });
  }

}

function city_del(id)
{
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
        url: base_url + '/settings/city_del',
        method: 'post',
        data: {
          _token: $("[name='_token']").val(),
          city_id: id,
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

/****country */
function detail_country(id)
{
  //country section
  var str_region = '<option value="">--- Please select ---</option>';
  $('#country_title').val("");
  $('#code_title').val("");
  $('#phonecode_title').val("");

  $.ajax({
    url: base_url + '/settings/detail_country',
    method: 'get',
    data: {
      country_id: id,
    },
    dataType: 'JSON',
    success: function(data){
      if(data['result'] == 'success' && data['mode'] == 'create') {
          $('#country_id').val(id);
          $('#country_title').empty();
          $('#code_title').empty();
          $('#phonecode_title').empty();
          $('#country_region_name').empty();
          $('#country_region_name').append(str_region);
          var region_names = data.region_names;
          for (key in region_names)
          {
            str_region = '<option value = "' + region_names[key]['id'] + '">' + region_names[key]['title'] + '</option>';

            $('#country_region_name').append(str_region);
          }
      }
      else if(data['result'] == 'success' && data['mode'] == 'edit') {
        $('#country_id').val(id);
        $('#country_title').val(data['title']);
        $('#code_title').val(data['code_title']);
        $('#phonecode_title').val(data['phonecode_title']);
        $('#country_region_name').empty();
        $('#country_region_name').append(str_region);
        var region_names = data.region_names;
        for (key in region_names)
        {
          var selected = region_names[key].id == data.region_id ? 'selected' : "";
          str_region= '<option ' + selected + ' value = "' + region_names[key].id + '">' + region_names[key].title + '</option>';

            $('#country_region_name').append(str_region);
        }
      }
    }
  });

  $('#country_detail_modal').modal();
}

function save_country()
{
  //country section
  var country_id = $('#country_id').val();
  var country_title = "";
  country_title = $('#country_title').val();
  var region_id = "";
  region_id = $('#country_region_name').val();
  var code_title = "";
  code_title = $('#code_title').val();
  var phonecode_title = "";
  phonecode_title = $('#phonecode_title').val();

  if(country_title == "")
    toastr.warning('The Name is empty! Please fill that!', 'warning', {'closeButton': true, timeOut: 2000});

  else if(region_id == "")
    toastr.warning('The Region is empty! Please fill that!', 'warning', {'closeButton': true, timeOut: 2000});

  else if(code_title == "")
    toastr.warning('The Code is empty! Please fill that!', 'warning', {'closeButton': true, timeOut: 2000});

  else if(phonecode_title == "")
    toastr.warning('The Phonecode is empty! Please fill that!', 'warning', {'closeButton': true, timeOut: 2000});


  else{
    $.ajax({
      url: base_url + '/settings/save_country',
      method: 'post',
      data: {
        country_id: country_id,
        country_title: country_title,
        region_id: region_id,
        code_title: code_title,
        phonecode_title: phonecode_title,

      },
      dataType: 'JSON',
      success: function(data){
        if(data['result'] == 'success') {
            $('#country_id').val(country_id);
            toastr.success('Saved The Country Successfully!',  'Success', {'closeButton': true, timeOut: 2000});

            location.reload();
        }
        else if(data['result'] == "error_exist")
        {
          toastr.warning('The name already exist!', 'warning', {'closeButton': true, timeOut: 2000});

        }
      }
    });
  }

}

function country_del(id)
{
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
        url: base_url + '/settings/country_del',
        method: 'post',
        data: {
          _token: $("[name='_token']").val(),
          country_id: id,
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

function save_default_settings()
{
  var current_language = $('#current_language').val();
  var current_currency = $('#current_currency').val();
  if(current_language == "")
    toastr.warning('The Language is empty! Please fill that!', 'warning', {'closeButton': true, timeOut: 2000});

  else if(current_currency == "")
    toastr.warning('The Currency is empty! Please fill that!', 'warning', {'closeButton': true, timeOut: 2000});

  else{
    $.ajax({
      url: base_url + '/settings/save_default_settings',
      method: 'post',
      data: {
        current_language: current_language,
        current_currency: current_currency,

      },
      dataType: 'JSON',
      success: function(data){
        if(data['result'] == 'success') {
            toastr.success('Saved The Setting Successfully!',  'Success', {'closeButton': true, timeOut: 2000});

            location.reload();
        }
        else if(data['result'] == "error")
        {
          toastr.warning('This setting is invalied!', 'warning', {'closeButton': true, timeOut: 2000});

        }
      }
    });
  }
}
