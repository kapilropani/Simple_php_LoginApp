<?php session_start(); ?>
<?php include 'database.php'; ?>
<?php
    if(isset($_POST['submit']) && isset($_POST['name']) && isset($_POST['pass'])){
        $db = new Database();
        $q = "SELECT * FROM user";
        $tuple = $db->select($q)->fetch_assoc();
        
        if ($_POST['pass'] == $tuple['password'] && $_POST['name'] = $tuple['name']){
//            unset($_SESSION['name']) ;           
            $_SESSION['name'] = $_POST['name'];
//            $_SESSION['pass'] = $_POST['pass'];
            $_SESSION['success'] = 'Successfully Login';
            
            header('Location: index.php');
            return;
        }
        else{
            $_SESSION['error'] = 'name or password is incorrect';
            header('Location: login.php');
//            print_r($a);
            return;
        } 
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mylogin App</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login">
       <h1>Hostel Management System</h1>
        <form class="form" action="login.php" method="post">
           <?php if (isset($_SESSION['error'])){
                    echo '<p style="color:red"><b>'.$_SESSION['error'] . '</b></p>';
                    unset($_SESSION['error']);
                }
            ?>
            <p><input type="text" placeholder="Username" name="name"></p>
            
            <p><input type="text" placeholder="******" name="pass"></p>
            
            <p><input type="submit" value="Submit" name="submit"></p>
        </form>
        
    </div>
</body>
</html>