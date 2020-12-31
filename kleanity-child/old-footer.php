<?php
/**
 * The template for displaying the footer
 */
	
	$post_option = kleanity_get_post_option(get_the_ID());
	if( empty($post_option['enable-footer']) || $post_option['enable-footer'] == 'default' ){
		$enable_footer = kleanity_get_option('general', 'enable-footer', 'enable');
	}else{
		$enable_footer = $post_option['enable-footer'];
	}	
	if( empty($post_option['enable-copyright']) || $post_option['enable-copyright'] == 'default' ){
		$enable_copyright = kleanity_get_option('general', 'enable-copyright', 'enable');
	}else{
		$enable_copyright = $post_option['enable-footer'];
	}

	$fixed_footer = kleanity_get_option('general', 'fixed-footer', 'disable');
	echo '</div>'; // kleanity-page-wrapper

	if( $enable_footer == 'enable' || $enable_copyright == 'enable' ){

		if( $fixed_footer == 'enable' ){
			echo '</div>'; // kleanity-body-wrapper

			echo '<footer class="kleanity-fixed-footer" id="kleanity-fixed-footer" >';
		}else{
			echo '<footer>';
		}

		if( $enable_footer == 'enable' ){

			echo '<div class="kleanity-footer-wrapper" >';
			echo '<div class="kleanity-footer-container kleanity-container clearfix" >';
			
			$kleanity_footer_layout = array(
				'footer-1'=>array('kleanity-column-60'),
				'footer-2'=>array('kleanity-column-15', 'kleanity-column-15', 'kleanity-column-15', 'kleanity-column-15'),
				'footer-3'=>array('kleanity-column-15', 'kleanity-column-15', 'kleanity-column-30',),
				'footer-4'=>array('kleanity-column-20', 'kleanity-column-20', 'kleanity-column-20'),
				'footer-5'=>array('kleanity-column-20', 'kleanity-column-40'),
				'footer-6'=>array('kleanity-column-40', 'kleanity-column-20'),
			);
			
			$count = 0;
			$footer_style = kleanity_get_option('general', 'footer-style');
			$footer_style = empty($footer_style)? 'footer-2': $footer_style;
			foreach( $kleanity_footer_layout[$footer_style] as $layout ){ $count++;
				echo '<div class="kleanity-footer-column kleanity-item-pdlr ' . esc_attr($layout) . '" >';
				if( is_active_sidebar('footer-' . $count) ){
					dynamic_sidebar('footer-' . $count); 
				}
				echo '</div>';
			}
			
			echo '</div>'; // kleanity-footer-container
			echo '</div>'; // kleanity-footer-wrapper 

		} // enable footer

		if( $enable_copyright == 'enable' ){
			$copyright_text = kleanity_get_option('general', 'copyright-text');

			if( !empty($copyright_text) ){
				echo '<div class="kleanity-copyright-wrapper" >';
				echo '<div class="kleanity-copyright-container kleanity-container">';
				echo '<div class="kleanity-copyright-text kleanity-item-pdlr">';
				echo gdlr_core_text_filter($copyright_text);
				echo '</div>';
				echo '</div>';
				echo '</div>'; // kleanity-copyright-wrapper
			}
		}

		echo '</footer>';

		if( $fixed_footer == 'disable' ){
			echo '</div>'; // kleanity-body-wrapper
		}
		echo '</div>'; // kleanity-body-outer-wrapper

	// disable footer	
	}else{
		echo '</div>'; // kleanity-body-wrapper
		echo '</div>'; // kleanity-body-outer-wrapper
	}

	$header_style = kleanity_get_option('general', 'header-style', 'plain');
	
	if( $header_style == 'side' || $header_style == 'side-toggle' ){
		echo '</div>'; // kleanity-header-side-nav-content
	}

	$back_to_top = kleanity_get_option('general', 'enable-back-to-top', 'disable');
	if( $back_to_top == 'enable' ){
		echo '<a href="#kleanity-top-anchor" class="kleanity-footer-back-to-top-button" id="kleanity-footer-back-to-top-button"><i class="fa fa-angle-up" ></i></a>';
	}
?>

