<?php
include('topbar.php');

if(isset($_POST['btnlogin']))
{
  $status ="1";
//login - fetch user first
$sql = "SELECT * FROM `users` WHERE `email`=? AND `status`=?";
			$query = $dbh->prepare($sql);
			$query->execute(array($_POST['txtemail'],$status));
			$row = $query->rowCount();
			$fetch = $query->fetch();
			if($row > 0 && password_verify($_POST['txtpassword'], $fetch['password'])) {
			$_SESSION['login_email'] = $fetch['email'];
			$_SESSION['login_groupname'] = $fetch['groupname'];
      $_SESSION['login_fullname'] = $fetch['fullname'];
		  $_SESSION['logged']=time();
		
//capture user IP address
$user_ip = '';
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $user_ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $user_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $user_ip = $_SERVER['REMOTE_ADDR'];
}

//update user's last IP and lastaccess in database
$update_sql = "UPDATE users SET last_ip = :last_ip, lastaccess = :lastaccess WHERE email = :email";
$update_stmt = $dbh->prepare($update_sql);
$update_stmt->execute([
    ':last_ip' => $user_ip,
    ':lastaccess' => $current_date,
    ':email' => $_POST['txtemail']
]);

//save activity log details
$fullname=$fetch['fullname'];
$task= $fullname.' '.'Logged In'.' '. 'On' . ' '.$current_date;
$sql = 'INSERT INTO activity_log(task) VALUES(:task)';
$statement = $dbh->prepare($sql);
$statement->execute([
	':task' => $task
]);

header("Location: index.php"); 
}else { 
$_SESSION['error']=' Wrong Email and/or Password';
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login - Life 4 All Pharmacy</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico">
    <link rel="apple-touch-icon" href="../assets/favicon-apple.png">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="popup_style.css">
    
    <style>
        :root {
            --primary-navy: #011C3B;
            --secondary-blue: #007bff;
            --text-light: #666;
            --border-gray: #e0e0e0;
            --light-gray: #f5f5f5;
            --light-blue: #e7f1ff;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--primary-navy) 0%, #024a7a 100%);
            padding: 20px;
        }
        
        .login-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            padding: 3rem;
            width: 100%;
            max-width: 450px;
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .login-header .pharmacy-icon {
            width: 70px;
            height: 70px;
            background: var(--secondary-blue);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: white;
        }
        
        .login-header h2 {
            color: var(--primary-navy);
            margin-bottom: 0.5rem;
        }
        
        .login-header p {
            color: var(--text-light);
            margin-bottom: 0;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            font-weight: 600;
            color: var(--primary-navy);
            margin-bottom: 0.5rem;
            display: block;
        }
        
        .form-control {
            padding: 0.875rem 1rem;
            border: 2px solid var(--border-gray);
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--secondary-blue);
            box-shadow: 0 0 0 3px rgba(0,123,255,0.1);
        }
        
        .input-group-text {
            background: var(--light-gray);
            border: 2px solid var(--border-gray);
            border-right: none;
            color: var(--text-light);
        }
        
        .input-group .form-control {
            border-left: none;
        }
        
        .input-group:focus-within .input-group-text {
            border-color: var(--secondary-blue);
        }
        
        .btn-login {
            width: 100%;
            padding: 0.875rem;
            font-weight: 600;
            background: var(--secondary-blue);
            border: none;
            border-radius: 8px;
            color: white;
            transition: all 0.3s ease;
        }
        
        .btn-login:hover {
            background: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,123,255,0.3);
        }
        
        .alert {
            border-radius: 8px;
            border: none;
        }
        
        .back-link {
            text-align: center;
            margin-top: 1.5rem;
        }
        
        .back-link a {
            color: var(--secondary-blue);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .back-link a:hover {
            color: var(--primary-navy);
        }

        .form-check {
            margin-bottom: 1.5rem;
        }

        .form-check-input {
            border: 2px solid var(--border-gray);
            cursor: pointer;
        }

        .form-check-input:checked {
            background-color: var(--secondary-blue);
            border-color: var(--secondary-blue);
        }

        .form-check-label {
            color: var(--text-light);
            cursor: pointer;
            margin-left: 0.5rem;
        }

        .form-check-label a {
            color: var(--secondary-blue);
            text-decoration: none;
        }

        .form-check-label a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <img src="../assets/logo.png" alt="Pharmacy Icon" class="mb-3" style="width:px;">
                
                <h3 style="color: ;">Admin Login</h3>
                <p style="color: red;">Restricted Area: Only Admin is Allowed</p>
            </div>
            
            <?php if (!empty($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle me-2"></i><?php echo htmlspecialchars($_SESSION['error']); ?>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <?php if (!empty($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle me-2"></i><?php echo htmlspecialchars($_SESSION['success']); ?>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label for="txtemail">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input 
                            type="email" 
                            class="form-control" 
                            id="txtemail" 
                            name="txtemail" 
                            placeholder="Enter email address"
                            required 
                            autofocus
                        >
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="txtpassword">Password</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input 
                            type="password" 
                            class="form-control" 
                            id="txtpassword" 
                            name="txtpassword" 
                            placeholder="Enter password"
                            required
                        >
                    </div>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                    <label class="form-check-label" for="remember">
                        Remember me
                    </label>
                </div>

                <button type="submit" name="btnlogin" class="btn btn-login">
                    <i class="fas fa-sign-in-alt me-2"></i>Sign In
                </button>
            </form>
            
            <div class="back-link">
                <a href="../index.html">
                    <i class="fas fa-arrow-left me-2"></i>Back to Website
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <?php if(!empty($_SESSION['success'])) {  ?>
    <div class="popup popup--icon -success js_success-popup popup--visible">
      <div class="popup__background"></div>
      <div class="popup__content">
        <h3 class="popup__content__title">
          <strong>Success</strong> 
        </h3>
        <p><?php echo $_SESSION['success']; ?></p>
        <p>
          <button class="button button--success" data-for="js_success-popup">Close</button>
        </p>
      </div>
    </div>
    <?php unset($_SESSION["success"]);  
    } ?>
    <?php if(!empty($_SESSION['error'])) {  ?>
    <div class="popup popup--icon -error js_error-popup popup--visible">
      <div class="popup__background"></div>
      <div class="popup__content">
        <h3 class="popup__content__title">
          <strong>Error</strong> 
        </h3>
        <p><?php echo $_SESSION['error']; ?></p>
        <p>
          <button class="button button--error" data-for="js_error-popup">Close</button>
        </p>
      </div>
    </div>
    <?php unset($_SESSION["error"]);  } ?>

    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
        el.addEventListener('click', function () {
          var popupEl = document.querySelector('.' + el.dataset.for);
          popupEl.classList.toggle('popup--visible');
        });
      };

      Array.from(document.querySelectorAll('button[data-for]')).
      forEach(addButtonTrigger);
    </script>

</body>
</html>
