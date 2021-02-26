$(document).ready(function(){
    // $("#num_days").hide();
    // $("#number_rooms").hide();
    if(typeof(custom_enquiry) != 'undefined')
    {
        var duration = $('#duration').val();
        var start_date_str = duration.slice(0,10);
        var end_date_str = duration.slice(13);

        var start_date_split = start_date_str.split('/');
        var end_date_split = end_date_str.split('/');

        var start_date = new Date(start_date_split[2], start_date_split[0] - 1, start_date_split[1]);
        var end_date = new Date(end_date_split[2], end_date_split[0] - 1, end_date_split[1]);

        var days = Math.round((end_date-start_date)/(1000*60*60*24));
        days ++;
        $("#num_days").text('Total days: ' + days + ' days');

        var total_num = parseInt($('#adults_num').val()) + parseInt($('#children_num').val());
        $('#traveler_total').text("Total travelers: " + total_num);

        var number_rooms = parseInt($('#single_room').val()) + parseInt($('#double_room').val()) + parseInt($('#twin_room').val()) + parseInt($('#triple_room').val()) + parseInt($('#family_room').val());
        $('#number_rooms').text("Number of rooms: " + number_rooms);
        $('#number_rooms').show();
    }
});
(function(window, document, $) {
    'use strict';

    $('.single-daterange').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format('YYYY'),10)
      }, function(start, end, label) {
        var years = moment().diff(start, 'years');
        alert("You are " + years + " years old!");
    });


    $('.showdropdowns').daterangepicker({
        showDropdowns: true,
        drops: "up"
    });

    $(".touchspin").TouchSpin({
        buttondown_class: "btn btn-primary",
        buttonup_class: "btn btn-primary",
    });

    $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
})(window, document, jQuery);

$("#duration").change(function(){
    var duration = $('#duration').val();
    var start_date_str = duration.slice(0,10);
    var end_date_str = duration.slice(13);

    var start_date_split = start_date_str.split('/');
    var end_date_split = end_date_str.split('/');

    var start_date = new Date(start_date_split[2], start_date_split[0] - 1, start_date_split[1]);
    var end_date = new Date(end_date_split[2], end_date_split[0] - 1, end_date_split[1]);

    var days = Math.round((end_date-start_date)/(1000*60*60*24));
    days ++;
    $("#num_days").text('Total days: ' + days + ' days');
    $("#num_days").show();
});

$('#adults_num').change(function(){
    var total_num = parseInt($('#adults_num').val()) + parseInt($('#children_num').val());
    $('#traveler_total').text("Total travelers: " + total_num);
});

$('#children_num').change(function(){
    var total_num = parseInt($('#adults_num').val()) + parseInt($('#children_num').val());
    $('#traveler_total').text("Total travelers: " + total_num);
});

$('#single_room').change(function(){
    var number_rooms = parseInt($('#single_room').val()) + parseInt($('#double_room').val()) + parseInt($('#twin_room').val()) + parseInt($('#triple_room').val()) + parseInt($('#family_room').val());
    $('#number_rooms').text("Number of rooms: " + number_rooms);
    $('#number_rooms').show();
});

$('#double_room').change(function(){
    var number_rooms = parseInt($('#single_room').val()) + parseInt($('#double_room').val()) + parseInt($('#twin_room').val()) + parseInt($('#triple_room').val()) + parseInt($('#family_room').val());
    $('#number_rooms').text("Number of rooms: " + number_rooms);
    $('#number_rooms').show();
});

$('#twin_room').change(function(){
    var number_rooms = parseInt($('#single_room').val()) + parseInt($('#double_room').val()) + parseInt($('#twin_room').val()) + parseInt($('#triple_room').val()) + parseInt($('#family_room').val());
    $('#number_rooms').text("Number of rooms: " + number_rooms);
    $('#number_rooms').show();
});

$('#triple_room').change(function(){
    var number_rooms = parseInt($('#single_room').val()) + parseInt($('#double_room').val()) + parseInt($('#twin_room').val()) + parseInt($('#triple_room').val()) + parseInt($('#family_room').val());
    $('#number_rooms').text("Number of rooms: " + number_rooms);
    $('#number_rooms').show();
});

$('#family_room').change(function(){
    var number_rooms = parseInt($('#single_room').val()) + parseInt($('#double_room').val()) + parseInt($('#twin_room').val()) + parseInt($('#triple_room').val()) + parseInt($('#family_room').val());
    $('#number_rooms').text("Number of rooms: " + number_rooms);
    $('#number_rooms').show();
});

$('#is_assigned').change(function(){
    if(this.checked){
        $('#assigned_user').prop('disabled', false);
    }
    else $('#assigned_user').prop('disabled', 'disabled');
});

$('.add_customer_btn').click(function(){
  var customer_modal = $('#customer_modal');
  customer_modal.modal()
});
$('#customer_add_save').click(function(){
  var customer_add_form = $('#customer_add_form');
  var form_url = customer_add_form.attr('action');
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
      url: form_url,
      method: 'post',
      dataType: 'json',
      data: customer_add_form.serialize(),
      success: function(data) {
          if (data.result == "success") {
            toastr.success('Successfully Saved', 'Success', { "closeButton": true });

            $('#customer_modal').modal('hide');

          } else {
            toastr.warning('please check the form!', 'Warning', { "closeButton": true });

          }
      },
      error: function(error) {
        toastr.error(error, 'Error', { "closeButton": true });

      }
  });


});
