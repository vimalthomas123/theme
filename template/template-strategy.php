<?php 
/* Template Name: Strategy page */ 
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

<?php 
      if( have_rows('content_section_strategy') ):
            while ( have_rows('content_section_strategy') ) : the_row();
                  if( get_row_layout() == 'text_&_image_group' ):
                        $color = get_sub_field('color');
                        $description = get_sub_field('description');
                        $image_img = get_sub_field('image');
                        $image = $image_img['url'];
?>
                        <section class="vision__banner" style="--bg-color: <?php echo $color;?>">
                              <div class="container">
                                    <?php if($image): echo'<div class="featured__image">
                                          <img src="'.$image.'" alt="'.$image_img['alt'].'">
                                    </div>'; endif;?>
                                    <div class="vision__banner__content">
                                          <?php if($description): echo''.$description.''; endif;?>
                                    </div>
                              </div>
                        </section>
<?php 
                  elseif( get_row_layout() == 'content_section' ):
                        $description = get_sub_field('description');
                        $title_color = get_sub_field('title_color');
                        $title = get_sub_field('title');
                        $description_f = get_sub_field('description_f');
                        $color_s = get_sub_field('color_s');
                        $title_s = get_sub_field('title_s');
                        $download_cta_text = get_sub_field('download_cta_text');
                        $download_file = get_sub_field('download_file');
?>
                        <section class="manufacturing__certification">
                              <div class="container">
                                    <?php if($description): echo''.$description.''; endif;?>
                                    <?php if($title): echo'<h2 class="title__primary title__with__color mb-4" style="--text--color: '.$title_color.'">'.$title.'</h2>'; endif;?>
                                    <?php if($description_f): echo''.$description_f.''; endif;?>
                                    <?php if($title_s): echo'<h2 class="title__primary title__with__color mb-4" style="--text--color: '.$color_s.'">'.$title_s.'</h2>'; endif;?>
                                    <ul class="sustainability__pillars__wrap">
                                          <?php
                                                if(have_rows('iffco_sustainability')) :
                                                      while(have_rows('iffco_sustainability')):the_row();
                                                            $bg_color = get_sub_field('bg_color');
                                                            $image_img = get_sub_field('image');
                                                            $image = $image_img['url'];
                                                            $title = get_sub_field('title');
                                                            $title_color = get_sub_field('title_color');
                                                            $description = get_sub_field('description');
                                          ?>
                                                            <li style="--card-color: <?php echo $bg_color;?>">
                                                                  <div class="sustainability__pillar__header">
                                                                        <?php if($image):echo'<img src="'.$image.'" alt="'.$image_img['alt'].'">'; endif;?>
                                                                        <?php if($title):echo'<h4 style="--title-color: '.$title_color.'">'.$title.'</h4>'; endif;?>
                                                                  </div>
                                                                  <?php if($description): echo''.$description.'';endif;?>
                                                            </li>
                                          <?php
                                                      endwhile;
                                                endif;
                                          ?>
                                    
                                    </ul>
                                    <?php if($download_file):echo'<a href="'.$download_file.'" arget="_blank" class="cta__primary mx-auto">'.$download_cta_text.'<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M10.586 5.657L6.636 1.707C6.45384 1.51839 6.35305 1.26579 6.35533 1.00359C6.3576 0.741397 6.46277 0.490585 6.64818 0.305177C6.83359 0.119768 7.0844 0.0145995 7.3466 0.0123211C7.6088 0.0100427 7.8614 0.110837 8.05 0.292995L13.707 5.95C13.8002 6.04265 13.8741 6.15281 13.9246 6.27414C13.9751 6.39548 14.001 6.52559 14.001 6.657C14.001 6.7884 13.9751 6.91852 13.9246 7.03985C13.8741 7.16118 13.8002 7.27134 13.707 7.364L8.05 13.021C7.95775 13.1165 7.84741 13.1927 7.7254 13.2451C7.6034 13.2975 7.47218 13.3251 7.3394 13.3262C7.20662 13.3274 7.07494 13.3021 6.95205 13.2518C6.82915 13.2015 6.7175 13.1273 6.62361 13.0334C6.52971 12.9395 6.45546 12.8278 6.40518 12.7049C6.3549 12.5821 6.3296 12.4504 6.33075 12.3176C6.3319 12.1848 6.35949 12.0536 6.4119 11.9316C6.46431 11.8096 6.54049 11.6992 6.636 11.607L10.586 7.657H1C0.734784 7.657 0.48043 7.55164 0.292893 7.3641C0.105357 7.17657 0 6.92221 0 6.657C0 6.39178 0.105357 6.13742 0.292893 5.94989C0.48043 5.76235 0.734784 5.657 1 5.657H10.586Z" fill="white" />
                                          </svg>
                                    </a>'; endif;?>
                              </div>
                        </section>
