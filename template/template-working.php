<?php
/* Template Name: Working Jobs page */
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
  <?php if(get_field('choose_iffco_show_hide') == true): ?>
  <section class="vision__banner" style="--bg-color: <?php the_field('choose_iffco_color'); ?>">
    <div class="container">
      <div class="featured__image">
        <img src="<?php the_field('choose_iffco_image'); ?>" alt="">
      </div>
      <div class="vision__banner__content">
        <h2><?php the_field('choose_iffco_title'); ?></h2>
        <p><?php the_field('choose_iffco_description'); ?></p><!--
                 <!-   <a href="#" class="cta__primary ">More about our vision and values</a

      > -->
      </div>
    </div>
  </section>
<?php endif; ?>

 <section class="core__values__grid__section pt_80">
    <div class="container">
      <div class="core__values__grid">
            <?php if( have_rows('grid') ):
            while( have_rows('grid') ) : the_row();
        ?>
        <div class="core__values__grid__item" style="--card-color: <?php echo the_sub_field('section_color'); ?>">
          <div class="core__values__grid__item__icon">
            <img src="<?php echo the_sub_field('section_image'); ?>" alt="">
          </div><!-- <h4>People</h4> -->
          <h5><?php echo the_sub_field('section_title'); ?></h5>
        </div>
       <?php endwhile; endif;?>
    
      </div>
    </div>
  </section>

   <section class="enduring__values" style="--bg-color: <?php the_field('content_color'); ?>">
    <div class="container">
      <h2 class="title__secondary text-center text-white"><?php the_field('connect_title'); ?></h2>
      <h5 class="sub__title text-center text-white"><?php the_field('connect_description'); ?></h5>
       <?php 
                    $content_link = get_field('content_link');
                    if( $content_link ): 
                      $content_link_url = $content_link['url'];
                        $content_link_title = $content_link['title'];
                         $content_link_target = $content_link['target'] ? $content_link['target'] : '_self';
               ?>
      <a href="<?php echo esc_url( $content_link_url ); ?>" target="<?php echo esc_attr( $content_link_target ); ?>" class="cta__primary mx-auto"><?php echo esc_html( $content_link_title ); ?> <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M10.586 5.657L6.636 1.707C6.45384 1.51839 6.35305 1.26579 6.35533 1.00359C6.3576 0.741397 6.46277 0.490585 6.64818 0.305177C6.83359 0.119768 7.0844 0.0145995 7.3466 0.0123211C7.6088 0.0100427 7.8614 0.110837 8.05 0.292995L13.707 5.95C13.8002 6.04265 13.8741 6.15281 13.9246 6.27414C13.9751 6.39548 14.001 6.52559 14.001 6.657C14.001 6.7884 13.9751 6.91852 13.9246 7.03985C13.8741 7.16118 13.8002 7.27134 13.707 7.364L8.05 13.021C7.95775 13.1165 7.84741 13.1927 7.7254 13.2451C7.6034 13.2975 7.47218 13.3251 7.3394 13.3262C7.20662 13.3274 7.07494 13.3021 6.95205 13.2518C6.82915 13.2015 6.7175 13.1273 6.62361 13.0334C6.52971 12.9395 6.45546 12.8278 6.40518 12.7049C6.3549 12.5821 6.3296 12.4504 6.33075 12.3176C6.3319 12.1848 6.35949 12.0536 6.4119 11.9316C6.46431 11.8096 6.54049 11.6992 6.636 11.607L10.586 7.657H1C0.734784 7.657 0.48043 7.55164 0.292893 7.3641C0.105357 7.17657 0 6.92221 0 6.657C0 6.39178 0.105357 6.13742 0.292893 5.94989C0.48043 5.76235 0.734784 5.657 1 5.657H10.586Z" fill="white" />
        </svg>
      </a>
      <?php  endif; ?>
    </div>
  </section>
    <section class="mena__employer__grid">
    <div class="row">
        <?php if( have_rows('mena_employer') ):
            while( have_rows('mena_employer') ) : the_row();
        ?>
      <div class="col-12 col-md-6 col-lg-4">
        <div class="mena__employer__grid__card">
          <div class="mena__employer__grid__card__iconwrap">
            <img src="<?php echo the_sub_field('mena_employer_icon'); ?>" alt="">
          </div>
          <h5><?php echo the_sub_field('mena_employer_title'); ?></h5>
        </div>
      </div>
         <?php endwhile; endif; ?>
    </div>
  </section>

   <section class="enduring__values" style="--bg-color: <?php the_field('testimonial_color'); ?>">
    <div class="container">
      <h2 class="title__secondary text-center text-white mb-0"><?php the_field('testimonials_title'); ?></h2>
    </div>
  </section>

   <section class="employee__testimonials">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6 col-xl-5">
          <div class="employee__image__slider">
                <?php if( have_rows('testimonial_repeater') ):
            while( have_rows('testimonial_repeater') ) : the_row();
        ?>
            <div class="employee__image__slide">
              <img src="<?php echo the_sub_field('testi_image'); ?>" alt="">
            </div>
           <?php endwhile; endif; ?>
            
          </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-7">
          <div class="employee__testimony_slider">
              <?php 
              if( have_rows('testimonial_repeater') ):
            while( have_rows('testimonial_repeater') ) : the_row();
        ?>
            <div class="employee__testimony_slide">
              <h3 class="title__secondary"><?php echo the_sub_field('testi_title'); ?>
              </h3>
              <?php echo the_sub_field('testi_description'); ?>
            </div>
           
            <?php endwhile; endif; ?>
          </div>
          <div class="employee__testimonial__slider__control">
            <button class="cta__primary btn__ctrl__prev">
              <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.414 5.65643L7.364 1.70643C7.54616 1.51783 7.64695 1.26523 7.64467 1.00303C7.6424 0.740833 7.53723 0.49002 7.35182 0.304612C7.16641 0.119204 6.9156 0.014035 6.6534 0.0117566C6.3912 0.00947813 6.1386 0.110273 5.95 0.292431L0.293 5.94943C0.199815 6.04208 0.125866 6.15224 0.0754042 6.27358C0.0249424 6.39491 -0.00103474 6.52502 -0.00103474 6.65643C-0.00103474 6.78784 0.0249424 6.91795 0.0754042 7.03928C0.125866 7.16062 0.199815 7.27078 0.293 7.36343L5.95 13.0204C6.04225 13.1159 6.15259 13.1921 6.2746 13.2445C6.3966 13.2969 6.52782 13.3245 6.6606 13.3257C6.79338 13.3268 6.92506 13.3015 7.04795 13.2513C7.17085 13.201 7.2825 13.1267 7.37639 13.0328C7.47029 12.9389 7.54454 12.8273 7.59482 12.7044C7.6451 12.5815 7.6704 12.4498 7.66925 12.317C7.6681 12.1842 7.64051 12.053 7.5881 11.931C7.53569 11.809 7.45951 11.6987 7.364 11.6064L3.414 7.65643H13C13.2652 7.65643 13.5196 7.55107 13.7071 7.36354C13.8946 7.176 14 6.92165 14 6.65643C14 6.39121 13.8946 6.13686 13.7071 5.94932C13.5196 5.76179 13.2652 5.65643 13 5.65643H3.414Z" fill="white" />
              </svg>
            </button>
            <button class="cta__primary btn__ctrl__next">
              <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.586 5.65643L6.636 1.70643C6.45384 1.51783 6.35305 1.26523 6.35533 1.00303C6.3576 0.740833 6.46277 0.49002 6.64818 0.304612C6.83359 0.119204 7.0844 0.014035 7.3466 0.0117566C7.6088 0.00947813 7.8614 0.110273 8.05 0.292431L13.707 5.94943C13.8002 6.04208 13.8741 6.15224 13.9246 6.27358C13.9751 6.39491 14.001 6.52502 14.001 6.65643C14.001 6.78784 13.9751 6.91795 13.9246 7.03928C13.8741 7.16062 13.8002 7.27078 13.707 7.36343L8.05 13.0204C7.95775 13.1159 7.84741 13.1921 7.7254 13.2445C7.6034 13.2969 7.47218 13.3245 7.3394 13.3257C7.20662 13.3268 7.07494 13.3015 6.95205 13.2513C6.82915 13.201 6.7175 13.1267 6.62361 13.0328C6.52971 12.9389 6.45546 12.8273 6.40518 12.7044C6.3549 12.5815 6.3296 12.4498 6.33075 12.317C6.3319 12.1842 6.35949 12.053 6.4119 11.931C6.46431 11.809 6.54049 11.6987 6.636 11.6064L10.586 7.65643H1C0.734784 7.65643 0.48043 7.55107 0.292893 7.36354C0.105357 7.176 0 6.92165 0 6.65643C0 6.39121 0.105357 6.13686 0.292893 5.94932C0.48043 5.76179 0.734784 5.65643 1 5.65643H10.586Z" fill="white" />
              </svg>
            </button>
          </div>
        </div>
        <?php 
                    $testimonial_link = get_field('testimonial_link');
                    if( $testimonial_link ): 
                      $testimonial_link_url = $testimonial_link['url'];
                        $testimonial_link_title = $testimonial_link['title'];
                         $testimonial_link_target = $testimonial_link['target'] ? $testimonial_link['target'] : '_self';
                endif; ?>
        <div class="col-12 apply__btn">
          <a href="<?php echo esc_url( $testimonial_link_url ); ?>" class="cta__primary" target="<?php echo esc_attr( $testimonial_link_target ); ?>"><?php echo esc_html( $testimonial_link_title ); ?> <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M10.586 5.657L6.636 1.707C6.45384 1.51839 6.35305 1.26579 6.35533 1.00359C6.3576 0.741397 6.46277 0.490585 6.64818 0.305177C6.83359 0.119768 7.0844 0.0145995 7.3466 0.0123211C7.6088 0.0100427 7.8614 0.110837 8.05 0.292995L13.707 5.95C13.8002 6.04265 13.8741 6.15281 13.9246 6.27414C13.9751 6.39548 14.001 6.52559 14.001 6.657C14.001 6.7884 13.9751 6.91852 13.9246 7.03985C13.8741 7.16118 13.8002 7.27134 13.707 7.364L8.05 13.021C7.95775 13.1165 7.84741 13.1927 7.7254 13.2451C7.6034 13.2975 7.47218 13.3251 7.3394 13.3262C7.20662 13.3274 7.07494 13.3021 6.95205 13.2518C6.82915 13.2015 6.7175 13.1273 6.62361 13.0334C6.52971 12.9395 6.45546 12.8278 6.40518 12.7049C6.3549 12.5821 6.3296 12.4504 6.33075 12.3176C6.3319 12.1848 6.35949 12.0536 6.4119 11.9316C6.46431 11.8096 6.54049 11.6992 6.636 11.607L10.586 7.657H1C0.734784 7.657 0.48043 7.55164 0.292893 7.3641C0.105357 7.17657 0 6.92221 0 6.657C0 6.39178 0.105357 6.13742 0.292893 5.94989C0.48043 5.76235 0.734784 5.657 1 5.657H10.586Z" fill="white" />
            </svg>
          </a>
        </div>
      </div>
    </div>
  </section>

  <?php
if( get_field('hide_&_show') ) {
    enduring();
}
?>

<?php get_footer(); ?>