<?php
/* Template Name: Home page */
/* Template Post Type: page */
?>
<?php get_header(); ?>
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

<section class="our__brands__showcase">
    <div class="container">
        <h2 class="title__primary text-center"><?php the_field("brands_title"); ?></h2>



        <?php
        $brands__slider = get_field('brands_slider');
        if ($brands__slider) : ?>
            <div class="our__brands__showcase__slider">
                <?php foreach ($brands__slider as $post) :

                    // Setup this post for WP functions (variable must be named $post).
                    setup_postdata($post);
                    $logo = get_field('listing_page_image');
                ?>
                    <div class="brand__slide">
                       <a href="<?php echo the_permalink();?>"> <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" /></a>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php
            // Reset the global post object so that the rest of the page works correctly.
            wp_reset_postdata(); ?>
        <?php endif; ?>

        <h4 class="sub__title text-center">

            <strong>

                <?php the_field("brands_subtitle"); ?>

            </strong>

        </h4>

        <?php
        $brandsCTA = get_field('brands_cta');
        if ($brandsCTA) :
            $link_url = $brandsCTA['url'];
            $link_title = $brandsCTA['title'];
            $link_target = $brandsCTA['target'] ? $brandsCTA['target'] : '_self';
        ?>
            <a class="cta__primary mx-auto" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?> <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">

                    <path d="M10.586 5.657L6.636 1.707C6.45384 1.51839 6.35305 1.26579 6.35533 1.00359C6.3576 0.741397 6.46277 0.490585 6.64818 0.305177C6.83359 0.119768 7.0844 0.0145995 7.3466 0.0123211C7.6088 0.0100427 7.8614 0.110837 8.05 0.292995L13.707 5.95C13.8002 6.04265 13.8741 6.15281 13.9246 6.27414C13.9751 6.39548 14.001 6.52559 14.001 6.657C14.001 6.7884 13.9751 6.91852 13.9246 7.03985C13.8741 7.16118 13.8002 7.27134 13.707 7.364L8.05 13.021C7.95775 13.1165 7.84741 13.1927 7.7254 13.2451C7.6034 13.2975 7.47218 13.3251 7.3394 13.3262C7.20662 13.3274 7.07494 13.3021 6.95205 13.2518C6.82915 13.2015 6.7175 13.1273 6.62361 13.0334C6.52971 12.9395 6.45546 12.8278 6.40518 12.7049C6.3549 12.5821 6.3296 12.4504 6.33075 12.3176C6.3319 12.1848 6.35949 12.0536 6.4119 11.9316C6.46431 11.8096 6.54049 11.6992 6.636 11.607L10.586 7.657H1C0.734784 7.657 0.48043 7.55164 0.292893 7.3641C0.105357 7.17657 0 6.92221 0 6.657C0 6.39178 0.105357 6.13742 0.292893 5.94989C0.48043 5.76235 0.734784 5.657 1 5.657H10.586Z" fill="white" />

                </svg></a>
        <?php endif; ?>
    </div>
</section>

<section class="news_and_events">
    <div class="container">
        <h2 class="title__primary text-center"><?php the_field("news_title"); ?></h2>


        <?php
        $featured_news = get_field('news_list');
        if ($featured_news) : ?>
            <div class="row news_and_events__row">
                <?php foreach ($featured_news as $post) :

                    // Setup this post for WP functions (variable must be named $post).
                    setup_postdata($post);
                    // $newstitle = get_title();
                    // $newsexcerpt = get_excerpt();
                    $newslistimage = get_field("listing_image");
                    $listing_details = get_field('listing_details');
                ?>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                        <a href="<?php the_permalink(); ?>" class="news__and__events__card">

                            <img src="<?php echo esc_url($newslistimage['url']); ?>" alt="<?php echo esc_attr($newslistimage['alt']); ?>" />

                            <div class="news__and__events__card__body">

                                <h4>

                                    <?php the_title(); ?>

                                </h4>

                                <p>

                                    <?php echo $listing_details; ?>


                                </p>

                            </div>

                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php
            // Reset the global post object so that the rest of the page works correctly.
            wp_reset_postdata(); ?>
        <?php endif; ?>
        <?php
        $newsCTA = get_field('news_cta');
        if ($newsCTA) :
            $link_url = $newsCTA['url'];
            $link_title = $newsCTA['title'];
            $link_target = $newsCTA['target'] ? $brandsCTA['target'] : '_self';
        ?>
            <a class="cta__primary mx-auto" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?> <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">

                    <path d="M10.586 5.657L6.636 1.707C6.45384 1.51839 6.35305 1.26579 6.35533 1.00359C6.3576 0.741397 6.46277 0.490585 6.64818 0.305177C6.83359 0.119768 7.0844 0.0145995 7.3466 0.0123211C7.6088 0.0100427 7.8614 0.110837 8.05 0.292995L13.707 5.95C13.8002 6.04265 13.8741 6.15281 13.9246 6.27414C13.9751 6.39548 14.001 6.52559 14.001 6.657C14.001 6.7884 13.9751 6.91852 13.9246 7.03985C13.8741 7.16118 13.8002 7.27134 13.707 7.364L8.05 13.021C7.95775 13.1165 7.84741 13.1927 7.7254 13.2451C7.6034 13.2975 7.47218 13.3251 7.3394 13.3262C7.20662 13.3274 7.07494 13.3021 6.95205 13.2518C6.82915 13.2015 6.7175 13.1273 6.62361 13.0334C6.52971 12.9395 6.45546 12.8278 6.40518 12.7049C6.3549 12.5821 6.3296 12.4504 6.33075 12.3176C6.3319 12.1848 6.35949 12.0536 6.4119 11.9316C6.46431 11.8096 6.54049 11.6992 6.636 11.607L10.586 7.657H1C0.734784 7.657 0.48043 7.55164 0.292893 7.3641C0.105357 7.17657 0 6.92221 0 6.657C0 6.39178 0.105357 6.13742 0.292893 5.94989C0.48043 5.76235 0.734784 5.657 1 5.657H10.586Z" fill="white" />

                </svg></a>
        <?php endif; ?>
    </div>
