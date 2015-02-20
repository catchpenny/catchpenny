<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CatchPenny Project</title>
    <style>
@font-face {
    font-family: myFirstFont;
    src: url(font/LetterGothic.woff) ;
}       

html {
  background: url(img/happy.jpg) no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  font-family: myFirstFont;
}

body{
    color: white;
}

#project{
     font-size: 3em;
     margin-top:100px;
     margin-left:100px;
}

#heading{
    font-size: 4.5em;
    margin-left:50px;
}

#welcome{
    margin-left:100px;
}

input[type=text], input[type=password], input[type=email] {
  background: transparent;
  border: 1px solid rgba(255,255,255,0);
  border-bottom: 1px solid rgba(255,255,255,0.5);
  color: white;
  padding-bottom: 0px;
  padding-top: 10px;
  text-align: center;
  font-family: myFirstFont;

}
input[type=text]:focus, input[type=password]:focus, input[type=email]:focus {
  color: white;
  background: rgba(0, 0, 0, 0.1);
  outline: 0;
}

#form{
    margin-left:100px;
}

#submit{
    color:white;
    background-color: rgba(16, 1, 24, 0);;
    outline: 0;
    border: 0px;
    font-family: myFirstFont;
}

#submit:hover{
    color: rgba(16, 1, 24, 0.6);
}
#submit:active {
    color: rgba(255, 255, 255, 1);
}

    </style>
</head>

<body>

            <div id='project'>Project</div>
            <div id="heading">&lt;CatchPenny&gt;</div>
            <br><br>
            <div id="welcome">Imagine a place where nothing was impossible.
                          <br>What would you do?
            </div>
            <br><br><br><br><br><br><br>
            <div id="form">
            To get notified, Enter your Email
            <form action="home">
            <input type="email" placeholder="Email" name="email" required>
            <input type="submit" value="Click Here" id='submit'>
            </form>
            </div>
</body>
</html>
