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
		input[type="submit"]:disabled {  opacity: 0.3;}
	</style>
	<?} ?>

<?php wp_footer(); ?>
<div id="psid" style="display:none;"><?php echo get_post_meta($post->ID, 'mail_subject', true); ?>
</div>
</body>
</html>
<style type="text/css">

.gdlr-core-video-item .gdlr-core-fluid-video-wrapper.no-after:after {
    content: none;
}

</style>

<script src="https://player.vimeo.com/api/player.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('.gdlr-core-fluid-video-wrapper iframe').attr('id','fakeid');
	jQuery('#fakeid').attr('data-audio-volume', 0);
	var iframe = document.getElementById('fakeid');

	<?php if(!is_page(7723) && !is_page(8604) && !is_page(9569) && !is_page(9557)) {?>

  	if(iframe){ 
	  	var mobile = (/iphone|ipod|android|blackberry|mini|windows\sce|palm/i.test(navigator.userAgent.toLowerCase()));  
	    if (mobile) { 
	        jQuery('#loader').hide();
	    } else{

	    	<?php if(is_page(6952)) {?>
	  		jQuery('#loader').hide();
	  		   <?php } else { ?>
	  		 jQuery('#loader').show();
	  		 <?php } ?> 

	    }  
	    var player = new Vimeo.Player(iframe);
		jQuery('#fakeid').attr('src', function(_, href){
			url = href.split('?');
			jQuery(this).after('<a class="audio-control js-audio-control muted" href="javascript:void(0)"></a>');          
			return href.replace(url[1], 'loop=1&background=1&autopause=0&muted=1');
		});

		player.play();

		setTimeout(function(){
			jQuery('#loader').hide();
		},6000); 

  	}else{
  		jQuery('#loader').hide();
  	} 

  	<?php }else{ ?>

  		jQuery("#fakeid").parent().addClass('no-after');

  	<?php } ?>

});



</script>


<style type="text/css">
.page-id-5610 .errorP {color: red;font-size: 12px !important;position: static;bottom: 0px;left: 10px;margin-top: -10px !important; }
</style>

<script type="text/javascript">
jQuery("div#manshinesh").hide();
jQuery("div.eng-mng").click(function(){
	//alert("hi");
jQuery("div.spnish-mng").removeClass("active");
jQuery("div.eng-mng").addClass("active");
jQuery("div#manighenglish").show();
jQuery("div#manshinesh").hide();
});

jQuery("div.spnish-mng").click(function(){
jQuery("div.eng-mng").removeClass("active");
jQuery("div.spnish-mng").addClass("active");
jQuery("div#manshinesh").show();
jQuery("div#manighenglish").hide();
});

	jQuery(document).ready(function(){

	var cur = window.location.href;

	if(cur.indexOf('thank-you')!==-1){

		if(jQuery('body').hasClass('page-id-9483')){
			location.href = "https://"+window.location.hostname+"/thank-you/";
		}
		
		jQuery('html,body').animate({
			scrollTop: jQuery('.salesforce-widget').offset().top-200},
			'slow');
		
		jQuery('.salesforce-widget').html('<h1 class="hdcolor">Success!</h1><br /><p class="suces">Thank you. Your information has been recieved. An Advantage Associate will be contacting you shortly.</p>');
	}

	jQuery('.retURL').val(cur+"?thank-you");

	jQuery('form#contact-salesforce input[type="text"], form.salesforce-widget input[type="text"]').each(function(){
			jQuery(this).after('<p class="errorP"></p>');
	});
	
	jQuery('form#contact-salesforce input[type="text"], form.salesforce-widget input[type="text"]').on('focus', function(){
		var er = jQuery(this).next().html('');
	});

	var fils = [];

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
		var source = window.location.href;
		var websourceValue = GetParameterValues('websource');	
		jQuery("#00N3600000DDfr9").val(source);
		
	}

	setFormDefaults();

	jQuery("#sub").on('click', function(e){
		//e.preventDefault();
		var slug = window.location.pathname;
		var title = document.title;
		var postid = jQuery('#psid').text();
		var cnt = 0;
		jQuery('form.salesforce-widget input[type="text"]').each(function(){
			
			if(jQuery('body').hasClass('home')){
			 lb = jQuery(this).prev().text();
			} else {
			lb = jQuery(this).attr('placeholder');
			}
			
			if(lb.indexOf("*")!=-1){
				cnt++;
			}

		})

		if(fils.length<cnt){
			e.preventDefault();
			alert('Fill all the required field(s)');
		}else {
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
					console.log(response)
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
	}
})

jQuery('.gdlr-core-right-align').each(function(){
	jQuery(this).parent().parent().parent().parent().addClass('rightbi')
})
jQuery('.gdlr-core-center-align').each(function(){
	jQuery(this).parent().parent().parent().parent().addClass('centerbi')
})
var biindex=0;
jQuery('.add-more-fields').on('click', function(){
  biindex++;
  jQuery(this).prev('.formReferall').after(jQuery(this).parent().find('.formReferall').first().clone().attr('id',"custom_id_"+biindex))
  jQuery('#custom_id_'+biindex+' :input').each(function(){
    jQuery(this).attr("name",jQuery(this).attr('name'));
    jQuery(this).val("")
    
  })  
})

var callAjax = function(){100011
  		var slug = window.location.pathname;
		var title = document.title;
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
		e.preventDefault();
		var slug = window.location.pathname;
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
		if(fils.length<cnt){
			e.preventDefault();
			alert('Fill all the required field(s)');
		} else {
			callAjax();
		} 	

	});
	console.info('fired');
}

