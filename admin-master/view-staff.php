<?php
include('topbar.php');
if(empty($_SESSION['login_email']))
    {   
    header("Location: login.php"); 
    }
    else{
	}
      
$email = $_SESSION["login_email"];

$stmt = $dbh->query("SELECT * FROM users where email='$email'");
$row_user = $stmt->fetch();

// Handle Edit Staff
if(isset($_POST["btnedit"]))
{
    $staffID = $_POST['staffID'];
    $fullname = $_POST['txtfullname'];
    $email = $_POST['txtemail'];
    $phone = $_POST['txtphone'];
    $groupname = $_POST['cmdgroupname'];
    $status = $_POST['cmdstatus'];
    
    $sql = "UPDATE users SET fullname=:fullname, email=:email, phone=:phone, groupname=:groupname, status=:status WHERE ID=:ID";
    $statement = $dbh->prepare($sql);
    $statement->execute([
        ':fullname' => $fullname,
        ':email' => $email,
        ':phone' => $phone,
        ':groupname' => $groupname,
        ':status' => $status,
        ':ID' => $staffID
    ]);
    
    if ($statement){
        $_SESSION['success'] = 'Staff Updated Successfully';
    } else {
        $_SESSION['error'] = 'Problem Updating Staff';
    }
}

// Handle Delete Staff
if(isset($_POST["btndelete"]))
{
    $staffID = $_POST['staffID'];
    
    $sql = "DELETE FROM users WHERE ID=:ID";
    $statement = $dbh->prepare($sql);
    $statement->execute([':ID' => $staffID]);
    
    if ($statement){
        $_SESSION['success'] = 'Staff Deleted Successfully';
    } else {
        $_SESSION['error'] = 'Problem Deleting Staff';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>View Staff - Admin Dashboard</title>
  <link rel="shortcut icon" href="../assets/logo.png" type="image/x-icon" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <style>
    .staff-card {
      margin-bottom: 20px;
      border: 1px solid #dee2e6;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      transition: all 0.3s ease;
    }
    
    .staff-card:hover {
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
    
    .staff-card-header {
      background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
      color: white;
      padding: 15px;
      display: flex;
      align-items: center;
    }
    
    .staff-avatar {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      margin-right: 15px;
      border: 3px solid white;
      object-fit: cover;
    }
    
    .staff-header-info h5 {
      margin: 0;
      font-size: 18px;
    }
    
    .staff-header-info p {
      margin: 2px 0;
      font-size: 12px;
      opacity: 0.9;
    }
    
    .staff-card-body {
      padding: 15px;
    }
    
    .staff-detail {
      margin-bottom: 10px;
      display: flex;
      align-items: center;
    }
    
    .staff-detail label {
      font-weight: 600;
      color: #333;
      min-width: 120px;
      margin-bottom: 0;
    }
    
    .staff-detail span {
      color: #666;
    }
    
    .staff-card-footer {
      padding: 10px 15px;
      background-color: #f8f9fa;
      border-top: 1px solid #dee2e6;
      display: flex;
      gap: 10px;
    }
    
    .btn-edit {
      background-color: #28a745;
      color: white;
      padding: 8px 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: all 0.3s ease;
      flex: 1;
    }
    
    .btn-edit:hover {
      background-color: #218838;
      transform: translateY(-2px);
      box-shadow: 0 2px 8px rgba(40, 167, 69, 0.3);
    }
    
    .btn-delete {
      background-color: #dc3545;
      color: white;
      padding: 8px 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: all 0.3s ease;
      flex: 1;
    }
    
    .btn-delete:hover {
      background-color: #c82333;
      transform: translateY(-2px);
      box-shadow: 0 2px 8px rgba(220, 53, 69, 0.3);
    }
    
    .staff-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(500px, 1fr));
      gap: 20px;
    }
    
    .status-badge {
      display: inline-block;
      padding: 4px 12px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
    }
    
    .status-active {
      background-color: #d4edda;
      color: #155724;
    }
    
    .status-inactive {
      background-color: #f8d7da;
      color: #721c24;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
    </ul>

    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <ul class="navbar-nav ml-auto">
    </ul>
  </nav>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index.php" class="brand-link">
      <span class="brand-text font-weight-light"></span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $row_user['photo'];    ?>" alt="User Image" width="140" height="141" class="img-circle elevation-2">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $row_user['fullname'];  ?></a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php include('sidebar.php'); ?>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Staff</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">View Staff</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main Content -->
    <section class="content">
      <div class="container-fluid">
        
        <!-- Success/Error Messages -->
        <?php if(!empty($_SESSION['success'])) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <i class="fas fa-check-circle me-2"></i>
          <strong>Success!</strong> <?php echo $_SESSION['success']; ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php unset($_SESSION["success"]); } ?>
        
        <?php if(!empty($_SESSION['error'])) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <i class="fas fa-exclamation-circle me-2"></i>
          <strong>Error!</strong> <?php echo $_SESSION['error']; ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php unset($_SESSION["error"]); } ?>

        <!-- Staff Cards Grid -->
        <div class="staff-grid">
          <?php 
          $data = $dbh->query("SELECT * FROM users ORDER BY fullname ASC")->fetchAll();
          foreach ($data as $row) {
            $statusClass = ($row['status'] == '1') ? 'status-active' : 'status-inactive';
            $statusText = ($row['status'] == '1') ? 'Active' : 'Inactive';
            ?>
            <div class="staff-card">
              <div class="staff-card-header">
                <img src="<?php echo $row['photo'];    ?>" alt="Staff Photo" class="staff-avatar">
                <div class="staff-header-info">
                  <h5><?php echo $row['fullname']; ?></h5>
                  <p><?php echo $row['groupname']; ?></p>
                  <span class="status-badge <?php echo $statusClass; ?>"><?php echo $statusText; ?></span>
                </div>
              </div>
              
              <div class="staff-card-body">
                <div class="staff-detail">
                  <label><i class="fas fa-envelope me-2"></i>Email:</label>
                  <span><?php echo $row['email']; ?></span>
                </div>
                
                <div class="staff-detail">
                  <label><i class="fas fa-phone me-2"></i>Phone:</label>
                  <span><?php echo $row['phone']; ?></span>
                </div>
                
                <div class="staff-detail">
                  <label><i class="fas fa-shield-alt me-2"></i>Role:</label>
                  <span><?php echo $row['groupname']; ?></span>
                </div>
                
                <div class="staff-detail">
                  <label><i class="fas fa-calendar me-2"></i>Date Added:</label>
                  <span><?php echo $row['date_created']; ?></span>
                </div>
              </div>
              
              <div class="staff-card-footer">
                <button class="btn-edit" onclick="editStaffConfirm(<?php echo $row['ID']; ?>, '<?php echo addslashes($row['fullname']); ?>', '<?php echo $row['email']; ?>', '<?php echo $row['phone']; ?>', '<?php echo $row['groupname']; ?>', '<?php echo $row['status']; ?>')">
                  <i class="fas fa-edit me-2"></i>Edit
                </button>
                <button class="btn-delete" onclick="deleteStaffConfirm(<?php echo $row['ID']; ?>)">
                  <i class="fas fa-trash me-2"></i>Delete
                </button>
              </div>
            </div>
          <?php } ?>
        </div>

      </div>
    </section>
  </div>

  <!-- Footer -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
    </div>
    <strong><?php include '../footer.php' ?>
  </footer>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<!-- Edit Staff Modal -->
