<form id="homecontactform" class="form-horizontal contat-form">
    <div class="form-group">
        <div class="col-sm-6">
            <input type="text" class="form-control form-full-width" name="name" placeholder="Full Name">
        </div>
        <div class="col-sm-6 mb-xs-20">
            <input type="text" minlength="10" class="form-control form-full-width" name="mobile" placeholder="Mobile Number">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <input type="email" class="form-control form-full-width" name="email" placeholder="Email">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <button type="submit" name="submit" class="btn button-style raise">Join Waiting List</button>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <div class="alert alert-success alert-dismissible fade in" role="alert" id="info" style="display : none;"> <strong>Success !</strong> Your message has been successfully send. </div>
        </div>
    </div>
</form>

<script>
        $(document).ready(function() {
            $('#info').hide();
            $("#homecontactform").validate({
                // Specify validation rules
                rules: {
                    // The key name on the left side is the name attribute
                    // of an input field. Validation rules are defined
                    // on the right side
                    name: "required",
                    mobile: "required",
                    email: {
                        required: true,
                        email: true,
                    }
                },
                // Make sure the form is submitted to the destination defined
                // in the "action" attribute of the form when valid
                submitHandler: function(form) {
                    var formData = new FormData(form);
                    $.ajax({
                        type: "POST",
                        url: 'ajax/contact-enquiry.php',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            if (data == '1') {
                                alert("Message not sent. Please retry")

                            } else {
                                // $(".submsg").show().html("<p>Message not sent. Please retry.</p>").fadeOut(5000);

                                $('#homecontactform')[0].reset();
                                $("#info").show().fadeOut(5000);
                            }
                        },
                    });
                }
            });
        });
    </script>