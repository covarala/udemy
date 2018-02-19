
<!-- start top_bg -->
<div class="top_bg">
<div class="wrap">
<div class="main_top">
	<h4 class="style">create an account or login</h4>
</div>
</div>
</div>
<!-- start main -->
<div class="main_bg">
<div class="wrap">
<div class="main">
	<div class="login_left">
		<h3>new customers</h3>
		<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping address, view and track your orders in your accoung and more.</p>
		<div class="btn">
			<form>
				<input type="button"  onclick="location.href='<?php echo base_url('home/register') ?>';" value="Cadastre-se" />
			</form>
		</div>
	</div>
	<div class="login_left">
		<h3>registered customers</h3>
		<p>if you have any account with us, please log in.</p>
	<!-- start registration -->
	<div class="registration">
	<div class="registration_left">
		 <div class="registration_form">
		 <!-- Form -->
		 <?php
		 	echo form_open('Login/autentica');
		 ?>

			<form id="registration_form" action="" method="post">
				<div>
					<label>
						<input placeholder="email" name="email" type="email" tabindex="3" required="">
					</label>
				</div>
				<div>
					<label>
						<input placeholder="password" name="password" type="password" tabindex="4" required="">
					</label>
				</div>
				<div>
					<input type="submit" value="sign in" id="register-submit">
				</div>
				<div class="forget">
					<a href="#">Esqueceu a senha?</a>
				</div>
			</form>
			<!-- /Form -->
		</div>
	</div>
	</div>
	<!-- end registration -->
	</div>
	<div class="clear"></div>
</div>
</div>
</div>
