<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>WhatsHulb</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $this->webroot; ?>css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>css/slick-theme.css"/>

    <!-- Custom styles for this template -->
    <link href="<?php echo $this->webroot; ?>css/style.css" rel="stylesheet">
    <link href="<?php echo $this->webroot; ?>css/unite-gallery.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo $this->webroot; ?>js/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo $this->webroot; ?>js/tether.min.js" type="text/javascript" ></script>
    <script src="<?php echo $this->webroot; ?>js/bootstrap.min.js" type="text/javascript" ></script>
    <script src="<?php echo $this->webroot; ?>js/slick.min.js" type="text/javascript" ></script>
    <script src="<?php echo $this->webroot; ?>js/unitegallery.min.js" type="text/javascript" ></script>
    <script src="<?php echo $this->webroot; ?>js/ug-theme-tiles.js" type="text/javascript" ></script>

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
                    <li class="nav-item">
                      <?php $name = ($this->Session->read('Auth.User.user_name')) == "" ?"Login":$this->Session->read('Auth.User.user_name');?>
                      <?php echo $this->Html->link($name,
                        array('plugin' => 'auth_acl','controller' => 'users','action' => 'login'),
                        array('class' => 'nav-link', 'target' => ''))
                      ;?>
                    </li>
                    <li class="nav-item favourite">
                        <?php echo $this->Html->link('❤','/pages/favourite',
                          array('class' => 'nav-link', 'target' => ''))
                        ;?>
                    </li>
                    </li>
                  </div>
                </ul>
            </div>
        </div>
    </nav>
  </header>

		<?php echo $this->fetch('content'); ?>

		<!-- Footer -->
    <footer class="py-5 footer-bg">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; <?php echo date("Y"); ?> WhatsHulb Ltd.</p>
        </div>
        <!-- /.container -->
    </footer>

<script>
  $(document).ready(function(){
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
      tiles_space_between_cols:10
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

  $(document).ready(function(){
    $('.mid-box img').load(boxDisplay());
  });

  $(window).resize(boxDisplay());

</script>
<script src="<?php echo $this->webroot; ?>js/vue.min.js" type="text/javascript" ></script>

</body>

</html>
