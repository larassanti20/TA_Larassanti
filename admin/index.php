<?php include 'include/admin_header.php'?>
<?php include 'include/admin_sidebar.php' ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<?php 

	

	if (isset($_GET['module'])) {
		
		
		if ($_GET['module'] == 'data_getar') {
			include "data_getar.php";
		}

		if ($_GET['module'] == 'data_suhu') {
			include "data_suhu.php";
		}


		

		

	}



	?>

</div>

<?php include 'include/admin_footer.php'?>