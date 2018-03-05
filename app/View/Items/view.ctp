<?php
	$check = $this->Session->read('Auth.User.user_name')==""?false:true;
	$vipcheck = $this->Session->read('Auth.User.vip')?true:false;
?>
	<div class="container">

			<div class="row padding-helper">

				<?php if($vipcheck || $product['Product']['active'] || $product['Product']['user_id']==($this->Session->read('Auth.User.id'))):?>
            <div class="col-lg-12 row">
							<?php if($product['Product']['user_id']==($this->Session->read('Auth.User.id'))):?>
								<div class="col-12">
									<a class="btn btn-basic float-right" href="<?php echo WWW_URL."product/products/edit/".$product['Product']['id'];?>">Edit Now</a>
								</div>
							<?php endif;?>
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row-products">
								<div class="card mt-4">
									<div id="photostack-1" class="photostack photostack-start">
										<div>
											<figure>
												<a href="<?php echo WWW_URL."creators/view/".$creator[0]['User']['id'];?>" class="photostack-img">
													<?php if ($creator[0]['User']['profile']){
														$img = $creator[0]['User']['profile'];
													} else {
														if ($creator[0]['User']['user_fb']) {
															$img =  "http://graph.facebook.com/".$creator[0]['User']['user_fb']."/picture?type=large";
														} else {
															$img =  (WWW_URL)."/img/photo.jpg";
														}
													}
													;?>
													<img class="img-slider" src="<?php echo $img;?>">
													<div class="overlay">
													<i class="ug-icon-zoom creator-zoom"></i>
													</div>
												</a>
												<figcaption class="caption">
													<h2 class="photostack-title"><?php echo $creator[0]['User']['user_name'];?></h2>
												</figcaption>
											</figure>
											<?php
												$folder = "files/".$product['Product']['user_id']."/".$product['Product']['id']."/";
												$images = glob($folder."*.{jpg,png,gif,jpeg}", GLOB_BRACE);
											?>
											<?php foreach($images as $image):?>
											<figure>
												<a href="#" class="photostack-img">
													<div class="img-slider" style="background-image: url(<?php echo WWW_URL.$image;?>);}">
													</div>
												</a>
												<!--
												<figcaption>
													<h2 class="photostack-title"></h2>
												</figcaption>
												-->
											</figure>
										<?php endforeach;?>
											<?php for($j=0; $j<2; $j++):?>
											<figure data-dummy>
												<a href="#" class="photostack-img"><img src="<?php echo $this->webroot; ?>img/logo.png" /></a>
												<figcaption>
													<h2 class="photostack-title">WhatsHulb</h2>
												</figcaption>
											</figure>
										<?php endfor;?>
										</div>
									</div>
								</div>
							</div>

								<div class="row-products col-lg-5">
									<div class="card mt-4 ">
										<div class="card-block">
											<h4 class="bold text-center">
												<?php echo $product['Product']['name'];?>
												<?php echo ($product['Product']['price']!="" && $product['Product']['price']!="0")?" - $".$product['Product']['price']:"";?>
											</h4>
											<p class="card-text"><?php echo $product['Product']['description'];?></p>
										</div>
									</div>
									<div class="card mt-4 ">
										<div class="card-block">
											<h4 class="bold text-center">
												External
											</h4>
											<div class="text-center">
												<button class="btn btn-basic width-90 center" onclick="facebook_send_message();">
													Contact Me
												</button>
											</div>
											<br />
											<div class="text-center">
												<?php
													$name = $product['Product']['url']!=""?'Buy Now':'Unbegun Sale';
													$classes = $product['Product']['url']!=""?'btn btn-basic width-90 center':'btn btn-disable width-90 center';
													echo $this->Html->link($name,
													$product['Product']['url']!=""?$product['Product']['url']:"javascript:void(0)",
                          	array('class' => $classes,
														'target' => '_blank')
													)
                        ;?>
											</div>
										</div>
									</div>
								</div>

								<div class="row-products col-lg-7">
                <div class="card mt-4 ">
                    <!--<img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">-->
                    <div class="card-block">
											<?php echo $check?"":$this->Html->link('Login and view the comments',
                        array('plugin' => 'auth_acl','controller' => 'users','action' => 'login'),
                        array('class' => 'login-alert btn btn-wh', 'target' => ''))
                      ;?>
										<?php
											$path = WWW_URL."files/".$product['Product']['user_id']."/".$product['Product']['id']."/".$product['Product']['image'];
											$file_headers = @get_headers($path);
										;?>
										<?php if((!$file_headers || $file_headers[0] != 'HTTP/1.1 404 Not Found' ) && $product['Product']['image'] != ""):?>
												<div class="img-holder img-fluid img-blur <?php echo $check?'':'unshow-login';?>"
												style="background-image: url('<?php echo $path;?>')">
												<?php
													$tag = (unserialize($product['Product']['tag_multiple']));
													$relX = (unserialize($product['Product']['relX_multiple']));
													$relY = (unserialize($product['Product']['relY_multiple']));
												?>
												<?php for ($i=0;$i<5;$i++):?>
													<?php if($tag[$i] != ""):?>
													<a id="showTag-<?php echo $tag[$i];?>" class="hashtag wait-in-out" href="javascript:void(0)" data-toggle="modal" data-target="#Modal-<?php echo$tag[$i];?>" style="left: <?php echo $relX[$i];?>%; top: <?php echo $relY[$i];?>%;">
														<span class="hashtag-text">
															<div class="hashtag-tri">
															</div>
																<?php echo $tag[$i];?>
														</span>
													</a>
												<?php endif;?>
												<?php endfor;?>

												</div>
										<?php endif;?>
                    </div>
                </div>
								</div>
                <!-- /.card -->
								<!-- Modal -->
								<?php if($check):?>
								<?php for ($i=0;$i<5;$i++):?>
								<?php if($tag[$i] != ""):?>
								<div class="modal fade product-modal" id="Modal-<?php echo $tag[$i];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel"><?php echo $tag[$i];?></h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body" style="overflow: auto; min-height: 380px; height: 400px;">
												<?php foreach($comments as $comment):?>
													<?php if($comment['Comment']['name'] == $tag[$i]):?>
														<?php if ($comment['Comment']['user_id']!=($this->Session->read('Auth.User.id'))):?>
															<div class="talk-bubble tri-right left-top">
										 <div class="talktext row">
											 <div class="col-3 col-sm-2 col-md-2 col-lg-2 col-xl-2">
												 <div class="cm-icon center">
													 <?php echo $icon[$comment['Comment']['user_id']]?'<img alt="personal-logo" class="img-fluid rounded-circle" src="http://graph.facebook.com/'.$icon[$comment['Comment']['user_id']].'/picture">':"";?>
												 </div>
											 </div>
											 <div class="col-9 col-sm-10 col-md-10 col-lg-10 col-xl-10">
												 <h6 class="bold"><?php echo $user[$comment['Comment']['user_id']];?></h6>
												 <p>
													 <?php echo $comment['Comment']['content'];?>
												 </p>
												 <p class="float-right">
													 <small>@<?php echo $comment['Comment']['created'];?></small>
												 </p>
											 </div>
										 </div>
									 </div>
														<?php else:?>
															<div class="float-right talk-bubble tri-right right-top">
															<div class="talktext row">
																<div class="col-9 col-sm-10 col-md-10 col-lg-10 col-xl-10">
																	<h6 class="bold"><?php echo $user[$comment['Comment']['user_id']];?></h6>
																	<p>
																		<?php echo $comment['Comment']['content'];?>
																	</p>
																	<p class="float-right">
																		<small>@<?php echo $comment['Comment']['created'];?></small>
																	</p>
																</div>
																<div class="col-3	col-sm-2 col-md-2 col-lg-2 col-xl-2">
																	<div class="cm-icon center">
																		<?php echo $icon[$comment['Comment']['user_id']]?'<img alt="personal-logo" class="img-fluid rounded-circle" src="http://graph.facebook.com/'.$icon[$comment['Comment']['user_id']].'/picture">':"";?>
																	</div>
																</div>
															</div>
															</div>
														<?php endif;?>
													<?php endif;?>
												<?php endforeach;?>
											</div>
								      <div class="modal-footer">
												<div class='textarea' contenteditable="true"></div>
												<button class="btn btn-basic send-comment" data-dismiss="modal" style="margin-top: 45px;" name="<?php echo $tag[$i];?>">
													Send
												</button>
								      </div>
								    </div>
								  </div>
								</div>
								<?php endif;?>
								<?php endfor;?>
								<?php endif;?>


								<?php if ($product['Product']['active']):?>
								<div style="width: 100%;">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row-products">
								<div class="card mt-4">
									<div id="app" class="card-block">
										<h3 class="bold">
											&nbsp;&nbsp;&nbsp;Co-Creations <?php if($check):?><botton data-toggle="modal" data-target="#exampleModal" class="float-right h6 btn btn-basic bold" >+ Add yours</button><?php endif;?>
										</h3><br /><hr />
										<div class="row" v-if="show">
											<div v-for="cocreation in cocreations" class="col-lg-3 col-md-4 col-sm-6 col-xs-12 col-12" v-html="cocreation.embed">
		    							</div>
										</div>
										<div class="row" v-else>
											<div class="col-12">
												No Co-Creation is provided...
											</div>
										</div>
									</div>
								</div>
								</div>
								</div>
								<!-- Modal -->
								<?php if($check):?>
								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel">Co-Creation</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								        <input type="text" class="form-control send-co" placeholder="Paste your embed code" style="font-size: .7rem"/>
											</div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-basic send-co" data-dismiss="modal">Send</button>
								      </div>
								    </div>
								  </div>
								</div>
							<?php endif;?>
							<?php endif;?>
            </div>
            <!-- /.col-lg-12 -->

					<?php else:?>
					<div class="col-lg-12 row">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row-products">
							<div class="card mt-4">
								<div class="card-block">
									<h3 class="bold text-center">
										Access Denied
									</h3><br /><br />
									<h4 class="text-center">
										You do not have the right to access this item.
									</h4>
								</div>
							</div>
						</div>
					</div>
				<?php endif;?>

        </div>

    </div>
    <!-- /.container -->

