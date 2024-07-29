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
        <?php if($banner__title || $banner__subtitle || have_rows('banner_cta_row') ): ?>
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
 <?php endif; ?>
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
                                            <?php if($cardicon):?><img src="<?php echo esc_url($cardicon['url']); ?>" alt="<?php echo esc_attr($cardicon['alt']); ?>" /><?php endif;?>
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

<?php
      if( have_rows('content_section_brand_detail') ):
            while ( have_rows('content_section_brand_detail') ) : the_row();
                  if( get_row_layout() == 'text_&_image_group' ):
                        $left_content = get_sub_field('left_content');
                        $right_side_image_img = get_sub_field('right_side_image');
                        $right_side_image = $right_side_image_img['url'];
                        $color = get_sub_field('color');
                        $image_size = get_sub_field('image_size');
?>
                        <section class="value__flexible__grid" style="--bg-color: <?php echo $color;?>">
                              <div class="container">
                                    <div class="row">
                                          <div class="col-12 col-lg-6">
                                                <div class="value__flexible__grid__content">
                                                      <?php if($left_content): echo''.$left_content.''; endif;?>
                                                </div>
                                          </div>
                                          <div class="col-12 col-lg-6">
                                                <div class="value__flexible__grid__image__wrap <?php if($image_size){echo 'px-0';} ?>">
                                                <?php if($right_side_image): echo'<img src="'.$right_side_image.'" alt="'.$right_side_image_img['alt'].'">'; endif;?>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </section>
<?php 
                  elseif( get_row_layout() == 'you_tube_video_section' ):
                        $you_tube_link = get_sub_field('you_tube_link');
                        $you_tube_banner_image_img = get_sub_field('you_tube_banner_image');
                        $you_tube_banner_image = $you_tube_banner_image_img['url'];
?>
                        <section class="full__width__video__playr">
                              <div class="container">
                                    <a data-fancybox data-type="iframe" data-src="<?php echo $you_tube_link;?>" class="full__width__video__playr__link">
                                          <?php if($you_tube_banner_image): echo'<img src="'.$you_tube_banner_image.'" alt="'.$you_tube_banner_image_img['alt'].'">'; endif;?>
                                          <svg width="123" height="123" viewBox="0 0 123 123" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M61.5 0.6875C77.6285 0.6875 93.0964 7.09451 104.501 18.4991C115.905 29.9036 122.312 45.3715 122.312 61.5C122.312 77.6285 115.905 93.0964 104.501 104.501C93.0964 115.905 77.6285 122.312 61.5 122.312C45.3715 122.312 29.9036 115.905 18.4991 104.501C7.09451 93.0964 0.6875 77.6285 0.6875 61.5C0.6875 45.3715 7.09451 29.9036 18.4991 18.4991C29.9036 7.09451 45.3715 0.6875 61.5 0.6875ZM61.5 113.625C75.3244 113.625 88.5826 108.133 98.3579 98.3579C108.133 88.5826 113.625 75.3244 113.625 61.5C113.625 47.6756 108.133 34.4174 98.3579 24.6421C88.5826 14.8667 75.3244 9.375 61.5 9.375C47.6756 9.375 34.4174 14.8667 24.6421 24.6421C14.8667 34.4174 9.375 47.6756 9.375 61.5C9.375 75.3244 14.8667 88.5826 24.6421 98.3579C34.4174 108.133 47.6756 113.625 61.5 113.625ZM54.9844 80.0131L82.7583 61.5L54.9844 42.9869V80.0131ZM56.4265 33.5002L90.2904 56.079C91.1827 56.674 91.9144 57.4801 92.4205 58.4258C92.9265 59.3715 93.1913 60.4274 93.1913 61.5C93.1913 62.5726 92.9265 63.6285 92.4205 64.5742C91.9144 65.5199 91.1827 66.326 90.2904 66.921L56.4265 89.4998C55.4453 90.1539 54.3049 90.5294 53.127 90.5864C51.9491 90.6433 50.7779 90.3795 49.7381 89.8231C48.6984 89.2666 47.8292 88.4384 47.2231 87.4268C46.6171 86.4152 46.297 85.2581 46.2969 84.0788V38.9125C46.297 37.7332 46.6171 36.5761 47.2231 35.5645C47.8292 34.5529 48.6984 33.7247 49.7381 33.1683C50.7779 32.6118 51.9491 32.348 53.127 32.4049C54.3049 32.4619 55.4453 32.8374 56.4265 33.4915V33.5002Z" fill="white" />
                                          </svg>
                                    </a>
                              </div>
                        </section>
<?php
                  elseif( get_row_layout() == 'vimeo_video_section' ):
                        $vimeo_id = get_sub_field('vimeo_id');
                        $vimeo_image_img = get_sub_field('vimeo_image');
                        $vimeo_image = $vimeo_image_img['url'];
