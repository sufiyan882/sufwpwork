<?php
/**
 *  Template Name: Support
 */

get_header(); 
			
 ?>
<strong>Welcome to Advantage GPS Suport center. If you're just getting  started, please watch the videos in the order posted below. We've also provided helpful documents you can download.</strong>
<br/><br/>

<div class="row">
<div class="col-md-8 reporter-suport">
 <?php
 
$args = array( 'post_type' => 'vm_video', 'posts_per_page' => 10, 'orderby' => 'meta_value', 'meta_key'      => 'order_number', 'order' => "ASC"  );
$loop = new WP_Query( $args );
/*echo"<pre>";
print_r($loop);
echo"</pre>";*/

while ( $loop->have_posts() ) : $loop->the_post();
  $vem = get_post_meta($post->ID, 'vimeo_video', true);
  $ord =  get_post_meta($post->ID, 'order_number', true);
  if(!empty($vem)){
  echo '<div class="col-md-6">';
   //$vem = get_post_custom($post->ID, 'vimeo video', true);
    
 	 echo '<iframe src="https://player.vimeo.com/video/'.$vem.'" width="300" height="350" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
    // echo $count = get_comments_number();
 	   //echo "<h3> <span>". $count."</span> ".get_the_title()."</h3>"; 

      echo "<h3> <span>". $ord."</span> ".get_the_title()."</h3>";

    //echo  "<p>".get_the_content()."</p>";
    echo  "<p>".wp_trim_words( get_the_content(), 13, '...' )."</p>";
    }
  echo '</div>';
endwhile;


?>
</div>
<div class="col-md-4">
<?php dynamic_sidebar('right-video-sidebar'); ?>
</div>
</div>
<?php get_footer() ?>