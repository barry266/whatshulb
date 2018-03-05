<?php
// Connect to database
	$connection=mysqli_connect('localhost','root','root','whatshulb');

	$request_method=$_SERVER["REQUEST_METHOD"];
	switch($request_method)
	{
		case 'GET':
			$product_id=intval($_GET["product_id"]);
			get_cocreations($product_id);
			break;
		case 'POST':
			// Insert Product
			if ($_POST["action"]=="comments"){
				insert_product();
			} elseif ($_POST["action"]=="cocreations") {
				insert_cocreation();
			}
			break;
		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
	}

	function get_cocreations($product_id)
		{
			global $connection;
			$query="SELECT embed FROM cocreations WHERE product_id={$product_id} AND active=1 ORDER BY id desc";
			$response=array();
			$result=mysqli_query($connection, $query);
			while($row=mysqli_fetch_array($result)) {
				$response[]=$row;
			}
			header('Content-Type: application/json');
			echo json_encode($response);
		}

  function insert_product()
  	{
  		global $connection;
  		$product_id = $_POST["product_id"];
  		$user_id = $_POST["user_id"];
  		$name = $_POST["name"];
  		$content = $_POST["content"];
      $created = date("Y-m-d H:i:s");
  		$query = "INSERT INTO comments SET product_id={$product_id}, user_id={$user_id}, name='{$name}', created='{$created}', content='{$content}', active=1";
  		if(mysqli_query($connection, $query))
  		{
  			$response=array(
  				'status' => 1,
  				'status_message' =>'Product Added Successfully.',
					'post' => $_POST,
  			);
  		}
  		else
  		{
  			$response=array(
  				'status' => 0,
  				'status_message' =>'Product Addition Failed.',
					'post' => $_POST,
  			);
  		}
  		header('Content-Type: application/json');
  		echo json_encode($response);
  	}

		function insert_cocreation()
	  	{
	  		global $connection;
	  		$product_id = $_POST["product_id"];
	  		$user_id = $_POST["user_id"];
				$embed = $_POST["embed"];
	  		//$embed = substr($_POST["embed"], 0, strpos($_POST["embed"], "<script"));
	  		$query = "INSERT INTO cocreations SET product_id={$product_id}, user_id={$user_id}, embed='{$embed}', active=1";
	  		if(mysqli_query($connection, $query))
	  		{
	  			$response=array(
	  				'status' => 1,
	  				'status_message' =>'Creation Added Successfully.',
						'post' => $_POST,
	  			);
	  		}
	  		else
	  		{
	  			$response=array(
	  				'status' => 0,
	  				'status_message' =>'Creationt Addition Failed.',
						'post' => $_POST,
	  			);
	  		}
	  		header('Content-Type: application/json');
	  		echo json_encode($response);
	  	}


	mysqli_close($connection);
  ;?>
