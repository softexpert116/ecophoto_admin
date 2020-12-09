<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/backend/mybuild/css/intlTelInput.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/backend/mybuild/css/demo.css">

<section role="main" class="content-body">
    <header class="page-header">
        <h2><?php echo $school_name; ?> students</h2>

    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <div class="panel-body">
                    <a class="modal-with-form m_add" href="#add_modal"><i class="fa fa-plus" aria-hidden="true"></i>&nbspAdd New Student</a>
                    <i id="back_to_school" class="fa fa-share" data-toggle="tooltip" title="Back" onclick="history.back()"></i>
                    <br />
                    <br />
                    <table class="table table-bordered table-striped mb-none" id="datatable-default">
                        <thead>
                            <tr>
                                <th class="center">No</th>
                                <th class="center">Photo</th>
                                <th class="center">Name</th>
                                <th class="center">Student ID</th>
                                <th class="center">School Code</th>
                                <th class="center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < count($data); $i++) { ?>
                                <tr class="gradeX">
                                    <td class="center"><?php echo $i + 1; ?></td>
                                    <td class="center"><img src="<?php echo base_url() . 'assets/students/' . $data[$i]['photo']; ?>" style="width:50px; height:auto;" /></td>
                                    <td class="center"><?php echo $data[$i]['name']; ?></td>
                                    <td class="center"><?php echo $data[$i]['student_id']; ?></td>
                                    <td class="center"><?php echo $data[$i]['school_code']; ?></td>
                                    <td class="center">
                                        <input type="hidden" class="m_hide" value="<?php echo $i; ?>" />
                                        <a class="modal-with-form m_edit" href="#edit_modal" style="color: blue;">EDIT</a> &nbsp|&nbsp
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
                                                            <a class="btn btn-primary school_student_delete" href="javascript:void(0)" data-value="<?php echo $data[$i]["student_id"] ?>" >Confirm</a>
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
<!-- Modal Form -->
<div id="add_modal" class="modal-block modal-block-primary mfp-hide">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Add New Student</h2>
        </header>
        <div class="panel-body">
            <form id="add-form" action="#" method="post" class="form-horizontal mb-lg">
                <div class="form-group">
                    <label class="col-sm-3 control-label">School Code</label>
                    <div class="col-sm-9">
                        <input id="add_school_code" type="text" name="add_school_code" class="form-control" value="<?php echo $school_code; ?>" disabled />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                        <input id="add_name" type="text" name="add_name" class="form-control" placeholder="Type name..." required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Student ID</label>
                    <div class="col-sm-6">
                        <input id="add_student_id" name="add_student_id" type="text" class="form-control">
                    </div>
                    <div class="col-sm-3">
                        <button type="button" class="btn btn-success" id="student_id_check" class="form-control" style="width: 100%">ID Check</button>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3">
                        <label class="control-label" style="width: 100%;">Student Photo</label>
                    </div>
                    <div class="col-sm-9">
                        <label for="" class="control-label" style="color:crimson; width:100%; text-align:center;">Click on the middle of the photo.</label>
                        <div id="targetOuter">
                            <div id="targetLayer"></div>
                            <img src="<?php echo base_url() . 'assets/students/photo.png'; ?>" class="icon-choose-image" />
                            <div class="icon-choose-image">
                                <input name="userImage" id="student_photo" type="file" class="inputFile" onChange="showPreview(this);" />
                            </div>
                        </div>
                    </div>
                    <p style="margin-top: 30px; color:navy; text-align:center;">Please select the student's clear image. Because the image you select will be the standard.</p>
                </div>
            </form>
            <div class="spinner-body">
                <div class="spinner-border text-success"></div>
            </div>
            <p id="add_warning" style="color: red; text-align: center;" hidden="hidden">Warning </p>
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button id="add_button" class="btn btn-primary">Submit</button>
                    <button class="btn btn-default modal-dismiss">Cancel</button>
                </div>
            </div>
        </footer>
    </section>
</div>
<!-- Modal Form -->
<div id="edit_modal" class="modal-block modal-block-primary mfp-hide">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Edit Student</h2>
        </header>
        <div class="panel-body">
            <form id="edit-form" action="#" method="post" class="form-horizontal mb-lg" novalidate="novalidate">
                <input id="edit_id" name="edit_id" type="hidden">
                <div class="form-group">
                    <label class="col-sm-3 control-label">School Code</label>
                    <div class="col-sm-9">
                        <input type="text" id="edit_school_code" class="form-control" disabled />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                        <input id="edit_name" type="text" name="edit_name" class="form-control" placeholder="Type name..." required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Student ID</label>
                    <div class="col-sm-9">
                        <input type="text" id="edit_student_id" class="form-control" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3">
                        <label class="control-label" style="width: 100%;">Student Photo</label>
                    </div>
                    <div class="col-sm-9">
                        <div id="targetOuter">
                            <div id="targetLayer">
                                <img id="edit_student_photo" width="200px" height="200px" class="upload-preview"/>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="spinner-body">
                <div class="spinner-border text-success"></div>
            </div>
            <p id="edit_warning" style="color: red; text-align: center;" hidden="hidden">Warning </p>
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button id="edit_button" class="btn btn-primary">Submit</button>
                    <button class="btn btn-default modal-dismiss">Cancel</button>
                </div>
            </div>
        </footer>
    </section>
