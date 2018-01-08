
	<!--Script-->
	<script>

	</script>
	<div class="container">

			<div class="row padding-helper">

            <div class="col-lg-12 row">

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
												Progress
											</h4>
											<div class="progress-container">
    										<div class="progress progress-striped active">
        									<div class="progress-bar progress-bar-success" style="width:0%">
														<font></font>
														<?php echo $product['Product']['progress']."%";?>
													</div>
    										</div>
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
										<?php
											$path = WWW_URL."files/".$product['Product']['user_id']."/".$product['Product']['id']."/".$product['Product']['image'];
											$file_headers = @get_headers($path);
										;?>
										<?php if((!$file_headers || $file_headers[0] != 'HTTP/1.1 404 Not Found' ) && $product['Product']['image'] != ""):?>
												<div class="img-holder img-fluid img-blur"
												style="background-image: url('<?php echo $path;?>')">

												<?php
													$tag = (unserialize($product['Product']['tag_multiple']));
													$relX = (unserialize($product['Product']['relX_multiple']));
													$relY = (unserialize($product['Product']['relY_multiple']));
												?>

												<?php for ($i=0;$i<5;$i++):?>
													<?php if($tag[$i] != ""):?>
													<a id="showTag-<?php echo $tag[$i];?>" class="hashtag hashtag<?php echo $i;?> wait-in-out" href="#show-up-<?php echo $tag[$i];?>" style="left: <?php echo $relX[$i];?>%; top: <?php echo $relY[$i];?>%;">
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
								<?php for ($i=0;$i<5;$i++):?>
								<?php if($tag[$i] != ""):?>
								<div id="show-up-<?php echo $tag[$i];?>" class="row-products col-lg-12 tag-comment showTag-<?php echo $tag[$i];?>">
                	<div class="card mt-4 ">
										<div class="card-block">
											<h4 class="bold">
												Comments on "<?php echo $tag[$i];?>"
											</h4>
											<div class="row">
											<div class="cm-box col-12 col-sm-12 col-md-7 col-lg-8 col-xl-8">
												<div class="scrollable">
												<?php $check = 0;?>
												<?php foreach($comments as $comment):?>
												<?php if($comment['Comment']['name'] == $tag[$i]):?>
												<?php $check++;?>
												<div class="row">
													<div class="col-3	col-sm-2 col-md-2 col-lg-2 col-xl-2">
														<div class="cm-icon center">
														</div>
													</div>
													<div class="col-9	col-sm-10 col-md-10 col-lg-10 col-xl-10">
														<h6 class="bold"><?php echo $user[$comment['Comment']['user_id']];?></h6>
														<p>
															<?php echo $comment['Comment']['content'];?>
														</p>
														<p class="float-right">
															<small>@<?php echo $comment['Comment']['created'];?></small>
														</p>
													</div>
												</div>
											<?php endif;?>
											<?php endforeach;?>
											<?php if(!$check):?>
												<p>
													No Comments...
												</p>
											<?php endif;?>
												</div>
											</div>
												<div class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-4">
													<form action="/whatshulb/reviews/add/<?php echo $product['Product']['id'];?>" id="<?php echo $tag[$i];?>" method="post" accept-charset="utf-8">
															<br />
    													<p class="italic">
																Leave a comment
															</p>
															<p>
																<div contenteditable="false">
																	<div class='textarea' contenteditable="true"></div>
		    													<input type="hidden" name="data[Comment][content]" class="real-textarea"/>
																	<input type="hidden" name="data[Comment][name]" value="<?php echo $tag[$i];?>"/>
																	<input type="hidden" name="data[Comment][user_id]" value="<?php echo  $this->Session->read('Auth.User.id');?>"/>
																</div>
															</p>
															<p class="float-right">
																<?php if($this->Session->read('Auth.User.user_name')):?>
																<input type="submit" class="btn btn-basic center" value="Send">
																<?php else:?>
																<?php echo $this->Html->link('Login',
					                        array('plugin' => 'auth_acl','controller' => 'users','action' => 'login'),
					                        array('class' => 'btn btn-basic center', 'target' => ''))
					                      ;?>
															<?php endif;?>
															</p>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php endif;?>
								<?php endfor;?>






					<!--
								<br><br>
								<h4>Other Products</h4>
								<br>
								<div class="row">
								<?php for($i=0; $i<4; $i++):?>
									<div class="col-lg-3 col-md-6 mb-4">
										<div class="card h-100 ShowPic" style="position: relative;">
											<?php echo $this->Html->image("http://placehold.it/700x500", array(
												"alt" => "",
												"class" => "card-img-top img-fluid",
												'url' => array('controller' => 'pages', 'action' => 'item')))
											;?>
												<h5 class="ShowText" style="position: absolute; right: 5px; bottom: 0px;">Product Name</h5>
										</div>
									</div>
								<?php endfor;?>
								</div>
								<br><br>
								<h4>Co-Creation Review</h4>
								<br>
								<div class="row">
								<?php for($i=0; $i<4; $i++):?>
									<div class="col-lg-3 col-md-6 mb-4">
										<div class="card h-100 ShowPic" style="position: relative;">
											<?php echo $this->Html->image("http://placehold.it/700x500", array(
												"alt" => "",
												"class" => "card-img-top img-fluid",
												'url' => array('controller' => 'pages', 'action' => 'cocreation')))
											;?>
												<small class="text-warning" style="position: absolute; right: 5px; bottom: 0px;">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
										</div>
									</div>
								<?php endfor;?>
								</div>

						-->

            </div>
            <!-- /.col-lg-9 -->

        </div>

    </div>
    <!-- /.container -->


<script>
//card fade in out
var current = true;
$('.img-holder').click(function(e){
	if (current){
		$('.wait-in-out').fadeOut('slow');
		current = false;
		$('.tag-comment').fadeOut('slow');
	} else {
		$('.wait-in-out').fadeIn('slow');
		current = true;
	}
});

//percentage bar
$(".progress-bar").animate({
  width: "<?php echo $product['Product']['progress'];?>%"
}, 2500);

//click hashtag show comments
$(document).ready(function(){
	$('.tag-comment').hide();
})

$('a.hashtag').click(function(){
	$('.tag-comment').not('.'+this.id).hide();
	$('.'+this.id).fadeIn('slow');
})

//smooth scroll to a href's id
var $root = $('html, body');
$('a[href^="#"]').click(function () {
    $root.animate({
        scrollTop: $( $.attr(this, 'href') ).offset().top
    }, 500);

    return false;
});

$('.textarea').keyup(function(){
	$(this).siblings('.real-textarea').attr("value",$(this).html());
});

</script>
