<?php
include_once("header.php");
if(isset($_SESSION['role']) == "teacher"):
?>
<div class="container">
<br><br>
		<div class="row">
			<button class="btn btn-sm btn-primary" style="margin-bottom: 20px;" onclick="navigateBack()"> Back </button>
		
			<table class="table table-striped table-hover">
				<thead class="bg-dark text-white">
					<tr>
						<th>#</th>
						<th>E-Mail</th>
						<th>Role</th>
						<?php if($_SESSION["role"] == "teacher"): ?>
						<th>Action</th>
						<?php endif; ?>
					</tr>

				</thead>
				
				<?php 
					while($user = mysqli_fetch_assoc($user_res)):

				?>
					<tr>
						<td><?php echo $user['id']; ?></td>
						<td><?php echo $user['email']?></td>
						<td style="text-transform: capitalize;"><?php echo $user['role']; ?></td>
						<?php if($_SESSION["role"] == "teacher"): ?>						
						<td>
							<a href="edit_user.php?id=<?php echo $user['id']; ?>" class="btn btn-sm btn-success"> <i class="fa fa-pencil" aria-hidden="true"></i> Edit</a> 
						<?php endif; ?>
					</tr>
				<?php endwhile ?>
			</table>
			
		</div>
	</div>
</div>
<?php else: 
	include_once('login.php');
	?>

<?php endif; ?>
</body>
</html>