<script>
//card fade in out
/*
var current = true;
$('.img-holder').not('.img-holder a.hashtag').click(function(e){
	if (current){
		$('.wait-in-out').fadeOut('slow');
		current = false;
		$('.tag-comment').fadeOut('slow');
	} else {
		$('.wait-in-out').fadeIn('slow');
		current = true;
	}
});
*/
$('.product-modal').on('shown.bs.modal', function (e) {
  $('.product-modal .modal-body').scrollTop(999999999);
})

//smooth scroll to a href's id
var $root = $('html, body');
$('a[href^="#"]').click(function () {
    $root.animate({
        scrollTop: $( $.attr(this, 'href') ).offset().top
    }, 500);

    return false;
});

var comment = "";

$('.textarea').keyup(function() {
  comment = $(this).html();
});

$('.send-comment').click(function(){
	$.ajax({
	  type: 'POST',
	   url: '<?php echo WWW_URL;?>api.php',
	   data: {'action':'comments', 'user_id':'<?php echo  $this->Session->read('Auth.User.id');?>', 'product_id':'<?php echo $product['Product']['id'];?>', 'content': comment, 'name': $(this).attr('name')},
	   headers: {'Content-type': 'application/x-www-form-urlencoded'},
	   success: function(result) {
			//alert('Your Comment is uploaded, please wait until it is approved.')
	    $('.textarea').empty();
			location.reload();
	   }
	})
});

