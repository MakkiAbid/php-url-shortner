<?php

	include "config.php";
	include "include/header.php";
	include "include/functions.php";

	$flag = true;

	if(isset($_POST['btn'])) {

		if(!empty($_POST['url'])) {
			if(filter_var($_POST['url'] , FILTER_VALIDATE_URL)) {
				$temp_url = $_POST['url'];
				$query = mysqli_query($conn, "SELECT * FROM data WHERE url = '$temp_url'");
				if(mysqli_num_rows($query) == 0) {
					$url = $_POST['url'];
					$token = getUniqueToken();
				}else {
					$token = mysqli_fetch_assoc($query)['token'];
					$flag = false;
				}
			}else {
				$url_error = "Invalid URL";
			}
		}else {
			$url_error = "Field Cannot be empty!";
		}

		if(empty($url_error) && $flag) {

			$url_insert = mysqli_query($conn, "INSERT INTO data (url,token) VALUES ('$url','$token')" );
		}

	}//main if ends here

?>

<div class="container">
	<div class="card">
		<div class="card-header d-flex flex-justify-center flex-align-center">
			<h3>Shortner</h3>
			<p></p>
		</div>
		<div class="card-content py-2 col-sm-8 offset-2 mt-5">
			<form action="" method="POST">
				<div class="form-group">
					<?php if(!empty($url_error)): ?>
						<p class="remark alert"><?= $url_error ?></p>
					<?php endif; ?>
					<input name="url" type="text" placeholder="Enter URL">
					<button type="submit" name="btn" class="col-sm-8 offset-2 button primary rounded mt-5">Shorten!</button>
				</div>
			</form>
		</div>
		<div class="card-footer col-sm-8 offset-2 mt-5 d-flex flex-justify-center flex-align-center">
			<?php if(!empty($token)): ?>
				<p>Your Shorten Link: &nbsp; </p>
				<a target="_blank" href="<?= WEBSITE_URI."redirect.php?token=".$token; ?>"><?= WEBSITE_URI."redirect.php?token=".$token ?></a>
			<?php endif; ?>
		</div>
	</div>
</div>




<?php include "include/footer.php"; ?>