</section>
<section class="hero__banner <?php
                                $banner__bg__color2 = get_field("banner_background_color_2");
                                $banner__title2 = get_field("banner_title_2");
                                $banner__subtitle2 = get_field("banner_subtitle_2");
                                $banner__subtitle_bold2 = get_field("banner_subtitle_bold_2");
                                $banner__image__type2 = get_field("banner_content_type_image_2");
                                $banner__image2 = get_field("banner_content_image_2");
                                $banner__image__url2 = $banner__image2 ? esc_url($banner__image2['url']) : null;
                                $banner__background__image2 = get_field("banner_background_image_2");
                                $banner__background__image__url2 = esc_url($banner__background__image2['url']);

                                $static__banner2 = get_field('banner_background_static_image_2');
                                $inverted__banner2 = get_field('banner_inverted_2');
                                $with__image2 = get_field('banner_content_type_image_2');
                                $sustainability__banner2 = get_field('banner_for_sustainability_page_2');
                                $traceability__banner2 = get_field('banner_for_traceable_score_page_2');

                                if ($static__banner2 == true) {
                                    echo ' hero__banner--static--img ';
                                }

                                if ($inverted__banner2 == true) {
                                    echo ' hero__banner--inverted ';
                                }
                                if ($with__image == true) {
                                    echo ' hero__banner--with--image ';
                                }
                                if ($sustainability__banner2 == true) {
                                    echo ' hero__banner--sustainability ';
                                }
                                if ($traceability__banner2 == true) {
                                    echo ' hero__banner--traceable--score ';
                                }
                                ?>
                                " style="--bg-color: <?php echo $banner__bg__color2; ?>;">

    <?php if ($traceability__banner2 == true) : ?>
        <span class="float__element"></span>
    <?php endif; ?>


    <div class="container">
        <div class="hero__banner__content">


            <?php if ($banner__image2 && $banner__image__type2 == true) : ?>
                <img src="<?php echo $banner__image__url2; ?>" alt="<?php if ($banner__image2) {
                                                                        echo esc_attr($banner__image2['alt']);
                                                                    } ?>" />
            <?php endif; ?>
            <?php if ($banner__title2) : ?>
                <h1>
                    <?php echo $banner__title2; ?>
                </h1>
            <?php endif; ?>

            <?php if ($banner__subtitle2) : ?>
                <p>
                    <?php if ($banner__subtitle_bold2 == true) {
                        echo "<strong>";
                    } ?>
                    <?php echo $banner__subtitle2; ?>
                    <?php if ($banner__subtitle_bold2 == true) {
                        echo "</strong>";
                    } ?>
                </p>
            <?php endif; ?>


            <?php if (have_rows('banner_cta_row_2')) : ?>
                <div class="hero__banner__content__btn__wrap">
                    <?php while (have_rows('banner_cta_row_2')) : the_row();
                        $cta2 = get_sub_field('cta');
                        $link_url = $cta2['url'];
                        $link_title = $cta2['title'];
                        $link_target = $cta2['target'] ? $cta2['target'] : '_self';
                    ?>
                        <a class="cta__primary cta__primary--light-" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?> <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">

                                <path d="M10.586 5.657L6.636 1.707C6.45384 1.51839 6.35305 1.26579 6.35533 1.00359C6.3576 0.741397 6.46277 0.490585 6.64818 0.305177C6.83359 0.119768 7.0844 0.0145995 7.3466 0.0123211C7.6088 0.0100427 7.8614 0.110837 8.05 0.292995L13.707 5.95C13.8002 6.04265 13.8741 6.15281 13.9246 6.27414C13.9751 6.39548 14.001 6.52559 14.001 6.657C14.001 6.7884 13.9751 6.91852 13.9246 7.03985C13.8741 7.16118 13.8002 7.27134 13.707 7.364L8.05 13.021C7.95775 13.1165 7.84741 13.1927 7.7254 13.2451C7.6034 13.2975 7.47218 13.3251 7.3394 13.3262C7.20662 13.3274 7.07494 13.3021 6.95205 13.2518C6.82915 13.2015 6.7175 13.1273 6.62361 13.0334C6.52971 12.9395 6.45546 12.8278 6.40518 12.7049C6.3549 12.5821 6.3296 12.4504 6.33075 12.3176C6.3319 12.1848 6.35949 12.0536 6.4119 11.9316C6.46431 11.8096 6.54049 11.6992 6.636 11.607L10.586 7.657H1C0.734784 7.657 0.48043 7.55164 0.292893 7.3641C0.105357 7.17657 0 6.92221 0 6.657C0 6.39178 0.105357 6.13742 0.292893 5.94989C0.48043 5.76235 0.734784 5.657 1 5.657H10.586Z" fill="white" />
                            </svg></a>

                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
    <img src="<?php echo esc_url($banner__background__image2['url']); ?>" alt="<?php if ($banner__background__image2) {
                                                                                    echo esc_attr($banner__background__image2['alt']);
                                                                                } ?>" />



    <?php if (have_rows('banner_flexi_cards_2')) : ?>
        <div class="overlay__grid__wrap">
            <?php while (have_rows('banner_flexi_cards_2')) : the_row();
                $card__background__image2 = get_sub_field('card_background_image_2');
                $card__background__color2 = get_sub_field('card_background_color_2');
                $card__type2 = get_sub_field('card_type_2');
                $card__carousel2 = get_sub_field('card_carousel_2');
                $card__title2 = get_sub_field('title_2');
                $card__subtitle2 = get_sub_field('subtitle_2');
                $card__subtitle__color__white2 = get_sub_field('subtitle_color_white_2');
                $card__counter2 = get_sub_field('card_counter_2');
                $card__title__postfix2 = get_sub_field('card_title_postfix_2');
                $card__singleicon2 = get_sub_field('single_icon_2');
                $card__diagonal__line2 = get_sub_field('diagonal_line_2');
                $card__diagonal__line__type2 = get_sub_field('diagonal_line_type_2');
                $card__diagonal__line__color2 = get_sub_field('diagonal_line_color_2');
                $card__empty__bg2 = get_sub_field('empty_placeholder_2');
                $card__empty__bg__color2 = get_sub_field('empty_placeholder_color_2');
                $card__icon__align2 = get_sub_field('card_icon_align_2');
            ?>
                <div class="overlay__grid__wrap__item <?php
                                                        if ($card__empty__bg2 == true) {
                                                            echo ' overlay__grid__wrap__item--empty--card3 ';
                                                        }

                                                        if ($card__diagonal__line2 == true && $card__diagonal__line__type2 == true) {
                                                            echo ' overlay__grid__wrap__item--lines ';
                                                        } else if ($card__diagonal__line2 == true && $card__diagonal__line__type2 == false) {
                                                            echo ' overlay__grid__wrap__item--lines2 ';
                                                        }
                                                        ?>
                                                     
                                                        " style="--card-bg: <?php echo $card__background__color2;
                                                                            ?>;--line-color:<?php echo $card__diagonal__line__color2 ?>;
                                                                            --empty-color:<?php echo $card__empty__bg__color2 ?>
                                                                            
                                                        ">
                    <?php if ($card__background__image2) : ?>
                        <img src="<?php echo esc_url($card__background__image2['url']); ?>" alt="<?php if ($card__background__image2) {
                                                                                                        echo esc_attr($card__background__image2['alt']);
                                                                                                    } ?>" class="overlay__grid__wrap__item__bg" />
                    <?php endif; ?>

                    <div class="overlay__grid__wrap__item__header">
                        <?php if ($card__type2 == true) : ?>
                            <?php if ($card__title2) : ?>
                                <h3>
                                    <?php
                                    if ($card__counter2 == true) :
                                    ?>
                                        <span class="counters" data-number="<?php echo $card__title2; ?>">
                                        <?php endif; ?>
                                        <?php echo $card__title2; ?>
                                        <?php if ($card__counter2 == true) : ?>
                                        </span>
                                    <?php endif; ?>
                                    <?php echo $card__title__postfix2; ?>
                                </h3>
                            <?php endif; ?>

                            <?php if ($card__subtitle2) : ?>
                                <h5 class="<?php if ($card__subtitle__color__white2 == true) {
                                                echo 'text-white';
                                            } ?>"><?php echo $card__subtitle2; ?></h5>
                            <?php endif; ?>
                        <?php else : ?>



                            <?php if (have_rows('card_carousel_2')) : ?>
                                <div class="custom__hero__carousel">
                                    <?php $card__carousel__index2 = 1;
                                    while (have_rows('card_carousel_2')) : the_row();
                                        $card__title2 = get_sub_field('title');
                                        $card__title__postfix2 = get_sub_field('title_postfix');
                                        $card__subtitle2 = get_sub_field('subtitle');
                                        $card__icon2 = get_sub_field('icon');
                                    ?>
                                        <div class="custom__hero__carousel__item  <?php if ($card__carousel__index2 != 1) {
                                                                                        echo 'hidden';
                                                                                    } ?>">
                                            <?php if ($card__title2) : ?>
                                                <h3>
                                                    <?php if ($card__counter2 == true) : ?>
                                                        <span class="counters" data-number="<?php echo $card__title2; ?>">
                                                        <?php endif; ?>
                                                        <?php echo $card__title2; ?>
                                                        <?php if ($card__counter2 == true) : ?>
                                                        </span>
                                                    <?php endif; ?>
                                                    <?php echo $card__title__postfix2; ?>
                                                </h3>
                                            <?php endif; ?>
                                            <?php if ($card__subtitle2) : ?>
                                                <h5 class="<?php if ($card__subtitle__color__white2 == true) {
                                                                echo 'text-white';
                                                            } ?>"><?php echo $card__subtitle2; ?></h5>
                                            <?php endif; ?>
                                        </div>
                                    <?php $card__carousel__index2++;
                                    endwhile; ?>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                    </div>

                    <div class="overlay__grid__wrap__item__footer__icon <?php if ($card__icon__align2 == true) {
                                                                            echo ' ms-auto ';
                                                                        } ?>">
                        <?php if ($card__type2 == true) : ?>
                            <img src="<?php echo esc_url($card__singleicon2['url']); ?>" alt="<?php if ($card__singleicon2) {
                                                                                                    echo esc_attr($card__singleicon2['alt']);
                                                                                                } ?>" />
                        <?php else : ?>

                            <?php if (have_rows('card_carousel')) : ?>
                                <div class="overlay__grid__wrap__item__footer__icon__carousel">
                                    <?php $card__icon__carousel__index2 = 1;
                                    while (have_rows('card_carousel')) : the_row();
                                        $cardicon2 = get_sub_field('icon');
                                    ?>
                                        <div class="overlay__grid__wrap__item__footer__icon__carousel__item <?php if ($card__icon__carousel__index2 != 1) {
                                                                                                                echo 'hidden';
                                                                                                            } ?> ">
                                            <img src="<?php echo esc_url($cardicon2['url']); ?>" alt="<?php echo esc_attr($cardicon2['alt']); ?>" />
                                        </div>
                                    <?php $card__icon__carousel__index2++;
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

