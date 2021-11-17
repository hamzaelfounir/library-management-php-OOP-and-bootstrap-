<?php
session_start();
?>


<?php
define ('MYSITE',true);
include __DIR__ . '/../front/navbar.php';

?>



<?php

include_once('User.php');

if(isset($_POST['submit'])){

    $name = $_POST['user'];
    $pass = $_POST['pass'];

    $object = new Admin();
    $object->Login($name, $pass);
}


?>


<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="div" align="center">
    <div class="col-sm-6 col-sm-offset-3" align="center">
    <img src="https://imgr.search.brave.com/5qg5A4P_BY_Mk63m7iIB7jKTYUoYTtmE1UczMjEiJRg/fit/1200/960/ce/1/aHR0cHM6Ly9sYXF1/b3RpZGllbm5lLm1h/L3VwbG9hZHMvYWN0/dWFsaXRlcy81YmVj/M2I5NTA0OThmLmpw/Zw" class="rounded-circle" alt="Responsive Image" width="307" height="240">
        <h2 align="center">Login here</h2>
        <form method="post" action="index.php">
           Username<input type="text" name="user"class="form-control"/>
           Password<input type="password" name="pass" class="form-control"/>
           <br>
           <input type="submit" name="submit" value="Login" class="btn btn-primary"/> 
        </form>
    </div>
    </div>
    </body>
</html>
<?php

if(isset($_POST["submit"])){

    $_SESSION["status"]=false;

    //condition for checking valid input from user

    if ( $name == "hamza" && $pass == "hamza123" ){

        $_SESSION["status"]= true;
        header('REFRESH:2;URL=/y-library/front/index.php');
    }
    else{
        echo "invalid credentials";
    }
    
}

?>


<?php
include __DIR__ . '/../front/footer.php';
?>