if(jQuery('body').hasClass('page-id-5610') || jQuery('body').hasClass('page-id-8323')){
	 
jQuery('button#submit_ref:disabled').css('opacity', 0.3).css('cursor', 'default');

	validation('form#referal_form input[type="text"]','#submit_ref')
		
		jQuery('.formReferall input[type=text]').on('blur keyup', function(){
			var notBlank = 0;		
			jQuery('.formReferall input[type=text]').each(function(){
				if(jQuery(this).val()!=""){
					notBlank = notBlank+1;
				}
			})

			if(notBlank>=4){
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

jQuery(document).ready(function(){
	if (jQuery("body").hasClass("single-post")) {
		jQuery("h1.hdcolor").css("color", "#fff");
	    jQuery(".suces").css("color", "#fff");
	}
});

jQuery('form#contact-salesforce input[type="text"], form.salesforce-widget input[type="text"]').keyup(function(){
	var str = jQuery(this).val();
	
	var spart = str.split(" ");
	for ( var i = 0; i < spart.length; i++ ){
		var j = spart[i].charAt(0).toUpperCase();
		spart[i] = j + spart[i].substr(1);
	}

  	jQuery(this).val(spart.join(" "));

});

/** dpk-27-feb **/

var tot = 1;
jQuery('.how-work').each(function(){
	jQuery(this).find('img').attr('data-id','how-work-'+tot);
	tot++;
});

jQuery('.how-work img').click(function(){
	var $dataId = jQuery(this).data('id');
	jQuery('#'+$dataId).toggle();
});

jQuery('.close').click(function(){
	jQuery(this).parent().hide();
});

/** dpk-27-feb **/

/**-------------------advantage form---------------*/

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

     	console.log(addresss);

	}else{

		jQuery("#Street1").val(" ");
     	jQuery("#city1").val(" ");
     	jQuery("#zip1").val(" ");
     	jQuery("#addressstree").val(" ");
     	jQuery('.hide-shipping').slideDown("slow");

	}

});

jQuery('input[name="checkbox-300[]"]').on('click', function(){
	if(jQuery(this).is(":checked")){
		var addre = jQuery(".addre").val();
		var cityrv = jQuery(".cityrv").val();
    	var Streetrv = jQuery(".Streetrv").val();
    	var ziprv = jQuery(".ziprv").val();

     	jQuery(".addrecp").val(addre);
     	jQuery(".citycp").val(cityrv);
     	jQuery(".Streetcp").val(Streetrv);
     	jQuery(".zipcp").val(ziprv);
     	jQuery('.hide-shipping').slideUp("slow");

     	
	}else{
			jQuery(".addrecp").val(" ");
     	jQuery(".cityrv").val(" ");
     	jQuery(".Streetcp").val(" ");
     	jQuery(".zipcp").val(" ");
     	jQuery('.hide-shipping').slideDown("slow");

	}

});

 jQuery("#infor").hide();
 jQuery("#interfor").hide();

 jQuery('input[name="agent-radio-301"], input[name=radio-302]').on('click', function(){
 		cardVal();
 });

 function cardVal(){
 	var OrderType = jQuery('input[name=agent-radio-301]:checked').val();
 	var PaymentType = jQuery('input[name=radio-302]:checked').val();

 	if ((OrderType == 'Reorder') && (PaymentType == 'Credit Card')) {
 		jQuery("#interfor").show();
 	}else{
 		jQuery("#interfor").hide();
 	}

 }

jQuery('input[name="number-883"]').bind('click keyup', function(){
		var thiss = jQuery(this).val();
		var total = thiss*150;
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
	$('#agent-reorder-7095').hide();
	$("input[name=agent-radio-select]").filter('[value="New"]').click();

	Advformreset();
	AgentOrderFrom();
	reorderformeditValur();
 });
/*-------------agent order form-------------*/
	
jQuery('#shippingm').on('change', function() {
    total_estimation();
    total_estimation_Re();

});

jQuery('.quant').on('click keyup', function() {
	 total_estimation();
	});

jQuery("input[type=number]").bind('click keyup', function() {
    total_estimation();
    total_estimation_Re();

});

jQuery("input[type=submit]").on('click', function() {
   defaultValZero();

});



function defaultValZero(){
	var $inputs = jQuery("input[type=number]");

    $inputs.each(function() {
        if (jQuery(this).val().trim().length === 0) {
     		jQuery(this).val(0);
   		}
    });
}

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
    jQuery('.estimated2').val($total2);

    var textValue5 =jQuery('.quant3').val();
	textValue5 = (textValue5 > 0)?textValue5:0;
    var textValue6 = jQuery('.obdii').val();
	textValue6 = (textValue6 > 0)?textValue6:0;
    var $total3 = 	textValue5 * textValue6;
    jQuery('.estimated3').val($total3);

	var textValue7 =jQuery('.Flange').val();
    var textValue8 = jQuery('.quant4').val();
    textValue8 = (textValue8 > 0)?textValue8:0;
	textValue7 = (textValue7 > 0)?textValue7:0;
	var $total4 = 	(textValue7 == 'None')?0:(textValue8*textValue7);
	jQuery('.estimated4').val($total4);

	$grandTotal  = $total2 + $total3 + $total4;   

	 jQuery('.Costs-result').val($grandTotal);

	

	// T-19 Agent Form 

	var RvValue1 =jQuery('.quantRvs').val();
	RvValue1 = (RvValue1 > 0)?RvValue1:0;
    var RvValue2 = jQuery('.unitpRvs').val();
	RvValue2 = (RvValue2 > 0)?RvValue2:0;
    var $RvsResult1 = 	RvValue1 * RvValue2;
    jQuery('.estimatedRvs').val($RvsResult1);

    var RvValue3 =jQuery('.quantRv3').val();
	RvValue3 = (RvValue3 > 0)?RvValue3:0;
    var RvValue4 = jQuery('.unitpRv3').val();
	RvValue4 = (RvValue4 > 0)?RvValue4:0;
    var $RvsResult2 = 	RvValue3 * RvValue4;
    jQuery('.estimatedRv3').val($RvsResult2);

    var RvValue5 =jQuery('.quantRv4').val();
	RvValue5 = (RvValue5 > 0)?RvValue5:0;
    var RvValue6 = jQuery('.unitpRv4').val();
	RvValue6 = (RvValue6 > 0)?RvValue6:0;
    var $RvsResult3 = 	RvValue5 * RvValue6;
    jQuery('.estimatedRv4').val($RvsResult3);


    $DeviceTotal = $total1+$RvsResult1+$RvsResult2+$RvsResult3;

	 jQuery('.totalDevice').val($DeviceTotal);


	var value9 = jQuery('#shippingm').val();
	var $total5  = value9 * textValue1;
	$grandTotalWithShipping  = $total1 + $grandTotal + $total5;
	jQuery('.estimt-result').val($grandTotalWithShipping);




		$A = parseInt(textValue1);
		$B = parseInt(RvValue1);
		$C = parseInt(RvValue3);
		$D = parseInt(RvValue5);

     var totalshiping = parseInt($A+$B+$C+$D);

     var value9 = jQuery('#shippingm').val();

     var totaldev = parseInt(value9*totalshiping);

	var grandTotal = $grandTotal+$DeviceTotal+totaldev;

	//console.log($grandTotal);
	jQuery('.total-estimatedcost').val(grandTotal);
}

