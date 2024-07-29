 
<?php
/* Template Name: Contact page */
/* Template Post Type: page */
?>
<?php get_header(); ?>


 <div class="bread__crumbs_outer">
    <div class="container">
        <?php echo tsh_wp_custom_breadcrumbs();?>
    </div>
  </div>

 <section class="hero__banner <?php
                                $banner__bg__color = get_field("banner_background_color");
                                $banner__title = get_field("banner_title");
                                $banner__subtitle = get_field("banner_subtitle");
                                $banner__subtitle_bold = get_field("banner_subtitle_bold");
                                $banner__image__type = get_field("banner_content_type_image");
                                $banner__image = get_field("banner_content_image");
                                $banner__image__url = $banner__image ? esc_url($banner__image['url']) : null;
                                $banner__background__image = get_field("banner_background_image");
                                $banner__background__image__url = esc_url($banner__background__image['url']);

                                $static__banner = get_field('banner_background_static_image');
                                $inverted__banner = get_field('banner_inverted');
                                $with__image = get_field('banner_content_type_image');
                                $sustainability__banner = get_field('banner_for_sustainability_page');
                                $traceability__banner = get_field('banner_for_traceable_score_page');

                                if ($static__banner == true) {
                                    echo ' hero__banner--static--img ';
                                }

                                if ($inverted__banner == true) {
                                    echo ' hero__banner--inverted ';
                                }
                                if ($with__image == true) {
                                    echo ' hero__banner--with--image ';
                                }
                                if ($sustainability__banner == true) {
                                    echo ' hero__banner--sustainability ';
                                }
                                if ($traceability__banner == true) {
                                    echo ' hero__banner--traceable--score ';
                                }
                                ?>
                                " style="--bg-color: <?php echo $banner__bg__color; ?>;">

    <?php if ($traceability__banner == true) : ?>
        <span class="float__element"></span>
    <?php endif; ?>


    <div class="container">
        <div class="hero__banner__content">


            <?php if ($banner__image && $banner__image__type == true) : ?>
                <img src="<?php echo $banner__image__url; ?>" alt="<?php if ($banner__image) {
                                                                        echo esc_attr($banner__image['alt']);
                                                                    } ?>" />
            <?php endif; ?>
            <?php if ($banner__title) : ?>
                <h1>
                    <?php echo $banner__title; ?>
                </h1>
            <?php endif; ?>

            <?php if ($banner__subtitle) : ?>
                <p>
                    <?php if ($banner__subtitle_bold == true) {
                        echo "<strong>";
                    } ?>
                    <?php echo $banner__subtitle; ?>
                    <?php if ($banner__subtitle_bold == true) {
                        echo "</strong>";
                    } ?>
                </p>
            <?php endif; ?>


            <?php if (have_rows('banner_cta_row')) : ?>
                <div class="hero__banner__content__btn__wrap">
                    <?php while (have_rows('banner_cta_row')) : the_row();
                        $cta = get_sub_field('cta');
                        $link_url = $cta['url'];
                        $link_title = $cta['title'];
                        $link_target = $cta['target'] ? $cta['target'] : '_self';
                    ?>
                        <a class="cta__primary cta__primary--light" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?> <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">

                                <path d="M10.586 5.657L6.636 1.707C6.45384 1.51839 6.35305 1.26579 6.35533 1.00359C6.3576 0.741397 6.46277 0.490585 6.64818 0.305177C6.83359 0.119768 7.0844 0.0145995 7.3466 0.0123211C7.6088 0.0100427 7.8614 0.110837 8.05 0.292995L13.707 5.95C13.8002 6.04265 13.8741 6.15281 13.9246 6.27414C13.9751 6.39548 14.001 6.52559 14.001 6.657C14.001 6.7884 13.9751 6.91852 13.9246 7.03985C13.8741 7.16118 13.8002 7.27134 13.707 7.364L8.05 13.021C7.95775 13.1165 7.84741 13.1927 7.7254 13.2451C7.6034 13.2975 7.47218 13.3251 7.3394 13.3262C7.20662 13.3274 7.07494 13.3021 6.95205 13.2518C6.82915 13.2015 6.7175 13.1273 6.62361 13.0334C6.52971 12.9395 6.45546 12.8278 6.40518 12.7049C6.3549 12.5821 6.3296 12.4504 6.33075 12.3176C6.3319 12.1848 6.35949 12.0536 6.4119 11.9316C6.46431 11.8096 6.54049 11.6992 6.636 11.607L10.586 7.657H1C0.734784 7.657 0.48043 7.55164 0.292893 7.3641C0.105357 7.17657 0 6.92221 0 6.657C0 6.39178 0.105357 6.13742 0.292893 5.94989C0.48043 5.76235 0.734784 5.657 1 5.657H10.586Z" fill="white" />
                            </svg></a>

                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
    <?php if ($banner__image) { ?>
    <img src="<?php echo esc_url($banner__background__image['url']); ?>" alt="<?php if ($banner__background__image) {
                                                                                    echo esc_attr($banner__background__image['alt']);
                                                                                } ?>" />
   <?php }?>


    <?php if (have_rows('banner_flexi_cards')) : ?>
        <div class="overlay__grid__wrap">
            <?php while (have_rows('banner_flexi_cards')) : the_row();
                $card__background__image = get_sub_field('card_background_image');
                $card__background__color = get_sub_field('card_background_color');
                $card__type = get_sub_field('card_type');
                $card__carousel = get_sub_field('card_carousel');
                $card__title = get_sub_field('title');
                $card__subtitle = get_sub_field('subtitle');
                $card__subtitle__color__white = get_sub_field('subtitle_color_white');
                $card__counter = get_sub_field('card_counter');
                $card__title__postfix = get_sub_field('card_title_postfix');
                $card__singleicon = get_sub_field('single_icon');
                $card__diagonal__line = get_sub_field('diagonal_line');
                $card__diagonal__line__type = get_sub_field('diagonal_line_type');
                $card__diagonal__line__color = get_sub_field('diagonal_line_color');
                $card__empty__bg = get_sub_field('empty_placeholder');
                $card__empty__bg__color = get_sub_field('empty_placeholder_color');
                $card__icon__align = get_sub_field('card_icon_align');
            ?>
                <div class="overlay__grid__wrap__item <?php
                                                        if ($card__empty__bg == true) {
                                                            echo ' overlay__grid__wrap__item--empty--card3 ';
                                                        }

                                                        if ($card__diagonal__line == true && $card__diagonal__line__type == true) {
                                                            echo ' overlay__grid__wrap__item--lines ';
                                                        } else if ($card__diagonal__line == true && $card__diagonal__line__type == false) {
                                                            echo ' overlay__grid__wrap__item--lines2 ';
                                                        }
                                                        ?>
                                                     
                                                        " style="--card-bg: <?php echo $card__background__color;
                                                                            ?>;--line-color:<?php echo $card__diagonal__line__color ?>;
                                                                            --empty-color:<?php echo $card__empty__bg__color ?>
                                                                            
                                                        ">
                    <?php if ($card__background__image) : ?>
                        <img src="<?php echo esc_url($card__background__image['url']); ?>" alt="<?php if ($card__background__image) {
                                                                                                    echo esc_attr($card__background__image['alt']);
                                                                                                } ?>" class="overlay__grid__wrap__item__bg" />
                    <?php endif; ?>

                    <div class="overlay__grid__wrap__item__header">
                        <?php if ($card__type == true) : ?>
                            <?php if ($card__title) : ?>
                                <h3>
                                    <?php
                                    if ($card__counter == true) :
                                    ?>
                                        <span class="counters" data-number="<?php echo $card__title; ?>">
                                        <?php endif; ?>
                                        <?php echo $card__title; ?>
                                        <?php if ($card__counter == true) : ?>
                                        </span>
                                    <?php endif; ?>
                                    <?php echo $card__title__postfix; ?>
                                </h3>
                            <?php endif; ?>

                            <?php if ($card__subtitle) : ?>
                                <h5 class="<?php if ($card__subtitle__color__white == true) {
                                                echo 'text-white';
                                            } ?>"><?php echo $card__subtitle; ?></h5>
                            <?php endif; ?>
                        <?php else : ?>



                            <?php if (have_rows('card_carousel')) : ?>
                                <div class="custom__hero__carousel">
                                    <?php $card__carousel__index = 1;
                                    while (have_rows('card_carousel')) : the_row();
                                        $card__title = get_sub_field('title');
                                        $card__title__postfix = get_sub_field('title_postfix');
                                        $card__subtitle = get_sub_field('subtitle');
                                        $card__icon = get_sub_field('icon');
                                    ?>
                                        <div class="custom__hero__carousel__item  <?php if ($card__carousel__index != 1) {
                                                                                        echo 'hidden';
                                                                                    } ?>">
                                            <?php if ($card__title) : ?>
                                                <h3>
                                                    <?php if ($card__counter == true) : ?>
                                                        <span class="counters" data-number="<?php echo $card__title; ?>">
                                                        <?php endif; ?>
                                                        <?php echo $card__title; ?>
                                                        <?php if ($card__counter == true) : ?>
                                                        </span>
                                                    <?php endif; ?>
                                                    <?php echo $card__title__postfix; ?>
                                                </h3>
                                            <?php endif; ?>
                                            <?php if ($card__subtitle) : ?>
                                                <h5 class="<?php if ($card__subtitle__color__white == true) {
                                                                echo 'text-white';
                                                            } ?>"><?php echo $card__subtitle; ?></h5>
                                            <?php endif; ?>
                                        </div>
                                    <?php $card__carousel__index++;
                                    endwhile; ?>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                    </div>

                    <div class="overlay__grid__wrap__item__footer__icon <?php if ($card__icon__align == true) {
                                                                            echo ' ms-auto ';
                                                                        } ?>">
                        <?php if ($card__type == true && $card__singleicon) : ?>
                            <img src="<?php echo esc_url($card__singleicon['url']); ?>" alt="<?php if ($card__singleicon) {
                                                                                                    echo esc_attr($card__singleicon['alt']);
                                                                                                } ?>" />
                        <?php else : ?>

                            <?php if (have_rows('card_carousel')) : ?>
                                <div class="overlay__grid__wrap__item__footer__icon__carousel">
                                    <?php $card__icon__carousel__index = 1;
                                    while (have_rows('card_carousel')) : the_row();
                                        $cardicon = get_sub_field('icon');
                                    ?>
                                        <div class="overlay__grid__wrap__item__footer__icon__carousel__item <?php if ($card__icon__carousel__index != 1) {
                                                                                                                echo 'hidden';
                                                                                                            } ?> ">
                                            <img src="<?php echo esc_url($cardicon['url']); ?>" alt="<?php echo esc_attr($cardicon['alt']); ?>" />
                                        </div>
                                    <?php $card__icon__carousel__index++;
                                    endwhile; ?>
                                </div>
                            <?php endif; ?>


                        <?php endif; ?>

                    </div>

                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>