<?php if(is_page('test-sf')) {?>


	

<form action="https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST">

<input type="hidden" name="oid" value="00D36000000Y6GB">
<input type="hidden" name="retURL" value="http://test.com">

<!--  ----------------------------------------------------------------------  -->
<!--  NOTE: These fields are optional debugging elements. Please uncomment    -->
<!--  these lines if you wish to test in debug mode.                          -->
<input type="hidden" name="debug" value="1">                            
<input type="hidden" name="debugEmail" value="cbortfeld@proconanalytics.com">  
<!--  ----------------------------------------------------------------------  -->

<label for="first_name">First Name</label><input id="first_name" maxlength="40" name="first_name" size="20" type="text" onclick="testfun();"><br>

<label for="last_name">Last Name</label><input id="last_name" maxlength="80" name="last_name" size="20" type="text"><br>

<label for="company">Company</label><input id="company" maxlength="40" name="company" size="20" type="text"><br>

<label for="zip">Zip</label><input id="zip" maxlength="20" name="zip" size="20" type="text"><br>

<label for="phone">Phone</label><input id="phone" maxlength="40" name="phone" size="20" type="text"><br>

<label for="email">Email</label><input id="email" maxlength="80" name="email" size="20" type="text"><br>


<input id="00N3600000DDfr9" maxlength="255" name="00N3600000DDfr9" size="20" value="" type="hidden"><br>
<div id="html_element"></div>
<input id="testSubmit" type="submit" name="submit" disabled>

</form>
	
	<script type="text/javascript">
	var verifyCallback = function(response) {
       jQuery('#testSubmit').prop("disabled", false);
      };
      var onloadCallback = function() {
        grecaptcha.render('html_element', {
          'sitekey' : '6Le-IkgUAAAAAApEOfCO7BVe7d6ZBHCRSBq71HW_',
          'callback' : verifyCallback,
        });
      };
    </script>
	
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
    </script>
	
	<style type="text/css">
		input[type="submit"]:disabled {
		  /* color: black; */
		  /* background-color: #dddddd; */
		  opacity: 0.3;
		}
	</style>
	<?} ?>

<?php wp_footer(); ?>
<div id="psid" style="display:none;"><?php echo get_post_meta($post->ID, 'mail_subject', true); ?>
</div>
</body>
</html>
<script src="https://player.vimeo.com/api/player.js"></script>
<style type="text/css">
	.page-id-5610 .errorP {
		  color: red;
		  font-size: 12px !important;
		  position: static;
		  bottom: 0px;
		  left: 10px;
		  margin-top: -10px !important;
		  
	}

</style>
<script type="text/javascript">
	


jQuery(document).ready(function(){

	var cur = window.location.href 

	if(cur.indexOf('thank-you')!==-1){
		
		jQuery('html,body').animate({
			scrollTop: jQuery('.salesforce-widget').offset().top-200},
			'slow');
		
		jQuery('.salesforce-widget').html('<h1 class="hdcolor">Success!</h1><br /><p class="suces">Thank you. Your information has been recieved. An Advantage Associate will be contacting you shortly.</p>')
	}

	//jQuery('form').attr('action',cur+"?thank-you")
	jQuery('.retURL').val(cur+"?thank-you")
	var titlePHP = "<?php echo get_the_title(); ?>";
	jQuery('#00N3600000DDfr9').val(titlePHP)

	jQuery('form#contact-salesforce input[type="text"], form.salesforce-widget input[type="text"]').each(function(){
			jQuery(this).after('<p class="errorP"></p>')
		})

	var fils = [];
	

	jQuery('form#contact-salesforce input[type="text"], form.salesforce-widget input[type="text"]').on('focus', function(){
		var er = jQuery(this).next().html('')
		
	});

	jQuery('form#contact-salesforce input[type="text"], form.salesforce-widget input[type="text"]').on('blur', function(){
		
		if(jQuery('body').hasClass('home')){
			var lb = jQuery(this).prev().text();
			
		} else {
			var lb = jQuery(this).attr('placeholder');
		}

		if(lb.indexOf('*')!=-1){
	
		lb = lb.replace("*","");
		lb = lb.toLowerCase(lb);
		var fld_val = jQuery(this).val()
		if(fld_val==""){
		jQuery(this).next('p.errorP').html("Please enter your "+lb)
		}else {
		fils.push(fld_val)	
		}
	
		}
		
	});

	function GetParameterValues(param) {  
		var url = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');  
		for (var i = 0; i < url.length; i++) {  
			var urlparam = url[i].split('=');  
			if (urlparam[0] == param) {  
				return urlparam[1];  
			}  
		}  
	}  
	function setFormDefaults() {
		var websourceValue = GetParameterValues('websource');
		document.getElementById("00N3600000DDfr9").value = websourceValue;
	} 


	jQuery("form#contact-salesforce, form.salesforce-widget").on('submit', function(e){
		//

		//e.preventDefault();
		var slug = window.location.pathname;
		var title = document.title;
		var postid = jQuery('#psid').text();
		//console.log(postid)
		//setFormDefaults();
		var cnt = 0;
		jQuery('form#contact-salesforce input[type="text"], form.salesforce-widget input[type="text"]').each(function(){
			
			if(jQuery('body').hasClass('home')){
			 lb = jQuery(this).prev().text();
			} else {
			lb = jQuery(this).attr('placeholder');
			}
			
			if(lb.indexOf("*")!=-1){
				cnt++;
			}

		})
		//console.log(cnt)
		//console.log(fils.length)
		if(fils.length<cnt){
			e.preventDefault();
			alert('Fill all the required field(s)');
		}else {
			//e.preventDefault();
			//alert('send mail')
			//jQuery('#loader').show();
			var formdata = jQuery('form.salesforce-widget').serialize();
			jQuery.ajax({
				url: 'https://advantagegps.com/wp-admin/admin-ajax.php',
				type: 'POST',
				data:{
					action: 'send_mail_bh',
					formdata: formdata,
					slug: slug,
					title: title,
					postid: postid

				},
				success: function(response){
					//console.log(response)
					if(response=='sent'){
						jQuery('form.salesforce-widget').submit();
					}
				}
			})
		} 	

	});


	

})

