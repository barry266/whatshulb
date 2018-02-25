<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>WhatsHulb</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">


<!-- Custom styles for this template -->
<link href="<?php echo $this->webroot; ?>css/template.css" rel="stylesheet">
<link href="<?php echo $this->webroot; ?>bootstrap-modal/css/animate.min.css" rel="stylesheet">
<link href="<?php echo $this->webroot; ?>jquery/jquery-loadmask/jquery.loadmask.css" rel="stylesheet">
<link href="<?php echo $this->webroot; ?>css/nav.css" rel="stylesheet">
<link href="<?php echo $this->webroot; ?>css/style.css" rel="stylesheet">


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script src="<?php echo $this->webroot; ?>jquery/jquery-loadmask/jquery.loadmask.js"></script>

<script src="<?php echo $this->webroot; ?>jquery/jquery.cookie.js"></script>
<script src="<?php echo $this->webroot; ?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $this->webroot; ?>bootstrap-modal/js/bootstrap.modal.js"></script>
<script src="<?php echo $this->webroot; ?>bootstrap-modal/js/jquery.easing.1.3.js"></script>
<script src="<?php echo $this->webroot; ?>tiny_mce/tiny_mce.js"></script>



<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="<?php echo $this->webroot; ?>jquery.fileupload/css/jquery.fileupload.css">
<link rel="stylesheet" href="<?php echo $this->webroot; ?>jquery.fileupload/css/jquery.fileupload-ui.css">
<!-- CSS adjustments for browsers with JavaScript disabled -->
<noscript><link rel="stylesheet" href="<?php echo $this->webroot; ?>jquery.fileupload/css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="<?php echo $this->webroot; ?>jquery.fileupload/css/jquery.fileupload-ui-noscript.css"></noscript>


<style>
table>thead>tr>th {
	cursor: default;
	text-align: center;
	color: #333333;
	text-shadow: 0 1px 0 #FFFFFF;
	background-color: #e6e6e6;
}

table>thead>tr>th>a {
	color: black;
}
</style>

</head>
<body>
	<header class="front-end-header">
	<!-- Navigation -->
	<nav class="navbar fixed-top navbar-toggleable-md navbar-bg">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
			</button>
			<div class="container">
					<?php echo $this->Html->image("logo.png", array(
							"alt" => "logo",
							'url' => array('plugin' => false, 'controller' => '/'),
							'class' => 'logo-setup',
						))
					;?>
					<div class="collapse navbar-collapse" id="navbarExample">
							<ul class="navbar-nav ml-auto">
									<li class="nav-item home">
											<?php echo $this->Html->link("What's Fun",'/',
												array('class' => 'nav-link', 'target' => ''))
											;?>
									</li>
									<li class="nav-item edit">
											<?php echo $this->Html->link('Editorial Board','/pages/editorial',
												array('class' => 'nav-link', 'target' => ''))
											;?>
									</li>
									<li class="nav-item products">
											<?php echo $this->Html->link('Products','/items',
												array('class' => 'nav-link', 'target' => ''))
											;?>
									</li>
									<li class="nav-item creators">
											<?php echo $this->Html->link('Creators','/creators',
												array('class' => 'nav-link', 'target' => ''))
											;?>
									</li>
									<li class="nav-item about">
											<?php echo $this->Html->link('About Us','/pages/about',
												array('class' => 'nav-link', 'target' => ''))
											;?>
									</li>
									<!--
									<li class="nav-item">
										<?php $name = ($this->Session->read('Auth.User.user_name')) == "" ?"Visitor":$this->Session->read('Auth.User.user_name');?>
										<?php echo $this->Html->link($name,
											array('plugin' => 'auth_acl','controller' => '','action' => 'index'),
											array('class' => 'nav-link', 'target' => ''))
										;?>
									</li>
								-->
						</ul>
					</div>
			</div>
	</nav>

	<!--user nav bar-->
	<nav id="theMenu" class="menu">
		<?php $name = ($this->Session->read('Auth.User.user_name')) == "" ?"Visitor":$this->Session->read('Auth.User.user_name');?>
		<?php $icon = ($this->Session->read('Auth.User.user_fb')) == "" ?"":$this->Session->read('Auth.User.user_fb');?>
		<?php $check = $this->Session->read('Auth.User.role');?>
		<!--MENU-->
		<div id="menu-options" class="menu-wrap">

				<!--PERSONAL LOGO-->
				<div class="logo-flat">
					<?php if($icon):?>
						<img alt="personal-logo" class="img-fluid rounded-circle" src="http://graph.facebook.com/<?php echo $icon;?>/picture?type=large">
					<?php else:?>
						<img alt="personal-logo" class="img-fluid rounded-circle" src="<?php echo WWW_URL;?>/img/photo.jpg">
					<?php endif;?>
				</div>
				<br>
				<!--name-->
				<?php echo $this->Html->link(__($name), array('plugin' => 'auth_acl','controller' => 'users','action' => 'editAccount'),array('escape'=>false)); ?>
				<br />
				<?php if($this->Acl->check('Users','index','AuthAcl') == true || $this->Acl->check('Groups','index','AuthAcl') == true || $this->Acl->check('Permissions','index','AuthAcl') == true):?>
						<?php if ($this->Acl->check('Users','index','AuthAcl') == true){?>
							<?php echo $this->Html->link(__('User'), array('plugin' => 'auth_acl','controller' => 'users','action' => 'index')); ?>
						<?php } ?>
						<?php if ($this->Acl->check('Groups','index','AuthAcl') == true){?>
							<?php echo $this->Html->link(__('Groups'), array('plugin' => 'auth_acl','controller' => 'groups','action' => 'index')); ?>
						<?php }?>
						<?php if ($this->Acl->check('Permissions','index','AuthAcl') == true){?>
							<?php echo $this->Html->link(__('Permissions'), array('plugin' => 'auth_acl','controller' => 'permissions','action' => 'index')); ?>
						<?php } ?>
				<?php endif;?>
				<!--prduct-->
				<?php if($this->Acl->check('Products','index','Product') == true):?>
					<?php echo $this->Html->link(__('Products'), array('plugin' => 'product','controller' => 'products','action' => 'index')); ?>
				<?php endif;?>
				<!--comment-->
				<?php if($this->Acl->check('Comments','index','Comment') == true):?>
					<?php echo $this->Html->link(__('Comments'), array('plugin' => 'comment','controller' => 'comments','action' => 'index')); ?>
				<?php endif;?>
				<!--setting-->
				<?php if($this->Acl->check('Settings','index','AuthAcl') == true || $this->Acl->check('Settings','email','AuthAcl') == true ):?>
					<?php if ($this->Acl->check('Settings','index','AuthAcl') == true){?>
						<?php echo $this->Html->link(__('General'), array('plugin' => 'auth_acl','controller' => 'settings','action' => 'index')); ?>
					<?php }?>
					<?php if ($this->Acl->check('Settings','email','AuthAcl') == true){?>
						<?php echo $this->Html->link(__('New User'), array('plugin' => 'auth_acl','controller' => 'settings','action' => 'email/new_user')); ?>
						<?php echo $this->Html->link(__('Reset Password'), array('plugin' => 'auth_acl','controller' => 'settings','action' => 'email/reset_password')); ?>
					<?php } ?>
				<?php endif;?>
				<!--loginout-->
				<br />
				<?php if($name != "Visitor"):?>
				<?php echo $this->Html->link('Logout',
					array('plugin' => 'auth_acl','controller' => 'users','action' => 'logout'))
				;?>
			<?php else:?>
				<?php echo $this->Html->link('Login',
					array('plugin' => 'auth_acl','controller' => 'users','action' => 'login'))
				;?>
			<?php endif;?>
		</div>

		<!-- MENU BUTTON -->
		<div id="menuToggle">
				<div class="toggle-normal">
					✕
				</div>
		</div>