<div class="modal fade" id="editStaffModal" tabindex="-1" role="dialog" aria-labelledby="editStaffModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: linear-gradient(135deg, #007bff 0%, #0056b3 100%); color: white;">
        <h5 class="modal-title" id="editStaffModalLabel"><i class="fas fa-edit me-2"></i>Edit Staff Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editStaffForm" method="POST" action="">
        <div class="modal-body">
          <input type="hidden" id="staffID" name="staffID">
          
          <div class="form-group">
            <label for="txtfullname">Full Name</label>
            <input type="text" class="form-control" id="txtfullname" name="txtfullname" required>
          </div>
          
          <div class="form-group">
            <label for="txtemail">Email</label>
            <input type="email" class="form-control" id="txtemail" name="txtemail" required>
          </div>
          
          <div class="form-group">
            <label for="txtphone">Phone</label>
            <input type="text" class="form-control" id="txtphone" name="txtphone" required>
          </div>
          
          <div class="form-group">
            <label for="cmdgroupname">Role</label>
            <select class="form-control" id="cmdgroupname" name="cmdgroupname" required>
              <option value="">Select Role</option>
              <option value="Super Admin">Super Admin</option>
              <option value="Staff">Staff</option>
            </select>
          </div>
          
          <div class="form-group">
            <label for="cmdstatus">Status</label>
            <select class="form-control" id="cmdstatus" name="cmdstatus" required>
              <option value="1">Active</option>
              <option value="0">Inactive</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" name="btnedit" class="btn btn-primary">
            <i class="fas fa-save me-2"></i>Update Staff
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteStaffModal" tabindex="-1" role="dialog" aria-labelledby="deleteStaffModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #dc3545; color: white;">
        <h5 class="modal-title" id="deleteStaffModalLabel"><i class="fas fa-exclamation-triangle me-2"></i>Delete Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="deleteStaffForm" method="POST" action="">
        <div class="modal-body">
          <input type="hidden" id="deleteStaffID" name="staffID">
          <p><strong style="color: #dc3545;">Are you sure you want to delete this staff?</strong></p>
          <p>This action cannot be undone.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" name="btndelete" class="btn btn-danger">
            <i class="fas fa-trash me-2"></i>Delete Permanently
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script>
function editStaffConfirm(staffID, fullname, email, phone, groupname, status) {
  if (confirm("Are you sure you want to Edit?")) {
    $('#staffID').val(staffID);
    $('#txtfullname').val(fullname);
    $('#txtemail').val(email);
    $('#txtphone').val(phone);
    $('#cmdgroupname').val(groupname);
    $('#cmdstatus').val(status);
    $('#editStaffModal').modal('show');
  }
}

function deleteStaffConfirm(staffID) {
  if (confirm("Are you sure you want to Delete this staff?")) {
    $('#deleteStaffID').val(staffID);
    $('#deleteStaffModal').modal('show');
  }
}
</script>

<link rel="stylesheet" href="popup_style.css">

</body>
</html>
