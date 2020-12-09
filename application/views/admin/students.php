<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/backend/vendor/magnific-popup/magnific-popup.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/backend/mybuild/css/demo.css">

<section role="main" class="content-body">
	<header class="page-header">
		<h2>Uploaded Photos</h2>
	</header>

	<!-- start: page -->
	<div class="row">
		<div class="pre_loader">
			<div class="spinner-body">
				<div class="spinner-border text-success"></div>
			</div>
		</div>
		<div class="col-md-12">
			<section class="panel">
				<div class="panel-body">
					<table class="table table-bordered table-striped mb-none" id="datatable-default">
						<thead>
							<tr>
								<th class="center">No</th>
								<th class="center">Photo</th>
								<th class="center">Comparison</th>
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
							<?php for ($i = 0; $i < count($data); $i++) { ?>
								<tr class="gradeX">
									<td class="center"><?php echo $i + 1; ?></td>
									<td class="center">
										<a href="<?php echo base_url() . 'uploads/' . $data[$i]['path']; ?>" class="image-popup-no-margins">
											<img style="height:80px; width: auto;" src="<?php echo base_url() . 'uploads/' . $data[$i]['path']; ?>" />
										</a><br>
										<a href="<?php echo base_url() . 'uploads/' . $data[$i]['path']; ?>" download="<?php $data[$i]['student_id']; ?>.jpg">download</a>
									</td>
									<?php if ($data[$i]['checked'] == 0) { ?>
										<td class="center"><button class="btn btn-primary comparison_btn" data-value="<?php echo $data[$i]['id']; ?>" data-standard="<?php echo base_url() . "assets/students/" . $data[$i]['standard_img'] ?>" data-uploaded="<?php echo base_url() . "uploads/" . $data[$i]['path'] ?>">Compare</button></td>
									<?php } else if ($data[$i]['checked'] == 1) { ?>
										<td class="center"><i class="fa fa-check photo-checked"></i></td>
									<?php } else if ($data[$i]['checked'] == 2) { ?>
										<td class="center"><i class="fa fa-times photo-unchecked"></i></td>
									<?php } ?>

									<td class="center"><?php echo $data[$i]['type']; ?></td>
									<td class="center"><?php echo $data[$i]['send_option']; ?></td>
									<td class="center"><?php echo $data[$i]['student_id']; ?></td>
									<td class="center"><?php echo $data[$i]['school_code']; ?></td>
									<td class="center"><?php echo $data[$i]['classroom']; ?></td>
									<td class="center"><?php echo $data[$i]['date']; ?></td>
									<td class="center"><?php echo $data[$i]['user']; ?></td>
									<td class="center">
										<a class="modal-basic" href="#modalBasic_<?php echo $i; ?>" style="color: red;">DELETE</a>
										<div id="modalBasic_<?php echo $i; ?>" class="modal-block mfp-hide">
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
															<a class="btn btn-primary" href="<?php echo base_url() . 'admin/delete_item/tbl_student/' . $data[$i]['id']; ?>">Confirm</a>
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
<script src="<?php echo base_url(); ?>/assets/backend/face_similarity/face-api.js"></script>

</body>
<script type="text/javascript">
	let descriptors = {
		desc1: null,
		desc2: null
	}

	function updateResult(object, id) {
		const distance = faceapi.utils.round(
			faceapi.euclideanDistance(descriptors.desc1, descriptors.desc2)
		)

		var parent_td = object.parent();
		parent_td.empty();
		(Number(distance) > 0.6) ? parent_td.html("<i class='fa fa-times photo-unchecked'>"): parent_td.html("<i class='fa fa-check photo-checked'>");
		$(".pre_loader").css("display", "none");
		$(".spinner-body").css("display", "none");

		var data = {
			'id': id,
			'checked': (Number(distance) > 0.6) ? 2 : 1
		};

		$.ajax({
			url: "<?php echo base_url(); ?>admin/compare_photo",
			data: data,
			type: 'POST',
			success: function(result) {
				if (result == 200) {} else {
					alert('Add Error');
				}
			}
		});
	}

	async function onSelectionChanged(which, uri) {
		const input = await faceapi.fetchImage(uri)
		descriptors[`desc${which}`] = await faceapi.computeFaceDescriptor(input)
	}

	$(".comparison_btn").click(async function() {
		var standard = $(this).data("standard");
		var uploaded = $(this).data("uploaded");
		var id = $(this).data("value");
		$(".pre_loader").css("display", "block");
		$(".spinner-body").css("display", "block");
		await faceapi.loadFaceRecognitionModel()
		await onSelectionChanged(1, standard)
		await onSelectionChanged(2, uploaded)
		updateResult($(this), id)
	});
</script>

</html>