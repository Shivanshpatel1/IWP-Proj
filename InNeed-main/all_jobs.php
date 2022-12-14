<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Jobs</title>
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/logo.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/price_rangs.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="https://unpkg.com/handsfree@8.5.1/build/lib/assets/handsfree.css" />
  <script src="https://unpkg.com/handsfree@8.5.1/build/lib/handsfree.js"></script>

</head>

<?php
	if(!empty($_SESSION['EMP_ID']))
	{ 
		include 'navbar.emp.loggedin.php';
	 }
	 elseif(!empty($_SESSION['SEEK_ID'])){
		include 'navbar.loggedin.php'; 
	 }
	else {	include 'navbar.php';  }
?>
<body style-"margin: 50px;">
<div class="section-tittle text-center">
                            <span>JOBS</span>
                            <h4>All Jobs Available</h4>
                        </div>
	<table class="table">		<thead class="thead-dark">
		<tr>
		  <th scope="col">Name</th>
		  <th scope="col">Profile</th>
		  <th scope="col">Key Skill</th>
		  <th scope="col">Location</th>
		  <th scope="col">CTC</th>
		  <th scope="col">More</th>
		</tr>
	  </thead>	
	
<tbody>
<?php 
	// require 'db_connect.php';
	// $current_date = date('Y-m-d');
	// $query = "SELECT * FROM job_details";
	// $query_jobs = mysqli_query($conn,$query);		
	// $query_rows_num = mysqli_num_rows($query_jobs);
	

	function httpPost($url)
	{
		$ch = curl_init();  
	 
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_HEADER, false); 
		
		$output=curl_exec($ch);
	
		curl_close($ch);
		return $output;
	} 
	$query_jobs= httpPost('http://localhost:3000/');
	$ans=json_decode($query_jobs);
		
			for($i=0;$i<count($ans);$i++)
			{	
				echo '<tr>
								<td>'.$ans[$i]->name.'</td>
								<td>'.$ans[$i]->profile.'</td>
								<td>'.$ans[$i]->key_skill.'</td>
								<td>'.$ans[$i]->location.'</td>
								<td>'.$ans[$i]->ctc.'</td>
								<td>
								<a class= "btn btn-primary btn-sm"  href= "search.jobs.view.php" onClick="MyWindow=window.open('."'search.jobs.view.php?id="
								.$ans[$i]->id."', '_window');".'return false;"> Apply </a> 
								</td>
						</tr>';
			}
		
		
	?>
    </tbody>
	<script>
  const handsfree = new Handsfree({weboji: true})
     handsfree.enablePlugins('browser')
    handsfree.start()
  </script>
					</table>
					<?php 
					    include 'footer.php';
						?>
						
</body>
</html>