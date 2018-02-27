<?php
include('../config/session.php');
include('../config/db_con.php');
if ($_SESSION['username'] != "shivam@root.in") {
    header('Location: ../admin/view-gr-data.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Welcome :: Dashboard</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand font-weight-light" href="blank.php">Hello, <?php echo $_SESSION['username'];?></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="blank.php">
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-table"></i>
                        <span class="nav-link-text">View Data</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseComponents">
                        <li>
                            <a href="tables.php">User Data Table</a>
                        </li>
                        <li>
                            <a href="tables-gr.php">GR Data Table</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav sidenav-toggler">
                <li class="nav-item">
                    <a class="nav-link text-center" id="sidenavToggler">
                        <i class="fa fa-fw fa-angle-left"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <!-- <li class="nav-item">
                    <form class="form-inline my-2 my-lg-0 mr-lg-2">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Search for...">
                            <span class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-fw fa-sign-out"></i>Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="blank.php">Dashboard</a>
                </li>
                <!-- <li class="breadcrumb-item active">Blank Page</li> -->
            </ol>
            <div class="row">
                <div class="col-10">
                    <h1>Admin Panel</h1>
                    <p>Upload Your Excel Sheet Here</p>
                </div>
                <div class="col-2 d-flex justify-content-center align-items-center">
                    <button type="button" onClick="window.location.reload()" class="btn btn-outline-primary "><i class="fa fa-refresh" aria-hidden="true"></i> Refresh</button>
                    </div>
            </div>
            <div class="container">
                <div class="row">

                </div>
                <div class="row">
                    <div class="col-xl-5 col-lg-5 col-md-12 col-12">
                        <h3 class="text-info font-weight-light text-center ">User Data</h3>
                        <form id="postForm" class="dropzone box-shadow" method="post" enctype="multipart/form-data">
                        </form>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-12 hidden-lg-down"></div>
                    <div class="col-xl-5 col-lg-5 col-md-12 col-12">
                        <h3 class="text-danger font-weight-light text-center">GR Data</h3>
                        <form method="post" id="postFormGr" class="dropzone box-shadow-gr" enctype="multipart/form-data">
                        </form>
                    </div>
                </div>
                <!-- Upload Section -->
                <div class="table-responsive my-5" id="table">
                    <table class="table table-bordered" id="dataTable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>User Name</th>
                                <!-- <th>Password</th> -->
                            </tr>
                        </thead>
                        <tbody id="tbody">
                        </tbody>
                    </table>
                    <table class="table table-bordered" id="dataTable-gr" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Company Name</th>
                                <th>Invoice No.</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>User Id</th>
                                <th>User Name</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-gr">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->
        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small>Copyright ©  2014-2018 Terasol Technologies Pvt Ltd</small>
                </div>
            </div>
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="../config/logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Dropzone -->
    <script src="js/dropzone.js"></script>
    <script>
        $("#table").hide();
        $("#dataTable").hide();
        $("#dataTable-gr").hide();
        $(document).ready(function() {
            Dropzone.autoDiscover = false;
        });

        // Dropzone
        // $("#postForm").dropzone({ url: "../uploads" });
        Dropzone.options.postForm = {
            url: '../config/upload.php',
            addRemoveLinks: false,
            dictRemoveFileConfirmation: 'Are you sure that you want to remove this file?',
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 1, // MB
            maxFiles: 10,
            success: function(file, response) {
                // console.log(file,response);
                file.previewElement.classList.add("dz-success");
                //    var res = JSON.parse(response);
                //      if (res.status == "200") {
                //        fil   e.sName = res.name;
                //        file.sUrl = res.url;
                //         }
                $('#postFormGr').addClass('disabled-div');
                $("#table").fadeIn();
                $("#dataTable").show();
                console.log(response);
                document.getElementById('tbody').innerHTML = response;
                $("#dataTable").DataTable();
            },
            error: function(file, response) {
                file.previewElement.classList.add("dz-error");
            }
        };
        Dropzone.options.postFormGr = {
            url: '../config/upload-gr.php',
            addRemoveLinks: false,
            dictRemoveFileConfirmation: 'Are you sure that you want to remove this file?',
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 1, // MB
            maxFiles: 10,
            success: function(file, response) {
                // console.log(file,response);
                file.previewElement.classList.add("dz-success");
                //    var res = JSON.parse(response);
                //      if (res.status == "200") {
                //        fil   e.sName = res.name;
                //        file.sUrl = res.url;
                //         }
                $('#postForm').addClass('disabled-div');
                $("#table").fadeIn();
                $("#dataTable").hide();
                $("#dataTable-gr").show();
                document.getElementById('tbody-gr').innerHTML = response;
                $("#dataTable-gr").DataTable();
            },
            error: function(file, response) {
                file.previewElement.classList.add("dz-error");
            }

        };
    </script>

</body>

</html>
