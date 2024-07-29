<?php 
/* Template Name: Brands page */ 
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

  <?php if ($banner__image) : ?>
                <img src="<?php echo $banner__image__url; ?>" class="banner__mobile__pdt__image" alt="<?php if ($banner__image) {
                                                                        echo esc_attr($banner__image['alt']);
                                                                    } ?>" />
            <?php endif; ?>
    <div class="container">
        <div class="hero__banner__content">


          
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
    <img src="<?php echo esc_url($banner__background__image['url']); ?>" alt="<?php if ($banner__background__image) {
                                                                                    echo esc_attr($banner__background__image['alt']);
                                                                                } ?>" />



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

<section class="brands__you__trust">
      <div class="container">
            <?php
                  $title = get_field('title');
                  $sub_description = get_field('sub_description');
            ?>
            <?php if($title): echo'<h2 class="title__primary text-center">'.$title.'</h2>'; endif;?>
            <?php if($sub_description): echo'<h5 class="sub__title text-center">'.$sub_description.'</h5>'; endif;?>
            <div class="brands__filter__form">
                  <div class="filter__by__name" action="/" method="get" autocomplete="off">
                        <input type="text" placeholder="Search by product name" name="s" id="keyword" onkeyup="mukto_search_fetch()">
                  </div>
                  <?php 
                        $categories = get_terms('brands-category');
                  ?>
                  <div class="filter__by__category" id="category-filter-form">
                        <select name="brand__categry" id="category-filter">
                              <option value="" selected="selected" disabled="disabled">By category</option>
                              <?php foreach ( $categories as $category ) : ?>
                                    <option value="<?php echo $category->slug; ?>"><?php echo $category->name; ?></option>
                              <?php endforeach; ?>
                              
                        </select>
                  </div>
                  <!-- <button class="cta__primary" type="button">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M10.586 5.65643L6.636 1.70643C6.45384 1.51783 6.35305 1.26523 6.35533 1.00303C6.3576 0.740833 6.46277 0.49002 6.64818 0.304612C6.83359 0.119204 7.0844 0.014035 7.3466 0.0117566C7.6088 0.00947813 7.8614 0.110273 8.05 0.292431L13.707 5.94943C13.8002 6.04208 13.8741 6.15224 13.9246 6.27358C13.9751 6.39491 14.001 6.52502 14.001 6.65643C14.001 6.78784 13.9751 6.91795 13.9246 7.03928C13.8741 7.16062 13.8002 7.27078 13.707 7.36343L8.05 13.0204C7.95775 13.1159 7.84741 13.1921 7.7254 13.2445C7.6034 13.2969 7.47218 13.3245 7.3394 13.3257C7.20662 13.3268 7.07494 13.3015 6.95205 13.2513C6.82915 13.201 6.7175 13.1267 6.62361 13.0328C6.52971 12.9389 6.45546 12.8273 6.40518 12.7044C6.3549 12.5815 6.3296 12.4498 6.33075 12.317C6.3319 12.1842 6.35949 12.053 6.4119 11.931C6.46431 11.809 6.54049 11.6987 6.636 11.6064L10.586 7.65643H1C0.734784 7.65643 0.48043 7.55107 0.292893 7.36354C0.105357 7.176 0 6.92165 0 6.65643C0 6.39121 0.105357 6.13686 0.292893 5.94932C0.48043 5.76179 0.734784 5.65643 1 5.65643H10.586Z" fill="white" />
                        </svg>
                  </button> -->
            </div>
            <div class="row brands__grid__row" id="datafetch">
                  <?php
                        $args = array(
                              'post_type' => 'brands',
                              'post_status' => 'publish',
                              'posts_per_page' => -1,
                              'orderby' => 'date',
                              'order' => 'DESC'
                        );
                        $query = new WP_Query( $args );
                        if ( $query->have_posts() ) {
                              while ( $query->have_posts() ) {
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
                  <?php
                              }
                        }
                        wp_reset_postdata()
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