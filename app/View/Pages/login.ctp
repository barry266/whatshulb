<script>
  function statusChangeCallback(response) {
    if (response.status === 'connected') {
      testAPI();
    } else {
      console.log('Not Connected FB')
    }
  }

  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '<?php echo APPID;?>',
      cookie     : true,
      xfbml      : true,
      version    : 'v2.8'
    });
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  function testAPI() {
    FB.api('/me', function(response) {
      console.log(response.id)
			$('.test').val(response.id)
    });
  }
</script>

<!--
  Below we include the Login Button social plugin. This button uses
  the JavaScript SDK to present a graphical Login button that triggers
  the FB.login() function when clicked.
-->
<div onlogin="checkLoginState();" class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>


<button class="btn" onlogin="checkLoginState();">test</button>
<input type="text" class="" value=""/>
<input type="text" class="" value=""/>
<input type="text" class="" value=""/>
<input type="text" class="test" value=""/>