jQuery('#shippingmres').on('change', function() {
    total_estimation_Re();

});

function total_estimation_Re(){
	// T-19 Agent Form 

	var RequantValue1 =jQuery('.Requant').val();
	RequantValue1 = (RequantValue1 > 0)?RequantValue1:0;
    var ReunitpValue2 = jQuery('.Reunitp').val();
	ReunitpValue2 = (ReunitpValue2 > 0)?ReunitpValue2:0;
    var $Retotal1 = 	RequantValue1 * ReunitpValue2;
    jQuery('.Reestimated').val($Retotal1);


	var RequantRvs2 =jQuery('.RequantRvs').val();
	RequantRvs2 = (RequantRvs2 > 0)?RequantRvs2:0;
    var ReunitpRvs2 = jQuery('.ReunitpRvs').val();
	ReunitpRvs2 = (ReunitpRvs2 > 0)?ReunitpRvs2:0;
    var $ReResult1 = 	RequantRvs2 * ReunitpRvs2;
    jQuery('.ReestimatedRvs').val($ReResult1);

    var RequantRe3 =jQuery('.RequantRe3').val();
	RequantRe3 = (RequantRe3 > 0)?RequantRe3:0;
    var unitpRe4 = jQuery('.unitpRe3').val();
	unitpRe4 = (unitpRe4 > 0)?unitpRe4:0;
    var $Resultre2 = 	RequantRe3 * unitpRe4;
    jQuery('.estimatedRe3').val($Resultre2);

    var RequantRv5 =jQuery('.RequantRv4').val();
	RequantRv5 = (RequantRv5 > 0)?RequantRv5:0;
    var Reunit6 = jQuery('.ReunitpRv4').val();
	Reunit6 = (Reunit6 > 0)?Reunit6:0;
    var $ReunitResult3 = 	RequantRv5 * Reunit6;
    jQuery('.RestimatedRv4').val($ReunitResult3);

    $subTotal  = $Retotal1+$ReResult1+$Resultre2+$ReunitResult3;   

	jQuery('.RetotalDevice').val($subTotal);

   // end GPS DEVICE INFORMATION

    var ReqValue3 =jQuery('.Requant2').val();
	ReqValue3 = (ReqValue3 > 0)?ReqValue3:0;
    var ReunitValue4 = jQuery('.Reunit2').val();
	ReunitValue4 = (ReunitValue4 > 0)?ReunitValue4:0;
    var $total5 = 	ReqValue3 * ReunitValue4;
    jQuery('.Reestimated2').val($total5);

    var ReValue5 =jQuery('.Requant3').val();
	ReValue5 = (ReValue5 > 0)?ReValue5:0;
    var ReValue6 = jQuery('.Reobdii').val();
	ReValue6 = (ReValue6 > 0)?ReValue6:0;
    var $total6 = 	ReValue5 * ReValue6;
    jQuery('.Reestimated3').val($total6);

	var ReValue7 =jQuery('.Requant4').val();
    var ReValue8 = jQuery('.ReFlange').val();
    ReValue8 = (ReValue8 > 0)?ReValue8:0;
	ReValue7 = (ReValue7 > 0)?ReValue7:0;
	var $total7 = 	(ReValue7 == 'None')?0:(ReValue8*ReValue7);
	jQuery('.Reestimated4').val($total7);

	 $Accetotal = $total5+$total6+$total7;
	jQuery('.ReCosts-result').val($Accetotal)

var shipp = jQuery('#shippingmres').val();

        $re = parseInt(RequantValue1);
		$rs = parseInt(RequantRvs2);
		$Cr = parseInt(RequantRe3);
		$Dr = parseInt(RequantRv5);

     var totship = parseInt($re+$rs+$Cr+$Dr);
     var totaldev = parseInt(shipp*totship);


	$totalReesl = $subTotal+$Accetotal+totaldev;
	jQuery('.Granttolal-est').val($totalReesl)
	
}
/*------------new js Monster---------------------*/
function AgentOrderFrom(){

	var SelVal = jQuery('.order-multi').html();
	var AgntselValue = jQuery("input[name=agent-radio-301]:checked").val();
	
	if ((SelVal == 'Reorder') || (AgntselValue == 'Reorder'))  {
		jQuery('#showOnRecorder').show();
		jQuery('#showOnNew').hide();
	}
	if ((SelVal == 'New') || (AgntselValue == 'New'))  {

		jQuery('#showOnRecorder').hide();
		jQuery('#showOnNew').show();
	}

	jQuery("#contact-form-7015 input[type=submit]").hide();
	if ((AgntselValue == 'New'))  {

		jQuery('.angentyes').hide();
	    jQuery('.angentnofr').hide();
	}
	
	jQuery('.angentyes').hide();
	jQuery('.angentnofr').hide();

    //jQuery('.t19-SameOrderNo').hide();
	var SameOrder = jQuery("input[name=agent-radio-391]:checked").val();
	if (SameOrder == 'No, enter new quantity') {
		jQuery('.SameOrderNo').show();
		jQuery('.t19-SameOrderNo').show();
		jQuery('input[name=text-NewQuant]').val('1');

	}
	if (SameOrder == 'Yes') {
		jQuery('.SameOrderNo').hide();
		jQuery('.t19-SameOrderNo').hide();
		jQuery('input[name=text-NewQuant]').val('');
	}
}

