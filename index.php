<?php session_start() ?>
<?php include 'database.php'; ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login App</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="index">
<?php if (isset($_SESSION['success'])): ?>
       
        <ul>
             <li><a class="active" href="#home">Home</a></li>
             <li><a href="#news">News</a></li>
             <li><a href="#contact">Contact</a></li>
             <li><a href="#about">About</a></li>
             <li class="user_logout"><a href="<?php echo 'logout.php'; ?>">Logout</a></li>
             <li class="user">
                 <a href="#guest">
                     <?php if(isset($_SESSION['name'])){
                                echo $_SESSION['name'];
                                return;
                            }else{
                                echo 'Guest';
                                return;
                            }
                     ?>
                 </a>
             </li>
        </ul>
        
        <br><p style="color:green"><b> <?php echo $_SESSION['success'] ?> </b></p>;
    <?php else: ?>
    <h1>Please <a href="<?php echo 'login.php'; ?>">Login</a> first </h1>

<?php endif ?>
    </div> 
        
</body>
</html>