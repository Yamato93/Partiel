<?php include_once("../app/include/header.inc.php"); ?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h1 class="page-header">Travel Book</h1>
	<div class="row placeholders">
	
	</div>
	<div role="tabpanel">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
		</ul>
	
		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="home">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>User ID</th>
								<th>Book Title</th>
								<th>Book Description</th>
								<th>Book Cover</th>
								<th>Date of Creation</th>
							</tr>
						</thead>
						<tbody>
				
							<?php
							foreach($list as $key=>$value)
							{
							
								?>
								<tr>
								<td><?php echo $value->BOOKS_ID; ?></td>
								<td><?php echo $value->USE_ID; ?></td>
								<td><?php echo $value->BOOKS_TITLE; ?></td>
								<td><?php echo $value->BOOKS_DESCR; ?></td>
								<td><?php echo $value->BOOKS_COVER; ?></td>
								<td><?php echo $value->BOOKS_DATE_CREA ?></td>
								<?php
								if($_SESSION['User']->ADM_LVL > 4)
								{
									?>
										<td>
											<!--<a id="edit" data-toggle="modal" data-target="#myModal<?php echo $value->USE_ID; ?>"><span class="glyphicon glyphicon-pencil"></span></a> /-->
											<a id="delete" href="index.php?module=users&action=delbooks&del=<?php echo $value->BOOKS_ID; ?>"><span class="glyphicon glyphicon-remove"></span></a>
										</td>
								</tr>
									<?php
								}
							}
							?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include_once("../app/include/footer.inc.php"); ?>   