<?php include "inc/header.php";

 ?>
		<div class="container-fluid">
			<div class="container">
			<?php
				if (isset($_GET['type'])) {
					$url = $_GET['type'];
					switch ($url) {
						case 'add_doctors':
							echo "hi";
							break;
						
						default:
							echo "default";
							break;
					}
				}else{
					include "inc/add_doctors.php";
				}
					
					
			?>
			</div>
		</div>
<?php include "inc/footer.php";

 ?>