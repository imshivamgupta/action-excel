<?php
include('../config/session.php');
include('../config/db_con.php');
if ($_SESSION['username'] != "shivam@root.in") {
  header('Location: ../admin/view-user-data.php');
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
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="blank.php">Hello, <?php echo $_SESSION['username'];?></a>
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
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">GR Data Table</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> GR Data Table</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Company Name</th>
                  <th>Invoice No</th>
                  <th>Date</th>
                  <th>Amount</th>
                  <th>User ID</th>
                  <th>User Name</th>
                  <th>Edit <i class="fa fa-edit"></i></th>
                  <th>Remove <i class="fa fa-remove"></i></th>
                </tr>
              </thead>
              <tbody>
              <?php

                  $sql = "SELECT * FROM `gr`";
                  $result = mysqli_query($db_con, $sql);
                  if (mysqli_num_rows($result) > 0) {
                      // output data of each row
                      while($row = mysqli_fetch_assoc($result)) {
                        if($row['status'] == 1){
                          echo "<tr>";
                          echo "<td>".$row["company_name"]."</td>";
                          echo "<td>".$row["invoice_no"]."</td>";
                          echo "<td>".$row["date"]."</td>";
                          echo "<td>".$row["amount"]."</td>";
                          echo "<td>".$row["user_id"]."</td>";
                          echo "<td>".$row["username"]."</td>";
                          echo "<td>
                          <button class='btn btn-outline-info col-12' onclick='update(this)' data-company-name='"
                          .$row['company_name'].
                          "'
                          data-invoice-num='"
                          .$row['invoice_no'].
                          "' data-date='"
                          .$row['date'].
                          "' data-amount='"
                          .$row['amount'].
                          "' data-user-id='"
                          .$row['user_id'].
                          "' data-user-name='"
                          .$row['username'].
                          "' id='edit_"
                          .$row["auto_key"].
                          "' data-toggle='modal' data-target='#updateModal'>Edit</button></td>";
                          echo "<td>
                          <button class='btn btn-outline-danger col-12 remove' id='remove_"
                          .$row["auto_key"].
                          "'>Remove</button></td>";
                          echo "</tr>";
                        }
                      }
                  } else {
                      echo "0 results";
                  }
                  mysqli_close($db_con);
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">GR Data Table</div>
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

    <!-- ===Start: Update Record Modal=== -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Updata Record</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="User">Company Name:</label>
                <input type="text" class="form-control" id="formCompany" placeholder="Enter Company Name" name="email">
              </div>
              <div class="form-group">
                <label for="pwd">Invoice No.:</label>
                <input type="text" class="form-control" id="formInvoice" placeholder="Enter Invoice No." name="pswd">
              </div>
              <div class="form-group">
                <label for="pwd">Date:</label>
                <input type="text" class="form-control" id="formDate" placeholder="Enter Date" name="pswd">
              </div>
              <div class="form-group">
                <label for="pwd">Amount:</label>
                <input type="text" class="form-control" id="formAmount" placeholder="Enter Amount" name="pswd">
              </div>
              <div class="form-group">
                <label for="pwd">User Id:</label>
                <input type="text" class="form-control" id="formUserId" placeholder="Enter User Id" name="pswd">
              </div>
              <div class="form-group">
                <label for="pwd">User Name:</label>
                <input type="text" class="form-control" id="formUserName" placeholder="Enter User Name" name="pswd">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-danger text-white" id="confirm" data-dismiss="modal">Confirm</a>
          </div>
        </div>
      </div>
    </div>
    <!-- ===END: Update Record Modal=== -->

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
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/ajaxGr.js"></script>
  </div>
</body>

</html>
