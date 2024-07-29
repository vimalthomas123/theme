<?php 
add_action( 'wp_ajax_filter_postscontact', 'filter_postscontact' );
add_action( 'wp_ajax_nopriv_filter_postscontact', 'filter_postscontact' );

function filter_postscontact() {
    $category = $_POST['category'];
      $args = array(
            'post_type' => 'contacts',
            'posts_per_page' => -1,
            'tax_query' => array(
                  array( 
                        'taxonomy' => 'location',
                        'field' => 'slug',
                        'terms' => $category,
                  ),
            ),
      );
    $query = new WP_Query( $args );
//     var_dump($query);
    if ( $query->have_posts() ) :
        while ( $query->have_posts() ) : 
            $query->the_post();
            $title = get_the_title();
            ?>
          <div class="col-12 col-md-6 col-lg-4">
          <address>
            <h4><?php echo $title; ?>
            </h4>
           <p><?php echo the_content(); ?></p>
          </address>
        </div>
                  <?php endwhile;
                        else :
                              echo '<h2>No search results found!</h2>';
                wp_reset_postdata();  
            endif;
        
            die();
        }
?>