$('button.send-co').click(function(){
	var embed = $('input.send-co').val();
	$.ajax({
	  type: 'POST',
	   url: '<?php echo WWW_URL;?>api.php',
	   data: {'action':'cocreations', 'user_id':'<?php echo  $this->Session->read('Auth.User.id');?>', 'product_id':'<?php echo $product['Product']['id'];?>', 'embed': embed},
	   headers: {'Content-type': 'application/x-www-form-urlencoded'},
	   success: function(result) {
			//alert('Your Co-Creation is uploaded, please wait until it is approved.')
	    $('input.send-co').val('');
			location.reload();
	   }
	})
});

</script>
<script src="<?php echo $this->webroot; ?>js/vue.min.js"></script>
<script>
var app = new Vue({
  el: '#app',
  data: {
    cocreations:[],
		show: false,
  },
	mounted: function() {
		const that = this;
		$.ajax({
		  type: 'GET',
		   url: '<?php echo WWW_URL;?>api.php/?product_id=<?php echo $product['Product']['id'];?>',
		   headers: {'Content-type': 'application/x-www-form-urlencoded'},
		   success: function(result) {
				that.show = result[0].embed?true:false;
		    that.cocreations = result;
		   }
		})
	},
	methods: {},
})
</script>
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

	function facebook_send_message() {
			FB.ui({
					app_id:'<?php echo APPID;?>',
					method: 'send',
					link: window.location.href,
					to:'<?php echo $creator[0]['User']['user_fb'];?>',
			});
	}
</script>