<section class="stories__module">
    <div class="container">
        <h2 class="title__primary text-center"><?php the_field("stories_title"); ?></h2>
        <h5 class="sub__title text-center mw-75 mx-auto">
            <?php the_field("stories_subtitle"); ?>
        </h5>
        <?php
        $grid1 = get_field("stories_grid_item1");
        $grid2 = get_field("stories_grid_item_2");
        $grid3 = get_field("stories_grid_text_content");
        ?>
        <div class="stories__module__grid">
            <a class="stories__module__grid__item" data-fancybox data-type="iframe" data-src="<?php echo $grid1['video_link']; ?>" href="javascript:;">

                <h5><?php echo $grid1['title']; ?></h5>

                <img src="<?php echo esc_url($grid1['background_image']['url']); ?>" alt="<?php echo esc_attr($grid1['background_image']['alt']); ?>" />

                <svg width="123" height="123" viewBox="0 0 123 123" fill="none" xmlns="http://www.w3.org/2000/svg">

                    <path d="M61.5 0.6875C77.6285 0.6875 93.0964 7.09451 104.501 18.4991C115.905 29.9036 122.312 45.3715 122.312 61.5C122.312 77.6285 115.905 93.0964 104.501 104.501C93.0964 115.905 77.6285 122.312 61.5 122.312C45.3715 122.312 29.9036 115.905 18.4991 104.501C7.09451 93.0964 0.6875 77.6285 0.6875 61.5C0.6875 45.3715 7.09451 29.9036 18.4991 18.4991C29.9036 7.09451 45.3715 0.6875 61.5 0.6875ZM61.5 113.625C75.3244 113.625 88.5826 108.133 98.3579 98.3579C108.133 88.5826 113.625 75.3244 113.625 61.5C113.625 47.6756 108.133 34.4174 98.3579 24.6421C88.5826 14.8667 75.3244 9.375 61.5 9.375C47.6756 9.375 34.4174 14.8667 24.6421 24.6421C14.8667 34.4174 9.375 47.6756 9.375 61.5C9.375 75.3244 14.8667 88.5826 24.6421 98.3579C34.4174 108.133 47.6756 113.625 61.5 113.625ZM54.9844 80.0131L82.7583 61.5L54.9844 42.9869V80.0131ZM56.4265 33.5002L90.2904 56.079C91.1827 56.674 91.9144 57.4801 92.4205 58.4258C92.9265 59.3715 93.1913 60.4274 93.1913 61.5C93.1913 62.5726 92.9265 63.6285 92.4205 64.5742C91.9144 65.5199 91.1827 66.326 90.2904 66.921L56.4265 89.4998C55.4453 90.1539 54.3049 90.5294 53.127 90.5864C51.9491 90.6433 50.7779 90.3795 49.7381 89.8231C48.6984 89.2666 47.8292 88.4384 47.2231 87.4268C46.6171 86.4152 46.297 85.2581 46.2969 84.0788V38.9125C46.297 37.7332 46.6171 36.5761 47.2231 35.5645C47.8292 34.5529 48.6984 33.7247 49.7381 33.1683C50.7779 32.6118 51.9491 32.348 53.127 32.4049C54.3049 32.4619 55.4453 32.8374 56.4265 33.4915V33.5002Z" fill="white" />

                </svg>

            </a>
            <div class="stories__module__grid__item">
                <h2><?php echo $grid3; ?></h2>
            </div>
            <a class="stories__module__grid__item" data-fancybox data-type="iframe" data-src="<?php echo $grid2['video_link2']; ?>" href="javascript:;">

                <img src="<?php echo esc_url($grid2['background_image2']['url']); ?>" alt="<?php echo esc_attr($grid2['background_image2']['alt']); ?>" />

                <svg width="123" height="123" viewBox="0 0 123 123" fill="none" xmlns="http://www.w3.org/2000/svg">

                    <path d="M61.5 0.6875C77.6285 0.6875 93.0964 7.09451 104.501 18.4991C115.905 29.9036 122.312 45.3715 122.312 61.5C122.312 77.6285 115.905 93.0964 104.501 104.501C93.0964 115.905 77.6285 122.312 61.5 122.312C45.3715 122.312 29.9036 115.905 18.4991 104.501C7.09451 93.0964 0.6875 77.6285 0.6875 61.5C0.6875 45.3715 7.09451 29.9036 18.4991 18.4991C29.9036 7.09451 45.3715 0.6875 61.5 0.6875ZM61.5 113.625C75.3244 113.625 88.5826 108.133 98.3579 98.3579C108.133 88.5826 113.625 75.3244 113.625 61.5C113.625 47.6756 108.133 34.4174 98.3579 24.6421C88.5826 14.8667 75.3244 9.375 61.5 9.375C47.6756 9.375 34.4174 14.8667 24.6421 24.6421C14.8667 34.4174 9.375 47.6756 9.375 61.5C9.375 75.3244 14.8667 88.5826 24.6421 98.3579C34.4174 108.133 47.6756 113.625 61.5 113.625ZM54.9844 80.0131L82.7583 61.5L54.9844 42.9869V80.0131ZM56.4265 33.5002L90.2904 56.079C91.1827 56.674 91.9144 57.4801 92.4205 58.4258C92.9265 59.3715 93.1913 60.4274 93.1913 61.5C93.1913 62.5726 92.9265 63.6285 92.4205 64.5742C91.9144 65.5199 91.1827 66.326 90.2904 66.921L56.4265 89.4998C55.4453 90.1539 54.3049 90.5294 53.127 90.5864C51.9491 90.6433 50.7779 90.3795 49.7381 89.8231C48.6984 89.2666 47.8292 88.4384 47.2231 87.4268C46.6171 86.4152 46.297 85.2581 46.2969 84.0788V38.9125C46.297 37.7332 46.6171 36.5761 47.2231 35.5645C47.8292 34.5529 48.6984 33.7247 49.7381 33.1683C50.7779 32.6118 51.9491 32.348 53.127 32.4049C54.3049 32.4619 55.4453 32.8374 56.4265 33.4915V33.5002Z" fill="white" />

                </svg>

            </a>
        </div>


        <?php
        $storiesCTA = get_field('stories_cta');
        if ($storiesCTA) :
            $link_url = $storiesCTA['url'];
            $link_title = $storiesCTA['title'];
            $link_target = $storiesCTA['target'] ? $storiesCTA['target'] : '_self';
        ?>
            <a class="cta__primary mx-auto" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?> <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">

                    <path d="M10.586 5.657L6.636 1.707C6.45384 1.51839 6.35305 1.26579 6.35533 1.00359C6.3576 0.741397 6.46277 0.490585 6.64818 0.305177C6.83359 0.119768 7.0844 0.0145995 7.3466 0.0123211C7.6088 0.0100427 7.8614 0.110837 8.05 0.292995L13.707 5.95C13.8002 6.04265 13.8741 6.15281 13.9246 6.27414C13.9751 6.39548 14.001 6.52559 14.001 6.657C14.001 6.7884 13.9751 6.91852 13.9246 7.03985C13.8741 7.16118 13.8002 7.27134 13.707 7.364L8.05 13.021C7.95775 13.1165 7.84741 13.1927 7.7254 13.2451C7.6034 13.2975 7.47218 13.3251 7.3394 13.3262C7.20662 13.3274 7.07494 13.3021 6.95205 13.2518C6.82915 13.2015 6.7175 13.1273 6.62361 13.0334C6.52971 12.9395 6.45546 12.8278 6.40518 12.7049C6.3549 12.5821 6.3296 12.4504 6.33075 12.3176C6.3319 12.1848 6.35949 12.0536 6.4119 11.9316C6.46431 11.8096 6.54049 11.6992 6.636 11.607L10.586 7.657H1C0.734784 7.657 0.48043 7.55164 0.292893 7.3641C0.105357 7.17657 0 6.92221 0 6.657C0 6.39178 0.105357 6.13742 0.292893 5.94989C0.48043 5.76235 0.734784 5.657 1 5.657H10.586Z" fill="white" />
                </svg></a>
        <?php endif; ?>

    </div>
