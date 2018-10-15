<?php
/**
 * Header-v3 template.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       http://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<div class="mobilefooterbar">
	<p class="notmember">Not A Member?<br /><small>Register now it's free.</small></p>
	<a class="fusion-button button-flat fusion-button-round button-large button-custom button-1 createaccount" target="_self" href="#"><i class="fa-users fas button-icon-left"></i><span class="fusion-button-text">Create Account </span></a>
</div>
<div class="fusion-header-sticky-height"></div>
<div id="desktopheader" class="fusion-header desktop">
	<div class="fusion-row">
		<?php if ( 'flyout' === Avada()->settings->get( 'mobile_menu_design' ) ) : ?>
			<div class="fusion-header-has-flyout-menu-content">
		<?php endif; ?>
		<?php avada_logo(); ?>
		<?php avada_main_menu(); ?>
		<?php avada_mobile_menu_search(); ?>
		<?php if ( 'flyout' === Avada()->settings->get( 'mobile_menu_design' ) ) : ?>
			</div>
		<?php endif; ?>
	</div>
</div>

<!-- mobile only header -->
<div class="fusion-header mobile">
	<div class="fusion-row">
		<?php avada_logo(); ?>
		<div class="loggedout mobile-header-links">
			<a href="#" class="header-more-menu"><i class="fontawesome-icon fa-grip-horizontal fas circle-yes" style="border-color:#000000;background-color:#000000;font-size:26.44px;line-height:22.88px;height:22.88px;width:22.88px;margin-right:14.5px;color:#ffffff;"></i></a>
			<a href="#"><i class="fontawesome-icon fa-user-circle far circle-yes" style="border-color:#000000;background-color:#000000;font-size:32.44px;line-height:22.88px;height:22.88px;width:22.88px;margin-right:6.5px;color:#ffffff;"></i></a>
		</div>
	</div>
</div>
<div class="mobilemenubar" id="mobilemenubar">
	<ul>
		<li>
			<a href="#">
				<i class="fontawesome-icon fa-home fas circle-yes" style="border-color:#fc3180;background-color:#fc3180;font-size:22.88px;line-height:33px;height:33px;width:45.76px;color:#ffffff;"></i>
				<span class="hide350">Home</span>
			</a>
		</li>
		<li>
			<a href="http://whatson.mylivepreview.com/events">
				<i class="fontawesome-icon fa-folder far circle-yes" style="border-color:#fc3180;background-color:#fc3180;font-size:22.88px;line-height:33px;height:33px;width:45.76px;color:#ffffff;"></i>
				<span class="hide350">Browse</span>
			</a>
		</li>
		<li>
			<a href="#">
				<i class="fontawesome-icon fa-calendar-alt far circle-yes" style="border-color:#fc3180;background-color:#fc3180;font-size:22.88px;line-height:33px;height:33px;width:45.76px;color:#ffffff;"></i>
				<span class="hide350">Calendar</span>
			</a>
		</li>
		<li>
			<a href="#">
				<i class="fontawesome-icon fa-pound-sign fas circle-yes" style="border-color:#fc3180;background-color:#fc3180;font-size:22.88px;line-height:33px;height:33px;width:45.76px;color:#ffffff;"></i>
				<span class="hide350">Discounts</span>
			</a>
		</li>
	</ul>
	<div syle="clear:both;"></div>
</div>
