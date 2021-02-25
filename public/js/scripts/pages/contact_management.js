$(document).ready(function () {
  $(".current").find(".step-icon").addClass("bx bx-time-five");
  $(".current").find(".fonticon-wrap .livicon-evo").updateLiviconEvo({
    strokeColor: '#5A8DEE'
  });
  CKEDITOR.replace("note1");


});
function confirm_check(id)
{
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Confirm!',
    confirmButtonClass: 'btn btn-primary',
    cancelButtonClass: 'btn btn-danger ml-1',
    buttonsStyling: false,
  }).then(function (result) {
    if (result.value) {
        $.ajax({
            url: base_url + '/save_status',
            type: 'post',
            data: {
                _token: $("[name='_token']").val(),
                confirm_id: id
            },
            success: function(response) {
                if(response == 'success') {
                    location.reload();
                }
            }
        })
    }
  })
}