jQuery(window).load(function(){
	
	var lis = jQuery('.slides').children('li').length

	if(lis>3){
		jQuery('.flex-direction-nav').css('display','block')

	} else {
		jQuery('.flex-direction-nav').hide()
		console.log(lis)
		console.log('none')
		
	}

})


jQuery(document).ready(function(){

	
//var iframe = document.querySelector('iframe');
jQuery('.gdlr-core-fluid-video-wrapper iframe').attr('id','fakeid')

var iframe = document.getElementById('fakeid');
  if(iframe){
  	 jQuery('#loader').show();    
      var player = new Vimeo.Player(iframe);
      player.play()

      player.on('play', function() {
          console.log('played the video!');
          setTimeout(function(){
           jQuery('#loader').hide();
          },5000)
          
      });
   
  }else{
    jQuery('#loader').hide();    
  } 

});

jQuery('.gdlr-core-right-align').each(function(){
	jQuery(this).parent().parent().parent().parent().addClass('rightbilal')
})
jQuery('.gdlr-core-center-align').each(function(){
	jQuery(this).parent().parent().parent().parent().addClass('centerbilal')
})

var bilalindex=0;
jQuery('.add-more-fields').on('click', function(){
  bilalindex++;
  jQuery(this).prev('.formReferall').after(jQuery(this).parent().find('.formReferall').first().clone().attr('id',"custom_id_"+bilalindex))
  jQuery('#custom_id_'+bilalindex+' :input').each(function(){
    jQuery(this).attr("name",jQuery(this).attr('name'));
    jQuery(this).val("")
    
  })  
})


var callAjax = function(){
 // e.preventDefault()

  		var slug = window.location.pathname;
		var title = document.title;
		//setFormDefaults();
			
		

    //jQuery('#loader').show();


      var formdata = jQuery('form#referal_form').serialize();
      var contectdata = jQuery('#contact_salesforce').serialize();

      var ref_form_data = [];
		jQuery('form.formReferall').each(function(index){
			ref_form_data[index] = jQuery(this).serialize();
		})
    
        
      jQuery.ajax({
        url: 'https://advantagegps.com/wp-admin/admin-ajax.php',
        type: 'POST',
        data:{
          action: 'send_mail_bh_ref',
          formdata: formdata,
          ref_form_data: ref_form_data,
          contectdata: contectdata,
          slug: slug,
          title: title

        },
        success: function(response){
        jQuery('#loader').hide();
          console.log(response)
          if(response=='sentByBIlal'){
          		jQuery('.refe').fadeOut();
          		jQuery('<form>').fadeOut();
            	jQuery('.congrat').fadeIn(2000);
            	jQuery('html,body').animate({
				scrollTop: jQuery('.congrat').offset().top-400},
				'slow');
          }
        }
      })  



}


