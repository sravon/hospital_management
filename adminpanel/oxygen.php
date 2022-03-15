<?php include "inc/header.php";
	if (isset($_GET['deleteoxygen'])) {
		$Oxygen->deleteOxygen($_GET['deleteoxygen']);
		header("Location: oxygen.php");
	} 
	
 ?>
		<div class="container-fluid">
			<div class="container">
				<div class="row">
					
					<div class="col-md-10 mx-auto">
						<table class="table table-striped">
							  <thead>
							
							    <tr>
							      <th scope="col">#</th>
							      <th scope="col">Name</th>
							    </tr>
							  </thead>
							  <tbody>
							  	<?php
									$doc = $Oxygen->allOxygen();
									if ($doc) {
										$i = 0;
									  	while($value = $doc->fetch_assoc()){
									  		$i++;
								?>
								    <tr>
								      <th scope="row"><?php echo $i; ?></th>
								      <td><?php echo $value['name']; ?>
								      <td><a href="?deleteoxygen=<?php echo $value['cylinder_id']; ?>" class="btn btn-danger">Delete</a></td>
								    </tr>
							    <?php }} ?>
							  </tbody>
						</table>
					</div>
				</div>
					
			</div>
		</div>
<?php 
	include "inc/footer.php"; 
?>