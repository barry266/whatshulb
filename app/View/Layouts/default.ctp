<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A FAIR platform that EVERYONE can take part in CO-CREATIONS and make ANY creative ideas come to life">
    <meta name="author" content="WhatsHulb">
    <meta property="og:title" content="Whatshulb" />
    <meta property="og:description" content="A FAIR platform that EVERYONE can take part in CO-CREATIONS and make ANY creative ideas come to life" />
    <meta property="og:image" content="<?php echo $this->webroot; ?>img/slider_1.jpg" />

    <title>WhatsHulb</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>css/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>css/demo.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>css/component.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>css/unite-gallery.css">

    <!-- Custom styles for this template -->
    <link href="<?php echo $this->webroot; ?>css/style.css" rel="stylesheet">
    <link href="<?php echo $this->webroot; ?>css/index.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo $this->webroot; ?>js/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo $this->webroot; ?>js/tether.min.js" type="text/javascript" ></script>
    <script src="<?php echo $this->webroot; ?>js/bootstrap.min.js" type="text/javascript" ></script>
    <script src="<?php echo $this->webroot; ?>js/slick.min.js" type="text/javascript" ></script>
    <script src="<?php echo $this->webroot; ?>js/unitegallery.min.js" type="text/javascript" ></script>
    <script src="<?php echo $this->webroot; ?>js/ug-theme-tiles.js" type="text/javascript" ></script>
    <script src="<?php echo $this->webroot; ?>js/modernizr.min.js"></script>
    <script src="<?php echo $this->webroot; ?>js/classie.js"></script>
    <script src="<?php echo $this->webroot; ?>js/photostack.js"></script>
    <script src="<?php echo $this->webroot; ?>js/index.js"></script>
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
                'url' => array('controller' => '/'),
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
              <img alt="personal-logo" class="img-fluid rounded-circle" src="<?php echo WWW_URL;?>img/photo.jpg">
            <?php endif;?>
          </div>
          <br>
          <!--name-->
          <?php if($check):?>
          <?php echo $this->Html->link($name, array('plugin' => 'auth_acl','controller' => 'users','action' => 'editAccount'),array('escape'=>false)); ?>
          <?php else:?>
          <a href="javascript:void(0)"><?php echo $name;?></a>
          <?php endif;?>
          <br />
          <?php if($check == 1):?>
  						<?php echo $this->Html->link(__('Users'), array('plugin' => 'auth_acl','controller' => 'users','action' => 'index')); ?>
  						<?php echo $this->Html->link(__('Groups'), array('plugin' => 'auth_acl','controller' => 'groups','action' => 'index')); ?>
  						<?php echo $this->Html->link(__('Permissions'), array('plugin' => 'auth_acl','controller' => 'permissions','action' => 'index')); ?>
  				<?php endif;?>
          <!--prduct-->
  				<?php if($check == 1 || $check == 2):?>
  					<?php echo $this->Html->link(__('Products'), array('plugin' => 'product','controller' => 'products','action' => 'index')); ?>
  				<?php endif;?>
  				<!--comment-->
  				<?php if($check == 1):?>
  					<?php echo $this->Html->link(__('Comments'), array('plugin' => 'comment','controller' => 'comments','action' => 'index')); ?>
  				<?php endif;?>
          <?php echo $check==1?$this->Html->link(__('General'), array('plugin' => 'auth_acl','controller' => 'settings','action' => 'index')):""; ?>
          <?php echo $check==1?$this->Html->link(__('New User'), array('plugin' => 'auth_acl','controller' => 'settings','action' => 'email/new_user')):""; ?>
          <?php echo $check==1?$this->Html->link(__('Reset Password'), array('plugin' => 'auth_acl','controller' => 'settings','action' => 'email/reset_password')):""; ?>
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

		<?php echo $this->fetch('content'); ?>

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
<script>
  $(document).ready(function(){
    /***MENU CLOSE***/
    $('.section,div#menu-options a').on('click', function () {
        $('nav#theMenu').removeClass('menu-open');
    });

    /***MENU OPEN***/
    $('div#menuToggle').on('click', function () {
        $('div#menuToggle').toggleClass('active');
        $('body').toggleClass('body-push-toright');
        $('nav#theMenu').toggleClass('menu-open');
    });


  	$('.card').fadeIn(2100);
    $('#gallery').fadeIn(2100);

    $("#gallery").unitegallery({
      tile_border_color:"rgba(255, 255, 255, 0)",
      tile_outline_color:"rgba(255, 255, 255, 0.5)",
      tile_enable_shadow:true,
      tile_shadow_color:"rgba(255, 255, 255, 0)",
      tile_overlay_opacity:0.3,
      tile_show_link_icon:true,
      tile_image_effect_type:"sepia",
      tile_image_effect_reverse:true,
      tile_enable_textpanel:true,
      lightbox_textpanel_title_color:"fff",
      tiles_col_width:230,
      tiles_space_between_cols:10,
      tile_enable_overlay: true,
      tile_overlay_opacity: 0.6,
      tile_overlay_color: "#FFFFFF",
      lightbox_overlay_color: "#FFFFFF",
      lightbox_overlay_opacity: 0.6,
      tile_textpanel_bg_opacity: 0,
			tile_textpanel_bg_color: "#fff",
      tile_textpanel_title_color: "black",
      tile_textpanel_title_font_size: 16,
      lightbox_slider_control_zoom: false,
      gallery_min_width: "100%",
    });

    $("#gallery2").unitegallery({
      tile_border_color:"rgba(255, 255, 255, 0)",
      tile_outline_color:"rgba(255, 255, 255, 0.5)",
      tile_enable_shadow:true,
      tile_shadow_color:"rgba(255, 255, 255, 0)",
      tile_overlay_opacity:0.3,
      tile_show_link_icon:true,
      tile_image_effect_type:"sepia",
      tile_image_effect_reverse:true,
      tile_enable_textpanel:true,
      lightbox_textpanel_title_color:"fff",
      tiles_col_width:230,
      tiles_space_between_cols:10,
      tile_enable_overlay: true,
      tile_overlay_opacity: 0.6,
      tile_overlay_color: "#FFFFFF",
      lightbox_overlay_color: "#FFFFFF",
      lightbox_overlay_opacity: 0.6,
      tile_textpanel_bg_opacity: 0,
			tile_textpanel_bg_color: "#fff",
      tile_textpanel_title_color: "black",
      tile_textpanel_title_font_size: 16,
      lightbox_slider_control_zoom: false,
      gallery_min_width: "100%",
    });

  });
</script>
<script>
  function boxDisplay(){
    if ($(window).width > 576){
      $('.display-box').attr('style','height: '+$('.mid-box img').height+'px');
    }	else {
      $('.display-box').attr('style','');
    }
  };

  $(window).resize(boxDisplay());

  <?php if(strpos($_SERVER['REQUEST_URI'], 'items/view/')):?>
  $('document').ready(function(){
  	new Photostack( document.getElementById( 'photostack-1' ), {
  		callback : function( item ) {
  			//console.log(item)
  		}
  	} );

  	$('.mid-box img').load(boxDisplay());
  });
  <?php endif ;?>
</script>

<script async defer src="<?php echo $this->webroot; ?>js/embeds.js"></script>

</body>

</html>