var validation = function(x,y){
	var fils = [];
	jQuery(x).each(function(){
			jQuery(this).after('<p class="errorP"></p>')
		})

	jQuery(x).on('focus', function(){
		var er = jQuery(this).next().html('')
		
	});
	jQuery(x).on('blur', function(){
		

		if(jQuery('body').hasClass('home')){
			var lb = jQuery(this).prev().text();
			
		} else {
			var lb = jQuery(this).attr('placeholder');
		}

		if(lb.indexOf('*')!=-1){
	
		lb = lb.replace("*","");
		lb = lb.toLowerCase(lb);
		var fld_val = jQuery(this).val()
		if(fld_val==""){
		jQuery(this).next('p.errorP').html("Please enter your "+lb)
		}else {
		fils.push(fld_val)	
		}
	
		}
		
	});

	jQuery(y).on('click', function(e){
		//
		e.preventDefault();
		var slug = window.location.pathname;
		//alert(slug)
		//setFormDefaults();
		var cnt = 0;
		jQuery(x).each(function(){
			
			if(jQuery('body').hasClass('home')){
			 lb = jQuery(this).prev().text();
			} else {
			lb = jQuery(this).attr('placeholder');
			}
			
			if(lb.indexOf("*")!=-1){
				cnt++;
			}

		})
		//console.log(cnt)
		//console.log(fils.length)
		if(fils.length<cnt){
			e.preventDefault();
			alert('Fill all the required field(s)');
		} else {
			callAjax();
		} 	

	});


	console.info('fired');
}


if(jQuery('body').hasClass('page-id-5610')){
	 

jQuery('button#submit_ref:disabled').css('opacity', 0.3).css('cursor', 'default');

	validation('form#referal_form input[type="text"]','#submit_ref')
		
		jQuery('.formReferall input[type=text]').on('blur', function(){
			var notBlank = 0;		
			jQuery('.formReferall input[type=text]').each(function(){
				//console.log(jQuery(this).val())
				if(jQuery(this).val()!=""){
					notBlank = notBlank+1;
				}
				
			})

			if(notBlank>=4){
				//alert('fixed')
				jQuery('button#submit_ref:disabled').css('opacity', 1).css('cursor', 'pointer');
				jQuery('button#submit_ref').prop('disabled', false);

			}
			console.log(notBlank)
			notBlank = 0;
		})
} else if(jQuery('body').hasClass('page-id-4521')){
	console.info('contact validation() is working')
	validation('form#contact_salesforce input[type="text"]','#submit_ref')
}else if(jQuery('body').hasClass('page-id-6045')){
	console.info('contact validation() is working')
	validation('form#contact_salesforce input[type="text"]','#submit_ref')
}
//validation('form.formReferall input[type="text"]')

function GetParameterValues(param) {  
		var url = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');  
		for (var i = 0; i < url.length; i++) {  
			var urlparam = url[i].split('=');  
			if (urlparam[0] == param) {  
				return urlparam[1];  
			}  
		}  
	}  
	function setFormDefaults() {
		var websourceValue = GetParameterValues('websource'); 
		document.getElementById("00N3600000DDfr9").value = websourceValue;
	}

jQuery(document).ready(function(){
if (jQuery("body").hasClass("single-post")) {
	jQuery("h1.hdcolor").css("color", "#fff");
    jQuery(".suces").css("color", "#fff");
}

jQuery('#first_name').on('blur',function(){

var regex = /[^a-zA-Z]/g;
if(jQuery(this).val().match(regex)){
    jQuery(this).val( jQuery(this).val().replace(regex,'') );
    alert('please add only letters')
    return false;
  }


});

jQuery('#last_name').on('blur',function(){

var regex = /[^a-zA-Z]/g;
if(jQuery(this).val().match(regex)){
    jQuery(this).val( jQuery(this).val().replace(regex,'') );
    alert('please add only letters')
    return false;
  }


});

jQuery('.Referall2').on('blur',function(){

var regex = /[^a-zA-Z]/g;
if(jQuery(this).val().match(regex)){
    jQuery(this).val( jQuery(this).val().replace(regex,'') );
    alert('please add only letters')
    return false;
  }


});

});
jQuery('.phonenumber').on('blur',function(){

 var numbers = /[^0-9]/g;
if(jQuery(this).val().match(numbers)){
    jQuery(this).val( jQuery(this).val().replace(numbers,'') );
    alert('please add only Numbers')
    return true;
  }


});

jQuery('input[name="checkbox-354[]"]').on('click', function(){
	if(jQuery(this).is(":checked")){
		var addresss = jQuery("#addresss1").val();
    	var bill = jQuery("#Street").val();
    	var billcity = jQuery("#city").val();
    	var billstate = jQuery("#zip").val();

     	jQuery("#Street1").val(bill);
     	jQuery("#city1").val(billcity);
     	jQuery("#zip1").val(billstate);
     	jQuery("#addressstree").val(addresss);
     	jQuery('.hide-shipping').slideUp("slow");

	}else{
			jQuery("#Street1").val(" ");
     	jQuery("#city1").val(" ");
     	jQuery("#zip1").val(" ");
     	jQuery("#addressstree").val(" ");
     	jQuery('.hide-shipping').slideDown("slow");

	}

	});

 jQuery("#infor").hide();
 jQuery("#interfor").hide();
	
	jQuery('input[name="number-883"]').bind('click keyup', function(){
		var thiss = jQuery(this).val();
		var total = thiss*107;
		// alert(total);
		jQuery('.quantity-result').text(total);
	});

	function nmak(){
		document.getElementById('asaphide').style.display = 'none';
		document.getElementById('infor').style.display = 'block';
		jQuery('html,body').animate({
			scrollTop: jQuery('#infor').offset().top-200},
			'slow');
	} 


