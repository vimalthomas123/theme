<?php 
/*
 ==================
 Ajax Search
======================	 
*/
// add the ajax fetch js
add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() {
?>
<script type="text/javascript">
function mukto_search_fetch(){

    jQuery.ajax({
        url: '<?php echo admin_url('admin-ajax.php'); ?>',
        type: 'post',
        data: { action: 'data_fetch', keyword: jQuery('#keyword').val() },
        success: function(data) {
            jQuery('#datafetch').html( data );
        }
    });

}
</script>

<?php
      } 
      add_action('wp_ajax_data_fetch' , 'data_fetch');
      add_action('wp_ajax_nopriv_data_fetch','data_fetch');

      function data_fetch(){

            $the_query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => array('brands') ) );
            if( $the_query->have_posts() ) :
                echo '<div class="row brands__grid__row" id="datafetch">';
                while( $the_query->have_posts() ): 
                  $the_query->the_post();
                  $title = get_the_title();
                  $link = get_permalink();
                  $listing_page_image = get_field('listing_page_image', $the_query->ID);
                  $listing_page_description = get_field('listing_page_description', $the_query->ID);
                  ?>
        
                  <div class="col-12 col-md-6 col-xl-4">
                        <a href="<?php echo $link;?>" class="brands__card">
                              <?php if($listing_page_image): echo'<img src="'.$listing_page_image['url'].'" alt="'.$title.'">'; endif;?>
                              <div class="brands__card__content">
                                    <?php if($title): echo'<h4>'.$title.'</h4>'; endif;?>
                                    <?php if($listing_page_description): echo'<p>'.$listing_page_description.'</p>'; endif;?>
                              </div>
                        </a>
                  </div>
        
                <?php endwhile;
                        else :
                              echo '<h2>No search results found!</h2>';
               echo '</div>';
                wp_reset_postdata();  
            endif;
        
            die();
        }
?>