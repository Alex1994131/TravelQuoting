
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

$(document).ready(function () {

    $('.select2-selection__rendered').css('margin-left', '26px');
    $('.select2-selection__rendered').css('color', '#475F7B');
    $('.select2-selection__rendered').css('font-weight', 400);

    if(typeof(customer) != 'undefined'){
        if(customer.account_type == 2){
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
    }

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

