<?php
$strAction = $this->plugin.$this->name.$this->action;
$menus = array();
$menus['AuthAclAuthAclindex'] = 1;
$menus['AuthAclUsersindex'] = 2; // User menu
$menus['AuthAclUsersadd'] = 2;
$menus['AuthAclUsersview'] = 2;
$menus['AuthAclGroupsindex'] = 2;
$menus['AuthAclPermissionsindex'] = 2;
$menus['AuthAclPermissionsuser'] = 2;
$menus['AuthAclPermissionsuserPermission'] = 2;

$menus['ProductProductsindex'] = 3;
//$menus['OrderOrdersindex'] = 3;

$menus['AuthAclSettingsindex'] = 4;
$menus['AuthAclSettingsemail'] = 4;
$menus['AuthAclUserseditAccount'] = 5;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo __('CakePHP 2.x User & Acl Management Pro'); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<link href="<?php echo $this->webroot; ?>css/style.css" rel="stylesheet">
<link href="<?php echo $this->webroot; ?>css/template.css" rel="stylesheet">
<link href="<?php echo $this->webroot; ?>bootstrap-modal/css/animate.min.css" rel="stylesheet">
<link href="<?php echo $this->webroot; ?>jquery/jquery-loadmask/jquery.loadmask.css" rel="stylesheet">

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

	<div class="navbar navbar-fixed-top" id="mnu_admin_top">
		<div class="navbar-inner">
			<div class="container">
				<button type="button" class="btn btn-navbar" data-toggle="collapse"
					data-target=".nav-collapse">
					<span class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<?php echo $this->Html->link(__('WhatsHulb'), array('plugin' => '','controller' => '/'),array('class' => 'brand')); ?>
				<div class="nav-collapse collapse">
					<ul class="nav">
						<?php if ($this->Acl->check('AuthAcl','index','AuthAcl') == true){?>
						<li	class="<?php if (isset($menus[$strAction]) && (int)$menus[$strAction] == 1){?> active <?php }?>">
							<?php echo $this->Html->link( __('Dashboard'), array('plugin' => 'auth_acl','controller' => 'auth_acl','action' => 'index')); ?>
						</li>
						<?php } ?>
						<?php if ($this->Acl->check('Users','index','AuthAcl') == true || $this->Acl->check('Groups','index','AuthAcl') == true || $this->Acl->check('Permissions','index','AuthAcl') == true){?>
						<li
							class="dropdown <?php if (isset($menus[$strAction]) && (int)$menus[$strAction] == 2){?> active <?php }?>"><a
							data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo __('Users'); ?>
								<b class="caret"></b> </a>
							<ul class="dropdown-menu">
								<?php if ($this->Acl->check('Users','index','AuthAcl') == true){?>
									<li><?php echo $this->Html->link(__('User Manager'), array('plugin' => 'auth_acl','controller' => 'users','action' => 'index')); ?></li>
								<?php } ?>
								<?php if ($this->Acl->check('Groups','index','AuthAcl') == true){?>
									<li><?php echo $this->Html->link(__('Groups'), array('plugin' => 'auth_acl','controller' => 'groups','action' => 'index')); ?></li>
								<?php }?>
								<?php if ($this->Acl->check('Permissions','index','AuthAcl') == true){?>
									<li><?php echo $this->Html->link(__('Permissions'), array('plugin' => 'auth_acl','controller' => 'permissions','action' => 'index')); ?></li>
								<?php } ?>
							</ul></li>
						<?php } ?>
						<li id="mnu_plugins"
							class="dropdown <?php if (isset($menus[$strAction]) && (int)$menus[$strAction] == 3){?> active <?php }?>"><a
							data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo __('Plugins'); ?>
								<b class="caret"></b> </a> <?php if ($this->Acl->check('Products','index','Product') == true || $this->Acl->check('Orders','index','Order') == true){?>
							<ul class="dropdown-menu">
								<li class="nav-header"><?php echo __('Product Manager'); ?></li>
								<?php if ($this->Acl->check('Products','index','Product') == true ){?>
									<li><?php echo $this->Html->link(__('Products'), array('plugin' => 'product','controller' => 'products','action' => 'index')); ?></li>
								<?php } ?>
								<!--<li class="nav-header"><?php echo __('Order Manager'); ?></li>-->
								<?php if ($this->Acl->check('Orders','index','Order') == true ){?>
									<li><?php echo $this->Html->link(__('Orders'), array('plugin' => 'order','controller' => 'orders','action' => 'index')); ?></li>
								<?php } ?>
							</ul> <?php } ?>
						</li>
						<?php if ($this->Acl->check('Settings','index','AuthAcl') == true || $this->Acl->check('Settings','email','AuthAcl') == true ){?>
						<li
							class="dropdown<?php if (isset($menus[$strAction]) && (int)$menus[$strAction] == 4){?> active <?php }?>"><a
							data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo __('Settings'); ?>
								<b class="caret"></b> </a>
							<ul class="dropdown-menu">
								<?php if ($this->Acl->check('Settings','index','AuthAcl') == true){?>
									<li><?php echo $this->Html->link(__('General'), array('plugin' => 'auth_acl','controller' => 'settings','action' => 'index')); ?></li>
								<?php }?>
								<?php if ($this->Acl->check('Settings','email','AuthAcl') == true){?>
									<li class="nav-header"><?php echo __('Email templates'); ?></li>
									<li><?php echo $this->Html->link(__('New User'), array('plugin' => 'auth_acl','controller' => 'settings','action' => 'email/new_user')); ?></li>
									<li><?php echo $this->Html->link(__('Reset Password'), array('plugin' => 'auth_acl','controller' => 'settings','action' => 'email/reset_password')); ?></li>
								<?php } ?>
							</ul></li>
						<?php }?>
					</ul>
					<ul class="nav pull-right">
						<?php if (!empty($login_user)){ ?>
						<li
							class="dropdown<?php if (isset($menus[$strAction]) && (int)$menus[$strAction] == 5){?> active <?php }?>"><a
							data-toggle="dropdown" class="dropdown-toggle" href="#"> <i
								class="icon icon-user"></i> <?php echo h($login_user['user_name']); ?>
								<b class="caret"></b>
						</a>
							<ul class="dropdown-menu">
								<li><?php echo $this->Html->link(__('<i class="icon-pencil"></i> Edit Account'), array('plugin' => 'auth_acl','controller' => 'users','action' => 'editAccount'),array('escape'=>false)); ?></li>
								<li class="divider"></li>
								<li><?php echo $this->Html->link(__('<i class="icon-minus-sign"></i> Logout'), array('plugin' => 'auth_acl','controller' => 'users','action' => 'logout'),array('escape'=>false)); ?></li>
							</ul></li>
						<?php }else{ ?>
						<li><?php echo $this->Html->link(__('Sign in'), array('plugin' => 'auth_acl','controller' => 'users','action' => 'login')); ?></li>
						</a></li>
						<?php } ?>
					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
		</div>
	</div>
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
<div class="navbar navbar-fixed-bottom hidden-phone" id="status">
	<div class="btn-toolbar">
		<div class="btn-group pull-right" style="margin-top: 3px;">
			<?php echo __('&copy; Company name 2013'); ?>
		</div>

	</div>
</div>

	<?php echo $this->element('sql_dump'); ?>
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
