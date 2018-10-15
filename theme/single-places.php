<?php
/**
 * Template used for single event posts *
 *
 */
// Do not allow directly accessing this file.
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}
?>
<?php get_header(); ?>
<section id="content" <?php Avada()->layout->add_style('content_style'); ?>>
    <?php while (have_posts()) : ?>
        <input type="hidden" id="get_post_id" value="<?php echo $post->ID; ?>">
        <?php the_post(); ?>
        <?php the_post_thumbnail('events_mobile_thumb'); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
            <div class="single-event-container">
                <?php $full_image = ''; ?>
                <?php $title_size = (false === avada_is_page_title_bar_enabled($post->ID) ? '1' : '2'); ?>
                <div class="shortdescription">
                    <?php //echo single_excerpt();  ?>
                </div>
            </div>
            <div class="single-post-thin-ad">
                <h4>Sponsored </h4>
                <?php
                $vanueData = get_field('venue');
                $vanueArray = [];
                $vanuePost = [];
                foreach ($vanueData as $vanue) {
                    $vanueArray = $vanue;
                }
                if (!empty($vanueArray)) {
                    $defaults = array(
                        'numberposts' => 1,
                        'category' => 0,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'meta_key' => 'venue',
                        'meta_value' => $vanueArray[0],
                        'post_type' => 'events',
                        'suppress_filters' => true,
                        'exclude' => $post->ID
                    );
                    $vanuePost = get_posts($defaults);
                }
                $categoryArray = get_the_category($post->ID);
                $categoryString = "";
                $categoryPost = [];
                foreach ($categoryArray as $category) {
                    $categoryString .= $category->cat_ID . ",";
                }
                $categoryString = trim($categoryString, ",");
                if ($categoryString != "") {
                    $defaults = array(
                        'numberposts' => 1,
                        'category' => $categoryString,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'meta_key' => 'venue',
                        'meta_value' => $vanueArray[0],
                        'post_type' => 'events',
                        'suppress_filters' => true,
                        'exclude' => $post->ID
                    );
                    $categoryPost = get_posts($defaults);
                }
                ?>
                <img src="http://whatson.mylivepreview.com/wp-content/uploads/2018/10/sponsored.jpg"/>
            </div>
            <div class="shortdescription">
                <h1><?php echo avada_render_post_title($post->ID, false, '', $title_size); // WPCS: XSS ok.       ?></h1>
                <h5> BY : <?php the_field('eveny_by'); ?></h5>
                <a href="<?php the_field('ticket_sale_url'); ?>" class="bkonlinebtn">BOOK ONLINE</a>
                <a href="<?php the_field('email'); ?>" class="embtn"><i class="fa fa-envelope-o"
                                                                        aria-hidden="true"></i></a>
                <a href="<?php the_field('ticket_sale_phone'); ?>" class="cllbtn"><i class="fa fa-phone"
                                                                                     aria-hidden="true"></i></a>
                <div class="strbtn">
                    <div class="who_under_icons">
                        <div class="event-actions"><div class="event-save"><a class="ajax-link save_event"
                                                                              data-loggedin="<?php echo get_current_user_id(); ?>"
                                                                              data-postid="<?php echo $post->ID; ?>"><i
                                        class="<?php
            if ($user_saved->saved == 1) {
                echo 'fas';
            } else {
                echo 'far';
            }
                ?> fa-star"></i> </a>
                            </div></div></div></div>


                <div class="single_blog_inner_content">
    <?php echo single_excerpt(); ?>
                </div>

                <div class="under_single_blog">
                    <div class="left">
                        <h6>Mon 24 Sep 2018 - Sat 29 Sep 2018 Various Times</h6>

                        <p><a href="#"><img src="/wp-content/uploads/2018/10/calendar-icon.png"/> More dates
                                available </a></p>
                    </div>
                    <div class="right">
                        <h6>Hull New Theatre Kingston Square Hull HU1 3HF</h6>

                        <p><a href="#">Map & Directions More at this venue</a></p>
                    </div>
                </div>
            </div>


            <div class="shortdescription who_interested_title">
                <h2>Who's Interested?</h2>
            </div>
            <div id="interested">

            </div>

            <div class="single-event-actions who_under_icons">
                <div class="event-actions">
                    <ul>
    <?php
    $user_saved = user_has_saved($post->ID);
    ?>
                        <li class="event-save"><a class="ajax-link save_event"
                                                  data-loggedin="<?php echo get_current_user_id(); ?>"
                                                  data-postid="<?php echo $post->ID; ?>"><i
                                    class="<?php
                    if ($user_saved->saved == 1) {
                        echo 'fas';
                    } else {
                        echo 'far';
                    }
    ?> fa-star"></i> </a><br/>Interested
                        </li>
                        <li class="event-share">
                            <div id="sharebtncon"></div>
                            <div class="sharebtncon">
                                <a href="javascript:;" class="sharebtn"><i class="far fa-share-square"></i></a><br/> Share</a>
                                <div style="display:none" class="social-share-box">
                                    <a class="icon icon-facebook icon-replacement" href="http://www.facebook.com/sharer/sharer.php?url=<?php echo urlencode(get_permalink()); ?>" target="_blank"><i class="fab fa-facebook"></i></a>
                                    <a class="icon icon-facebook icon-replacement" href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title()); ?><?php echo get_permalink(); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                    <a class="icon icon-facebook icon-replacement" href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink()); ?>" target="_blank"><i class="fab fa-google-plus"></i></a>
                                </div>
                            </div>
                        </li>


    <?php
    $thumbs_up = count_ratings($post->ID, 1);
    if ($thumbs_up > 99) {
        $thumbs_up = "99+";
    }
    $user_rating = user_has_rated($post->ID);
    ?>
                        <li class="event-thumbup"><a class="ajax-link rating_thumbup"
                                                     data-loggedin="<?php echo get_current_user_id(); ?>"
                                                     data-postid="<?php echo $post->ID; ?>"><i
                                    class="<?php
                    if ($user_rating->rating == 1) {
                        echo 'fas';
                    } else {
                        echo 'far';
                    }
    ?> fa-thumbs-up"></i><?php
                                    if ($thumbs_up > 0) {
                                        echo ' ' . $thumbs_up;
                                    }
                                    ?></a><br/> Recommend
                        </li>
                                <?php
                                $thumbs_down = count_ratings($post->ID, 2);
                                if ($thumbs_down > 99) {
                                    $thumbs_down = "99+";
                                }
                                ?>
                        <li class="event-thumbdown"><a class="ajax-link rating_thumbdown"
                                                       data-loggedin="<?php echo get_current_user_id(); ?>"
                                                       data-postid="<?php echo $post->ID; ?>"><i
                                    class="<?php
                    if ($user_rating->rating == 2) {
                        echo 'fas';
                    } else {
                        echo 'far';
                    }
                                ?> fa-thumbs-down"></i><?php
                                    if ($thumbs_down > 0) {
                                        echo ' ' . $thumbs_down;
                                    }
                                    ?></a><br/> Avoid
                        </li>
                                <?php
                                $num_comments = get_comments_number($post->ID);
                                if ($num_comments > 0) :
                                    if ($num_comments > 99) {
                                        $num_comments = "99+";
                                    }
                                    echo '<li class="event-comment"><a href="#comments"><i class="fas fa-comments"></i> ' . $num_comments . '</a><br/> Reviews</li>';
                                else :
                                    echo '<li class="event-comment"><a href="#respond"><i class="far fa-comments"></i></a><br/> Reviews</li>';
                                endif;
                                ?>
                    </ul>
                </div>
                <div style="clear:both;"></div>
            </div>

            <div class="single-post-thin-ad second">
                <h4>Sponsored</h4>
                <img src="http://whatson.mylivepreview.com/wp-content/uploads/2018/10/img1.jpg"/>
            </div>
            <div class="shortdescription can_recommend">


                <h2>Can you recommend it?</h2>

                <div class="seconddown">
                    <ul>
                        <li class="event-thumbup"><a class="ajax-link rating_thumbup"
                                                     data-loggedin="<?php echo get_current_user_id(); ?>"
                                                     data-postid="<?php echo $post->ID; ?>"><i
                                    class="<?php
                    if ($user_rating->rating == 1) {
                        echo 'fas';
                    } else {
                        echo 'far';
                    }
                                ?> fa-thumbs-up"></i><?php
                                    if ($thumbs_up > 0) {
                                        echo ' ' . $thumbs_up;
                                    }
                                    ?></a>
                        </li>
                                <?php
                                $thumbs_down = count_ratings($post->ID, 2);
                                if ($thumbs_down > 99) {
                                    $thumbs_down = "99+";
                                }
                                ?>
                        <li class="event-thumbdown"><a class="ajax-link rating_thumbdown"
                                                       data-loggedin="<?php echo get_current_user_id(); ?>"
                                                       data-postid="<?php echo $post->ID; ?>"><i
                                    class="<?php
                    if ($user_rating->rating == 2) {
                        echo 'fas';
                    } else {
                        echo 'far';
                    }
                                ?> fa-thumbs-down"></i><?php
                                    if ($thumbs_down > 0) {
                                        echo ' ' . $thumbs_down;
                                    }
                                    ?></a>
                        </li>
                    </ul>
                </div>

                <!--                <div class="why">
                                    <input type="text" name="why" placeholder="Why?" class="why_input"/>
                                    <button class="post_btn">Post</button>
                                </div>-->

    <?php $post_comments = get_post_meta($post->ID, 'pyre_post_comments', true); ?>
                <?php if ((Avada()->settings->get('blog_comments') && 'no' !== $post_comments) || (!Avada()->settings->get('blog_comments') && 'yes' === $post_comments)) : ?>
                    <?php wp_reset_postdata(); ?>
                    <?php comments_template(); ?>
                <?php endif; ?>
                <?php do_action('avada_after_additional_post_content'); ?>
            </div>



            <div class="shortdescription">
                <h2>What's the deal?</h2>

    <?php
    if (have_rows('ticket_info')) :
        echo '<table class="ticket_pricing">';
        while (have_rows('ticket_info')) : the_row();
            $ticket_name = get_sub_field('ticket_name');
            $ticket_price = get_sub_field('ticket_price');
            echo '<tr>';
            echo '<td class="ticket_name">' . $ticket_name . '</td>';
            if ($ticket_price == 0) {
                echo '<td class="ticket_price">Free Entry</td>';
            } else {
                echo '<td class="ticket_price">£' . number_format($ticket_price, 2, '.', ',') . '</td>';
            }
            echo '</tr>';
        endwhile;
        echo '</table>';
    endif;
    ?>

                <a href="<?php the_field('ticket_sale_url'); ?>" class="bkonlinebtn">BOOK ONLINE</a>
                <a href="<?php the_field('email'); ?>" class="embtn"><i class="fa fa-envelope-o"
                                                                        aria-hidden="true"></i></a>
                <a href="<?php the_field('ticket_sale_phone'); ?>" class="cllbtn"><i class="fa fa-phone"
                                                                                     aria-hidden="true"></i></a>
                <a href="<?php the_field('website_url'); ?>" class="cllbtn"><i class="fa fa-globe"></i></a>

                <h5>Children aged 12 years and under must be accompanied by an adult. </h5>
            </div>
            <div class="single-post-thin-ad second">
                <h4>Sponsored</h4>
                <img src="http://whatson.mylivepreview.com/wp-content/uploads/2018/10/img1.jpg"/>
            </div>

    <?php
    if (!empty($categoryPost)) {
        $categoryPost = $categoryPost[0];
        $categoryArray = get_the_category($categoryPost->ID);
        $categoryString = "";
        $categoryPost = [];
        foreach ($categoryArray as $category) {
            $categoryString .= $category->name . ",";
        }

        $categoryString = trim($categoryString, ",");


        $defaults1 = array(
            'numberposts' => 3,
            'cat' => 22,
            'orderby' => 'title',
            'order' => 'ASC',
            'post_type' => 'events',
            'exclude' => $post->ID
        );
        $categoryPost1 = get_posts($defaults1);
        //echo '<pre>';print_r($categoryPost1);
        ?>  
                <div class="more_like_this">
                    <div class="shortdescription">
                        <h2>More Like This</h2>
                    </div>


                    <div class="box">
        <?php echo do_shortcode('[wcp-carousel id="355" cat="22" order="DESC" orderby="date" count="10"] '); ?>


                    </div>
                    <?php } ?>
    <?php
    if (!empty($vanuePost)) {
        $categoryPost = $vanuePost[0];
        $categoryArray = get_the_category($categoryPost->ID);
        $categoryString = "";
        $categoryPost = [];
        foreach ($categoryArray as $category) {
            $categoryString .= $category->name . ",";
        }

        $categoryString = trim($categoryString, ",");

        $defaults2 = array(
            'numberposts' => 1,
            'cat' => 22,
            'orderby' => 'title',
            'order' => 'ASC',
            'post_type' => 'events',
            'exclude' => $post->ID
        );
        $categoryPost2 = get_posts($defaults2);
        ?>
                    <div class="more_like_this">
                        <div class="shortdescription">
                            <h2>What else is on here?</h2>
                        </div>
                        <div class="box">
                    <?php echo do_shortcode('[wcp-carousel id="355" cat="24" order="DESC" orderby="date" count="10"] '); ?>
                        </div>
                    </div>
    <?php } ?>

                <div class="more_like_this">
                    <div class="shortdescription">
                        <h2>Nearby</h2>
                    </div>
                <?php
                $defaults3 = array(
                    'numberposts' => 3,
                    'cat' => 23,
                    'orderby' => 'id',
                    'post_type' => 'events',
                    'exclude' => $post->ID
                );
                $categoryPost3 = get_posts($defaults3);

                //  echo '<pre>';print_r($categoryPost);
                ?>
                    <div class="box">
                    <?php echo do_shortcode('[wcp-carousel id="355" cat="23" order="DESC" orderby="date" count="10"] '); ?>
                    </div>
                </div>

                <div class="single-post-thin-ad second">
                    <h4>Sponsored</h4>
                    <img src="http://whatson.mylivepreview.com/wp-content/uploads/2018/10/img1.jpg"/>
                </div>
                        <?php /* ?>
                          <div class="single-event-container">
                          <div class="single-event-times">
                          <div>
                          <h3>Event Starts</h3>
                          <?php the_field('from'); ?>
                          </div>
                          <div>
                          <h3>Event Finishes</h3>
                          <?php the_field('to'); ?>
                          </div>
                          <div style="clear:both;"></div>
                          </div>
                          <div style="clear:both;"></div>
                          </div>
                          <div class="single-event-container last-container">
                          <div class="accordian fusion-accordian">
                          <div class="panel-group fusion-toggle-icon-right" id="accordion-151-1">
                          <div class="fusion-panel panel-default fusion-toggle-no-divider">
                          <div class="panel-heading">
                          <h4 class="panel-title toggle">
                          <a data-toggle="collapse" data-target="#location" href="#59a6ac6ae1b83a743"
                          class="collapsed">
                          <div class="fusion-toggle-icon-wrapper">
                          <i class="fa-fusion-box"></i>
                          </div>
                          <div class="fusion-toggle-heading">Location &amp; Directions</div>
                          </a>
                          </h4>
                          </div>
                          <!-- /panel-heading -->
                          <div id="location" class="panel-collapse collapse" style="height: 0px;">
                          <div class="panel-body toggle-content fusion-clearfix">
                          <p>Content Here</p>
                          </div>
                          <!-- /panel-body -->
                          </div>
                          </div>
                          <!-- /fusion-panel -->

                          <div class="fusion-panel panel-default fusion-toggle-no-divider">
                          <div class="panel-heading">
                          <h4 class="panel-title toggle">
                          <a data-toggle="collapse" data-target="#pricing" href="#702bbafead7780527"
                          class="collapsed">
                          <div class="fusion-toggle-icon-wrapper">
                          <i class="fa-fusion-box"></i>
                          </div>
                          <div class="fusion-toggle-heading">Prices &amp; Booking</div>
                          </a>
                          </h4>
                          </div>
                          <!-- /panel-heading -->
                          <div id="pricing" class="panel-collapse collapse" style="height: 0px;">
                          <div class="panel-body toggle-content fusion-clearfix">
                          <?php
                          if (have_rows('ticket_info')) :
                          echo '<table class="ticket_pricing">';
                          while (have_rows('ticket_info')) : the_row();
                          $ticket_name = get_sub_field('ticket_name');
                          $ticket_price = get_sub_field('ticket_price');
                          echo '<tr>';
                          echo '<td class="ticket_name">' . $ticket_name . '</td>';
                          if ($ticket_price == 0) {
                          echo '<td class="ticket_price">Free Entry</td>';
                          } else {
                          echo '<td class="ticket_price">£' . number_format($ticket_price, 2, '.', ',') . '</td>';
                          }
                          echo '</tr>';
                          endwhile;
                          echo '</table>';
                          endif;
                          ?>
                          <div class="book-buttons">
                          <?php
                          $ticket_url = get_field('ticket_sale_url');
                          $ticket_phone = get_field('ticket_sale_phone');
                          if ($ticket_url) {
                          echo '<a class="btn btn-hollow';
                          if (!$ticket_phone) {
                          echo ' btn-fullwidth';
                          }
                          echo '" href="' . $ticket_url . '">BOOK ONLINE</a>';
                          }

                          if ($ticket_phone) {
                          echo '<a class="btn btn-solid';
                          if (!$ticket_url) {
                          echo ' btn-fullwidth';
                          }
                          echo '" href="tel:' . $ticket_phone . '">CALL NOW</a>';
                          }
                          ?>
                          </div>
                          <div class="ticket_notes">
                          <p><?php the_field('ticket_notes'); ?></p>
                          </div>
                          </div>
                          <!-- /panel-body -->
                          </div>
                          </div>
                          <!-- /fusion-panel -->

                          <div class="fusion-panel panel-default fusion-toggle-no-divider">
                          <div class="panel-heading">
                          <h4 class="panel-title toggle">
                          <a data-toggle="collapse" data-target="#more" href="#59a6ac6ae1b83a743"
                          class="collapsed">
                          <div class="fusion-toggle-icon-wrapper">
                          <i class="fa-fusion-box"></i>
                          </div>
                          <div class="fusion-toggle-heading">Learn More &amp; Links</div>
                          </a>
                          </h4>
                          </div>
                          <!-- /panel-heading -->
                          <div id="more" class="panel-collapse collapse" style="height: 0px;">
                          <div class="panel-body toggle-content fusion-clearfix">
                          <div class="more-info-text">
                          <?php the_content(); ?>
                          </div>
                          <dl class="more-info-desc">
                          <?php
                          $website_url = get_field('website_url');
                          if ($website_url) {
                          echo '<a class="btn btn-solid btn-fullwidth" href="' . $website_url . '" target="_blank" rel="nofollow">Visit Website</a>';
                          }
                          ?>
                          </dl>
                          </div>
                          <!-- /panel-body -->
                          </div>
                          </div>
                          <!-- /fusion-panel -->

                          </div>
                          <!-- /panel-group -->
                          </div>
                          <!-- /fusion-accordian -->
                          </div>  <?php */ ?>
                <?php fusion_link_pages(); ?>

                <?php avada_render_related_posts(get_post_type()); // Render Related Posts.   ?>


        </article>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
</section>
<style>
    .social-share-box {
        position: absolute;
        left: 0;
        right: 0;
        margin: 0 auto;
        background: #fff;
        padding: 10px 0 5px;
        width: 130px;
    }
</style>
<?php do_action('avada_after_content'); ?>
<?php
get_footer();

/* Omit closing PHP tag to avoid "Headers already sent" issues. */

