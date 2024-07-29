  <footer>
      <div class="container">
          <div class="row">
              <div class="col-12 col-lg-6 col-xl-3">
                  <a href="<?php echo home_url(); ?>" class="footer__logo">

                      <img src="<?php the_field('footer_logo','options')?>" alt="">

                  </a>
                  <h3><?php the_field('site_description','options')?></h3>
                  <div class="news__letter__signup__form">
                      <form action="#">
                          <label for=""><?php the_field('newsletter_title','options'); ?></label>
                          <h6><?php the_field('newsletter_description','options'); ?></h6>
                          <div class="input__wrap">
                              <svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M3.598 2L9.345 7.12C9.52813 7.28306 9.76479 7.37316 10.01 7.37316C10.2552 7.37316 10.4919 7.28306 10.675 7.12L16.423 2H3.598ZM18 3.273L12.006 8.614C11.4565 9.10374 10.7461 9.37436 10.01 9.37436C9.27392 9.37436 8.56352 9.10374 8.014 8.614L2 3.254V12H18V3.273ZM2 0H18C18.5304 0 19.0391 0.210714 19.4142 0.585786C19.7893 0.960859 20 1.46957 20 2V12C20 12.5304 19.7893 13.0391 19.4142 13.4142C19.0391 13.7893 18.5304 14 18 14H2C1.46957 14 0.960859 13.7893 0.585786 13.4142C0.210714 13.0391 0 12.5304 0 12V2C0 1.46957 0.210714 0.960859 0.585786 0.585786C0.960859 0.210714 1.46957 0 2 0V0Z" fill="#697077" />
                              </svg>
                              <input type="email" placeholder="Enter your email">
                          </div>
                          <button class="cta__primary cta__primary--md">Subscribe
                              <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M10.586 5.657L6.636 1.707C6.45384 1.51839 6.35305 1.26579 6.35533 1.00359C6.3576 0.741397 6.46277 0.490585 6.64818 0.305177C6.83359 0.119768 7.0844 0.0145995 7.3466 0.0123211C7.6088 0.0100427 7.8614 0.110837 8.05 0.292995L13.707 5.95C13.8002 6.04265 13.8741 6.15281 13.9246 6.27414C13.9751 6.39548 14.001 6.52559 14.001 6.657C14.001 6.7884 13.9751 6.91852 13.9246 7.03985C13.8741 7.16118 13.8002 7.27134 13.707 7.364L8.05 13.021C7.95775 13.1165 7.84741 13.1927 7.7254 13.2451C7.6034 13.2975 7.47218 13.3251 7.3394 13.3262C7.20662 13.3274 7.07494 13.3021 6.95205 13.2518C6.82915 13.2015 6.7175 13.1273 6.62361 13.0334C6.52971 12.9395 6.45546 12.8278 6.40518 12.7049C6.3549 12.5821 6.3296 12.4504 6.33075 12.3176C6.3319 12.1848 6.35949 12.0536 6.4119 11.9316C6.46431 11.8096 6.54049 11.6992 6.636 11.607L10.586 7.657H1C0.734784 7.657 0.48043 7.55164 0.292893 7.3641C0.105357 7.17657 0 6.92221 0 6.657C0 6.39178 0.105357 6.13742 0.292893 5.94989C0.48043 5.76235 0.734784 5.657 1 5.657H10.586Z" fill="white" />
                              </svg>
                          </button>
                      </form>
                  </div>
              </div>
                <div class="col-12 col-lg-6 col-xl-9">
                    <div class="row">
                        <?php   if( have_rows('footer_section','options') ):
                                    while( have_rows('footer_section','options') ) : the_row();
                        ?>
                                        <div class="col-12 col-sm-6 col-lg-4- col-xl-3">
                                            <div class="footer__navigation">
                                                <h5><?php the_sub_field('section_main_title','options'); ?></h5>
                                                <ul>
                                                    <?php if( have_rows('section_subpages') ):
                                                        while( have_rows('section_subpages') ) : the_row();
                                                    ?>
                                                    <?php 
                                                            $section_page_link = get_sub_field('section_page_link');
                                                            if( $section_page_link ): 
                                                                $section_page_link_url = $section_page_link['url'];
                                                                $section_page_link_title = $section_page_link['title'];
                                                                $section_page_link_target = $section_page_link['target'] ? $section_page_link['target'] : '_self';
                                                            endif; 
                                                    ?>
                                                            <li>
                                                                <a href="<?php echo esc_url($section_page_link_url); ?>" target="<?php echo esc_attr($section_page_link_target); ?>"><?php echo esc_html($section_page_link_title); ?></a>

                                                            </li>
                                                    <?php 
                                                        endwhile; 
                                                    endif; 
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                      <?php endwhile; endif;?>
                                        <div class="col-12 col-sm-6 col-lg-4- col-xl-3">
                                            <div class="footer__navigation">
                                                <?php
                                                    $main_title = get_field('main_title','option');
                                                ?>
                                                <?php if($main_title):echo'<h5>'.$main_title.'</h5>';endif;?>
                                                <ul class="social__media__links">
                                                    <?php 
                                                        if(have_rows('social_media_icon','option')):
                                                            while(have_rows('social_media_icon','option')):the_row();
                                                                $icon = get_sub_field('icon');
                                                                $social_media_link = get_sub_field('social_media_link');
                                                    ?>
                                                            <?php if($icon):echo'<li>
                                                                <a target="_blank" href="'.$social_media_link.'">
                                                                    <img src="'.$icon.'" alt="">
                                                                </a>
                                                            </li>';endif;?>
                                                    <?php
                                                            endwhile;
                                                        endif; 
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                  </div>
              </div>
              <div class="col-12 col-lg-6 col-xl-3"></div>
                <div class="col-12 col- col-xl-9">
                    <div class="footer__bottom">
                        <p><?php the_field('footer_bottom_title','options'); ?></p>
                        <ul>
                            <?php if( have_rows('footer_bottom_links','options') ):
                                    while( have_rows('footer_bottom_links','options') ) : the_row();
                            ?>
                            <?php 
                                        $footer_bottom_url = get_sub_field('footer_bottom_url');
                                        if( $footer_bottom_url ): 
                                            $footer_bottom_url_url = $footer_bottom_url['url'];
                                            $footer_bottom_url_title = $footer_bottom_url['title'];
                                            $footer_bottom_url_target = $footer_bottom_url['target'] ? $footer_bottom_url['target'] : '_self';
                                        endif; 
                            ?>
                                        <li>
                                            <a href="<?php echo esc_url($footer_bottom_url_url); ?>" target="<?php echo esc_attr($footer_bottom_url_target); ?>"><?php echo esc_html($footer_bottom_url_title); ?></a>

                                        </li>
                            <?php 
                                    endwhile; 
                                endif; 
                            ?>
                        </ul>
                    </div>
                </div>
          </div>
      </div>
  </footer>
  <?php wp_footer(); ?>
  </body>

  </html>