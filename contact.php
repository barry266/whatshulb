<?php include 'header.php';?>
	<!--Script-->
	<script>
		$('li.nav-item.contact').addClass('active');
		$('button.clear').click(function(){
			$('form#contact').find('input, textarea').val('');
		});
	</script>
	<div class="container home">

			<div class="row">

            <div class="col-lg-12 my-4">
                <div class="card row">
                	<div class="card-header">
                        <font class="h2">Contact</font> <small>(If you are interested in my works, please kindly send me an email via the following form)</small>
                    </div>
                    <div class="card-block">
                    	<div class="card-text jumbotron">
                    		<form id="contact" action="" method="post">
								<div class="form-group">
    								<label for="exampleInputEmail1">Title</label>
   									<input type="text" class="form-control" id="" name="" value="" placeholder="Enter title">
								</div>
								<div class="form-group">
    								<label for="exampleInputEmail1">Email address</label>
    								<input type="text" class="form-control" id="" name="" value="" placeholder="Enter email">
    								<small id="emailHelp" class="form-text text-muted">I'll never share your email with anyone else.</small>
  								</div>
								<div class="form-group">
    								<label for="exampleInputEmail1">Name</label>
   									<input type="text" class="form-control" id="" placeholder="Enter name">
								</div>
								<div class="form-group">
    								<label for="exampleTextarea">Content</label>
    								<textarea class="form-control" id="" name="" rows="8"></textarea>
  								</div>
  								<div class="float-right">
  									<input type="submit" name="" value="Send" class="btn btn-success" id="">
  									&nbsp;
  									<button class="btn btn-danger clear">Clear</button>
  								</div>
							</form>
                    	</div>
                    </div>
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col-lg-12 -->

        </div>

    </div>
    <!-- /.container -->
<?php include 'footer.php';?>
