<?php

function thinkup_widgets_init() {

	register_sidebar( array(
		'name'          => 'Header Top',
		'id'            => 'sidebar-1',
		'before_widget' => '<aside class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	}
add_action( 'widgets_init', 'thinkup_widgets_init' );

/* sales force form wedget blog form submit ajex action function */

add_action( 'wp_ajax_nopriv_send_mail_bh', 'send_mail_bh' );
add_action( 'wp_ajax_send_mail_bh', 'send_mail_bh' );

function send_mail_bh() {

	$slug = $_POST['slug'];
	$title = $_POST['title'];
	$postid = $_POST['postid'];
	$title = str_replace("Advantage GPS by Procon Analytics", "Advantage Website", $title);
	$values = array();
	global $wpdb;
	parse_str($_POST['formdata'], $values);
	// print_r($values);
	$fn = $values['first_name'];
	$ln = $values['last_name'];
	$cm = $values['company'];
	$ct = $values['city'];
	$st = $values['state'];
	$zp = $values['zip'];
	$ph = $values['phone'];
	$em = $values['email'];
	
  	date_default_timezone_set('America/Los_Angeles');
    $timestamp = date("Y-m-d h:i:sa");
	$sel = $wpdb->insert('wp_self_form',array(
		'first_name'=>$fn,
		'last_name'=>$ln,
		'company'=>$cm,
		'city'=>$ct,
		'state'=>$st,
		'zip'=>$zp,
		'phone'=>$ph,
		'email'=>$em,
		'page_source'=>$slug,
		'date_time'=>$timestamp
	));
        /* Blogs Form */
	$to = array(
	   'info@advantagegps.com',
       'ctutor@proconanalytics.com',
       'cbortfeld@proconanalytics.com'
       //'henideepak20@gmail.com',
     // 'sufiyanidea4@gmail.com'  
    );

	/* sales force spical offer form wedget Spical blog form ajex submit action function */

	if($slug=="/special-offers/"){
		$subject = 'Advantage GPS Special Offers';
	} else {
		if(!empty($postid)){
			$subject = $postid;
		} else {
		$subject = $title;
		}
	}

	$message = '';
	$message .= 'First name : '.$fn.'<br />';
	$message .= 'Last name : '.$ln.'<br />';
	$message .= 'Company : '.$cm.'<br />';
	$message .= 'City : '.$ct.'<br />';
	$message .= 'State : '.$st.'<br />';
	$message .= 'ZIP : '.$zp.'<br />';
	$message .= 'Phone : '.$ph.'<br />';
	$message .= 'Email : '.$em.'<br />';


	$headers = array('Content-Type: text/html; charset=UTF-8');

	$ml = wp_mail( $to, $subject, $message, $headers, $attachments );

	if($ml){
		echo "sent";
	}
	die();
}

/* sales force form contact page and refaral form submit action function 
javascript function callAjax & validation function */

add_action( 'wp_ajax_nopriv_send_mail_bh_ref', 'send_mail_bh_ref' );
add_action( 'wp_ajax_send_mail_bh_ref', 'send_mail_bh_ref' );

function send_mail_bh_ref() {

	$slug = $_POST['slug'];
	$title = $_POST['title'];
	date_default_timezone_set('America/Los_Angeles');
	$timestamp = date("Y-m-d h:i:sa");
	$title = str_replace("Advantage GPS by Procon Analytics", "Advantage Website", $title);

	$values = array();
	$suf = array();
	$slug = $_POST['slug'];
	global $wpdb;
	parse_str($_POST['formdata'], $values);
	parse_str($_POST['contectdata'], $suf);
	if(!empty($suf)){
		/*if contact page*/
		    $us_fn = $suf['first_name'];
			$las_ln = $suf['last_name'];
			$company = $suf['company'];
			$add = $suf['address'];
			$city = $suf['city'];
			$state = $suf['state'];
			$zip = $suf['zip'];
			$phone = $suf['phone'];
			$email = $suf['email'];


		$sel = $wpdb->insert('wp_self_form',array(
		'first_name'=>$us_fn,
		'last_name'=>$las_ln,
		'company'=>$company,
		'city'=>$city,
		'state'=>$state,
		'zip'=>$zip,
		'phone'=>$phone,
		'email'=>$email,
		'address'=>$add,
		'page_source'=>$slug,
		'date_time'=>$timestamp

	));
	if($sel){
		//echo "done";
	}

    $message = '';
	$message .= '<br /><strong>Self User Details:</strong> <br />';
	$message .= 'First name : '.$us_fn.'<br />';
	$message .= 'Last name : '.$las_ln.'<br />';
	$message .= 'Company : '.$company.'<br />';
	$message .= 'Address : '.$add.'<br />';
	$message .= 'City : '.$city.'<br />';
	$message .= 'State : '.$state.'<br />';
	$message .= 'Zip : '.$zip.'<br />';
	$message .= 'Phone : '.$phone.'<br />';
	$message .= 'Email : '.$email.'<br />';

 
          /* Test form */
   if($slug=="/test-sales-form/"){
 
		  $multiple_recipients = array(
	      'ctutor@proconanalytics.com',
	      'Inquiry@advantagegps.com',
	      'cbortfeld@proconanalytics.com', 
	      'ptiwebtech@gmail.com'
	      //'sufiyanidea4@gmail.com'
	      
	    );
	} else {
             /*contect form */
	    $multiple_recipients = array(
	     'ctutor@proconanalytics.com',
         'cbortfeld@proconanalytics.com',
	     'inquiry@advantagegps.com'
	     //'sufiyanidea4@gmail.com'

	    );
	}

	} else {
		/*if referral*/
	
	$user_fn = $values['firstname'];
	$user_ln = $values['lastname'];
	$user_cm = $values['companyname'];
	$user_st = $values['state'];
	$user_ph = $values['phone'];
	$user_ad = $values['address'];
	$user_cty = $values['city'];
	$user_zp = $values['zip'];
	$user_eml = $values['email'];


	$message = '';
	$message .= '<br /><strong>Info on who is referring:</strong> <br />';
	$message .= 'First name : '.$user_fn.'<br />';
	$message .= 'Last name : '.$user_ln.'<br />';
	$message .= 'Company : '.$user_cm.'<br />';
	$message .= 'State : '.$user_st.'<br />';
	$message .= 'Phone : '.$user_ph.'<br />';
	$message .= 'Address : '.$user_ad.'<br />';
	$message .= 'City : '.$user_cty.'<br />';
	$message .= 'Zip : '.$user_zp.'<br />';
	$message .= 'Email : '.$user_eml.'<br />';


	$self = $wpdb->insert('wp_ref_self',array(
		'firstname'=>$user_fn,
		'lastname'=>$user_ln,
		'companyname'=>$user_cm,
		'state'=>$user_st,
		'phone'=>$user_ph,
		'page_source'=>$slug,
		'date_time'=>$timestamp
	));

  	$lastInsertId = $wpdb->insert_id;

	foreach ($_POST['ref_form_data'] as $rfrl) {

		$values = array();
		$slug = $_POST['slug'];
		parse_str($rfrl,$values);

			$ref_fn = $values['firstname_ref'];
			$ref_ln = $values['lastname_ref'];
			$ref_cm = $values['companyname_ref'];
			$ref_st = $values['state_ref'];
			$ref_ph = $values['phone_ref'];

			$message .= '<br /><strong>Info on the person who is being referred:</strong> <br />';
			$message .= 'First name : '.$ref_fn.'<br />';
			$message .= 'Last name : '.$ref_ln.'<br />';
			$message .= 'Company : '.$ref_cm.'<br />';
			$message .= 'State : '.$ref_st.'<br />';
			$message .= 'Phone : '.$ref_ph.'<br />';


			$wpdb->insert('wp_ref_other',array(
				'firstname_ref'=>$ref_fn,
				'lastname_ref'=>$ref_ln,
				'companyname_ref'=>$ref_cm,
				'state_ref'=>$ref_st,
				'phone_ref'=>$ref_ph,
				'ref_user_id'=>$lastInsertId,
				'ref_user_name'=>$user_fn,
				'page_source'=>$slug,
				'date_time'=>$timestamp
			));

	}

	 if($slug=="/referrals/"){

	 	$multiple_recipients = array(
    		 'ctutor@advantagegps.com',
    		 'referral@advantagegps.com' 
    		// 'sufiyanidea4@gmail.com'
    	);

    	$subject = 'New Referral - Advantage Website';

	 } else  {

	 	$multiple_recipients = array(
    	   'info@AdvantageGPS.com'   
    	   //'sufiyanidea4@gmail.com'	  
    	);

    	$subject = 'ARA Referral - Advantage Website';

	 }
}

	$headers = array('Content-Type: text/html; charset=UTF-8');

	$ml = wp_mail( $multiple_recipients, $subject, $message, $headers, $attachments );

	if($ml){
		echo "sentByBIlal";
	}

	die();
}


function remove_querystring_var($url, $key) {
    $url = preg_replace('/(.*)(?|&)' . $key . '=[^&]+?(&)(.*)/i', '$1$2$4', $url . '&');
    $url = substr($url, 0, -1);
    return ($url);
}

function _remove_script_version( $src ){
$parts = explode( '?ver', $src );
return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );



add_action( 'wp_ajax_nopriv_delete_ids', 'delete_ids' );
add_action( 'wp_ajax_delete_ids', 'delete_ids' );

function delete_ids() {

	 $myid = $_POST['favorite_id'];

		foreach ($myid as $id) {
		$tobedelte .= $id.",";
		}
		global $wpdb;
		$tobedelte = rtrim($tobedelte,",");
		$thisisquery = "DELETE FROM wp_self_form WHERE ID IN($tobedelte)";
		$qr = $wpdb->query($thisisquery);

		if($qr){
			echo "deleted";
		}


	die();
}

/* ajent order form select option value */

function cf7_dynamic_select_do_example1($choices, $args=array()) {
    $choices = array(
        'Select Shipping Method' => '',
        'Ground ($2/device)' => '2',
        'Express 3rd Day Delivery ($3/device)' => '3',
        'Two Day Delivery ($4/device)' => '4',
        'Overnight Delivery ($5/device)' => '5',
        'Priority Overnight ($7/device)' => '7',
        'Saturday Delivery ($7/device + $25 Saturday fee)' => '32'
    );
    return $choices;
} 
add_filter('wpcf7_dynamic_select_example1', 
             'cf7_dynamic_select_do_example1', 10, 2);


remove_filter('wpcf7_validate_radio', 'wpcf7_checkbox_validation_filter', 10);

add_filter('wpcf7_validate_radio', function($result, $tag) {
  if (in_array('class:required', $tag->options)) {
    $result = wpcf7_checkbox_validation_filter($result, $tag);
  }
  return $result;
}, 10, 2);

add_action('admin_head', 'hide_jmdn');
function hide_jmdn() {
	  echo '<style>
		      .jquery-migrate-deprecation-notice {
		            display: none!important;
				}
		.jquery-migrate-dashboard-notice {
			display: none;
}
  </style>';
}



