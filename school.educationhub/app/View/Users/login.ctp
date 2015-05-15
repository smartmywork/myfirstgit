<div class="content">
	<div class="container">
		<section class="content-full-width" id="primary">
                  <article id="post-4126" class="post-4126 page type-page status-publish hentry"><div id="my-courses" class="ui-tabs ui-widget ui-widget-content">
			<div class="col2-set" id="customer_login">

				<div class="col-1">

					<h2>Login</h2>

					
		<form name="loginform" id="loginform" action="<?php echo $this->Html->url(array('controller'=>'users','action'=>'login','admin'=>false)); ?>" method="post">
			
			<p class="login-username">
				<label for="user_login">Username</label>
				<input type="text" name="data[User][username]" id="user_login" class="input" value="" size="20">
			</p>
			<p class="login-password">
				<label for="user_pass">Password</label>
				<input type="password" name="data[User][password]" id="user_pass" class="input" value="" size="20">
			</p>
			
			<p class="login-remember"><label><input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember Me</label></p>
			<p class="login-submit">
				<input type="submit" id="wp-submit" class="button-primary" value="LOG IN">
				<!--<input type="hidden" name="redirect_to" value="index.html">-->
			</p>
			
		</form>
			
				</div>
			</div>
		</div>

		
		<div class="social-bookmark"></div>                  </article>
              </section>
    </div>
</div>