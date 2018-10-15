<?php
/**
 * Comments template.
 *
 * @package Avada
 * @subpackage Templates
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

do_action( 'avada_before_comments' );

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
?>

<?php if ( post_password_required() ) : ?>
	<?php return; ?>
<?php endif; ?>
<?php if ( comments_open() ) : ?>
	<?php
	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ) ? " aria-required='true'" : '';
	$html_req  = ( $req ) ? " required='required'" : '';
	$html5     = ( 'html5' === current_theme_supports( 'html5', 'comment-form' ) ) ? 'html5' : 'xhtml';
	$consent   = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

	$fields = array();

	//$fields['author']  = '<div id="comment-input"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="' . esc_html__( 'Name (required)', 'Avada' ) . '" size="30"' . $aria_req . $html_req . ' aria-label="' . esc_attr__( 'Name', 'Avada' ) . '"/>';
	$fields['email']   = '<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" placeholder="' . esc_html__( 'Email (required)', 'Avada' ) . '" size="30" ' . $aria_req . $html_req . ' aria-label="' . esc_attr__( 'Email', 'Avada' ) . '"/>';
	$fields['url']     = '<input id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="' . esc_html__( 'Website', 'Avada' ) . '" size="30" aria-label="' . esc_attr__( 'URL', 'Avada' ) . '" /></div>';
	$fields['cookies'] = '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' /><label for="wp-comment-cookies-consent">' . esc_html__( 'Save my name, email, and website in this browser for the next time I leave a review.', 'Avada' ) . '</label></p>';

	$comments_args = array(
		'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field'        => '<div id="comment-textarea"><label class="screen-reader-text" for="comment">' . esc_attr__( 'Review', 'Avada' ) . '</label><input type="text" name="comment" id="comment" cols="45" rows="8" aria-required="true" required="required" tabindex="0" class="why_input" placeholder="' . esc_html__( 'Why?', 'Avada' ) . '" /></div>',
		
		/* translators: Opening and closing link tags. */
		'must_log_in'          => '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a review.', 'Avada' ), '<a href="' . wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) . '">', '</a>' ) . '</p>',
		/* translators: %1$s: The username. %2$s and %3$s: Opening and closing link tags. */
	//	'logged_in_as'         => '<p class="logged-in-as">' . sprintf( esc_html__( 'Logged in as %1$s. %2$sLog out &raquo;%3$s', 'Avada' ), '<a href="' . admin_url( 'profile.php' ) . '">' . $user_identity . '</a>', '<a href="' . wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) . '" title="' . esc_html__( 'Log out of this account', 'Avada' ) . '">', '</a>' ) . '</p>',
		'comment_notes_before' => '',
		'id_submit'            => 'comment-submit',
		'class_submit'         => 'fusion-button fusion-button-default fusion-button-default-size',
		'label_submit'         => esc_html__( 'Post', 'Avada' ),
	);

	comment_form( $comments_args );

endif;
 $title_size = ( false === avada_is_page_title_bar_enabled( get_the_ID() ) ? '2' : '3' ); global $wpdb;?>
<div class="shortdescription recommend_event_title" style="float: left;width: auto;">
    <?php $select_value = "select * from wp_comments where comment_post_ID=".get_the_ID()."";
  //  echo $select_value;
    $like_count=0;$unline_count=0;
    $result_comment_ids = $wpdb->get_results($select_value);
    for($i=0;$i<count($result_comment_ids);$i++){
        $count_like = "select * from wp_commentmeta where comment_id=".$result_comment_ids[$i]->comment_ID." and meta_key='cld_like_count'";
        $result_like_count = $wpdb->get_results($count_like);
        
        foreach($result_like_count as $val){
        $like_count = $like_count + $val->meta_value;    
        }
        
        
         $count_dislike = "select * from wp_commentmeta where comment_id=".$result_comment_ids[$i]->comment_ID." and meta_key='cld_dislike_count'";
          $result_dislike_count = $wpdb->get_results($count_dislike);
            foreach($result_dislike_count as $val){
        $unline_count = $unline_count + $val->meta_value;    
        }
            
    }
//echo $like_count;echo '<br>;';echo $unline_count;
    $get_percetange = 0;
    if($like_count != 0){
    $get_percetange = (int) (($unline_count*100)/$like_count);
    }
  //  echo $get_percetange;
    ?>
                    <h2><span><?php echo $get_percetange."%"; ?></span> recommend this event</h2>
    </div>
<?php if ( have_comments() ) : ?>

	<div id="comments" class="comments-container">
		<?php ob_start(); ?>
		<?php comments_number( esc_html__( 'No Reviews', 'Avada' ), esc_html__( 'One Review', 'Avada' ), esc_html( _n( '% Review', '% Reviews', get_comments_number(), 'Avada' ) ) ); ?>
		<?php Avada()->template->title_template( ob_get_clean(), $title_size ); ?>

		<?php //if ( function_exists( 'the_comments_navigation' ) ) : ?>
			<?php //the_comments_navigation(); ?>
		<?php // endif; ?>

		<ol class="comment-list commentlist">
			<?php wp_list_comments( 'callback=woh_comment_template' ); ?>
		</ol><!-- .comment-list -->

		<?php if ( function_exists( 'the_comments_navigation' ) ) : ?>
			<?php the_comments_navigation(); ?>
		<?php endif; ?>
	</div>

<?php endif; ?>

<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
	<p class="no-comments"><?php esc_html_e( 'Reviews are closed.', 'Avada' ); ?></p>
<?php endif; 



/* Omit closing PHP tag to avoid "Headers already sent" issues. */
