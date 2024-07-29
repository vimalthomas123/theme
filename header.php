<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <script async src="assets/js/modernizr.min.js"></script> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <?php wp_head(); ?>
</head>

<?php
  $body_page_id = get_the_ID();
  $body_parent = array_reverse(get_post_ancestors($body_page_id));
  if($body_parent) {
    $body_page_parents = get_post($body_parent[0]);
    $body_page_parent = $body_page_parents->ID;
  }else{
    $body_page_parent = get_the_ID();
  }
?>
<body <?php body_class(); ?> id="parent-page-<?php echo $body_page_parent; ?>">


    <div class="top__nav">
        <div class="container">
            <div class="top__nav__inner">
                <div class="top__nav__left">
                    <div class="global__toggle__btn">
                        <button type="button">
                            <img src="<?php echo the_field('global_icon','options');?>" alt="" />
                            <span>Global</span>
                        </button>
                    </div>
                    <label for="lowcarbonmode" class="low__carbon__mode__toggle">
                        <input type="checkbox" id="lowcarbonmode" name="lowcarbonmode" />
                        <div class="low__carbon__mode__toggle__btn"></div>Low carbon mode
                    </label>
                </div>
                <div class="top__nav__right">
                    <nav aria-label="quick navigation">
                        <ul>
                            <?php if( have_rows('top_menu','options') ):
        while( have_rows('top_menu','options') ) : the_row();
        ?>
        <?php 
                              $top_menu_title = get_sub_field('top_menu_title');
                                if( $top_menu_title ): 
                                    $top_menu_title_url = $top_menu_title['url'];
                                    $top_menu_title_title = $top_menu_title['title'];
                                     $top_menu_title_target = $top_menu_title['target'] ? $top_menu_title['target'] : '_self';
                                endif; ?>
                            <li>
                                <a href="<?php echo esc_url($top_menu_title_url); ?>">

                                    <img src="<?php the_sub_field('top_menu_icon','options');?>" alt="" />

                                    <?php echo esc_html($top_menu_title_title); ?>

                                </a>
                            </li>
                        <?php endwhile; endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <header>
        <div class="header__outer__wrap">
            <div class="container">
                <!-- @format -->
                <div class="header__inner">
                    <a href="<?php echo home_url(); ?>" class="site__logo">

                        <img src="<?php the_field('header_logo','options')?>" alt="" />

                    </a>
                    <nav aria-label="Primary navigation">
                        <ul>
                            <li class="top__header__quick__access__cta">
                                <div class="top__nav">
                                    <div class="container">
                                        <div class="top__nav__inner">
                                            <div class="top__nav__left">
                                                <div class="global__toggle__btn">
                                                    <button type="button">
                                                        <img src="./assets/img/icons/globe.svg" alt="" />
                                                        <span>Global</span>
                                                    </button>
                                                </div>
                                                <label for="lowcarbonmode2" class="low__carbon__mode__toggle">
                                                    <input type="checkbox" id="lowcarbonmode2" name="lowcarbonmode2" />
                                                    <div class="low__carbon__mode__toggle__btn"></div>Low carbon mode
                                                </label>
                                            </div>
                                            <div class="top__nav__right">
                                                <nav aria-label="quick navigation">
                                                    <ul>
                                                        <li>
                                                            <a href="#">

                                                                <img src="./assets/img/icons/Vector.svg" alt="" />

                                                                Careers

                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">

                                                                <img src="./assets/img/icons/phone.svg" alt="" />

                                                                Contact us

                                                            </a>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>


