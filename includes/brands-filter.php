<?php 
add_action( 'wp_ajax_filter_posts', 'filter_posts' );
add_action( 'wp_ajax_nopriv_filter_posts', 'filter_posts' );

function filter_posts() {
    $category = $_POST['category'];
      $args = array(
            'post_type' => 'brands',
            'posts_per_page' => -1,
            'tax_query' => array(
                  array( 
                        'taxonomy' => 'brands-category',
                        'field' => 'slug',
                        'terms' => $category,
                  ),
            ),
      );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) :
      echo '<div class="row brands__grid__row" id="datafetch">';
        while ( $query->have_posts() ) : 
            $query->the_post();
            $title = get_the_title();
            $link = get_permalink();
            $listing_page_image = get_field('listing_page_image', $query->ID);
            $listing_page_description = get_field('listing_page_description', $query->ID);
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