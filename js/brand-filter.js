jQuery(document).ready(function($) {
      $('#category-filter').change(function() {
          var category = $(this).val();
          $.ajax({
              url: ajaxurl,
              type: 'post',
              data: {
                  action: 'filter_posts',
                  category: category
              },
              success: function(response) {
                  $('#datafetch').html(response);
              }
          });
      });
  });
  