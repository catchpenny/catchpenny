<!DOCTYPE html>
<html>

<head>
<style>
<?php $html->includeCss('home');  ?>
</style>
<script>
<?php $html->includeJs('jquery-2.1.3');  ?>
</script>
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

$(document).ready(function () {

    $(".view2,.view3").hide();

    $("#button2").click(function () {
            $(".view1").hide("slow");
            $(".view2").show("slow");
    });

    $("#button3").click(function () {
          $(".view1").hide("slow");
            $(".view3").show("slow");
    });

  $("#button0").click(function () {
          $(".view2,.view3").hide("slow");
            $(".view1").show("slow");
    });
    $("#button5").click(function () {
          $(".view2,.view3").hide("slow");
            $(".view1").show("slow");
    });




});


</script>

</head>

<body>
  <div class="blur">
    <div id="right">
      <div id="enjoy"><h1>Eat<br>Sleep<br>Rave <br> Repeat</h1></div>
        </div>

    <div id="left">
      <div id="heading">
               <h1>
                   Sample
               </h1>
            </div>
          <div class="view1">

          <div class='login'>
          <form action="" method="post" autocomplete="off" id="form1">
            <div id="arrow">></div>
            <input type="text" placeholder="username" name="username" autocomplete="off" id="username" required/><br>
            <div id="arrow">></div>
            <input type="password" placeholder="Password" name="password" id="password" required/>
            <br><input type="submit" value="Sign In" id="button1" class="botton"/><br>
            <input type="button" value="Forgot Password?" id="button2" class="botton"><br>
            <input type="button" value="Sign Up" id="button3" class="botton">
            </form>
          </div>
        </div>
        <div class="view2">
                    <h4>Enter your Username or Email <br> to reset your Password</h4>
            <form action="" id="form2" autocomplete="off">
                <div id="arrow">></div><input type="text" placeholder="username" name="username" id="username" required>
                <br><input type="submit" value="Submit" id="button4" class="botton"><br>
            </form>
            <input type="button" value="Go Back" id="button0" class="botton">
        </div>
        <div class="view3">
                    <form action="" id="form3" autocomplete="off">
                <input type="text" placeholder="First Name" name="firstname" id="form3" required>
                <input type="text" placeholder="Last Name" name="lasttname" id="form3" required>
                <input type="email" placeholder="Email" name="email" id="form3" required>
                <input type="password" placeholder="Password" name="password" id="form3" required>
                <br><h2><input type="radio" name="male" id="form3.inline" required> Male
                        <input type="radio" name="male" id="form3.inline" required> Female</h2>
                <br><input type="submit" value="Submit" id="button4" class="botton"><br>
            </form>
            <input type="button" value="Go Back" id="button5" class="botton">
        </div>
    </div>
    </div>


</body>
</html>
