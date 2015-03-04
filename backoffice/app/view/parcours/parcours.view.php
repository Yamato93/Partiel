<?php include_once("../app/include/header.inc.php"); ?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h1 class="page-header">Travel Parcours</h1>
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
								<th>Route Title</th>
								<th>Route Description</th>
								<th>Route Cover</th>
								<th>Date of Creation</th>
							</tr>
						</thead>
						<tbody>
				
							<?php
							foreach($list as $key=>$value)
							{
							
								?>
								<tr>
								<td><?php echo $value->ROUTE_ID; ?></td>
								<td><?php echo $value->USE_ID; ?></td>
								<td><?php echo $value->ROUTE_TITLE; ?></td>
								<td><?php echo $value->ROUTE_DESCR; ?></td>
								<td><?php echo $value->ROUTE_COVER; ?></td>
								<td><?php echo $value->ROUTE_DATE_CREA ?></td>
								<?php
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