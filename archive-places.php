<?php
/**
 * Template used for places archive *
 * 
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php get_header(); ?>

<section id="content" <?php Avada()->layout->add_style( 'content_style' ); ?>>
    <div class="fusion-fullwidth fullwidth-box wide-advert nonhundred-percent-fullwidth non-hundred-percent-height-scrolling" style="background-color: rgba(255,255,255,0);background-position: center center;background-repeat: no-repeat;padding-top:20px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
        <div class="fusion-builder-row fusion-row ">
            <div class="fusion-layout-column fusion_builder_column fusion_builder_column_1_1  fusion-one-full fusion-column-first fusion-column-last 1_1" style="margin-top:0px;margin-bottom:20px;">
                <div class="fusion-column-wrapper" style="padding: 0px; background-image: url(http://whatson.mylivepreview.com/wp-content/uploads/2018/08/wideadvertisement.jpg); -webkit-background-size: cover; background-size: cover; height: 120.79466666666669px; background-position: left top; background-repeat: no-repeat no-repeat;" data-bg-url="http://whatson.mylivepreview.com/wp-content/uploads/2018/08/wideadvertisement.jpg" data-bg-height="116" data-bg-width="750">
				    <div class="fusion-clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="event-listings">
        <?php
            if(have_posts()) :
                echo '<div class="fusion-fullwidth fullwidth-box event-feed nonhundred-percent-fullwidth non-hundred-percent-height-scrolling fusion-equal-height-columns" style="background-color: rgba(255,255,255,0);background-position: center center;background-repeat: no-repeat;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">';
                    echo '<div class="fusion-builder-row fusion-row ">';
            
                        $col_count = 1;
                        $ad_count = 1;
                        while(have_posts()) : the_post();
                            if($ad_count == 6) {
                                ?>
                                    <div class="fusion-layout-column fusion_builder_column fusion_builder_column_1_2  fusion-one-half fusion-column-last event-listing 1_2"
                                        style="margin-top:0px;margin-bottom:20px;width:50%;width:calc(50% - ( ( 4% ) * 0.5 ) );">
                                        <div class="fusion-column-wrapper" style="padding: 0px; background-image: url(http://whatson.mylivepreview.com/wp-content/uploads/2018/08/advertisement.jpg); -webkit-background-size: cover; background-size: cover; min-height: 337px; height: auto; background-position: left top; background-repeat: no-repeat no-repeat;"
                                            data-bg-url="http://whatson.mylivepreview.com/wp-content/uploads/2018/08/advertisement.jpg"
                                            data-bg-height="606" data-bg-width="750">
                                            <div class="fusion-clearfix"></div>
                            
                                        </div>
                                    </div><!-- /fusion-layout-column / fusion-one-half / fusion-column-last aka. advert -->
                                <?php
                                // reset counters
                                $ad_count = 1;
                                $col_count = 1;
                            } else {
                                $ad_count = $ad_count + 1;
                            }
                            ?>
                                <div class="fusion-layout-column fusion_builder_column fusion_builder_column_1_2  fusion-one-half fusion-column-<?php if($col_count == 1) { echo 'first'; } else { echo 'last'; } ?> event-listing 1_2"
                                    style="margin-top:0px;margin-bottom:20px;width:50%;width:calc(50% - ( ( 4% ) * 0.5 ) );<?php if($col_count == 1) { echo 'margin-right: 4%;'; } else { echo ''; } ?>">
                                    <div class="fusion-column-wrapper" style="padding: 0px; -webkit-background-size: cover; background-size: cover; min-height: 337px; height: auto; background-position: left top; background-repeat: no-repeat no-repeat;"
                                        data-bg-url="">
                                        <div class="event-category"><?php $cat_obj = get_the_category(); echo $cat_obj[0]->name; ?></div>
                                        <span class="fusion-imageframe imageframe-none imageframe-1 hover-type-none"><a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('events_mobile_thumb'); ?></a></span>
                                        <div class="event-content">
                                            <div class="fusion-title title fusion-sep-none fusion-title-size-two fusion-border-below-title"
                                                style="margin-top:0px;margin-bottom:0px;">
                                                <h2 class="title-heading-left"><?php the_title(); ?></h2>
                                            </div>
                                            <div class="fusion-text">
                                                <p><?php the_excerpt(); ?></p>
                                            </div>
                                            <div class="fusion-content-boxes content-boxes columns row fusion-columns-1 fusion-columns-total-2 fusion-content-boxes-1 content-boxes-icon-on-side content-left"
                                                data-animationoffset="100%" style="margin-top:0px;margin-bottom:60px;">
                                                <style type="text/css" scoped="scoped">
                                                    .fusion-content-boxes-1 .heading .content-box-heading {
                                                        color: #333333;
                                                    }
                        
                                                    .fusion-content-boxes-1 .fusion-content-box-hover .link-area-link-icon-hover .heading .content-box-heading,
                                                    .fusion-content-boxes-1 .fusion-content-box-hover .link-area-link-icon-hover .heading .heading-link .content-box-heading,
                                                    .fusion-content-boxes-1 .fusion-content-box-hover .link-area-box-hover .heading .content-box-heading,
                                                    .fusion-content-boxes-1 .fusion-content-box-hover .link-area-box-hover .heading .heading-link .content-box-heading,
                                                    .fusion-content-boxes-1 .fusion-content-box-hover .link-area-link-icon-hover.link-area-box .fusion-read-more,
                                                    .fusion-content-boxes-1 .fusion-content-box-hover .link-area-link-icon-hover.link-area-box .fusion-read-more::after,
                                                    .fusion-content-boxes-1 .fusion-content-box-hover .link-area-link-icon-hover.link-area-box .fusion-read-more::before,
                                                    .fusion-content-boxes-1 .fusion-content-box-hover .fusion-read-more:hover:after,
                                                    .fusion-content-boxes-1 .fusion-content-box-hover .fusion-read-more:hover:before,
                                                    .fusion-content-boxes-1 .fusion-content-box-hover .fusion-read-more:hover,
                                                    .fusion-content-boxes-1 .fusion-content-box-hover .link-area-box-hover.link-area-box .fusion-read-more,
                                                    .fusion-content-boxes-1 .fusion-content-box-hover .link-area-box-hover.link-area-box .fusion-read-more::after,
                                                    .fusion-content-boxes-1 .fusion-content-box-hover .link-area-box-hover.link-area-box .fusion-read-more::before,
                                                    .fusion-content-boxes-1 .fusion-content-box-hover .link-area-link-icon-hover .icon .circle-no,
                                                    .fusion-content-boxes-1 .heading .heading-link:hover .content-box-heading {
                                                        color: #a0ce4e;
                                                    }
                        
                                                    .fusion-content-boxes-1 .fusion-content-box-hover .link-area-box-hover .icon .circle-no {
                                                        color: #a0ce4e !important;
                                                    }
                        
                                                    .fusion-content-boxes-1 .fusion-content-box-hover .link-area-box.link-area-box-hover .fusion-content-box-button {
                                                        background: #96c346;
                                                        color: #ffffff;
                                                    }
                        
                                                    .fusion-content-boxes-1 .fusion-content-box-hover .link-area-box.link-area-box-hover .fusion-content-box-button .fusion-button-text {
                                                        color: #ffffff;
                                                    }
                        
                                                    .fusion-content-boxes-1 .fusion-content-box-hover .link-area-link-icon-hover .heading .icon>span {
                                                        background-color: #a0ce4e !important;
                                                    }
                        
                                                    .fusion-content-boxes-1 .fusion-content-box-hover .link-area-box-hover .heading .icon>span {
                                                        border-color: #a0ce4e !important;
                                                    }
                                                </style>
                                                <div class="fusion-column content-box-column content-box-column content-box-column-1 col-lg-12 col-md-12 col-sm-12 fusion-content-box-hover ">
                                                    <div class="col content-wrapper link-area-link-icon icon-hover-animation-fade" style="background-color:rgba(255,255,255,0);"
                                                        data-animationoffset="100%">
                                                        <div class="heading heading-with-icon icon-left">
                                                            <div class="icon"><i style="background-color:transparent;border-color:transparent;height:auto;width: 21px;line-height:normal;color:#fc317f;font-size:21px;"
                                                                    class="fontawesome-icon fa-map-marker-alt fas circle-no"></i></div>
                                                        </div>
                                                        <div class="fusion-clearfix"></div>
                                                        <div class="content-container" style="padding-left:41px;color:#747474;">
                                                            <p><?php 
                                                            
                                                            $location = get_field('address');
                                                            echo $location['address'];
                                                            
                                                            ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <style type="text/css" scoped="scoped">
                                                    .fusion-content-boxes-1 .fusion-content-box-hover .heading-link:hover .icon i.circle-yes,
                                                    .fusion-content-boxes-1 .fusion-content-box-hover .link-area-box:hover .heading-link .icon i.circle-yes,
                                                    .fusion-content-boxes-1 .fusion-content-box-hover .link-area-link-icon-hover .heading .icon i.circle-yes,
                                                    .fusion-content-boxes-1 .fusion-content-box-hover .link-area-box-hover .heading .icon i.circle-yes {
                                                        background-color: #a0ce4e !important;
                                                        border-color: #a0ce4e !important;
                                                    }
                                                </style>
                                                <div class="fusion-clearfix"></div>
                                            </div>
                                        </div>
                                        <div class="event-actions">
                                            <ul>
                                                <?php 
                                                    $user_saved = user_has_saved($post->ID);
                                                ?>
                                                <li class="event-save"><a class="ajax-link save_event" data-loggedin="<?php echo get_current_user_id(); ?>" data-postid="<?php echo $post->ID; ?>"><i class="<?php if($user_saved->saved == 1) { echo 'fas'; } else { echo 'far'; } ?> fa-star"></i></a></li>
                                                <li class="event-share">
                                                    <a
                                                        class="fusion-popover popover-share btn-popover-share ajax-link"
                                                        data-animation="1"
                                                        data-class="popover-share"
                                                        data-container="popover-share"
                                                        data-content="Loading..."
                                                        data-delay="50"
                                                        data-placement="top"
                                                        data-title=""
                                                        data-toggle="popover"
                                                        data-trigger="click"
                                                        data-original-title=""
                                                        data-url="<?php echo get_permalink(); ?>">
                                                        <i class="far fa-share-square"></i>
                                                    </a>
                                                </li>
                                                <?php 
                                                    $thumbs_up = count_ratings($post->ID, 1);
                                                    if($thumbs_up > 99) { $thumbs_up = "99+" ;}
                                                    $user_rating = user_has_rated($post->ID);
                                                ?>
                                                <li class="event-thumbup"><a class="ajax-link rating_thumbup" data-loggedin="<?php echo get_current_user_id(); ?>" data-postid="<?php echo $post->ID; ?>"><i class="<?php if($user_rating->rating == 1) { echo 'fas'; } else { echo 'far'; } ?> fa-thumbs-up"></i><?php if($thumbs_up > 0) { echo ' '.$thumbs_up; } ?></a></li>
                                                <?php 
                                                    $thumbs_down = count_ratings($post->ID, 2);
                                                    if($thumbs_down > 99) { $thumbs_down = "99+" ;}
                                                ?>
                                                <li class="event-thumbdown"><a class="ajax-link rating_thumbdown" data-loggedin="<?php echo get_current_user_id(); ?>" data-postid="<?php echo $post->ID; ?>"><i class="<?php if($user_rating->rating == 2) { echo 'fas'; } else { echo 'far'; } ?> fa-thumbs-down"></i><?php if($thumbs_down > 0) { echo ' '.$thumbs_down; } ?></a></li>
                                                <?php 
                                                    $num_comments = get_comments_number($post->ID);
                                                    if($num_comments > 0) :
                                                        if($num_comments > 99) { $num_comments = "99+" ;}
                                                        echo '<li class="event-comment"><a href="'.get_permalink().'#comments"><i class="fas fa-comments"></i> '.$num_comments.'</a></li>';
                                                    else :
                                                        echo '<li class="event-comment"><a href="'.get_permalink().'#respond"><i class="far fa-comments"></i></a></li>';
                                                    endif;
                                                ?>
                                            </ul>
                                        </div>
                                        <div class="fusion-clearfix"></div>
                        
                                    </div>
                                </div><!-- /fusion-layout-column / fusion-one-half / fusion-column-first aka. Event item -->

                            <?php
                                if($col_count == 1) { $col_count = 2; } else { $col_count = 1; }
                        endwhile;
                    
                    echo '</div>';
                echo '</div>';
            endif;    
        ?>   
                
    </div>
    
    <?php // Get the pagination. ?>
    <?php echo fusion_pagination( '', apply_filters( 'fusion_pagination_size', 1 ) ); // WPCS: XSS ok. ?>
</section>
<?php do_action( 'avada_after_content' ); ?>
<?php
get_footer();

/* Omit closing PHP tag to avoid "Headers already sent" issues. */