?>
                        <section class="full__width__video__playr">
                              <div class="container">
                                    <a data-fancybox data-type="iframe" data-src="https://player.vimeo.com/video/<?php echo $vimeo_id;?>?h=4a30823caa" class="full__width__video__playr__link">
                                          <?php if($vimeo_image): echo'<img src="'.$vimeo_image.'" alt="'.$vimeo_image_img['alt'].'">'; endif;?>
                                          <svg width="123" height="123" viewBox="0 0 123 123" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M61.5 0.6875C77.6285 0.6875 93.0964 7.09451 104.501 18.4991C115.905 29.9036 122.312 45.3715 122.312 61.5C122.312 77.6285 115.905 93.0964 104.501 104.501C93.0964 115.905 77.6285 122.312 61.5 122.312C45.3715 122.312 29.9036 115.905 18.4991 104.501C7.09451 93.0964 0.6875 77.6285 0.6875 61.5C0.6875 45.3715 7.09451 29.9036 18.4991 18.4991C29.9036 7.09451 45.3715 0.6875 61.5 0.6875ZM61.5 113.625C75.3244 113.625 88.5826 108.133 98.3579 98.3579C108.133 88.5826 113.625 75.3244 113.625 61.5C113.625 47.6756 108.133 34.4174 98.3579 24.6421C88.5826 14.8667 75.3244 9.375 61.5 9.375C47.6756 9.375 34.4174 14.8667 24.6421 24.6421C14.8667 34.4174 9.375 47.6756 9.375 61.5C9.375 75.3244 14.8667 88.5826 24.6421 98.3579C34.4174 108.133 47.6756 113.625 61.5 113.625ZM54.9844 80.0131L82.7583 61.5L54.9844 42.9869V80.0131ZM56.4265 33.5002L90.2904 56.079C91.1827 56.674 91.9144 57.4801 92.4205 58.4258C92.9265 59.3715 93.1913 60.4274 93.1913 61.5C93.1913 62.5726 92.9265 63.6285 92.4205 64.5742C91.9144 65.5199 91.1827 66.326 90.2904 66.921L56.4265 89.4998C55.4453 90.1539 54.3049 90.5294 53.127 90.5864C51.9491 90.6433 50.7779 90.3795 49.7381 89.8231C48.6984 89.2666 47.8292 88.4384 47.2231 87.4268C46.6171 86.4152 46.297 85.2581 46.2969 84.0788V38.9125C46.297 37.7332 46.6171 36.5761 47.2231 35.5645C47.8292 34.5529 48.6984 33.7247 49.7381 33.1683C50.7779 32.6118 51.9491 32.348 53.127 32.4049C54.3049 32.4619 55.4453 32.8374 56.4265 33.4915V33.5002Z" fill="white" />
                                          </svg>
                                    </a>
                              </div>
                        </section>
<?php 
                  elseif( get_row_layout() == 'full_width_banner' ):
                        $image_img = get_sub_field('image');
                        $image = $image_img['url'];
?>
                        <section class="static__banner">
                              <?php if($image): echo'<img src="'.$image.'" alt="'.$image_img['alt'].'">'; endif;?>
                        </section>
<?php
                  elseif( get_row_layout() == 'full_width_grip_banner' ):
                    $logo_img = get_sub_field('logo');
                    // $logo = $logo_img['url'];
                    $title = get_sub_field('title');
                    $grid_image_img = get_sub_field('grid_image');
                    $grid_image = $grid_image_img['url'];
                    $bg_color = get_sub_field('bg_color');
                    $overlay_image_img = get_sub_field('overlay_image');
                    $overlay_ico_img = get_sub_field('overlay_ico');
                    $color_overlay_ = get_sub_field('color_overlay_');
                    $overlay_image_ = get_sub_field('overlay_image_');
                    $overlay__bg_color = get_sub_field('overlay__bg_color');
                    $overlay__image = get_sub_field('overlay__image');
                    $overlay__color_ = get_sub_field('overlay__color_');
                    $overlay_image__ = get_sub_field('overlay_image__');
                    $overlay_icon___ = get_sub_field('overlay_icon___');