<?php if( have_rows('header_menu','options') ):
        while( have_rows('header_menu','options') ) : the_row();
        ?>
                                <?php 
                              $menu_link = get_sub_field('menu_link');
                              if( $menu_link ): 
                                $menu_link_url = $menu_link['url'];
                                $menu_link_title = $menu_link['title'];
                                $menu_link_target = $menu_link['target'] ? $menu_link['target'] : '_self';
                            endif; 
                            $page_id = url_to_postid($menu_link_url);
                            $parent_page_ids = wp_get_post_parent_id($page_id);
                            ?>
                            <li id ="<?php echo 'parent-page-',$page_id;?>">
                                <?php
                                // var_dump($page_id);

                                $active_class = (get_permalink() === $menu_link_url) ? 'active' : ''; ?>
                                <a href="<?php echo esc_url($menu_link_url); ?>"><?php echo esc_html($menu_link_title); ?></a>
                                <div class="sub__menu">
                                    <div class="container position-relative">
                                        <button type="button" class="sub__menu_close">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.75 1.81984L12.1802 0.25L7 5.43016L1.81984 0.25L0.25 1.81984L5.43016 7L0.25 12.1802L1.81984 13.75L7 8.56984L12.1802 13.75L13.75 12.1802L8.56984 7L13.75 1.81984Z" fill="black" />
                                            </svg>
                                        </button>
                                        <div class="sub__menu__inner">
                                            <div class="sub__menu__left__side">
                                                <h4><?php echo esc_html($menu_link_title); ?></h4>
                                                <p><?php the_sub_field('menu_content','options');?></p>
                                                <?php 
                              $menu_link2 = get_sub_field('menu_link2');
                                if( $menu_link2 ): 
                                    $menu_link2_url = $menu_link2['url'];
                                    $menu_link2_title = $menu_link2['title'];
                                     $menu_link2_target = $menu_link2['target'] ? $menu_link2['target'] : '_self'; ?>
                                
                                                <a href="<?php echo esc_url($menu_link2_url); ?>" class="cta__primary" target="<?php echo esc_attr($menu_link2_target); ?>"><?php echo esc_html($menu_link2_title); ?>

                                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">

                                                        <path d="M10.586 5.657L6.636 1.707C6.45384 1.51839 6.35305 1.26579 6.35533 1.00359C6.3576 0.741397 6.46277 0.490585 6.64818 0.305177C6.83359 0.119768 7.0844 0.0145995 7.3466 0.0123211C7.6088 0.0100427 7.8614 0.110837 8.05 0.292995L13.707 5.95C13.8002 6.04265 13.8741 6.15281 13.9246 6.27414C13.9751 6.39548 14.001 6.52559 14.001 6.657C14.001 6.7884 13.9751 6.91852 13.9246 7.03985C13.8741 7.16118 13.8002 7.27134 13.707 7.364L8.05 13.021C7.95775 13.1165 7.84741 13.1927 7.7254 13.2451C7.6034 13.2975 7.47218 13.3251 7.3394 13.3262C7.20662 13.3274 7.07494 13.3021 6.95205 13.2518C6.82915 13.2015 6.7175 13.1273 6.62361 13.0334C6.52971 12.9395 6.45546 12.8278 6.40518 12.7049C6.3549 12.5821 6.3296 12.4504 6.33075 12.3176C6.3319 12.1848 6.35949 12.0536 6.4119 11.9316C6.46431 11.8096 6.54049 11.6992 6.636 11.607L10.586 7.657H1C0.734784 7.657 0.48043 7.55164 0.292893 7.3641C0.105357 7.17657 0 6.92221 0 6.657C0 6.39178 0.105357 6.13742 0.292893 5.94989C0.48043 5.76235 0.734784 5.657 1 5.657H10.586Z" fill="white" />

                                                    </svg>

                                                </a>
                                                <?php endif; ?>
                                            </div>
                                            <div class="sub__menu__right__side">
                                                <nav aria-label="Secondary navigation">
                                                    <ul>
                                                        <?php if( have_rows('quick_links') ):
                                  while( have_rows('quick_links') ) : the_row(); ?>
                                    <?php 
                              $quick_link = get_sub_field('quick_link');
                                if( $quick_link ): 
                                    $quick_link_url = $quick_link['url'];
                                    $quick_link_title = $quick_link['title'];
                                     $quick_link_target = $quick_link['target'] ? $quick_link['target'] : '_self';
                                endif; ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($quick_link_url); ?>"><?php echo esc_html($quick_link_title); ?></a>

                                                        </li>
                                                       <?php endwhile; endif; ?>
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
<?php endwhile; endif; ?>
                            
                        </ul>
                        <button class="search__toggle" type="button" id="search__bar__toggle">Search
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.5 16.5C11.2879 16.5 12.0682 16.3448 12.7961 16.0433C13.5241 15.7417 14.1855 15.2998 14.7427 14.7426C15.2998 14.1855 15.7418 13.5241 16.0433 12.7961C16.3448 12.0681 16.5 11.2879 16.5 10.5C16.5 9.71207 16.3448 8.93185 16.0433 8.2039C15.7418 7.47595 15.2998 6.81451 14.7427 6.25736C14.1855 5.70021 13.5241 5.25825 12.7961 4.95672C12.0682 4.65519 11.2879 4.5 10.5 4.5C8.90872 4.5 7.38259 5.13214 6.25737 6.25736C5.13216 7.38258 4.50002 8.9087 4.50002 10.5C4.50002 12.0913 5.13216 13.6174 6.25737 14.7426C7.38259 15.8679 8.90872 16.5 10.5 16.5ZM16.82 15.406L20.4 18.986C20.4955 19.0783 20.5716 19.1887 20.6239 19.3108C20.6762 19.4328 20.7037 19.564 20.7048 19.6968C20.7058 19.8296 20.6804 19.9613 20.63 20.0841C20.5797 20.207 20.5053 20.3186 20.4114 20.4124C20.3174 20.5062 20.2057 20.5804 20.0828 20.6306C19.9599 20.6808 19.8282 20.706 19.6954 20.7047C19.5626 20.7035 19.4314 20.6758 19.3095 20.6233C19.1875 20.5708 19.0772 20.4946 18.985 20.399L15.405 16.819C13.7975 18.0668 11.7748 18.6552 9.74877 18.4642C7.72273 18.2732 5.84562 17.3173 4.49957 15.7911C3.15351 14.2648 2.4397 12.2829 2.50344 10.2489C2.56718 8.2149 3.40368 6.28162 4.84266 4.84265C6.28164 3.40367 8.21492 2.56717 10.2489 2.50343C12.283 2.43968 14.2648 3.1535 15.7911 4.49955C17.3173 5.8456 18.2732 7.72271 18.4642 9.74875C18.6552 11.7748 18.0669 13.7975 16.819 15.405L16.82 15.406Z" fill="black" />
                            </svg>
                        </button>
                        <!-- <ul class="hamburger__menu" id="hamburger__menu__toggle">

      <li></li>

      <li></li>

      <li></li>

    </ul> -->
                        <button class="hamburger hamburger--squeeze" id="hamburger__menu__toggle" type="button">
                            <span class="hamburger-box">

                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </nav>
                </div>
            </div>
        </div>
        <div class="search__bar">
            <div class="container">
                <form action="<?php echo home_url(); ?>" method="get" value="<?php echo esc_attr( get_search_query() ); ?>">
                    <div class="search__bar__wrap">
                        <input type="search" name="s" placeholder="Enter keyword..." />
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.5 16.5C11.2879 16.5 12.0682 16.3448 12.7961 16.0433C13.5241 15.7417 14.1855 15.2998 14.7427 14.7426C15.2998 14.1855 15.7418 13.5241 16.0433 12.7961C16.3448 12.0681 16.5 11.2879 16.5 10.5C16.5 9.71207 16.3448 8.93185 16.0433 8.2039C15.7418 7.47595 15.2998 6.81451 14.7427 6.25736C14.1855 5.70021 13.5241 5.25825 12.7961 4.95672C12.0682 4.65519 11.2879 4.5 10.5 4.5C8.90872 4.5 7.38259 5.13214 6.25737 6.25736C5.13216 7.38258 4.50002 8.9087 4.50002 10.5C4.50002 12.0913 5.13216 13.6174 6.25737 14.7426C7.38259 15.8679 8.90872 16.5 10.5 16.5ZM16.82 15.406L20.4 18.986C20.4955 19.0783 20.5716 19.1887 20.6239 19.3108C20.6762 19.4328 20.7037 19.564 20.7048 19.6968C20.7058 19.8296 20.6804 19.9613 20.63 20.0841C20.5797 20.207 20.5053 20.3186 20.4114 20.4124C20.3174 20.5062 20.2057 20.5804 20.0828 20.6306C19.9599 20.6808 19.8282 20.706 19.6954 20.7047C19.5626 20.7035 19.4314 20.6758 19.3095 20.6233C19.1875 20.5708 19.0772 20.4946 18.985 20.399L15.405 16.819C13.7975 18.0668 11.7748 18.6552 9.74877 18.4642C7.72273 18.2732 5.84562 17.3173 4.49957 15.7911C3.15351 14.2648 2.4397 12.2829 2.50344 10.2489C2.56718 8.2149 3.40368 6.28162 4.84266 4.84265C6.28164 3.40367 8.21492 2.56717 10.2489 2.50343C12.283 2.43968 14.2648 3.1535 15.7911 4.49955C17.3173 5.8456 18.2732 7.72271 18.4642 9.74875C18.6552 11.7748 18.0669 13.7975 16.819 15.405L16.82 15.406Z" fill="black" />
                        </svg>
                    </div>
                </form>
            </div>
        </div>
    </header>