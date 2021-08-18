jQuery(document).ready(function ($) {

    //Get prioject data from post type - Project
    $('.filter').on('click', function(e){
        e.preventDefault();
        get_response('get_all_projects', $(this).data('slug'))
    });

});

//Contact Form 7 conditional field function 
function always_show($atts) {
    return true;
}

//Get Ajax response
function get_response(action, values) {
    $.ajax({
        url: ajax_obj.ajax_url,
        method: 'POST',
        data: {
            action: action,
            value: values
        },

        success: (res) => console.log(res)
    });
}