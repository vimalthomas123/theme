jQuery(document).ready(function($) {
    $('#inquiry_typ').change(function() {
        var category = $(this).val();
        console.log(ajaxurl);
        $.ajax({
            url: ajaxurl,
            type: 'post',
            data: {
                action: 'filter_postscontact',
                category: category
            },
            success: function(response) {
                $('#filtered-posts').html(response);
            }
        });
    });
});