<?php 
                  endif;
            endwhile;
      endif;
?>

<?php
if (get_field('hide_&_show')) {
    $ev__bgg = get_field('enduring_values_banner_background_color_s','option');
    $ev__titlee = get_field('enduring_values_banner_title_s','option');
    $ev__descc = get_field('enduring_values_banner_description_s','option');
    $ev__ctaa = get_field('enduring_values_banner_cta_s','option');
    ?>
    <section class="enduring__values" style="--bg-color:<?php echo $ev__bgg; ?> ">
    <div class="container">
        <h2 class="title__secondary text-center text-white">

            <?php echo $ev__titlee; ?>

        </h2>
        <h5 class="sub__title text-center text-white">

            <?php echo $ev__descc; ?>

        </h5>
        <?php
        if ($ev__ctaa) :
            $linkk_url = $ev__ctaa['url'];
            $linkk_title = $ev__ctaa['title'];
            $linkk_target = $ev__ctaa['target'] ? $ev__ctaa['target'] : '_self';
        ?>
            <a class="cta__primary mx-auto" href="<?php echo esc_url($linkk_url); ?>" target="<?php echo esc_attr($linkk_target); ?>"><?php echo esc_html($linkk_title); ?> <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">

                    <path d="M10.586 5.657L6.636 1.707C6.45384 1.51839 6.35305 1.26579 6.35533 1.00359C6.3576 0.741397 6.46277 0.490585 6.64818 0.305177C6.83359 0.119768 7.0844 0.0145995 7.3466 0.0123211C7.6088 0.0100427 7.8614 0.110837 8.05 0.292995L13.707 5.95C13.8002 6.04265 13.8741 6.15281 13.9246 6.27414C13.9751 6.39548 14.001 6.52559 14.001 6.657C14.001 6.7884 13.9751 6.91852 13.9246 7.03985C13.8741 7.16118 13.8002 7.27134 13.707 7.364L8.05 13.021C7.95775 13.1165 7.84741 13.1927 7.7254 13.2451C7.6034 13.2975 7.47218 13.3251 7.3394 13.3262C7.20662 13.3274 7.07494 13.3021 6.95205 13.2518C6.82915 13.2015 6.7175 13.1273 6.62361 13.0334C6.52971 12.9395 6.45546 12.8278 6.40518 12.7049C6.3549 12.5821 6.3296 12.4504 6.33075 12.3176C6.3319 12.1848 6.35949 12.0536 6.4119 11.9316C6.46431 11.8096 6.54049 11.6992 6.636 11.607L10.586 7.657H1C0.734784 7.657 0.48043 7.55164 0.292893 7.3641C0.105357 7.17657 0 6.92221 0 6.657C0 6.39178 0.105357 6.13742 0.292893 5.94989C0.48043 5.76235 0.734784 5.657 1 5.657H10.586Z" fill="white" />
                </svg></a>
        <?php endif; ?>

    </div>
</section>
    <?php
}
?>

<?php get_footer(); ?>

