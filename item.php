<?php include 'header.php';?>
	<!--Script-->
	<script>

	</script>
	<div class="container home">

			<div class="row padding-helper">

            <div class="col-lg-12">

                <div class="card mt-4">
                    <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">
                    <div class="card-block">
                        <h3 class="card-title">Product Name</h3>
                        <h4>$24.99</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente dicta fugit fugiat hic aliquam itaque facere, soluta. Totam id dolores, sint aperiam sequi pariatur praesentium animi perspiciatis molestias iure, ducimus!</p>
                        <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span> 4.0 stars
                    </div>
                </div>
                <!-- /.card -->
								<br><br>
								<h4>Other Products</h4>
								<br>
								<div class="row">
								<?php for($i=0; $i<4; $i++):?>
									<div class="col-lg-3 col-md-6 mb-4">
										<div class="card h-100 ShowPic" style="position: relative;">
												<a href="item.php"><img class="card-img-top img-fluid" src="http://placehold.it/700x500" alt=""></a>
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
												<a href="cocreation.php"><img class="card-img-top img-fluid" src="http://placehold.it/700x500" alt=""></a>
												<small class="text-warning" style="position: absolute; right: 5px; bottom: 0px;">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
										</div>
									</div>
								<?php endfor;?>
								</div>

            </div>
            <!-- /.col-lg-9 -->

        </div>

    </div>
    <!-- /.container -->
<?php include 'footer.php';?>
