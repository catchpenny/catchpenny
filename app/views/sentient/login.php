<!DOCTYPE html>
<html>

<head>
<?php $html->includeCss('login'); ?>
<title>CatchPenny Project | Login</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
if (navigator.userAgent.toLowerCase().indexOf("chrome") >= 0) {
    var _interval = window.setInterval(function () {
        var autofills = $('input:-webkit-autofill');
        if (autofills.length > 0) {
            window.clearInterval(_interval); // stop polling
            autofills.each(function () {
                var clone = $(this).clone(true, true);
                $(this).after(clone).remove();
            });
        }
    }, 20);
}
    
$(window).load(function() {
	$(".loader").fadeOut("slow");
})

</script>

</head>

<body>
<div class="loader"></div>
	<div class="blur">
		<div id="left">
			<div id="heading">
               <h1>
                   CatchPenny <br> Project
               </h1>
            </div>
			    <div class="view1">
					<div class='login'>
					${{error}}
					<form action="login" method="post" autocomplete="off" id="form1">
    				<div id="arrow">></div>
    				<input type="email" placeholder="Email" name="email" autocomplete="off" id="username" required/> 
    				<br>
    				<div id="arrow">></div>
    				<input type="password" placeholder="Password" name="password" id="password" required/>
    				<br><input type="submit" value="Sign In" id="button1" class="botton"/><br>
    				<input type="button" value="Forgot Password?" id="button2" class="botton"><br>
    				</form>
					</div>
				</div>
				
		</div>
    </div>


</body>
</html>
