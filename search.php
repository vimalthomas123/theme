<?php get_header(); ?>
<div class="container">
      <?php 
            $s = get_search_query();
            $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
            $args = array(
                  'paged' => $paged,
                  'posts_per_page'  => 5,
                  's'               => $s,
                  'post_type'       => array('page', 'news', 'brands'),
            );
            $query = new WP_Query( $args );
            $total_results = $query->found_posts;
            if ( $query->have_posts() ) :
                  while ( $query->have_posts() ) :
                        $query->the_post();
                        $link = get_permalink();
                        $title = get_the_title();
      ?>
                        <h3><?php echo $total_results;?> Results Found</h3>
                        <h5>
                              <a href="<?php echo $link; ?>"><?php echo $title; ?></a>
                        </h5>
      <?php 
                  endwhile;
            endif;
      ?>
</div>

<?php get_footer(); ?>