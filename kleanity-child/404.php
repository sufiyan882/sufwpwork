<?php
/**
 * The template for displaying 404 pages (not found)
 */

	get_header();

	echo '<div class="kleanity-not-found-wrap pad404" id="kleanity-full-no-header-wrap" >';
	echo '<div class="kleanity-not-found-background" ><img src="https://advantagegps.mystagingwebsite.com/wp-content/themes/kleanity/images/404-background.jpg"  alt="Planets" usemap="#planetmap">    <a class="home404" href="' . esc_url(home_url('/')) . '" >' . esc_html__('Or Back To Homepage', 'kleanity') . '</a> 
	<a class="about404" href="' . esc_url(home_url('/about-us')) . '" >' . esc_html__('Or Back To about-us', 'kleanity') . '</a>
	</div>';
	echo '<div class="kleanity-not-found-container kleanity-container">';

	echo '<div class="kleanity-not-found-content kleanity-item-pdlr">';
	echo '<h1 class="kleanity-not-found-head" > OH NO! LOOKS LIKE WE TOOK THE WRONG TURN </h1>';
 

	echo '<div class="kleanity-not-found-back-to-home" ><a href="' . esc_url(home_url('/')) . '" >' . esc_html__('Or Back To Homepage', 'kleanity') . '</a></div>';
	echo '<div class="kleanity-not-found-back-to-about" ><a href="' . esc_url(home_url('/about-us')) . '" >' . esc_html__('Or Back To about-us', 'kleanity') . '</a></div>';
	echo '</div>'; // kleanity-not-found-content

	echo '</div>'; // kleanity-not-found-container
	 

	get_footer(); 
