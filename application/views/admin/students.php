<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/backend/vendor/magnific-popup/magnific-popup.css" />

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Students</h2>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-12">
							<section class="panel">
								<div class="panel-body">
									<table class="table table-bordered table-striped mb-none" id="datatable-default">
										<thead>
											<tr>
												<th class="center">No</th>
												<th class="center">Photo</th>
												<th class="center">Type</th>
												<th class="center">Option</th>
												<th class="center">Student ID</th>
												<th class="center">School Code</th>
												<th class="center">Classroom</th>
												<th class="center">Date</th>
												<th class="center">Taken By</th>
												<th class="center">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php for ($i=0; $i < count($data); $i++) { ?>
											<tr class="gradeX">
												<td class="center"><?php echo $i+1; ?></td>
												<td class="center">
													<a href="<?php echo base_url().'uploads/'.$data[$i]['path'];?>" class="image-popup-no-margins">
														<img style="height:80px; width: auto;" src="<?php echo base_url().'uploads/'.$data[$i]['path'];?>" />
													</a><br>
													<a href="<?php echo base_url().'uploads/'.$data[$i]['path'];?>" download="<?php echo $data[$i]['student_id'];?>.jpg">download</a>
												</td>
												<td class="center"><?php echo $data[$i]['type'];?></td>
												<td class="center"><?php echo $data[$i]['send_option'];?></td>
												<td class="center"><?php echo $data[$i]['student_id'];?></td>
												<td class="center"><?php echo $data[$i]['school_code'];?></td>
												<td class="center"><?php echo $data[$i]['classroom'];?></td>
												<td class="center"><?php echo $data[$i]['date'];?></td>
												<td class="center"><?php echo $data[$i]['user'];?></td>
												<td class="center">
													<a class="modal-basic" href="#modalBasic_<?php echo $i;?>" style="color: red;">DELETE</a>
													<div id="modalBasic_<?php echo $i;?>" class="modal-block mfp-hide">
														<section class="panel">
															<header class="panel-heading">
																<h2 class="panel-title">Warning</h2>
															</header>
															<div class="panel-body">
																		<p>Are you sure to delete this item?</p>
															</div>
															<footer class="panel-footer">
																<div class="row">
																	<div class="col-md-12 text-right">
																		<a class="btn btn-primary" href="<?php echo base_url().'admin/delete_item/tbl_student/'.$data[$i]['id']; ?>" >Confirm</a>
																		<a class="btn btn-default modal-dismiss">Cancel</a>
																	</div>
																</div>
															</footer>
														</section>
													</div>

												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>							
								</div>
							</section>
						</div>
					</div>
				</section>
			</div>
		</section>

		<!-- Specific Page Vendor -->
		<script src="<?php echo base_url(); ?>/assets/backend/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="<?php echo base_url(); ?>/assets/backend/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/backend/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		<script src="<?php echo base_url(); ?>/assets/backend/vendor/magnific-popup/jquery.magnific-popup.js"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo base_url(); ?>/assets/backend/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="<?php echo base_url(); ?>/assets/backend/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?php echo base_url(); ?>/assets/backend/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="<?php echo base_url(); ?>/assets/backend/javascripts/tables/examples.datatables.default.js"></script>
		<script src="<?php echo base_url(); ?>/assets/backend/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="<?php echo base_url(); ?>/assets/backend/javascripts/tables/examples.datatables.tabletools.js"></script>
		<script src="<?php echo base_url(); ?>/assets/backend/javascripts/ui-elements/examples.modals.js"></script>
		<script src="<?php echo base_url(); ?>/assets/backend/javascripts/ui-elements/examples.lightbox.js"></script>

	</body>
	<script type="text/javascript">
	
	</script>

</html>