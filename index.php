<?php
include_once("header.php");
?>
<div class="container">
<br><br>
	<?php if(isset($_SESSION['role'])): ?>
		<?php if($_SESSION['role'] == 'teacher'): ?>
			<a href="users.php" class="btn btn-success float-left"> <i class="fa fa-user" aria-hidden="true"></i> Users </a>
			<a href="create.php" class="btn btn-success float-right"> <i class="fa fa-plus" aria-hidden="true"></i> Add New Student </a>
		
		<?php endif; ?>
	<?php endif; ?>

		<br><br>
		
		<table class="table table-striped table-hover">
			<thead class="bg-dark text-white">
				<tr>
					<th>#</th>
					<th>Full Name</th>
					<th>E-Mail</th>
					<th>Gender</th>
					<th>Age</th>
					<?php if(isset($_SESSION['role'] )): ?>
						<?php if($_SESSION['role'] == 'teacher'): ?>

							<th>Action</th>
						<?php endif; ?>	
					<?php endif; ?>
				</tr>

			</thead>
			
			<?php 
			while($r = mysqli_fetch_assoc($student_res)):
			?>
				<tr>
					<td><?php echo $r['id']; ?></td>
					<td><?php echo $r['firstname'] . " " . $r['lastname']; ?></td>
					<td><?php echo $r['email']; ?></td>
					<td><?php echo $r['gender']; ?></td>
					<td><?php echo $r['age']; ?></td>
					<?php if(isset($_SESSION['role'])): ?>
						<?php if($_SESSION['role'] == 'teacher'): ?>
							<td>
								<a href="update.php?id=<?php echo $r['id']; ?>" class="btn btn-sm btn-success"> <i class="fa fa-pencil" aria-hidden="true"></i> Edit</a> 
							<a class="btn btn-sm btn-danger" href="delete.php?id=<?php echo $r['id']; ?>"><i class="fa fa-eraser" aria-hidden="true"></i> Delete</a></td>
						<?php endif; ?>
					<?php endif; ?>
				</tr>
			<?php endwhile ?>
		</table>
			
		<!-- </div> -->
	</div>
</div>

</body>
</html>