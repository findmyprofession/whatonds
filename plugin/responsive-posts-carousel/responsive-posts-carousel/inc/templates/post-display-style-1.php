<div class="rpc-post-carousel1 rpc-box style4 rpc-bg">        <div class="fusion-column-wrapper" style="padding: 0px; background-position: left top; background-repeat: no-repeat; background-size: cover; min-height: 350px; height: auto;" data-bg-url="">  <div class="event-category">Comedy Gigs &amp; Festivals</div>      <div class="rpc-post-image">	            <a href="<?php echo get_permalink($post_id);
; ?>" target="<?php echo $carousel_settings['read_more_target']; ?>">	                   <?php do_action('rpc_carousel_thumbnail', $post_id, $carousel_settings); ?>	            </a>		<span class="rpc-comment-box">	                <span class="rpc-post-comment">		                    <?php $comments = wp_count_comments(get_the_id());
echo $comments->total_comments; ?>	                </span>		            </span>	        </div>	        <div class="event-content">            <div class="fusion-title title fusion-sep-none fusion-title-size-two fusion-border-below-title" style="margin-top:0px;margin-bottom:0px;">                       <h2 class="title-heading-left">                             <?php do_action('rpc_carousel_title', $post_id, $carousel_settings); ?>                </h2></div>            <div class="clearfix"></div>            <div class="fusion-text">                           <?php do_action('rpc_carousel_desc', $post_id, $carousel_settings); ?>                     <?php do_action('rpc_read_more_btn', $post_id, $carousel_settings); ?>	</div>               <div class="shortdescription who_interested_title">                        </div>                     <div class="fusion-column content-box-column content-box-column content-box-column-1 col-lg-12 col-md-12 col-sm-12 fusion-content-box-hover "><div class="col content-wrapper link-area-link-icon icon-hover-animation-fade" style="background-color:rgba(255,255,255,0);" data-animationoffset="100%"><div class="heading heading-with-icon icon-left"><div class="icon"><i style="background-color:transparent;border-color:transparent;height:auto;width: 21px;line-height:normal;color:#fc317f;font-size:21px;" class="fontawesome-icon fa-calendar-alt far circle-no"></i></div></div><div class="fusion-clearfix"></div><div class="content-container" style="padding-left:41px;color:#747474;">                        <p><?php echo the_field('from', $post_id); ?></p>                    </div></div></div>            <div class="fusion-clearfix"></div>            <div class="fusion-column content-box-column content-box-column content-box-column-2 col-lg-12 col-md-12 col-sm-12 fusion-content-box-hover  content-box-column-last"><div class="col content-wrapper link-area-link-icon icon-hover-animation-fade" style="background-color:rgba(255,255,255,0);" data-animationoffset="100%"><div class="heading heading-with-icon icon-left"><div class="icon"><i style="background-color:transparent;border-color:transparent;height:auto;width: 21px;line-height:normal;color:#fc317f;font-size:21px;" class="fontawesome-icon fa-map-marker-alt fas circle-no"></i></div></div><div class="fusion-clearfix"></div><div class="content-container" style="padding-left:41px;color:#747474;">                        <p><?php $venue_id = get_field('venue', $post_id);
$post_data_venue = get_post($venue_id[0]);
echo $post_data_venue->post_title; ?></p>                    </div></div></div>            <div id="interested1">                   </div>                                    <div class="single-event-actions who_under_icons">                          <div class="event-actions">                                         <ul>        <?php $user_saved = user_has_saved($categoryPost1[1]->ID); ?>                                      <li class="event-save"><a class="ajax-link" id="save_event1"                                                     data-loggedin="<?php echo get_current_user_id(); ?>"  data-postid="<?php echo $categoryPost1[1]->ID; ?>"><i class="<?php if ($user_saved->saved == 1) {
    echo 'fas';
} else {
    echo 'far';
} ?> fa-star"></i> </a><br/>                                                  </li>                                                          <li class="event-share">                                           <div id="sharebtncon"></div>                                  <div class="sharebtncon">                                        <a href="javascript:;" class="sharebtn"><i class="far fa-share-square"></i></a><br/> </a>                                     <div style="display:none" class="social-share-box">                                                 <a class="icon icon-facebook icon-replacement" href="http://www.facebook.com/sharer/sharer.php?url=<?php echo urlencode(get_permalink()); ?>" target="_blank"><i class="fab fa-facebook"></i></a>                                                       <a class="icon icon-facebook icon-replacement" href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title()); ?><?php echo get_permalink(); ?>" target="_blank"><i class="fab fa-twitter"></i></a>                                     <a class="icon icon-facebook icon-replacement" href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink()); ?>" target="_blank"><i class="fab fa-google-plus"></i></a>  </div>                                                 </div>                                                      </li>        <?php $thumbs_up = count_ratings($categoryPost1[1]->ID, 1);
if ($thumbs_up > 99) {
    $thumbs_up = "99+";
} $user_rating = user_has_rated($categoryPost1[1]->ID); ?>                                    <li class="event-thumbup"><a class="ajax-link" id="rating_thumbup1"  data-loggedin="<?php echo get_current_user_id(); ?>"  data-postid="<?php echo $categoryPost1[1]->ID; ?>">                                <i class="<?php if ($user_rating->rating == 1) {
    echo 'fas';
} else {
    echo 'far';
} ?> fa-thumbs-up"></i><?php if ($thumbs_up > 0) {
    echo ' ' . $thumbs_up;
} ?></a><br/>                                     </li>                                                <?php $thumbs_down = count_ratings($categoryPost1[1]->ID, 2);
if ($thumbs_down > 99) {
    $thumbs_down = "99+";
} ?>                                    <li class="event-thumbdown"><a class="ajax-link" id="rating_thumbdown1" data-loggedin="<?php echo get_current_user_id(); ?>" data-postid="<?php echo $categoryPost1[1]->ID; ?>">                                <i class="<?php if ($user_rating->rating == 2) {
    echo 'fas';
} else {
    echo 'far';
} ?> fa-thumbs-down"></i><?php if ($thumbs_down > 0) {
    echo ' ' . $thumbs_down;
} ?></a><br/>                                     </li>                                                <?php $num_comments = get_comments_number($categoryPost1[1]->ID);
$url_to_event = get_permalink($categoryPost1[1]->ID);
if ($num_comments > 0) : if ($num_comments > 99) {
        $num_comments = "99+";
    } echo '<li class="event-comment"><a href="' . $url_to_event . '"><i class="fas fa-comments"></i> ' . $num_comments . '</a><br/> </li>';
else : echo '<li class="event-comment"><a href="' . $url_to_event . '"><i class="far fa-comments"></i></a><br/> </li>';
endif; ?>                                </ul>                          </div>                                        <div style="clear:both;"></div>                 </div></div></div></div>