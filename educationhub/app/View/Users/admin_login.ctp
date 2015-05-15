<!DOCTYPE html>
<html>
    <head>
            <meta charset="UTF-8">
            <title>Log in admin</title>
            
            <link rel="icon" href="http://vladmaxi.net/favicon.ico" type="image/x-icon">
            <link rel="shortcut icon" href="http://vladmaxi.net/favicon.ico" type="image/x-icon">
            <?php
                echo $this->Html->css('admin.login');
            ?>
            <!--[if lt IE 9]>
                    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <![endif]-->
    </head>
    <body>
        <div class="vladmaxi-top">
            
            <span class="right">
            <a href="<?php echo $this->Html->url('/'); ?>">
                    <strong>Back to home</strong>
                </a>
            </span>
        <div class="clr"></div>
        </div>
        <div id="login-form">
            <h1>Log in admin</h1>

            <fieldset>
                <form action="<?php echo FULL_BASE_URL.$this->Html->url(array('controller'=>'users','action'=>'login','admin'=>true)); ?>" method="post">
                    <input type="text" required value="Login" onBlur="if(this.value=='')this.value='Login'" onFocus="if(this.value=='Login')this.value='' " name="data[User][username]"/>
                    <input type="password" required value="Password" onBlur="if(this.value=='')this.value='Password'" onFocus="if(this.value=='Password')this.value='' " name="data[User][password]"/>
                    <input type="submit" value="Login">
                    <footer class="clearfix">
                    </footer>
                </form>
            </fieldset>

        </div>
    </body>
</html>