<?php
/**
 * The main template file
 */

	get_header();

	echo '<div class="kleanity-content-container kleanity-container">';
	echo '<div class="kleanity-sidebar-style-none" >'; // for max width

	get_template_part('content/archive', 'default');

	echo '</div>'; // kleanity-content-area
	echo '</div>'; // kleanity-content-container

	get_footer(); 
	
master