</nav>
</header>
	<!-- container -->
	<div class="container" id="container">
		<?php
			if (method_exists($this, 'fetch')){
				echo $this->fetch('content');
			}else{
				echo $content_for_layout;
			}
		?>
	</div>

<br />
<br />
<br />
<!-- Footer -->
<footer class="py-5 footer-bg">
		<div class="container">
				<p class="m-0 text-center text-white">
					Copyright &copy; <?php echo date("Y"); ?> WhatsHulb Ltd. |
					<?php echo $this->Html->link("Privacy Policy",'/pages/policy',
						array('class' => 'white-a', 'target' => ''))
					;?>
				</p>
		</div>
		<!-- /.container -->
</footer>

	<?php //echo $this->element('sql_dump'); ?>
	<!-- /container -->
</body>

<script src="<?php echo $this->webroot; ?>jquery.fileupload/js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="<?php echo $this->webroot; ?>jquery.fileupload/js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="<?php echo $this->webroot; ?>jquery.fileupload/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="<?php echo $this->webroot; ?>jquery.fileupload/js/canvas-to-blob.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?php echo $this->webroot; ?>jquery.fileupload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?php echo $this->webroot; ?>jquery.fileupload/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="<?php echo $this->webroot; ?>jquery.fileupload/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="<?php echo $this->webroot; ?>jquery.fileupload/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="<?php echo $this->webroot; ?>jquery.fileupload/js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="<?php echo $this->webroot; ?>jquery.fileupload/js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="<?php echo $this->webroot; ?>jquery.fileupload/js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="<?php echo $this->webroot; ?>jquery.fileupload/js/jquery.fileupload-ui.js"></script>
<script src="<?php echo $this->webroot; ?>jquery.fileupload/js/main.js"></script>
<script>
	$(document).ready(function($) {
		$('.navbar-toggler.navbar-toggler-right').click(function(){
			$('div.collapse.navbar-collapse').toggle();
		});

		/***MENU CLOSE***/
		$('div#menu-options a').on('click', function () {
				$('nav#theMenu').removeClass('menu-open');
		});

		/***MENU OPEN***/
		$('div#menuToggle').on('click', function () {
				$('div#menuToggle').toggleClass('active');
				$('body').toggleClass('body-push-toright');
				$('nav#theMenu').toggleClass('menu-open');
		});


		// remove user search cookie
		$('#mnu_admin_top').find('a').each(function() {
			$(this).click(function() {
				removeUserSearchCookie();
			});
		});
		$('#tab_user_manager').find('a').each(function() {
			$(this).click(function() {
				removeUserSearchCookie();
			});
		});

		if ($('#mnu_plugins').children('ul').find('li').length <= 1){
           $('#mnu_plugins').hide();
		}else{
           $('#mnu_plugins').show();
       	}


	});

	function removeUserSearchCookie() {
		$.cookie.raw = true;
		$.removeCookie('CakeCookie[srcPassArg]', {
			path : '/'
		});
	}
</script>
</html>
