<?php include_once("../app/include/header.inc.php"); ?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h1 class="page-header">User List</h1>
	<div class="row placeholders">
	
	</div>
	<div role="tabpanel">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
			<?php
			if($_SESSION['User']->ADM_LVL > 4)
			{
			/*
			?>
			<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Add users</a></li>
			<?php
			*/
			}
			?>
		</ul>
	
		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="home">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Type</th>
								<th>Mail</th>
								<th>Last Name</th>
								<th>First Name</th>
								<th>Birthday</th>
								<th>Description</th>
								<th>Date of Creation</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
				
							<?php
							foreach($list as $key=>$value)
							{
							
								?>
								<tr>
								<td><?php echo $value->USE_ID; ?></td>
								<td><?php echo $value->USE_TYPE; ?></td>
								<td><?php echo $value->USE_MAIL; ?></td>
								<td><?php echo $value->USE_LASTNAME; ?></td>
								<td><?php echo $value->USE_FIRSTNAME; ?></td>
								<td><?php echo $value->USE_BIRTHDAY; ?></td>
								<td><?php echo $value->USE_DESCR; ?></td>
								<td><?php echo $value->USE_DATE_CREA ?></td>
								<?php
								if($_SESSION['User']->ADM_LVL > 4)
								{
									?>
										<td>
											<!--<a id="edit" data-toggle="modal" data-target="#myModal<?php echo $value->USE_ID; ?>"><span class="glyphicon glyphicon-pencil"></span></a> /-->
											<a id="delete" href="index.php?module=users&action=delusers&del=<?php echo $value->USE_ID; ?>"><span class="glyphicon glyphicon-remove"></span></a>
										</td>
								</tr>
									<?php
								}
							//href="index.php?module=index&action=editadmin&del=<?php echo $value->ADM_ID;
							}
							?>

						</tbody>
					</table>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane" id="profile">
		    	<div class="col-md-4">
				    <form role="form" name="add_admin_form" action="index.php?module=index&action=index" method="post">
				    	<div class="form-group">
							<label for="Name">User Email</label>
							<input type="email" class="form-control" id="Email" name="Email" placeholder="">
						</div>
				    	<div class="form-group">
							<label for="Name">User Password</label>
							<input type="password" class="form-control" id="Password" name="Password" placeholder="">
						</div>
				    	<div class="form-group">
							<label for="Name">User Lastname</label>
							<input type="text" class="form-control" id="Lastname" name="Lastname" placeholder="">
						</div>
						<div class="form-group">
							<label for="Name">User Firstname</label>
							<input type="text" class="form-control" id="Firstname" name="Firstname" placeholder="">
						</div>
	
						<button type="submit" class="btn btn-default">Submit</button>
					</form>
		    	</div>
		    </div>
		</div>
	</div>
</div>

<?php
foreach($list as $key=>$value)
{
?>
<!-- Modal -->
<div class="modal fade" id="myModal<?php echo $value->USE_ID; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Users n°<?php echo $value->USE_ID; ?></h4>
			</div>
			<div class="modal-body">
				<form role="form" name="edit_admin_form" action="index.php?module=index&action=index" method="post">
					<div class="form-group">
						<label for="Name">Lastname</label>
						<input type="text" class="form-control" id="name" name="name" value="<?php echo $value->USE_LASTNAME; ?>">
					
					</div>
					<div class="form-group">
						<label for="Name">Firstname</label>
						<input type="text" class="form-control" id="name" name="name" value="<?php echo $value->USE_LASTNAME; ?>">
					
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>

<?php	
}
?>



<?php include_once("../app/include/footer.inc.php"); ?>   