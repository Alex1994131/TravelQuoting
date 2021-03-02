const main_componentForm = {
    main_postal_code: "short_name",
    main_region_state: "short_name",
    main_country: "long_name",
    main_city: "long_name",
    main_street_number: "short_name",
    main_street_address: "long_name",
};

const billing_componentForm = {
    billing_postal_code: "short_name",
    billing_region_state: "short_name",
    billing_country: "long_name",
    billing_city: "long_name",
    billing_street_number: "short_name",
    billing_street_address: "long_name",
};

function initAutocomplete() {

    main_autocomplete = new google.maps.places.Autocomplete(
        document.getElementById("main_location"),
        {types: ["geocode"]}
    );

    billing_autocomplete = new google.maps.places.Autocomplete(
        document.getElementById("billing_location"),
        {types: ["geocode"]}
    );

    main_autocomplete.setFields(["address_component", "geometry"]);
    main_autocomplete.addListener("place_changed", main_fillInAddress);

    billing_autocomplete.setFields(["address_component", "geometry"]);
    billing_autocomplete.addListener("place_changed", billing_fillInAddress);
}

function main_fillInAddress() {
    const place = main_autocomplete.getPlace();

    for (const component in main_componentForm) {
        document.getElementById(component).value = "";
    }

    for (const component of place.address_components) {
        const addressType = component.types[0];

        var  obj_id = ""
        if(addressType == "postal_code") {
            obj_id = "main_postal_code";
        }
        else if(addressType == "administrative_area_level_1") {
            obj_id = "main_region_state";
        }
        else if(addressType == "country") {
            obj_id = "main_country";
        }
        else if(addressType == "locality") {
            obj_id = "main_city";
        }
        else if(addressType == "street_number") {
            obj_id = "main_street_number";
        }
        else if(addressType == "route") {
            obj_id = "main_street_address";
        }
        else {
            obj_id = "";
        }
        
        if (main_componentForm[obj_id]) {
            const val = component[main_componentForm[obj_id]];
            
            document.getElementById(obj_id).value = val;
        }
    }
}

function billing_fillInAddress() {
    const place = billing_autocomplete.getPlace();

    for (const component in billing_componentForm) {
        document.getElementById(component).value = "";
    }

    for (const component of place.address_components) {
        const addressType = component.types[0];

        var  obj_id = ""
        if(addressType == "postal_code") {
            obj_id = "billing_postal_code";
        }
        else if(addressType == "administrative_area_level_1") {
            obj_id = "billing_region_state";
        }
        else if(addressType == "country") {
            obj_id = "billing_country";
        }
        else if(addressType == "locality") {
            obj_id = "billing_city";
        }
        else if(addressType == "street_number") {
            obj_id = "billing_street_number";
        }
        else if(addressType == "route") {
            obj_id = "billing_street_address";
        }
        else {
            obj_id = "";
        }

        if (billing_componentForm[obj_id]) {
            const val = component[billing_componentForm[obj_id]];
            document.getElementById(obj_id).value = val;
        }
    }
}

$(document).ready(function(){
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
    
    $(document).on("change", "#account_type", function () {
        if($('#account_type').val() == 1)
        {
            $('#billing_location').prop("disabled", true);
            $('#billing_postal_code').prop("disabled", true);
            $('#billing_street_number').prop("disabled", true);
            $('#billing_street_address').prop("disabled", true);
            $('#billing_city').prop("disabled", true);
            $('#billing_region_state').prop("disabled", true);
            $('#billing_country').prop("disabled", true);
            $('#billing_office_phone').prop("disabled", true);
            $('#billing_email').prop("disabled", true);
        }
        else if($('#account_type').val() == 2)
        {
            $('#billing_location').prop("disabled", false);
            $('#billing_postal_code').prop("disabled", false);
            $('#billing_street_number').prop("disabled", false);
            $('#billing_street_address').prop("disabled", false);
            $('#billing_city').prop("disabled", false);
            $('#billing_region_state').prop("disabled", false);
            $('#billing_country').prop("disabled", false);
            $('#billing_office_phone').prop("disabled", false);
            $('#billing_email').prop("disabled", false);
        }
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
});
