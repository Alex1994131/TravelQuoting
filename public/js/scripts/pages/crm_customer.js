
$(document).ready(function () {

    if ($("#table-customer").length) {
        var oTable_customer = $("#table-customer").DataTable({
            "columns": [
                { "data": "" },
                { "data": "No" },
                { "data": "Full_name" },
                { "data": "Email" },
                { "data": "Phone" },
                { "data": "Country" },
                { "data": "Customer_type" },
                { "data": "Action" },
            ],
          columnDefs: [
            {
              targets: 0,
              checkboxes: { selectRow: true }
            },
            {
                targets: 1,
                orderable: true,
            },
          ],
          
          dom:
            '<"top d-flex flex-wrap"<"action-filters flex-grow-1"f><"actions action-btns-customer d-flex align-items-center">><"clear">rt<"bottom"p>',
          language: {
            search: "",
            searchPlaceholder: "Search Customer"
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
          },
        });
    }
    if ($("#table-account").length) {
        var oTable_account = $("#table-account").DataTable({
            "columns": [
                { "data": "" },
                { "data": "No" },
                { "data": "User_name" },
                { "data": "Full_name" },
                { "data": "Email" },
                { "data": "Password" },
                { "data": "Phone" },
                { "data": "Country" },
                { "data": "Customer_type" },
                { "data": "Action" },
            ],
          columnDefs: [
            {
              targets: 0,
              checkboxes: { selectRow: true }
            },
            {
                targets: 1,
                orderable: true,
            },
          ],
          dom: '<"top d-flex flex-wrap"<"action-filters flex-grow-1"f><"actions action-btns-account d-flex align-items-center">><"clear">rt<"bottom"p>',
          language: {
            search: "",
            searchPlaceholder: "Search Account"
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
    
    var invoiceFilterAction_customer = $("#invoice-filter-action-customer");
    var invoiceOptions_customer = $("#invoice-options-customer");
    $(".action-btns-customer").append(invoiceFilterAction_customer, invoiceOptions_customer);

    
    var invoiceFilterAction_account = $("#invoice-filter-action-account");
    var invoiceOptions_account = $("#invoice-options-account");
    $(".action-btns-account").append(invoiceFilterAction_account, invoiceOptions_account);


    $('.select2-selection__rendered').css('margin-left', '26px');
    // $('.select2-selection__rendered').css('color', 'rgba(0, 0, 0, 0.4)');
    $('.select2-selection__rendered').css('color', '#475F7B');
    $('.select2-selection__rendered').css('font-weight', 400);
    if(typeof(customer) != 'undefined'){
        
        if(customer.account_type == 2){
            $('#billing_street_address').prop("disabled", false);
            $('#billing_city').prop("disabled", false);
            $('#billing_region_state').prop("disabled", false);
            $('#billing_country').prop("disabled", false);
            $('#billing_office_phone').prop("disabled", false);
            $('#billing_email').prop("disabled", false);
        }
    }
    $(document).on("change", "#account_type", function () {
        if($('#account_type').val() == 1)
        {
            $('#billing_street_address').prop("disabled", true);
            $('#billing_city').prop("disabled", true);
            $('#billing_region_state').prop("disabled", true);
            $('#billing_country').prop("disabled", true);
            $('#billing_office_phone').prop("disabled", true);
            $('#billing_email').prop("disabled", true);
        }
        else if($('#account_type').val() == 2)
        {
            $('#billing_street_address').prop("disabled", false);
            $('#billing_city').prop("disabled", false);
            $('#billing_region_state').prop("disabled", false);
            $('#billing_country').prop("disabled", false);
            $('#billing_office_phone').prop("disabled", false);
            $('#billing_email').prop("disabled", false);
        }
    });

    $(document).on("change", "#main_city", function() {
        $('.select2-selection__rendered').css('margin-left', '26px');
    });

    $(document).on("change", "#billing_city", function() {
        $('.select2-selection__rendered').css('margin-left', '26px');
    });

    $(document).on("change", "#main_country", function() {
        $('.select2-selection__rendered').css('margin-left', '26px');
    });

    $(document).on("change", "#billing_country", function() {
        $('.select2-selection__rendered').css('margin-left', '26px');
    });

    $(document).on("change", "#main_region", function() {
        $('.select2-selection__rendered').css('margin-left', '26px');
    });

    $(document).on("change", "#billing_region", function() {
        $('.select2-selection__rendered').css('margin-left', '26px');
    });

    // $(document).on("click", "#change_pwd_btn", function() {
    //     $('#change_password_modal').modal();
    // })

    $("#export_csv_customer").on('click', function () {
        if(oTable_customer)
        {
            var rows = oTable_customer.rows().data();
            
            var header_data = new Array();
            for (x in rows[0]) {
                x = x.replace(/,/g, '');
                header_data.push(x);
            }
            var main_data = new Array();
            for(var i=0; i<rows.length; i++) {
                main_data.push({
                    No: rows[i].No.replace(/,/g, ''),
                    FullName: rows[i].Full_name.replace(/,/g, ''),
                    Email: rows[i].Email.replace(/,/g, ''),
                    Phone: rows[i].Phone.replace(/,/g, ''),
                    Country: rows[i].Country.replace(/,/g, ''),
                    Customer_type: rows[i].Customer_type.replace(/,/g, ''),
                    Action: '',
                })
            }

            var fileTitle = 'customers'; // or 'my-unique-title'

            exportCSVFile(header_data, main_data, fileTitle); // call the exportCSVFile() function to process the JSON and trigger the download
        }
        else
            alert("There is no data to export CSVFile!");
    })

    $("#export_csv_account").on('click', function () {
        if(oTable_account)
        {
            var rows = oTable_account.rows().data();
            
            var header_data = new Array();
            for (x in rows[0]) {
                x = x.replace(/,/g, '');
                header_data.push(x);
            }
            var main_data = new Array();
            for(var i=0; i<rows.length; i++) {
                main_data.push({
                    No: rows[i].No.replace(/,/g, ''),
                    User_name: rows[i].User_name.replace(/,/g, ''),
                    Full_name: rows[i].Full_name.replace(/,/g, ''),
                    Email: rows[i].Email.replace(/,/g, ''),
                    Password: "unkown",
                    PHone: rows[i].Phone.replace(/,/g, ''),
                    Country: rows[i].Country.replace(/,/g, ''),
                    Customer_type: rows[i].Customer_type.replace(/,/g, ''),
                    Action: '',
                })
            }

            var fileTitle = 'Accounts'; // or 'my-unique-title'

            exportCSVFile(header_data, main_data, fileTitle); // call the exportCSVFile() function to process the JSON and trigger the download
        }
        else
            alert("There is no data to export CSVFile!");
    })
});

function onPasswordBtnClick(user_id){
    $('#user_id_pwd').val(user_id);
    $('#change_password_modal').modal();
    
}

(function(window, document, $) {
	'use strict';
    // for active tab arrow
    $('.nav-tabs .nav-item').click(function () {
    $(this).addClass('current').siblings().removeClass('current');
    });
    // add current class to parent of active class
    if ($('.nav-tabs .nav-item' ).length > 0) {
    $('.nav-tabs .nav-item').find('.active').parent().addClass("current");
    }
    // add class pill-cotainer with pill componet for styling
    if($('.nav.nav-pills').length > 0){
    $('.nav-pills').addClass('pill-container');
    }
    // Basic Select2 select
	$(".select2").select2({
    // the following code is used to disable x-scrollbar when click in select input and
    // take 100% width in responsive also
    dropdownAutoWidth: true,
    width: '100%'
  });

  $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();

})(window, document, jQuery);

function account_del(val){
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
            url: '../del_account',
            method: 'get',
            data: {
                account_id:val,
            },
            success: function(data){
                if(data == "Success!")
                {
                    Swal.fire({
                        type: "success",
                        title: 'Deleted!',
                        text: 'Your file has been deleted.',
                        confirmButtonClass: 'btn btn-success',
                    }).then(function (result){
                        if(result.value){
                            var url = '../crm';
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

function exportCSVFile(headers, items, fileTitle) {
    if (headers) {
        items.unshift(headers);
    }

    // Convert Object to JSON
    var jsonObject = JSON.stringify(items);

    var csv = convertToCSV(jsonObject);

    var exportedFilenmae = fileTitle + '.csv' || 'export.csv';

    var blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
    if (navigator.msSaveBlob) { // IE 10+
        navigator.msSaveBlob(blob, exportedFilenmae);
    } else {
        var link = document.createElement("a");
        if (link.download !== undefined) { // feature detection
            // Browsers that support HTML5 download attribute
            var url = URL.createObjectURL(blob);
            link.setAttribute("href", url);
            link.setAttribute("download", exportedFilenmae);
            link.style.visibility = 'hidden';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    }
}

function convertToCSV(objArray) {
    var array = typeof objArray != 'object' ? JSON.parse(objArray) : objArray;
    var str = '';

    for (var i = 0; i < array.length; i++) {
        var line = '';
        for (var index in array[i]) {
            if (line != '') line += ','

            line += array[i][index];
        }

        str += line + '\r\n';
    }

    return str;
}

