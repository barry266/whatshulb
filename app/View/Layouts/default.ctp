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

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo $this->webroot; ?>js/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo $this->webroot; ?>js/tether.min.js" type="text/javascript" ></script>
    <script src="<?php echo $this->webroot; ?>js/bootstrap.min.js" type="text/javascript" ></script>
    <script src="<?php echo $this->webroot; ?>js/slick.min.js" type="text/javascript" ></script>

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
                    <div class="dropdown">
                    <li class="nav-item control">
                      <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">
                        <?php echo ($this->Session->read('Auth.User.user_name')) == "" ?"Visitor":$this->Session->read('Auth.User.user_name');?>
                        <span class="caret"></span>
                      </a>
                      <div class="dropdown-menu">
                            <?php echo $this->Html->link('My Favourite',
                              '/pages/favourite',
                              array('class' => 'favourite dropdown-item', 'target' => ''))
                            ;?>
                            <?php echo $this->Html->link('Shopping Cart',
                              '/pages/cart',
                              array('class' => 'cart dropdown-item', 'target' => ''))
                            ;?>
                            <?php echo $this->Html->link(__('Control Panel'),
                              array('plugin' => 'auth_acl','controller' => 'users','action' => 'login'),
                              array('class' => 'dropdown-item', 'target' => ''))
                            ;?>
                      </div>
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

<script src="<?php echo $this->webroot; ?>js/vue.min.js" type="text/javascript" ></script>

</body>

</html>
