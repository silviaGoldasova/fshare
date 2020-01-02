var offer_id = 0;
var offer_body_elem = null

$('a[href$="#edit-offer"]').on( "click", function(event) {

    event.preventDefault();
    offer_body_elem = event.target.parentNode.parentNode.childNodes[1];
    var original_offer_body = offer_body_elem.textContent.trim();
    offer_id = event.target.parentNode.parentNode.dataset['offer_id'];    //parentNode.parentNode = article

    $('#offer-edit-body').val(original_offer_body);
    $('#edit-modal').modal('show');

 });

$('#edit-save').on('click', function() {
    $.ajax({
        method: 'POST',
        url: urlEdit,
        data: {body: $('#offer-edit-body').val(), offer_id: offer_id, _token: token}
    })
    .done (function (answer) {
        $(offer_body_elem).text(answer['updated_body']);
        $('#edit-modal').modal('hide');
    });
});

//articles have a class 'offer', which have a class 'interaction',
// which have 5 <a> tags, from which we select the 3rd child by using eq(2),
//numbered from 0,
//on ('name_of_the_event', function_to_execute_at_the_event)