jQuery(function($){ 
 $( ".page-id-5662 h4 " ).replaceWith( "<h4>Request a Free Demo Unit</h4>" );
 });
/*-------------agent order form-------------*/

jQuery('.quant,.unitp,.quant2,.unit2,.quant3,.quant4').bind('click keyup',function(){
	total_estimation();
});	
jQuery('#shippingm').on('change', function() {
    total_estimation();
});

jQuery('.obdii').bind('click keyup', function() {
    total_estimation();
});

jQuery('.Flange').bind('click keyup', function() {
    total_estimation();
});

function total_estimation(){
	var textValue1 =jQuery('.quant').val();
	textValue1 = (textValue1 > 0)?textValue1:0;
    var textValue2 = jQuery('.unitp').val();
	textValue2 = (textValue2 > 0)?textValue2:0;
    var $total1 = 	textValue1 * textValue2;
    jQuery('.estimated').val($total1);

    var textValue3 =jQuery('.quant2').val();
	textValue3 = (textValue3 > 0)?textValue3:0;
    var textValue4 = jQuery('.unit2').val();
	textValue4 = (textValue4 > 0)?textValue4:0;
    var $total2 = 	textValue3 * textValue4;
	// alert($total2);
    jQuery('.estimated2').val($total2);


    var textValue5 =jQuery('.obdii').val();
    var textValue6 = jQuery('.quant3').val();
	textValue6 = (textValue6 > 0)?textValue6:0;
	var $total3 = 	(textValue5 == 'None')?0:(textValue6 * 10);

	jQuery('.estimated3').val($total3);

	var textValue7 =jQuery('.Flange').val();
    var textValue8 = jQuery('.quant4').val();
	textValue8 = (textValue8 > 0)?textValue8:0;
	var $total4 = 	(textValue7 == 'None')?0:(textValue8*textValue7);
	jQuery('.estimated4').val($total4);
	$grandTotal  = $total2 + $total3 + $total4;   

	jQuery('.Costs-result').val($grandTotal);

	var value9 = jQuery('#shippingm').val();
	var $total5  = value9 * textValue1;
	$grandTotalWithShipping  = $total1 + $grandTotal + $total5;
	jQuery('.estimt-result').val($grandTotalWithShipping);
}

jQuery("#sales-reples").hide();
//jQuery(".main-gbs bg-gray").hide();
jQuery('input[name="agent-radio-301]"]').on('click', function(){
	var salesr  = jQuery(this).val();
	if (salesr == 'Yes') {
       jQuery("#sales-reples").show();
       
	} else{

		jQuery("#sales-reples").hide();
		

	}


	});
jQuery('#wpcf7-f7015-p6736-o2').hide();
jQuery('input[name=agent-radio-select]').click(function(){
var AgntselValue = jQuery(this).val();
if(AgntselValue == 'Reorder'){
jQuery('#wpcf7-f6628-p6736-o1').hide();
jQuery('#wpcf7-f7015-p6736-o2').show();

}else{
jQuery('#wpcf7-f6628-p6736-o1').show();
jQuery('#wpcf7-f7015-p6736-o2').hide();

}

});

// var agentURL = window.location.search.slice(1);

// if(agentURL == '=reorder'){
// jQuery('#wpcf7-f7023-p6807-o1').show();
// jQuery('#wpcf7-f6743-p6807-o2').hide();

// }
// if(agentURL == '=new'){
// jQuery('#wpcf7-f7023-p6807-o1').hide();
// jQuery('#wpcf7-f6743-p6807-o2').show();

// }
jQuery('.SameOrderNo').hide();

jQuery('input[name=agent-radio-391]').click(function(){
	var SameOrder = jQuery(this).val();
	if (SameOrder == 'No, enter new quantity') {
		jQuery('.SameOrderNo').show();
		jQuery('input[name=text-NewQuant]').val('1');
	}else{
		jQuery('.SameOrderNo').hide();
		jQuery('input[name=text-NewQuant]').val('');
	}

});

</script>