jQuery('input[name=agent-radio-301], input[name=agent-radio-391]').click(function(){
	AgentOrderFrom();
});

jQuery('input[name="agent-radio-select"]').click(function(){
		Advformreset();			
			
	});
jQuery('input[name="agent-radio-select_yes_no"]').click(function(){
		Advformreset_Reorder_yes_no();		
			
	});


function Advformreset() {

   var OrderType = jQuery("input[name=agent-radio-select]:checked").val();
   if (OrderType == 'New') {
		jQuery("input[name=agent-radio-301]").filter('[value="New"]').click();
		jQuery('#agent-neworder-7095').show();
		jQuery('#agent-reorder-7095').hide();
		jQuery("input[name=agent-radio-select_yes_no]").attr('checked', false);
   }
   if (OrderType == 'Reorder') {
		jQuery("input[name=agent-radio-301]").filter('[value="Reorder"]').click();
		jQuery('#agent-neworder-7095').hide();
		jQuery('#agent-reorder-7095').show();
   }
}

function Advformreset_Reorder_yes_no() {
   	var SameReOrder_show = jQuery("input[name=agent-radio-select_yes_no]:checked").val();
	if (SameReOrder_show == 'No') {
		jQuery('.angentnofr').show();
		jQuery('.angentyes').hide();
		jQuery("input[name=agent-radio-305]").filter('[value="No"]').click();
	}
	if (SameReOrder_show == 'Yes') {
	    jQuery('.angentyes').show();
	    jQuery('.angentnofr').hide();
	    jQuery("input[name=agent-radio-305]").filter('[value="Yes"]').click();
	}
}

