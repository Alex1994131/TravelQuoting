
$(".wizard-horizontal").steps({
    headerTag: "h6",
    bodyTag: "fieldset",
    transitionEffect: "fade",
    titleTemplate: '<span class="step">#index#</span> #title#',
    labels: {
      finish: 'Submit'
    },
    onFinished: function (event, currentIndex) {
      alert("Form submitted.");
    }
  });
  //        vertical Wizard       //
  // ------------------------------
  $(".wizard-vertical").steps({
    headerTag: "h3",
    bodyTag: "fieldset",
    transitionEffect: "fade",
    enableAllSteps: true,
    stepsOrientation: "vertical",
    labels: {
      finish: 'Submit'
    },
    onFinished: function (event, currentIndex) {
      alert("Form submitted.");
    }
});

$(".actions [href='#next']").click(function () {
    $(".done").find(".step-icon").removeClass("bx bx-time-five").addClass("bx bx-check-circle");
    $(".current").find(".step-icon").removeClass("bx bx-check-circle").addClass("bx bx-time-five");
    // live icon color change on next button's on click
    $(".current").find(".fonticon-wrap .livicon-evo").updateLiviconEvo({
      strokeColor: '#5A8DEE'
    });
    $(".current").prev("li").find(".fonticon-wrap .livicon-evo").updateLiviconEvo({
      strokeColor: '#39DA8A'
    });
});
$(".actions [href='#previous']").click(function () {
    // live icon color change on next button's on click
    $(".current").find(".fonticon-wrap .livicon-evo").updateLiviconEvo({
      strokeColor: '#5A8DEE'
    });
    $(".current").next("li").find(".fonticon-wrap .livicon-evo").updateLiviconEvo({
      strokeColor: '#adb5bd'
    });
});
  // if click on  submit   button icon change
$(".actions [href='#finish']").click(function () {
    $(".done").find(".step-icon").removeClass("bx-time-five").addClass("bx bx-check-circle");
    $(".last.current.done").find(".fonticon-wrap .livicon-evo").updateLiviconEvo({
      strokeColor: '#39DA8A'
    });
});
  // add primary btn class
$('.actions a[role="menuitem"]').addClass("btn btn-primary");
$('.icon-tab [role="menuitem"]').addClass("glow ");
$('.wizard-vertical [role="menuitem"]').removeClass("btn-primary").addClass("btn-light-primary");


$("#duration").change(function () {
    var duration = $('#duration').val();
    var start_date_str = duration.slice(0,10);
    var end_date_str = duration.slice(13);

    var start_date_split = start_date_str.split('/');
    var end_date_split = end_date_str.split('/');

    var start_date = new Date(start_date_split[2], start_date_split[0] - 1, start_date_split[1]);
    var end_date = new Date(end_date_split[2], end_date_split[0] - 1, end_date_split[1]);

    var days = Math.round((end_date-start_date)/(1000*60*60*24));
    days ++;
    $('#days_list').empty();
    var str = "";
    for(var i = 0; i < days; i ++)
    {

        var year = start_date.getFullYear();
        var month = start_date.getMonth() + 1;
        var day = start_date.getDate();
        if(i == 0)
            str += "<li class='days-list-each' id='list_"+ i +"' active>" + year + '/' + month + '/' + day + "</li>";
        else
            str += "<li class='days-list-each' id='list_"+ i +"'>" + year + '/' + month + '/' + day + "</li>";
        str += "hr";
        start_date.setDate(start_date.getDate() + 1);
    }
    $('#days_list').append(str);
});

$(document).ready(function () {
    $(".current").find(".step-icon").addClass("bx bx-time-five");
    $(".current").find(".fonticon-wrap .livicon-evo").updateLiviconEvo({
      strokeColor: '#5A8DEE'
    });
    CKEDITOR.replace("note");
    CKEDITOR.replace("note1");
});

(function(window, document, $) {
    'use strict';

    $('.showdropdowns').daterangepicker({
        //autoUpdateInput: false,
        locale: {
          cancelLabel: 'Clear'
        }
    });

    $(".touchspin").TouchSpin({
        buttondown_class: "btn btn-primary",
        buttonup_class: "btn btn-primary",
    });

    $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();

})(window, document, jQuery);


/** basic_info submit to save_basic_info route (itinerary_basic_info button) */
$("#itinerary_basic_form").submit(function(e) {

  e.preventDefault(); // avoid to execute the actual submit of the form.

  var form = $(this);
  var url = form.attr('action');
  // var it_id = $('#itinerary_id').val();

  var form_data = new FormData(document.getElementById("itinerary_basic_form"));


  var note_value = CKEDITOR.instances.note1.getData();
  form_data.append('note', note_value);

  console.log(form_data);
  $.ajax({
         type: "POST",
         url: url,
         dataType: "JSON",
         contentType: false,
         processData: false,
         enctype: 'multipart/form-data',
         data: form_data, // serializes the form's elements.
         success: function(data)
         {
             // show response from the php script.
             $('#itinerary_id').val(data);
             url = "/itinerary_add_info/" + data + "/" + "1";
             window.location.href = url;
             //location.reload();
         }
       });
});

// $('#itinerary_basic_info').click(

//   function(e){
//     e.preventDefault();

//     var data = [];
//     data['enquiry_id'] = $('#enquiry_id').val();
//     data['itinerary_id'] = $('#itinerary_id').val();
//     data['title'] = $('#title').val();
//     data['duration'] = $('#duration').val();
//     data['adults_num'] = $('#adults_num').val();
//     data['children_num'] = $('#children_num').val();
//     data['single_room'] = $('#single_room').val();
//     data['double_room'] = $('#double_room').val();
//     data['twin_room'] = $('#twin_room').val();
//     data['triple_room'] = $('#triple_room').val();
//     data['family_room'] = $('#family_room').val();
//     data['note'] = $('#note').val();
//     console.log(data);
//     $.ajax({
//         url: '/save_basic_info',
//         method: 'post',
//         dataType: 'json',
//         data: {
//             _token: $("[name='_token']").val(),
//             basic_info: $('#my-form').serialize(),
//         },
//         success: function(data){
//           if(data.result == 'success') {
//             console.log(data);
//             //location.reload();
//           }
//           console.log(data);
//         }
//     });
//   }
// );
