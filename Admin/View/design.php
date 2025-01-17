<?php
require_once("customerNavigation.php");
require_once "../DB Operations/designFileOps.php";
require_once "../Model/designfilesModel.php";
$id = $_GET['id'];
?>
<style>
.galleria {
    width: 100%;
    height: 600px;
    background: #fff
}

.btn-delete {
    /* width: 14px; height: 14px; */
    /* margin: 38px 0 0 66px; */
    position: fixed;
    right: 5%;
    top: 25%;
}

.delete-btn {
    z-index: 10;
    position: absolute;
    top: 5%;
    left: 2%;
    width: 32px;
    height: 32px;
    background-color: #ffffff;
    color: black;
}
</style>
<h1 class="h3 mb-4 text-gray-800">Customer Management</h1>
<!-- DataTales Example -->
<span id="message"></span>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col">
                <h6 class="m-0 font-weight-bold text-primary">Design Files</h6>
            </div>
            <div class="col" align="right">
                <span data-toggle=modal data-target=#addDesignModal data-id='<?php echo $id; ?>'>
                    <button type="button" + class="btn btn-success btn-circle btn-sm"><i
                            class="fas fa-plus"></i></button>
                </span>
            </div>
        </div>
    </div>
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php
  $count=0;
  $isActive="active";
  $initialValue='aria-current="true"';
      $designList = DBdesignFile::readAll($id);
   foreach ($designList as $design) {
    echo '<button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="'.$count.'" class="'.$isActive.'" '.$initialValue.' aria-label="Slide '. $count. '"></button>';
    $isActive="";
    $count++;
    $initialValue="";
   }
   ?>
        </div>
        <div class="carousel-inner">
            <?php
  $isActive="active";
   $designList = DBdesignFile::readAll($id);
   if(count($designList)>0){
   foreach ($designList as $design) {
        echo '<div class="carousel-item '.$isActive.' " data-bs-interval="">
        <img src="../img/Designs/'.$design->getDesignFilePath().'" class="d-block w-100 img-fluid" alt="..." style="height:600px">
        <div class="carousel-caption d-none d-md-block">
        </div>
        <span class="delete-btn" data-toggle=modal data-target=#deleteDesignModal data-id='.$design->getDesignFileId().' > <button type="button" + class="btn btn-danger btn-circle"><i class="fas fa-trash-alt"></button></i></span>
        </div>';
        $isActive="";
   }
  
      echo '</div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>';
}
        ?>
    </div>
    <div>
        </ul>
    </div>
    <div class="modal fade" id=addDesignModal tabindex=-1 role=dialog aria-hidden=true>
        <div class="modal-dialog modal-lg">
            <form method="POST" id="DesginFiles_form" enctype="multipart/form-data"
                action="../Controller/designFileController.php">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_title">Add Design Files</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <span id="form_message"></span>

                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-4 text-right">File Path <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="file" name="designFilePath" id="designFilePath" class="form-control"
                                        required />
                                    <input type="hidden" name="customerId" id="customerId" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-4 text-right">Description <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <textarea type="text" name="designFileDescription" id="designFileDescription"
                                        class="form-control" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group visually-hidden">
                            <div class="row">
                                <label class="col-md-4 text-right">Item CompanyDetails CreatedBy <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="createdby" id="createdby" class="form-control" required
                                        value="<?php echo $_SESSION['login_user']; ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group visually-hidden">
                            <div class="row">
                                <label class="col-md-4 text-right">Item CompanyDetails Modified By <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="modifiedby" id="modifiedby" class="form-control" required
                                        data-parsley-type="integer" data-parsley-minlength="10"
                                        data-parsley-maxlength="12" data-parsley-trigger="keyup"
                                        value="<?php echo $_SESSION['login_user']; ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="hidden_id" id="hidden_id" />
                        <input type="hidden" name="action" id="action" value="Add" />
                        <input type="submit" name="submit" id="submit_button" class="btn btn-success" value="Add" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id=deleteDesignModal tabindex=-1 role=dialog aria-hidden=true>
        <div class="modal-dialog">
            <form method="POST" id="deleteDesignFile_form" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_title">Delete Design File</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p class="lead">
                            Are you sure. Would you like to delete this File.
                        </p>
                        <input type="hidden" name="designFileId" id="designFileId" value="">
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="hidden_id" id="hidden_id" />
                        <input type="submit" name="submit" id="deletebutton" class="btn btn-danger" value="Confirmed" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
    require_once("footer.php")
    ?>
    <script>
    $(document).ready(function() {
        $('#addDesignModal').on('show.bs.modal', function(e) {

            var rowid = $(e.relatedTarget).data('id');
            $('#customerId').val(rowid);
        });
        $('#deleteDesignModal').on('show.bs.modal', function(e) {
            var rowid = $(e.relatedTarget).data('id');
            $('#designFileId').val(rowid);
        });
        $('#deleteDesignFile_form').submit(function() {
            $.ajax({
                url: config.developmentPath + "/Admin/Controller/designFileController.php/",
                method: "POST",
                data: {
                    id: $('#designFileId').val(),
                    action: 'delete'
                },
                success: function(data) {
                    $('#message').html(data);
                    setTimeout(function() {
                        $('#message').html('');
                    }, 5000);
                }
            });
        });
    });
    </script>