</section>


<section class="contact__form">
    <div class="container">
      <div class="contact__form__wrap">
        <?php echo do_shortcode('[contact-form-7 id="cc454ce" title="Contact Us"]');?>
      </div>
    </div>
  </section>
  <section class="enduring__values" style="--bg-color: #149cbf">
    <div class="container">
      <h2 class="title__secondary text-center text-white">Useful contact details</h2>
      <div class="flexible__selectbox">
        <select name="hl" id="inquiry_typ"><!-- <option value="" disabled selected>Select an option</option> -->
        	<?php $terms = get_terms('location'); 

        	foreach($terms as $term) { ?>
          <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
      <?php } ?>
        </select>
        <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M7.07102 5.31388L12.021 0.363882C12.1133 0.268372 12.2236 0.19219 12.3456 0.139781C12.4676 0.0873716 12.5988 0.0597853 12.7316 0.0586315C12.8644 0.0574777 12.9961 0.0827794 13.119 0.13306C13.2419 0.183341 13.3535 0.257594 13.4474 0.351487C13.5413 0.44538 13.6156 0.557032 13.6658 0.679928C13.7161 0.802824 13.7414 0.934504 13.7403 1.06728C13.7391 1.20006 13.7115 1.33128 13.6591 1.45329C13.6067 1.57529 13.5305 1.68564 13.435 1.77788L7.77802 7.43488C7.59049 7.62235 7.33619 7.72767 7.07102 7.72767C6.80586 7.72767 6.55155 7.62235 6.36402 7.43488L0.707022 1.77788C0.611511 1.68564 0.535329 1.57529 0.48292 1.45329C0.430511 1.33128 0.402925 1.20006 0.401771 1.06728C0.400617 0.934504 0.425919 0.802824 0.4762 0.679928C0.526481 0.557032 0.600734 0.44538 0.694627 0.351487C0.788519 0.257594 0.900171 0.183341 1.02307 0.13306C1.14596 0.0827794 1.27764 0.0574777 1.41042 0.0586315C1.5432 0.0597853 1.67442 0.0873716 1.79643 0.139781C1.91843 0.19219 2.02877 0.268372 2.12102 0.363882L7.07102 5.31388Z" fill="#697077" />
        </svg>
      </div>
    </div>
  </section>
  <section class="office__addresses">
    <div class="container">
      <div class="row" id="filtered-posts">
      	<?php 
      	 $args = array(
        'post_type' => 'contacts',
        'posts_per_page' => -1, // Adjust as needed
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC'
       
    );
      	 $query = new WP_Query($args);
 if ($query->have_posts()) {
      $count = 5;
        while ($query->have_posts()) {
            $query->the_post();

      	?>
        <div class="col-12 col-md-6 col-lg-4">
          <address>
            <h4><?php the_title(); ?>
            </h4>
           <p><?php the_content(); ?></p>
          </address>
        </div>
    <?php } }
    wp_reset_postdata();
    ?>
      </div>
    </div>
  </section>
  
  <?php
if( get_field('hide_&_show') ) {
    enduring();
}
?>


  <?php get_footer(); ?>