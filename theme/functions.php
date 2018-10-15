<?php
    wp_enqueue_script( 'woh-scripts', get_bloginfo( 'stylesheet_directory' ) . '/scripts.js', array( 'jquery' ), '1.0.0' );

    /*
     * SETUP CUSTOM POST TYPES
     */
    
    function create_posttype() {
 
        register_post_type( 'events',
        // CPT Options
            array(
                'labels' => array(
                    'name' => __( 'Events' ),
                    'singular_name' => __( 'Event' )
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'events'),
                'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
                'show_ui' => true,
                'show_in_menu' => true,
                'show_in_nav_menus' => true,
                'show_in_admin_bar' => true,
                'can_export' => true,
                'has_archive' => true,
                'exclude_from_search' => false,
                'publicly_queryable' => true,
                'capability_type' => 'post',
                'taxonomies' => array('post_tag','category'),
            )
        );
        
        register_post_type( 'places',
        // CPT Options
            array(
                'labels' => array(
                    'name' => __( 'Places' ),
                    'singular_name' => __( 'Place' )
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'places'),
                'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
                'show_ui' => true,
                'show_in_menu' => true,
                'show_in_nav_menus' => true,
                'show_in_admin_bar' => true,
                'can_export' => true,
                'has_archive' => true,
                'exclude_from_search' => false,
                'publicly_queryable' => true,
                'capability_type' => 'post',
                'taxonomies' => array('post_tag','category'),
            )
        );
        
        register_post_type( 'organisation',
        // CPT Options
            array(
                'labels' => array(
                    'name' => __( 'Organisations' ),
                    'singular_name' => __( 'Organisation' )
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'org'),
                'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
                'show_ui' => true,
                'show_in_menu' => true,
                'show_in_nav_menus' => true,
                'show_in_admin_bar' => true,
                'can_export' => true,
                'has_archive' => true,
                'exclude_from_search' => false,
                'publicly_queryable' => true,
                'capability_type' => 'post',
                'taxonomies' => array('post_tag','category'),
            )
        );
    }
    add_action( 'init', 'create_posttype' );    

    /*
     * SETUP ACF PRO GMAPS KEY
     */

    function my_acf_init() {
	
    	acf_update_setting('google_api_key', 'AIzaSyBzEKbhTh2FkqVLad3Mh3u3fpAUmycmha0');
    }
    
    add_action('acf/init', 'my_acf_init');
    
    /*
     * SETUP CUSTOM IMAGE SIZES
     */

    add_image_size( 'events_mobile_thumb', 800, 350, true);
    
    /*
     * CREATE CUSTOM EXCERPT LENGTH
     */

    function single_excerpt($limit=70) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      }	
      $content = preg_replace('/[.+]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }

    /*
     * COUNT RATINGS ON POST
     */

    function count_ratings($post_id, $rating) {
        global $wpdb;
        $query = "SELECT COUNT(`rating`) AS 'count' FROM `wp_woh_ratings` WHERE `post_id` = '$post_id' AND `rating` = '$rating'";
        $count = $wpdb->get_results( $query );
        return $count[0]->count;
    }

    /*
     * RATE A POST
     */

    function rate_post() {
        if(isset($_POST['post_id']) && isset($_POST['rating'])) :
            $post_id = $_POST['post_id'];
            $rating = $_POST['rating'];
            $user_id = get_current_user_id();
            global $wpdb;

            // check if user has already rated this post
            $rating_exists = user_has_rated($post_id);
            if($rating_exists !== false) {
                if($rating_exists->rating == $rating) {
                    $activity_id = $rating_exists->activity_id;
                    // ratings are the same to remove current rating
                    $wpdb->delete( 'wp_woh_ratings',
                        array(
                            'activity_id' => $activity_id
                        )
                    );

                    bp_activity_delete(
                        array(
                            'id' => $activity_id
                        )
                    );
                    
                    // return output
                    $new_count = count_ratings($post_id, $rating);
                    if($new_count > 99) { $new_count = "99+" ;}
                    if($rating == 1) {
                        echo '<i class="far fa-thumbs-up"></i> '.$new_count;
                    } else {
                        echo '<i class="far fa-thumbs-down"></i> '.$new_count;
                    }
                    die();
                } else {
                    // ratings are different so update current rating
                    $activity_id = $rating_exists->activity_id;
                    $wpdb->update('wp_woh_ratings', 
                        array( 
                            'rating' => (int) $rating
                        ),
                        array (
                            'activity_id'    => (int) $activity_id
                        ) 
                    );

                    // update buddypress
                    if($rating == 1) {
                        $action_text = bp_core_get_userlink( $user_id ).' recommends <a href="'.get_permalink($post_id).'">'.get_the_title($post_id).'</a>';
                        $activity_id = bp_activity_add( 
                            array(
                                'id' => $activity_id,
                                'action' => $action_text,
                                'component' => 'listings',
                                'type' => 'event',
                                'user_id' => $user_id,
                                'item_id' => $post_id
                            )
                        );
                    } else {
                        $action_text = bp_core_get_userlink( $user_id ).' doesn\'t recommends <a href="'.get_permalink($post_id).'">'.get_the_title($post_id).'</a>';
                        $activity_id = bp_activity_add( 
                            array(
                                'id' => $activity_id,
                                'action' => $action_text,
                                'component' => 'listings',
                                'type' => 'event',
                                'user_id' => $user_id,
                                'item_id' => $post_id
                            )
                        );
                    }

                    // return output
                    $new_count = count_ratings($post_id, $rating);
                    if($new_count > 99) { $new_count = "99+" ;}
                    if($rating == 1) {
                        echo '<i class="fas fa-thumbs-up"></i> '.$new_count;
                    } else {
                        echo '<i class="fas fa-thumbs-down"></i> '.$new_count;
                    }
                    die();
                }
            } else {
                // update buddypress to get activity_id
                // update buddypress
                if($rating == 1) {
                    $action_text = bp_core_get_userlink( $user_id ).' recommends <a href="'.get_permalink($post_id).'">'.get_the_title($post_id).'</a>';
                    $activity_id = bp_activity_add( 
                        array(
                            'action' => $action_text,
                            'component' => 'listings',
                            'type' => 'event',
                            'user_id' => $user_id,
                            'item_id' => $post_id
                        )
                    );
                } else {
                    $action_text = bp_core_get_userlink( $user_id ).' doesn\'t recommends <a href="'.get_permalink($post_id).'">'.get_the_title($post_id).'</a>';
                    $activity_id = bp_activity_add( 
                        array(
                            'action' => $action_text,
                            'component' => 'listings',
                            'type' => 'event',
                            'user_id' => $user_id,
                            'item_id' => $post_id
                        )
                    );
                }

                // the user has not rated yet
                $wpdb->insert( 
                    'wp_woh_ratings', 
                    array( 
                        'user_id'    => (int) $user_id,
                        'post_id'     => (int) $post_id,
                        'activity_id' => (int) $activity_id,
                        'rating' => (int) $rating
                    )
                );

                // return output
                $new_count = count_ratings($post_id, $rating);
                if($new_count > 99) { $new_count = "99+" ;}
                if($rating == 1) {
                    echo '<i class="fas fa-thumbs-up"></i> '.$new_count;
                } else {
                    echo '<i class="fas fa-thumbs-down"></i> '.$new_count;
                }
                die();
            }
        endif;
    }
    add_action('wp_ajax_rate_post', 'rate_post');

    /*
     * CHECK IF THE CURRENT USER HAS ALREADY RATED THE POST
     */

    function user_has_rated($post_id, $user_id=NULL) {
        global $wpdb;
        if($user_id === NULL) {
            $user_id = get_current_user_id();
        }
        $query = "SELECT * FROM `wp_woh_ratings` WHERE `post_id` = '$post_id' AND `user_id` = '$user_id'";
        $rating = $wpdb->get_results( $query );
        if($rating) {
            return $rating[0];
        } else {
            return false;
        }
    }

    /*
     * SAVE A POST
     */

    function save_post() {
        if(isset($_POST['post_id']) && isset($_POST['save'])) :
            $post_id = $_POST['post_id'];
            $save = $_POST['save'];
            $user_id = get_current_user_id();
            global $wpdb;

            // check if user has already rated this post
            $save_exists = user_has_saved($post_id);
            if($save_exists !== false) {
                // the user has already saved so remove
                $activity_id = $rating_exists->activity_id;
                $wpdb->delete( 'wp_woh_saved',
                    array(
                        'activity_id' => $activity_id
                    )
                );

                bp_activity_delete(
                    array(
                        'id' => $activity_id
                    )
                );
                    
                // return output
                if($save == 1) {
                    echo '<i class="far fa-star"></i>';
                } else {
                    echo '<i class="far fa-star"></i>';
                }
                die();
            } else {
                // update buddypress to get activity_id
                $action_text = bp_core_get_userlink( $user_id ).' is interested <a href="'.get_permalink($post_id).'">'.get_the_title($post_id).'</a>';
                $activity_id = bp_activity_add( 
                    array(
                        'action' => $action_text,
                        'component' => 'listings',
                        'type' => 'event',
                        'user_id' => $user_id,
                        'item_id' => $post_id
                    )
                );
                // User has not saved already
                $wpdb->insert('wp_woh_saved', 
                    array (
                        'user_id'    => (int) $user_id,
                        'post_id'     => (int) $post_id,
                        'activity_id' => (int) $activity_id,
                        'saved'     => (int) $save
                    ) 
                );

                // return output
                if($rating == 1) {
                    echo '<i class="fas fa-star"></i>';
                } else {
                    echo '<i class="fas fa-star"></i>';
                }
                die();
            }
        endif;
        
        
    }
    add_action('wp_ajax_save_post', 'save_post');
    
    function get_data()
    {
  
        if(isset($_POST['post_id'])) :
            $post_id = $_POST['post_id'];
            $save = $_POST['save'];
           // $user_id = get_current_user_id();
            global $wpdb;
            
            $query = "SELECT * FROM `wp_woh_saved` WHERE `post_id` = '$post_id'";
            $posts = $wpdb->get_results( $query );
           
            
       
            foreach($posts as $post) {
                $user_info = get_userdata($post->user_id);
            $user_login_name = $user_info->user_login;
                echo '<a href="'.site_url().'/members/'.$user_login_name.'"><img src="'.get_avatar_url( $post->user_id ).'"></a>';
            }
        endif;
        die();
    }
    add_action('wp_ajax_get_data','get_data');
    add_action('wp_ajax_nopriv_get_data', 'get_data');
    /*
     * CHECK IF THE CURRENT USER HAS ALREADY SAVED THE POST
     */

    function user_has_saved($post_id) {
        global $wpdb;
        $user_id = get_current_user_id();
        $query = "SELECT * FROM `wp_woh_saved` WHERE `post_id` = '$post_id' AND `user_id` = '$user_id'";
        $saved = $wpdb->get_results( $query );
        if($saved) {
            return $saved[0];
        } else {
            return false;
        }
    }

/**
 * The comment template.
 *
 * @access public
 * @param string     $comment The comment.
 * @param array      $args    The comment arguments.
 * @param int|string $depth   The comment depth.
 */
function woh_comment_template( $comment, $args, $depth ) {
    ?>
    <?php $add_below = ''; ?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
        <div class="the-comment">
            <div class="avatar"><?php echo get_avatar( $comment, 54 ); ?></div>
            <div class="comment-box">
                <div class="comment-author meta">
                    <strong><?php echo get_comment_author_link(); ?> </strong>
                    <div class="comment-user-rating">
                        <?php 
                            echo '<pre>';
                                var_dump($comment);
                            echo '</pre>';
                            $user = get_userdata($comment->user_id);
                            echo 'User: '.$user->ID;
                            echo 'Comment: '.$comment->post_id;
                            $user_rated = user_has_rated($comment->post_id ,$user->ID);
                            if($user_rating->rating == 1) {
                                echo '<i class="fas fa-thumbs-up"></i>';
                            } elseif($user_rating->rating == 2) {
                                echo '<i class="fas fa-thumbs-down"></i>';
                            }
                        ?>
                    </div>
                    <?php /* translators: %1$s: Comment date. %2$s: Comment time. */ ?>
                </div>
                <div class="comment-text">
                    <?php if ( '0' == $comment->comment_approved ) : ?>
                        <em><?php esc_attr_e( 'Your comment is awaiting moderation.', 'Avada' ); ?></em>
                        <br />
                    <?php endif; ?>
                    <?php comment_text(); ?>
                </div>
            </div>
        </div>
    <?php
}
?>