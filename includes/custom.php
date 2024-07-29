<?php 
add_action('wp_head', 'site_ajaxurl');

function site_ajaxurl() {

   echo '<script type="text/javascript">

           var ajaxurl = "' . admin_url('admin-ajax.php') . '";

         </script>';
}

function enduring(){
$ev__bg = get_field('enduring_values_banner_background_color','option');
$ev__title = get_field('enduring_values_banner_title','option');
$ev__desc = get_field('enduring_values_banner_description','option');
$ev__cta = get_field('enduring_values_banner_cta','option');
?>
<section class="enduring__values" style="--bg-color:<?php echo $ev__bg; ?> ">
    <div class="container">
        <h2 class="title__secondary text-center">

            <?php echo $ev__title; ?>

        </h2>
        <h5 class="sub__title text-center">

            <?php echo $ev__desc; ?>

        </h5>
        <?php
        if ($ev__cta) :
            $link_url = $ev__cta['url'];
            $link_title = $ev__cta['title'];
            $link_target = $ev__cta['target'] ? $ev__cta['target'] : '_self';
        ?>
            <a class="cta__primary mx-auto" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?> <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">

                    <path d="M10.586 5.657L6.636 1.707C6.45384 1.51839 6.35305 1.26579 6.35533 1.00359C6.3576 0.741397 6.46277 0.490585 6.64818 0.305177C6.83359 0.119768 7.0844 0.0145995 7.3466 0.0123211C7.6088 0.0100427 7.8614 0.110837 8.05 0.292995L13.707 5.95C13.8002 6.04265 13.8741 6.15281 13.9246 6.27414C13.9751 6.39548 14.001 6.52559 14.001 6.657C14.001 6.7884 13.9751 6.91852 13.9246 7.03985C13.8741 7.16118 13.8002 7.27134 13.707 7.364L8.05 13.021C7.95775 13.1165 7.84741 13.1927 7.7254 13.2451C7.6034 13.2975 7.47218 13.3251 7.3394 13.3262C7.20662 13.3274 7.07494 13.3021 6.95205 13.2518C6.82915 13.2015 6.7175 13.1273 6.62361 13.0334C6.52971 12.9395 6.45546 12.8278 6.40518 12.7049C6.3549 12.5821 6.3296 12.4504 6.33075 12.3176C6.3319 12.1848 6.35949 12.0536 6.4119 11.9316C6.46431 11.8096 6.54049 11.6992 6.636 11.607L10.586 7.657H1C0.734784 7.657 0.48043 7.55164 0.292893 7.3641C0.105357 7.17657 0 6.92221 0 6.657C0 6.39178 0.105357 6.13742 0.292893 5.94989C0.48043 5.76235 0.734784 5.657 1 5.657H10.586Z" fill="white" />
                </svg></a>
        <?php endif; ?>

    </div>
</section>
<?php
}

function my_logged_in_redirect() { 
    if( have_rows('redirection_urls', 'options') ):
        while( have_rows('redirection_urls', 'options') ) : the_row();
            $source_url = get_sub_field('source_url');
            $source_id 	= url_to_postid( $source_url );
            $target_url = get_sub_field('target_url');
            $target_id 	= url_to_postid( $target_url );
            if ( is_page( $source_id ) ) {
                wp_redirect( get_permalink( $target_id ) );
                die;
            }
        endwhile;
    endif;    
}
add_action( 'template_redirect', 'my_logged_in_redirect' );
?>