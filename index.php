<?php include 'header.php';?>
	<!--Script-->
	<script>
		$('li.nav-item.home').addClass('active');
	</script>

	<div class="container home">

			<div class="row">


            <div class="col-lg-12">

								<iframe class="padding-helper" src="https://www.youtube.com/embed/JGwWNGJdvx8" frameborder="0" allowfullscreen>
								</iframe>

                <div class="row padding-helper">
										<?php for($i=0; $i<rand(3,9); $i++):?>
										<?php if (rand(0,1)):?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <a href="article.php"><img class="card-img-top img-fluid" src="http://placehold.it/700x500" alt=""></a>
                            <div class="card-block">
                                <h4 class="card-title"><a href="article.php">Article_title</a></h4>
                                <h5>by designer/ prof.</h5>
                                <p class="card-text">Design is good, design tgt.Design is good, design tgt.Design is good, design tgt.Design is good, design tgt.</p>
                            </div>
                        </div>
                    </div>
									<?php else:?>
										<div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <a href="cocreation.php"><img class="card-img-top img-fluid" src="http://placehold.it/700x500" alt=""></a>
                            <div class="card-block">
                                <h4 class="card-title"><a href="cocreation.php">Product_name</a></h4>
                                <h5>by consumer</h5>
                                <p class="card-text">This product is good, buy tgt.This product is good, buy tgt.This product is good, buy tgt.This product is good, buy tgt.This product is good, buy tgt.</p>
                            </div>
                        </div>
                    </div>
									<?php endif;?>
									<?php endfor;?>


                </div>
                <!-- /.row -->

            </div>
            <!-- /.col-lg-12 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
<?php include 'footer.php';?>
