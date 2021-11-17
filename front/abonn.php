
    <?php
    define ('MYSITE',true);
    include __DIR__ . '/../front/navbar.php';

/*include sql1.php */
include __DIR__ . '/../dataconnect/sql1.php';


$obj = new User();

/* insert user */
if (isset($_POST['submit'])){
    $obj->iinsertusers($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
<div class="container" align="center">
<?php
if(isset($_GET['msg']) AND $_GET['msg']=='ins'){
    echo'<div class="alert alert-dark" role="alert">
         felicitations tu devient membre de youcode library..! 
  </div>';
}
?>
<form action="abonn.php" method="post">
<div class="col-sm-6 col-sm-offset-3">
<h2 align="center">Be membre of Youcode Library </h2>
<img src="https://imgr.search.brave.com/QPrf1Cv_GgJKeu5Ld1C1qTyhvBfwj6mY9JkjsswNQmo/fit/1200/719/ce/1/aHR0cHM6Ly9zaW1w/bG9uLmNvL3N0b3Jh/Z2UvNzExNC9TYWZp/LmpwZw" class="rounded-circle" alt="Responsive Image" width="307" height="240">
<h5>Name<h5>
<input type="text" name="name" placeholder="name" class="form-control" required="">
<h5>E-mail<h5>
<input type="email" name="email" placeholder="email" class="form-control" required="">
<h5>Interest<h5>
<input type="text" name="interest" placeholder="interest" class="form-control" required="">
<br>
<input type="submit" name="submit" value="submit" class="btn btn-primary">
</form>
</div>
</div> 
</body>


</html>
<?php
include __DIR__ . '/../front/footer.php';
?>