</section>





<section class="hero__banner <?php
                                $banner__bg__color3 = get_field("banner_background_color_3");
                                $banner__title3 = get_field("banner_title_3");
                                $banner__subtitle3 = get_field("banner_subtitle_3");
                                $banner__subtitle_bold3 = get_field("banner_subtitle_bold_3");
                                $banner__image__type3 = get_field("banner_content_type_image_3");
                                $banner__image3 = get_field("banner_content_image_3");
                                $banner__image__url3 = $banner__image3 ? esc_url($banner__image3['url']) : null;
                                $banner__background__image3 = get_field("banner_background_image_3");
                                $banner__background__image__url3 = esc_url($banner__background__image3['url']);

                                $static__banner3 = get_field('banner_background_static_image_3');
                                $inverted__banner3 = get_field('banner_inverted_3');
                                $with__image3 = get_field('banner_content_type_image_3');
                                $sustainability__banner3 = get_field('banner_for_sustainability_page_3');
                                $traceability__banner3 = get_field('banner_for_traceable_score_page_#');

                                if ($static__banner3 == true) {
                                    echo ' hero__banner--static--img ';
                                }

                                if ($inverted__banner3 == true) {
                                    echo ' hero__banner--inverted ';
                                }
                                if ($with__image3 == true) {
                                    echo ' hero__banner--with--image ';
                                }
                                if ($sustainability__banner3 == true) {
                                    echo ' hero__banner--sustainability ';
                                }
                                if ($traceability__banner3 == true) {
                                    echo ' hero__banner--traceable--score ';
                                }
                                ?>
                                " style="--bg-color: <?php echo $banner__bg__color3; ?>;">

    <?php if ($traceability__banner3 == true) : ?>
        <span class="float__element"></span>
    <?php endif; ?>


    <div class="container">
        <div class="hero__banner__content">


            <?php if ($banner__image3 && $banner__image__type3 == true) : ?>
                <img src="<?php echo $banner__image__url3; ?>" alt="<?php if ($banner__image3) {
                                                                        echo esc_attr($banner__image3['alt']);
                                                                    } ?>" />
            <?php endif; ?>
            <?php if ($banner__title3) : ?>
                <h1>
                    <?php echo $banner__title3; ?>
                </h1>
            <?php endif; ?>

            <?php if ($banner__subtitle3) : ?>
                <p>
                    <?php if ($banner__subtitle_bold3 == true) {
                        echo "<strong>";
                    } ?>
                    <?php echo $banner__subtitle3; ?>
                    <?php if ($banner__subtitle_bold3 == true) {
                        echo "</strong>";
                    } ?>
                </p>
            <?php endif; ?>


            <?php if (have_rows('banner_cta_row_3')) : ?>
                <div class="hero__banner__content__btn__wrap">
                    <?php while (have_rows('banner_cta_row_3')) : the_row();
                        $cta3 = get_sub_field('cta');
                        $link_url = $cta3['url'];
                        $link_title = $cta3['title'];
                        $link_target = $cta3['target'] ? $cta3['target'] : '_self';
                    ?>
                        <a class="cta__primary cta__primary--light-" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?> <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">

                                <path d="M10.586 5.657L6.636 1.707C6.45384 1.51839 6.35305 1.26579 6.35533 1.00359C6.3576 0.741397 6.46277 0.490585 6.64818 0.305177C6.83359 0.119768 7.0844 0.0145995 7.3466 0.0123211C7.6088 0.0100427 7.8614 0.110837 8.05 0.292995L13.707 5.95C13.8002 6.04265 13.8741 6.15281 13.9246 6.27414C13.9751 6.39548 14.001 6.52559 14.001 6.657C14.001 6.7884 13.9751 6.91852 13.9246 7.03985C13.8741 7.16118 13.8002 7.27134 13.707 7.364L8.05 13.021C7.95775 13.1165 7.84741 13.1927 7.7254 13.2451C7.6034 13.2975 7.47218 13.3251 7.3394 13.3262C7.20662 13.3274 7.07494 13.3021 6.95205 13.2518C6.82915 13.2015 6.7175 13.1273 6.62361 13.0334C6.52971 12.9395 6.45546 12.8278 6.40518 12.7049C6.3549 12.5821 6.3296 12.4504 6.33075 12.3176C6.3319 12.1848 6.35949 12.0536 6.4119 11.9316C6.46431 11.8096 6.54049 11.6992 6.636 11.607L10.586 7.657H1C0.734784 7.657 0.48043 7.55164 0.292893 7.3641C0.105357 7.17657 0 6.92221 0 6.657C0 6.39178 0.105357 6.13742 0.292893 5.94989C0.48043 5.76235 0.734784 5.657 1 5.657H10.586Z" fill="white" />
                            </svg></a>

                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
    <img src="<?php echo esc_url($banner__background__image3['url']); ?>" alt="<?php if ($banner__background__image3) {
                                                                                    echo esc_attr($banner__background__image3['alt']);
                                                                                } ?>" />



    <?php if (have_rows('banner_flexi_cards_3')) : ?>
        <div class="overlay__grid__wrap">
            <?php while (have_rows('banner_flexi_cards_3')) : the_row();
                $card__background__image3 = get_sub_field('card_background_image_3');
                $card__background__color3 = get_sub_field('card_background_color_3');
                $card__type3 = get_sub_field('card_type_3');
                $card__carousel3 = get_sub_field('card_carousel_3');
                $card__title3 = get_sub_field('title_3');
                $card__subtitle3 = get_sub_field('subtitle_3');
                $card__subtitle__color__white3 = get_sub_field('subtitle_color_white_3');
                $card__counter3 = get_sub_field('card_counter_3');
                $card__title__postfix3 = get_sub_field('card_title_postfix_3');
                $card__singleicon3 = get_sub_field('single_icon_3');
                $card__diagonal__line3 = get_sub_field('diagonal_line_3');
                $card__diagonal__line__type3 = get_sub_field('diagonal_line_type_3');
                $card__diagonal__line__color3 = get_sub_field('diagonal_line_color_3');
                $card__empty__bg3 = get_sub_field('empty_placeholder_3');
                $card__empty__bg__color3 = get_sub_field('empty_placeholder_color_3');
                $card__icon__align3 = get_sub_field('card_icon_align_3');
            ?>
                <div class="overlay__grid__wrap__item <?php
                                                        if ($card__empty__bg3 == true) {
                                                            echo ' overlay__grid__wrap__item--empty--card3 ';
                                                        }

                                                        if ($card__diagonal__line3 == true && $card__diagonal__line__type3 == true) {
                                                            echo ' overlay__grid__wrap__item--lines ';
                                                        } else if ($card__diagonal__line3 == true && $card__diagonal__line__type3 == false) {
                                                            echo ' overlay__grid__wrap__item--lines2 ';
                                                        }
                                                        ?>
                                                     
                                                        " style="--card-bg: <?php echo $card__background__color3;
                                                                            ?>;--line-color:<?php echo $card__diagonal__line__color3 ?>;
                                                                            --empty-color:<?php echo $card__empty__bg__color3 ?>
                                                                            
                                                        ">
                    <?php if ($card__background__image3) : ?>
                        <img src="<?php echo esc_url($card__background__image3['url']); ?>" alt="<?php if ($card__background__image3) {
                                                                                                        echo esc_attr($card__background__image3['alt']);
                                                                                                    } ?>" class="overlay__grid__wrap__item__bg" />
                    <?php endif; ?>

                    <div class="overlay__grid__wrap__item__header">
                        <?php if ($card__type3 == true) : ?>
                            <?php if ($card__title3) : ?>
                                <h3>
                                    <?php
                                    if ($card__counter3 == true) :
                                    ?>
                                        <span class="counters" data-number="<?php echo $card__title3; ?>">
                                        <?php endif; ?>
                                        <?php echo $card__title3; ?>
                                        <?php if ($card__counter3 == true) : ?>
                                        </span>
                                    <?php endif; ?>
                                    <?php echo $card__title__postfix3; ?>
                                </h3>
                            <?php endif; ?>

                            <?php if ($card__subtitle3) : ?>
                                <h5 class="<?php if ($card__subtitle__color__white3 == true) {
                                                echo 'text-white';
                                            } ?>"><?php echo $card__subtitle3; ?></h5>
                            <?php endif; ?>
                        <?php else : ?>



                            <?php if (have_rows('card_carousel_3')) : ?>
                                <div class="custom__hero__carousel">
                                    <?php $card__carousel__index3 = 1;
                                    while (have_rows('card_carousel_3')) : the_row();
                                        $card__title3 = get_sub_field('title');
                                        $card__title__postfix3 = get_sub_field('title_postfix');
                                        $card__subtitle3 = get_sub_field('subtitle');
                                        $card__icon3 = get_sub_field('icon');
                                    ?>
                                        <div class="custom__hero__carousel__item  <?php if ($card__carousel__index3 != 1) {
                                                                                        echo 'hidden';
                                                                                    } ?>">
                                            <?php if ($card__title3) : ?>
                                                <h3>
                                                    <?php if ($card__counter3 == true) : ?>
                                                        <span class="counters" data-number="<?php echo $card__title3; ?>">
                                                        <?php endif; ?>
                                                        <?php echo $card__title3; ?>
                                                        <?php if ($card__counter3 == true) : ?>
                                                        </span>
                                                    <?php endif; ?>
                                                    <?php echo $card__title__postfix3; ?>
                                                </h3>
                                            <?php endif; ?>
                                            <?php if ($card__subtitle3) : ?>
                                                <h5 class="<?php if ($card__subtitle__color__white3 == true) {
                                                                echo 'text-white';
                                                            } ?>"><?php echo $card__subtitle3; ?></h5>
                                            <?php endif; ?>
                                        </div>
                                    <?php $card__carousel__index3++;
                                    endwhile; ?>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                    </div>

                    <div class="overlay__grid__wrap__item__footer__icon <?php if ($card__icon__align3 == true) {
                                                                            echo ' ms-auto ';
                                                                        } ?>">
                        <?php if ($card__type3 == true) : ?>
                            <img src="<?php echo esc_url($card__singleicon3['url']); ?>" alt="<?php if ($card__singleicon3) {
                                                                                                    echo esc_attr($card__singleicon3['alt']);
                                                                                                } ?>" />
                        <?php else : ?>

                            <?php if (have_rows('card_carousel_3')) : ?>
                                <div class="overlay__grid__wrap__item__footer__icon__carousel">
                                    <?php $card__icon__carousel__index3 = 1;
                                    while (have_rows('card_carousel_3')) : the_row();
                                        $cardicon3 = get_sub_field('icon');
                                    ?>
                                        <div class="overlay__grid__wrap__item__footer__icon__carousel__item <?php if ($card__icon__carousel__index3 != 1) {
                                                                                                                echo 'hidden';
                                                                                                            } ?> ">
                                            <img src="<?php echo esc_url($cardicon['url']); ?>" alt="<?php echo esc_attr($cardicon3['alt']); ?>" />
                                        </div>
                                    <?php $card__icon__carousel__index3++;
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

<?php
if( get_field('hide_&_show') ) {
    enduring();
}
?>

<?php get_footer(); ?>