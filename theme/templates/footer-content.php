<?php
/**
 * Footer content template.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       http://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 * @since      5.3.0
 */

$c_page_id = Avada()->fusion_library->get_page_id();

/**
 * Check if the footer widget area should be displayed.
 */
$display_footer = get_post_meta( $c_page_id, 'pyre_display_footer', true );
?>

<?php
/**
 * Check if the footer copyright area should be displayed.
 */
$display_copyright = get_post_meta( $c_page_id, 'pyre_display_copyright', true );
?>
<?php if ( ( Avada()->settings->get( 'footer_copyright' ) && 'no' !== $display_copyright ) || ( ! Avada()->settings->get( 'footer_copyright' ) && 'yes' === $display_copyright ) ) : ?>
	<?php $footer_copyright_center_class = ( Avada()->settings->get( 'footer_copyright_center_content' ) ) ? ' fusion-footer-copyright-center' : ''; ?>

	<footer id="footer" class="desktop fusion-footer-copyright-area<?php echo esc_attr( $footer_copyright_center_class ); ?>">
		<div class="fusion-row">
			<div class="fusion-copyright-content">

				<?php
				/**
				 * Footer Content (Copyright area) avada_footer_copyright_content hook.
				 *
				 * @hooked avada_render_footer_copyright_notice - 10 (outputs the HTML for the Theme Options footer copyright text)
				 * @hooked avada_render_footer_social_icons - 15 (outputs the HTML for the footer social icons)..
				 */
				do_action( 'avada_footer_copyright_content' );
				?>

			</div> <!-- fusion-fusion-copyright-content -->
		</div> <!-- fusion-row -->
	</footer> <!-- #footer -->
    <footer id="footer" class="mobile fusion-footer-legal-area<?php echo esc_attr( $footer_copyright_center_class ); ?>">
        <div class="fusion-row">
			<div class="fusion-mobile-legal">
                <ul>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Terms</a></li>
                    <li><a href="#">Help &amp; Support</a></li>
                </ul>
            </div><!--fusion-mobile-legel-->
        </div> <!-- fusion-row -->
    </footer> <!-- #footer -->
    <footer id="footer" class="mobile fusion-footer-copyright-area<?php echo esc_attr( $footer_copyright_center_class ); ?>">
        <div class="fusion-row">
			<div class="fusion-copyright-content">
                <p>© Copyright 2018 Hull Whats On Ltd. All Rights Reserved. Registered in England and Wales - Company No. 10107323</p>
            </div> <!-- fusion-fusion-copyright-content -->
		</div> <!-- fusion-row -->
    </footer><!-- #footer -->
<?php endif; // End footer copyright area check. ?>
<?php
// Displays WPML language switcher inside footer if parallax effect is used.
if ( defined( 'ICL_SITEPRESS_VERSION' ) && 'footer_parallax_effect' === Avada()->settings->get( 'footer_special_effects' ) ) {
	global $wpml_language_switcher;
	$slot = $wpml_language_switcher->get_slot( 'statics', 'footer' );
	if ( $slot->is_enabled() ) {
		echo $wpml_language_switcher->render( $slot ); // WPCS: XSS ok.
	}
}