</div>
<!-- Specific Page Vendor -->
<script src="<?php echo base_url(); ?>/assets/backend/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>/assets/backend/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/backend/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>

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
<!-- Examples -->
<script src="<?php echo base_url(); ?>/assets/backend/javascripts/ui-elements/examples.modals.js"></script>
<script src="<?php echo base_url(); ?>/assets/backend/mybuild/js/intlTelInput.js"></script>
<script>
    function showPreview(objFileInput) {
        if (objFileInput.files[0]) {
            var fileReader = new FileReader();
            fileReader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
                $("#targetLayer").html('<img src="' + e.target.result + '" width="200px" height="200px" class="upload-preview" />');
                $("#targetLayer").css('opacity', '0.9');
                $(".icon-choose-image").css('opacity', '0.1');
            }
            fileReader.readAsDataURL(objFileInput.files[0]);
        }
    }

    var data = [];

    <?php for ($i = 0; $i < count($data); $i++) { ?>
        data[<?php echo $i; ?>] = [];
        data[<?php echo $i; ?>]['id'] = "<?php echo $data[$i]['id']; ?>";
        data[<?php echo $i; ?>]['school_code'] = "<?php echo $school_code; ?>";
        data[<?php echo $i; ?>]['name'] = "<?php echo $data[$i]['name']; ?>";
        data[<?php echo $i; ?>]['photo'] = "<?php echo $data[$i]['photo']; ?>";
        data[<?php echo $i; ?>]['student_id'] = "<?php echo $data[$i]['student_id']; ?>";
    <?php } ?>

    $("a.m_edit").click(function() {
        var i = $(this).parent().find(".m_hide").val();
        $("#edit_id").val(data[i]['id']);
        $("#edit_name").val(data[i]['name']);
        $("#edit_school_code").val(data[i]['school_code']);
        $("#edit_student_id").val(data[i]['student_id']);
        $("#edit_student_photo").attr("src", "<?php echo base_url() ?>" + "/assets/students/" + data[i]['photo']);
        $("#edit_warning").hide();
    });

    $("a.m_add").click(function() {
        $("#add_name").val("");
        $("#add_student_id").val('');
        $("#student_photo").val('');
        $("#targetLayer").empty();
        $("#add_warning").hide();
    });

    $("#student_id_check").click(function() {
        var student_id = $("#add_student_id").val().trim();
        if (student_id == "") {
            $("#add_warning").show();
            $("#add_warning").text("Please input 'STUDENT ID' field.");
        } else {
            $.ajax({
                url: "<?php echo base_url(); ?>admin/check_student_id",
                data: {
                    'student_id': student_id
                },
                type: 'POST',
                success: function(result) {
                    if (result == "ok") {
                        $("#add_student_id").css("border-color", "blue");
                        $("#student_id_check").text("Checked");
                    } else if (result == "dupulicated") {
                        $("#student_id_check").text("Try Again");
                        $("#add_student_id").css("border-color", "red");
                    } else {
                        alert('Error occured!');
                    }
                }
            });
        }
    })

    $("#add_button").click(function() {
        $("#add_warning").hide();
        var school_code = "<?php echo $school_code ?>";
        var name = $("#add_name").val().trim();
        if (name == '') {
            $("#add_warning").show();
            $("#add_warning").text("Please input 'Name' field.");
            $("#add_name").val('');
            return;
        }
        var student_id = $("#add_student_id").val();
        if (student_id == '') {
            $("#add_warning").show();
            $("#add_warning").text("Please input 'STUDENT ID' field.");
            $("#add_password").val('');
            return;
        }
        var student_photo = $("#student_photo").val();
        if (student_photo == '') {
            $("#add_warning").show();
            $("#add_warning").text("Please select Student Photo.");
            $("#add_school").val('');
            return;
        }

        var data = new FormData();
        data.append('student_photo', $("#student_photo")[0].files[0]);
        data.append('name', name);
        data.append('school_code', school_code);
        data.append('student_id', student_id);

        $("#add_warning").hide();
        $("#add-form").css("opacity", "0.3");
        $(".spinner-body").css("display", "block");
        $.ajax({
            url: "<?php echo base_url(); ?>admin/add_school_student",
            data: data,
            type: 'POST',
            processData: false,
            contentType: false,
            success: function(result) {
                if (result == 200) {
                    $("#add-form").css("opacity", "1");
                    $(".spinner-body").css("display", "none");
                    location.reload();
                } else if (result == 400) {
                    $("#add-form").css("opacity", "1");
                    $(".spinner-body").css("display", "none");
                    $("#add_warning").show();
                    $("#add_warning").text("Student ID already exists. Please type another student ID.");
                } else {
                    $("#add-form").css("opacity", "1");
                    $(".spinner-body").css("display", "none");
                    alert('Add Error');
                }
            }
        });
    });

    $("#edit_button").click(function() {
        var id = $("#edit_id").val().trim();
        var name = $("#edit_name").val().trim();
        if (name == '') {
            $("#edit_warning").show();
            $("#edit_warning").text("Please input 'Name' field.");
            $("#edit_name").val('');
            return;
        }

        $("#edit_warning").hide();

        var data = {
            'id': id,
            'name': name
        };

        $.ajax({
            url: "<?php echo base_url(); ?>admin/edit_school_student",
            data: data,
            type: 'POST',
            success: function(result) {
                if (result == 200) {
                    // window.history.go(0);
                    location.reload();
                } else {
                    alert('Add Error');
                }
            }
        });
    });

    $(".school_student_delete").click(function() {
        var s_id = $(this).data("value");
        var data = {
            's_id' : s_id
        }
        $.ajax({
            url: "<?php echo base_url(); ?>admin/delete_school_student",
            data: data,
            type: 'POST',
            success: function(result) {
                if (result == 200) {
                    // window.history.go(0);
                    location.reload();
                } else {
                    alert('Add Error');
                }
            }
        });
    }); 

</script>
</body>

</html>