	<script>
		$('li.nav-item.favourite').addClass('active');
	</script>
	<div class="container">

			<div class="row">

				<button onclick="facebook_send_message() ">
test
				</button>

        </div>

    </div>
    <!-- /.container -->
		<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '<?php echo APPID;?>',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v2.11'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
		<script>
		function facebook_send_message() {
		    FB.ui({
		        app_id:'<?php echo APPID;?>',
		        method: 'send',
		        name: "hello",
		        link: 'https://www.whatshulb.com',
		        to:'100017342377823',
		        description:'test'

		    });
		}
		</script>
