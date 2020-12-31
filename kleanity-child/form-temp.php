<?php
/**
 * Template Name: Salesforce
 */

	get_header();
?>
	
	<!--  ----------------------------------------------------------------------  -->
<!--  NOTE: Please add the following <META> element to your page <HEAD>.      -->
<!--  If necessary, please modify the charset parameter to specify the        -->
<!--  character set of your HTML page.                                        -->
<!--  ----------------------------------------------------------------------  -->

<META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=UTF-8">

<!--  ----------------------------------------------------------------------  -->
<!--  NOTE: Please add the following <FORM> element to your page.             -->
<!--  ----------------------------------------------------------------------  -->

<form class="salesforce-widget" action="https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST">

<input type=hidden name="oid" value="00D36000000Y6GB">
<input type=hidden name="retURL" value="http://test.com">

<!--  ----------------------------------------------------------------------  -->
<!--  NOTE: These fields are optional debugging elements. Please uncomment    -->
<!-- saved from url=(0091)file:///C:/Users/test/AppData/Roaming/Skype/My%20Skype%20Received%20Files/webToleadNew.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body>


<!--  ----------------------------------------------------------------------  -->
<!--  NOTE: Please add the following <FORM> element to your page.             -->
<!--  ----------------------------------------------------------------------  -->

<form action="https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST">

<input type="hidden" name="oid" value="00D36000000Y6GB">
<input type="hidden" name="retURL" value="http://test.com">

<!--  ----------------------------------------------------------------------  -->
<!--  NOTE: These fields are optional debugging elements. Please uncomment    -->
<!--  these lines if you wish to test in debug mode.                          -->
<input type="hidden" name="debug" value=1>                            
<input type="hidden" name="debugEmail" value="cbortfeld@proconanalytics.com">  
<!--  ----------------------------------------------------------------------  -->

<label for="first_name">First Name</label><input id="first_name" maxlength="40" name="first_name" size="20" type="text" onclick="testfun();"><br>

<label for="last_name">Last Name</label><input id="last_name" maxlength="80" name="last_name" size="20" type="text"><br>

<label for="company">Company</label><input id="company" maxlength="40" name="company" size="20" type="text"><br>

<label for="zip">Zip</label><input id="zip" maxlength="20" name="zip" size="20" type="text"><br>

<label for="phone">Phone</label><input id="phone" maxlength="40" name="phone" size="20" type="number"><br>

<label for="email">Email</label><input id="email" maxlength="80" name="email" size="20" type="text"><br>


<input  id="00N3600000DDfr9" maxlength="255" name="00N3600000DDfr9" size="20" value="" type="hidden" /><br>

<input type="submit" name="submit">


</form>
<script>  
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
    
</script>
</body></html>


</form>

<?php get_footer(); 
?>