$ = jQuery;

$.validator.addMethod("valueNotEquals", function(value, element, arg){
    return arg !== value;
   }, "Value must not equal arg.");

$(document).ready(function(){
    $("#move_size_id").select2();

    $("#phone").inputmask({
        mask: "(999) 999-9999",
        placeholder: ' ',
        showMaskOnHover: false,
    });

    $("#source_zip").inputmask({
        mask: "9{1,10}",
        placeholder: ' ',
        showMaskOnHover: false,
    });
    $("#destination_zip").inputmask({
        mask: "9{1,10}",
        placeholder: ' ',
        showMaskOnHover: false,
    });

    $('#date_of_move').datepicker({
        autoclose: true
    });

    var form = $("#free-quote-form");

    form.validate({
        rules: {
            move_size_id: { valueNotEquals: "default" }
        },
        messages: {
            move_size_id: { valueNotEquals: "Select size of move!" },
            first_name: "Enter your name",
            last_name: "Enter your last name",
            source_zip: "Enter starting ZIP code",
            destination_zip: "Enter destination ZIP code",
            email: "Enter a valid email",
            phone: "Enter your phone number",
            date_of_move: "Enter moving date"
        } ,
        errorPlacement: function(error, element) {
            error.appendTo( element.parent() );
        }

    });

    form.on('submit', function(e){
        e.preventDefault();
        $('.invalid-feedback').html('').hide();
        if(!form.valid())
            return

        $.post("https://api.mod24.com/api/v1/quotes", form.serialize(), {})
            .done(function(){
                location.href = form.attr("quote-redirect");
            })
            .fail(function(exception){
                var errors_obj = exception.responseJSON;
                var errors = errors_obj.error;

                $.each(errors, function (key, value) {
                    $('.invalid-feedback[for="'+key+'"]').html(value).show();
                });

                $("#alert-bubble p").html(error_message).show();
            })
    })
})