function reorderformeditValur(){
	var finVal = jQuery('.fanVal').html();
	var reodValue = jQuery('.reodValue').html();
	if(reodValue == 'No, enter new quantity'){
		jQuery('.SameOrderNo').show();
		jQuery("input[name='QtyGetVal']").val(finVal);	
	}
}


</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/floatthead/2.1.2/jquery.floatThead.js"></script>
<script type="text/javascript">

jQuery('table.tablepress').floatThead({
	position:'absolute',
	
});

jQuery("div.ticketmes"). hide();
jQuery("div.core-extchange"). hide();


document.addEventListener( 'wpcf7mailsent', function( event ) {
	nmak();

    if ( '8068' == event.detail.contactFormId ) { //if the form if equals #101
		jQuery(".formexchange").fadeOut(300);
     	jQuery("div.core-extchange").fadeIn(200);
	}

}, false );

</script>



 <?php if(is_page(7731)) {?>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<div class="container">

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">X</button>
          <h4 class="modal-title">Submit a Ticket</h4>
        </div>
        <div class="modal-body">   
     <?php echo do_shortcode( '[contact-form-7 id="7827" title="Submit a Ticket"]' );?>
 <div class="ticketmes" style="display:none">
<h4>Thank you</h4>
<p>We have received your ticket. And Advantage GPS Customer Care Representative will be in touch with your shortly.</p>
</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>


<script type="text/javascript">
	document.addEventListener( 'wpcf7mailsent', function( event ) {
    
    if ( '7827' == event.detail.contactFormId ) { //if the form if equals #101
		jQuery(".wpcf7-form").fadeOut(300);
     	jQuery("div.ticketmes").fadeIn(200);
	}

}, false );
	
</script>


<?php } ?>
<script type="text/javascript">
	jQuery('.customer_manige').hide();
	document.addEventListener( 'wpcf7mailsent', function( event ) {
    
    if ( '9299' == event.detail.contactFormId ) { //if the form if equals #101
		jQuery(".customer_infor").hide();
     	jQuery(".customer_manige").show();
	}

	 if ( '9232' == event.detail.contactFormId ) { //if the form if equals #101
		jQuery(".customer_infor").hide();
     	jQuery(".customer_manige").show();
	}

	 if ( '9300' == event.detail.contactFormId ) { //if the form if equals #101
		jQuery(".customer_infor").hide();
     	jQuery(".customer_manige").show();
	}
	if ( '9301' == event.detail.contactFormId ) { //if the form if equals #101
		jQuery(".customer_infor").hide();
     	jQuery(".customer_manige").show();
	}
	if ( '9302' == event.detail.contactFormId ) { //if the form if equals #101
		jQuery(".customer_infor").hide();
     	jQuery(".customer_manige").show();
	}
		
	if ( '9460' == event.detail.contactFormId ) { //if the form if equals #101
		jQuery(".customer_infor").hide();
     	jQuery(".customer_manige").show();
	}


}, false );
	
</script>