?>
                    <section class="hero__banner hero__banner--with--image">
                        <div class="container">
                            <div class="hero__banner__content">
                                <?php if($logo_img): echo'<img src="'.$logo_img.'" alt="" class="img-fluid">'; endif;?>
                                <?php if($title):echo'<h1>'.$title.'</h1>';endif;?>
                            </div>
                        </div>
                        <?php if($grid_image): echo'<img src="'.$grid_image.'" alt="'.$grid_image_img['alt'].'">'; endif;?>
                        <div class="overlay__grid__wrap">
                            <div class="overlay__grid__wrap__item" style="--card-bg:<?php if($bg_color){ echo $bg_color;}?>">
                                <?php if($overlay_image_img): echo'<img src="'.$overlay_image_img['url'].'" alt="" class="overlay__grid__wrap__item__bg">'; endif;?>
                                <div class="overlay__grid__wrap__item__header">
                                    <h3></h3>
                                    <h5></h5>
                                </div>
                                <?php if( $overlay_ico_img):echo'<div class="overlay__grid__wrap__item__footer__icon ms-auto">
                                    <img src="'. $overlay_ico_img['url'].'" alt="">
                                </div>';endif;?>
                            </div>
                        <div class="overlay__grid__wrap__item" style="--card-bg: <?php if($color_overlay_){ echo $color_overlay_;}?>; --line-color: #b53028">
                            <?php if($overlay_image_):echo'<img src="'.$overlay_image_.'" alt="" class="overlay__grid__wrap__item__bg">'; endif;
                            ?>
                            <div class="overlay__grid__wrap__item__header"></div>
                        </div>
                        <div class="overlay__grid__wrap__item" style="--card-bg: <?php if($overlay__bg_color){ echo $overlay__bg_color;}?>">
                            <?php if($overlay__image): echo'<img src="'.$overlay__image.'" alt="" class="overlay__grid__wrap__item__bg">'; endif;?>
                        </div>
                        <div class="overlay__grid__wrap">
                            <div class="overlay__grid__wrap__item" style="--card-bg:<?php if($overlay__color_){ echo $overlay__color_;}?>">
                                <?php if($overlay_image__): echo'<img src="'.$overlay_image__['url'].'" alt="" class="overlay__grid__wrap__item__bg">'; endif;?>
                                <div class="overlay__grid__wrap__item__header">
                                    <h3></h3>
                                    <h5></h5>
                                </div>
                                <?php if( $overlay_icon___):echo'<div class="overlay__grid__wrap__item__footer__icon ms-auto">
                                    <img src="'. $overlay_icon___['url'].'" alt="">
                                </div>';endif;?>
                            </div>
                    </div>
                </section>
<?php 
                  elseif( get_row_layout() == 'full_width_text_' ):
                        $color = get_sub_field('color');
                        $title = get_sub_field('title');
                        $description = get_sub_field('description');
?>
                        <section class="enduring__values" style="--bg-color: <?php echo $color;?>">
                              <div class="container">
                                    <?php if($title): echo'<h2 class="title__primary text-center text-white">'.$title.'</h2>'; endif;?>
                                    <?php if($description): echo'<h5 class="sub__title text-center text-white">'.$description.'</h5>'; endif;?>
                              </div>
                        </section>
<?php 
                    elseif( get_row_layout() == 'text_&_image_repeater' ):
                        $color = get_sub_field('color');
                        $title = get_sub_field('title');
                        $description = get_sub_field('description');
                        $image_img = get_sub_field('image');
                        $image = $image_img['url'];
?>
                        <article class="value__flexible__grid py-5 value__flexible__grid__flip" style="--bg-color: <?php echo $color;?>">
                              <div class="container">
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <div class="value__flexible__grid__content">
                                                <?php if($title): echo'<h3>'.$title.'</h3>'; endif;?>
                                                <?php if($description): echo''.$description.'';endif;?>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <?php if($image): echo'<div class="value__flexible__grid__image__wrap">
                                                <img src="'.$image.'" alt="'.$image_img['alt'].'">
                                            </div>'; endif;?>
                                        </div>
                                    </div>
                              </div>
                        </article>
            
<?php
                    elseif( get_row_layout() == 'full_width_text_&_description' ):
                        $description = get_sub_field('description');
                        $color = get_sub_field('color');
?>
                        <section class="value__flexible__grid" style="--bg-color: <?php echo $color;?>">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="value__flexible__grid__content">
                                            <?php if($description): echo''.$description.''; endif;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
<?php
                    elseif( get_row_layout() == 'manufacturing_certification' ):
?>
                        <section class="manufacturing__certification pt-0">
                            <div class="container">
                                <div class="value__row row">
                                    <?php
                                         if(have_rows('certification')):
                                            while(have_rows('certification')):the_row();
                                                $icon = get_sub_field('icon');
                                                $text = get_sub_field('text');
                                    ?>
                                                <div class="col-6 col-md-4 col-lg-4">
                                                    <div class="value__row__card">
                                                        <?php if($icon):echo'<img src="'.$icon.'" alt="">'; endif;?>
                                                        <?php if($text): echo'<h5>'.$text.'</h5>'; endif;?>
                                                    </div>
                                                </div>
                                    <?php
                                            endwhile;
                                        endif;
                                    ?>
                                </div>
                                <div class="row solutions__card__grid">
                                    <?php 
                                        if(have_rows('grid')):
                                            while(have_rows('grid')):the_row();
                                                $description = get_sub_field('title');
                                                $color = get_sub_field('color');
                                    ?>
                                                <div class="col-12 col-md-6">
                                                    <div class="solutions__card" style="--card-color: <?php echo $color;?>">
                                                        <?php if($description): echo '<h4>'.$description.'</h4>'; endif;?>
                                                    </div>
                                                </div>
                                    <?php
                                            endwhile;
                                        endif;
                                    ?>
                                    
                                </div>
                            </div>
                        </section>
<?php
                  endif;
            endwhile;
      endif;
?>

<?php
if( get_field('hide_&_show') ) {
    enduring();
}
?>

<?php get_footer(); ?>

