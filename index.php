<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, intil-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<link
	rel="stylesheet"
	href="http://use.fontawesome.com/releases/v5.8.1/css/all.css"
	integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhnd0JK28anvf"
	crossorigin="anonymous"
	/>

	<link rel="stylesheet" href="animate.css"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="styles.css" />
	<title>Hospital Management System</title>
	<style>
		#aaa:hover{cursor:pointer;}
		.social{animation-duration:0.8s;animation-iteration-count:0.6;}
		::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
			font-style:italic;
			color: green;
			opacity: 0.4; /* Firefox */
		}
		
	</style>
</head>
<body style="background-size:cover;background-color:#E03E3E;
    background: -webkit-linear-gradient(to right, #ff4b2b, #ff416c);
    background: linear-gradient(to right, #ff4b2b, #ff416c);
     overflow:hidden;">

<!--<div class="container" style="width:400px;margin-top:100px;">
<div class="card">
<img src="images/1.jpg" class="card-img-top">
<div class="card-body">
	<form class="form-group" action="func.php" method="post">
		<label>Username :</label><br>
		<input type="text" class ="form-control" name="username" placeholder="enter username"><br>
		<label>Password :</label><br>
		<input type="password" class ="form-control" name="password" placeholder="enter password"><br>
		<input type="submit" name="login_submit" id="aaa" style=""class="btn btn-primary">
	</form>
</div>
</div>
</div>-->

<div class="container animated fadeInDownBig" id="container" style="margin-top:9%; animation-delay:0.3s;">
      <div class="form-container sign-up-container">
	  <!---------------------------------The Sign Up Form----------------------------------->
    <form name="form2" action="func.php" method="post" onsubmit="Shake2()">
        <h1>Create Account</h1>
        <div class="social-container" style="font-weight: bold;">
            <a href="#" class="social"><i class="fab fa-facebook-f"></i>f</a>
            <a href="#" class="social"><i class="fab fa-google-plus-g"></i>G+</a>
            <a href="#" class="social"><i class="fab fa-linkedin-in"></i>Li</a>
        </div>
        <span>or use your email for registration</span>
        <input name="username" type="text" placeholder="Username" />
        <input name="email" type="email" placeholder="Email" />
        <input name="password" type="password" placeholder="Password" />
        <button name="sign_up_submit" type="submit">Sign Up</button>
    </form>
      </div>
      <div class="form-container sign-in-container">
      <!---------------------------------The Sign In Form----------------------------------> 
	<form name="form1" action="func.php" method="post" onsubmit="Shake()">
      <h1>Sign in</h1>
      <div class="social-container" style="font-weight:bold;">
          <a href="#" class="social"><i class="fab fa-facebook-f"></i>f</a>
          <a href="#" class="social"><i class="fab fa-google-plus-g"></i>G+</a>
          <a href="#" class="social"><i class="fab fa-linkedin-in"></i>Li</a>
      </div>
      <span>or use your account</span>
      <input class="username1" type="text" name="username" placeholder="Username" />
      <input class="password1" type="password" name="password" placeholder="Password" />
      <a href="#">Forgot your password?</a>
      <button type="submit" name="login_submit">Sign In</button>
	  
	</form>
	  <!-------------------------------End of Forms---------------------------------------------->	
      </div>
      <div class="overlay-container">
        <div class="overlay">
       <div class="overlay-panel overlay-left">
           <h1>Welcome Back!</h1>
           <p>
               To keep connected with us please login with your personal info
           </p>
           <button class="ghost" id="signIn">Sign In</button>
       </div>
       <div class="overlay-panel overlay-right">
           <h1>Hello, Friend!</h1>
           <p>Enter your personal details and start journey with us</p>
           <button class="ghost" id="signUp">Sign Up</button>
       </div>
   </div>
      </div>
  </div>
		
	
	
	<script src="main.js"></script>	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	<script>
		function Shake()
		{
			var effects = 'animated shake';
			var effectsEnd = 'animationend';
			
			var username= document.forms['form1']['username'].value;
			var password= document.forms['form1']['password'].value;
			
			if(username=='' && password=='')
			{
				event.preventDefault();
				$('[name="login_submit"]').addClass(effects).one(effectsEnd,function(){$('[name="login_submit"]').removeClass(effects);});
				return;
			}
			if(username=='')
			{
				event.preventDefault();
				$('.username1').addClass(effects).one(effectsEnd,function(){$('.username1').removeClass(effects);});
			}
			if(password=='')
			{
				event.preventDefault();
				$('.password1').addClass(effects).one(effectsEnd,function(){$('.password1').removeClass(effects);});
			
			}
		}

		function Shake2()
		{
			var effects = 'animated shake';
			var effectsEnd = 'animationend';
			
			var username= document.forms['form2']['username'].value;
			var email= document.forms['form2']['email'].value;
			var password= document.forms['form2']['password'].value;
			
			if(email='' || username=='' || password=='')
			{
				event.preventDefault();
				$('[name="sign_up_submit"]').addClass(effects).one(effectsEnd,function(){$('[name="sign_up_submit"]').removeClass(effects);});
				return;
			}
			
		}

		
		$(function(){
			
			var effects = 'animated shake';
			var effectsEnd = 'animationend';
			
			$('.social').hover(function (){
				$(this).addClass(effects).one(effectsEnd,function(){$(this).removeClass(effects);});
			});
			
			
		});
		
		
	</script>
	
	
</body>
</html>













<!--<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Hospital Management System</title>
	<style>
		#aaa:hover{cursor:pointer;}
	</style>
</head>
<body style="background:url('images/2.jpg'); background-size:cover;">
<div class="container" style="width:400px;margin-top:100px;">
<div class="card">
<img src="images/1.jpg" class="card-img-top">
<div class="card-body">
	<form class="form-group" action="func.php" method="post">
		<label>Username :</label><br>
		<input type="text" class ="form-control" name="username" placeholder="enter username"><br>
		<label>Password :</label><br>
		<input type="password" class ="form-control" name="password" placeholder="enter password"><br>
		<input type="submit" name="login_submit" id="aaa" style=""class="btn btn-primary">
	</form>
</div>
</div>
</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>-->