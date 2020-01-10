var offer_id = 0;
var offer_body_elem = null

$('a[href$="#edit-offer"]').on( "click", function(event) {
    event.preventDefault();

    original_offer_body = event.target.dataset['offer_body'];
    offer_id = event.target.dataset['offer_id'];

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

// INTEREST
$('.interest_button').on('click', function(event) {
    offer_id = event.target.dataset['offer_id'];
    $.ajax({
        method: 'POST',
        url: urlInterestUpdate,
        data: {offer_id: offer_id, _token: token}
    })
        .done (function (answer) {
            if (answer['to_add_interest'] == 1) {
                mark_as_interested(event.target);
            } else if (answer['to_add_interest'] == -1) {
                remove_interest(event.target);
            }
            else{
                return;
            }

            if (answer['num_of_interested'] == 1) {
                $grammar = " person is interested"
            } else {
                $grammar = " people are interested"
            }
            $updated_num_interested_str = answer['num_of_interested'].toString().concat($grammar);
            document.getElementById(answer['offer_id']).innerHTML = $updated_num_interested_str;
        });
});

$('.saved_button').on('click', function(event) {
    offer_id = event.target.dataset['offer_id'];
    user_id = event.target.dataset['user_id'];
    $.ajax({
        method: 'POST',
        url: urlSavedUpdate,
        data: {offer_id: offer_id, user_id: user_id, _token: token}
    })
        .done (function (answer) {
            if (answer['to_mark'] == 1) {
                mark_as_saved(event.target);
            } else if (answer['to_mark'] == -1) {
                remove_saved(event.target);
            }
            else{ return;}
        });
});

if($("#load_dashboard").length > 0) {       ///CHANGE
    $(document).ready(function () {
        load_interested();
        load_saved();
    });
}

function load_interested(){

    $interest_buttons_arr = document.getElementsByClassName("interest_button");
    user_id = parseInt($interest_buttons_arr[0].dataset['user_id']);
    $.ajax({
        method: 'POST',
        url: urlInterestLoad,
        data: {user_id: user_id, _token: token}
    })
        .done (function (answer) {
            $interests_arr = answer['interests_arr'];
            //console.log("interests_arr: ", $interests_arr);
            for (var i = 0; i < $interest_buttons_arr.length; i++) {
                $button_offer_id = parseInt($interest_buttons_arr[i].dataset['offer_id']);
                if ($interests_arr[$button_offer_id] == true) {
                    mark_as_interested($interest_buttons_arr[i]);
                }
            }
        })
}

function load_saved(){
    $saved_button = document.getElementsByClassName("saved_button");
    user_id = parseInt($saved_button[0].dataset['user_id']);
    $.ajax({
        method: 'POST',
        url: urlSavedLoad,
        data: {user_id: user_id, _token: token}
    })
        .done (function (answer) {
            $saved_arr = answer['arr_saved'];
            for (var i = 0; i < $saved_button.length; i++) {
                $button_offer_id = parseInt($saved_button[i].dataset['offer_id']);
                if ($saved_arr[$button_offer_id] == true) {
                    mark_as_saved($saved_button[i]);
                }
            }
        })
}

function mark_as_saved(element) {
    element.classList.add('button_selected');
    element.innerText = "Saved";
}

function remove_saved(element) {
    element.classList.remove('button_selected');
    element.innerText = "Save";
}

function mark_as_interested(element) {
    element.classList.add('button_selected');
    element.innerText = "Shown Interest";
}

function remove_interest(element) {
    element.classList.remove('button_selected');
    element.innerText = "Show Interest";
}


//articles have a class 'offer', which have a class 'interaction',
// which have 5 <a> tags, from which we select the 3rd child by using eq(2),
//numbered from 0,
//on ('name_of_the_event', function_to_execute_at_the_event)


