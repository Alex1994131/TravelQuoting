
$(document).ready(function () {
    if(typeof(msg) != "undefined")
    {
        if(msg == "customer add success")
            toastr.success('Customer created successfully!', 'Success', { "closeButton": true });
        else if(msg == "customer update success")
            toastr.success('Customer updated successfully!', 'Success', { "closeButton": true });
        else if(msg == "account add success")
            toastr.success('Account created successfully!', 'Success', { "closeButton": true });
        else if(msg == "account update success")
            toastr.success('Account updated successfully!', 'Success', { "closeButton": true });
        else if(msg == "change password success")
            toastr.success('Password Changed successfully!', 'Success', { "closeButton": true });
        else if(msg == "profile update success")
            toastr.success('Your profile updated successfully!', 'Success', { "closeButton": true });
        else if(msg == "enquiry created")
            toastr.success('Enquiry created successfully!', 'Success', { "closeButton": true });
        else if(msg == "enquiry updated")
            toastr.success('Enquiry updated successfully!', 'Success', { "closeButton": true });
        else if(msg == "profile update success")
            toastr.success('Your profile updated successfully!', 'Success', { "closeButton": true });
        else if(msg == "change user password success")
            toastr.success('Your password updated successfully!', 'Success', { "closeButton": true });
        else if(msg == "Itinerary Created Successfully")
            toastr.success('Itinerary Created Successfully!', 'Success', { "closeButton": true });
        else if(msg == "Not Completed Itinerary. Please complete it first!")
            toastr.error('Not Completed Itinerary. Please complete it first!', 'Error', { "closeButton": true });
        else if(msg == "Already Sent Itinerary!")
            toastr.warning('Already Sent Itinerary!', 'Warning', { "closeButton": true });
    }
})