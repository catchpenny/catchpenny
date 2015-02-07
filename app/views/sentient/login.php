<!DOCTYPE html>
<html>

<head>
<?php $html->includeCss('login'); ?>
<script src="js/jquery-2.1.3.js"></script>
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
</script>

</head>

<body>
	<div class="blur">
		

		<div id="left">
			<div id="heading">
               <h1>
                   CatchPenny <br> Project
               </h1>
            </div>
			    <div class="view1">

					<div class='login'>
					<form action="" method="post" autocomplete="off" id="form1">
    				<div id="arrow">></div>
    				<input type="text" placeholder="username" name="username" autocomplete="off" id="username" required/> 
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
