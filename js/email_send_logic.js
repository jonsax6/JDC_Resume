(function($) {

    $("#submit_email").on('submit', function(event) {
        event.preventDefault();
        var user_name = $("#sc_contact_form_username").val();
        var email = $("#sc_contact_form_email").val();
        var message = $("#sc_contact_form_message").val();

        if (user_name == '') {
            toastr.error('Error', "User Name is Empty");
        } else if (email == '') {
            toastr.error('Error', "Email Address is Empty");
        } else if (message == '') {
            toastr.error('Error', "Message is Empty");
        } else {



            $.ajax({
                url: "include/sendmail.php",
                method: "POST",
                data: {
                    name: user_name,
                    email: email,
                    message: message,
                    action: 'send_email'
                },
                beforeSend: function() {
                    console.log('sending...');
                },
                success: function(data) {

                    json = jQuery.parseJSON(data);
                    if (json['message']) {
                        toastr.optionsOverride = 'positionclass:toast-bottom-full-width';
                        toastr.success('Success', json['message']);

                        $("#sc_contact_form_username").val('');

                        $("#sc_contact_form_email").val('');
                        $("#sc_contact_form_message").val('');



                    } else {
                        toastr.error('Error', json['error']);
                    }
                }
            });
        }


    });
})(jQuery);
