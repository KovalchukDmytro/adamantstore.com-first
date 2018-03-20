$("#contact_form_id").on("submit", function () {
     var data = {
         'first_name' : $('#contact_form_id')[0].elements[0].value,
         'last_name' : $('#contact_form_id')[0].elements[1].value,
         'country' : $('#contact_form_id')[0].elements[2].value,
         'email' : $('#contact_form_id')[0].elements[3].value,
         'message' : $('#contact_form_id')[0].elements[4].value
     };
    console.log(data);
    $.ajax({
        type: 'get',
        url: '/site/callback/',
        data: data,
    }).done(function() {
        console.log('success');
        modal_ok();
        $('#contact_form_id')[0].elements[0].value='';
        $('#contact_form_id')[0].elements[1].value='';
        $('#contact_form_id')[0].elements[2].value='';
        $('#contact_form_id')[0].elements[3].value='';
        $('#contact_form_id')[0].elements[4].value='';
        $('.trigger_demo2').html('');
    }).fail(function() {
        console.log('fail');
    });
    return false;
});

function modal_ok() {
    $('#myModal_ok').modal("show");
}