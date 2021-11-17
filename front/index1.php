<?php

session_start();

if ($_SESSION["status"] != true){

  header('REFRESH:1;URL=/y-library/admin/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="/y-library/front/home.php">Youcode Library</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="/y-library/front/index.php">Gestion des livre </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/y-library/front/index1.php">Gestion dess Abonnées</a>
      </li>
      
    </ul>
    </div>
</nav>
<style>
@font-face {
  font-family: myFirstFont;
  src: url(sansation_light.woff);
}
.div{
  text-align:center ;
  font-style: italic;
  color:black;
  font-family: myFirstFont;
}
</style>
    <div class="div" data-aos="fade-up" data-aos-duration="2000">
         <h1>  Users dashboard </h1>
    </div>
    
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>    
</body>
</html>
<?php
/*include sql1.php */
include __DIR__ . '/../dataconnect/sql1.php';
//include 'sql1.php';
$obj = new User();

/* insert user */
if (isset($_POST['submit'])){
    $obj->insertusers($_POST);
}// if isset close

/* update user */
if (isset($_POST['update'])){
    $obj->updateusers($_POST);
}

/*delete user */
if(isset($_GET['deleteid'])){
    $delid = $_GET['deleteid'];
    $obj->deleteuser($delid);
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
<h2 class="text-center text-primary"><h2>  
<div class="container">
<?php
if(isset($_GET['msg']) AND $_GET['msg']=='ins'){
    echo'<div class="alert alert-dark" role="alert">
         user inserted successfully..! 
  </div>';
}
if(isset($_GET['msg']) AND $_GET['msg']=='ups'){
    echo'<div class="alert alert-dark" role="alert">
         user updated successfully..! 
  </div>';
}
if(isset($_GET['msg']) AND $_GET['msg']=='del'){
    echo'<div class="alert alert-dark" role="alert">
         user deleted successfully..! 
  </div>';
}
?>

<?php
/*fetch users for update */
if(isset($_GET['editid'])){
    $editid = $_GET['editid'];
    $myuser = $obj->displayusersById($editid);
    ?>
    <!-- update form -->
    <form action="index1.php" method="post">
<div class="form-group">
<label>Name</label>
<input type="text" name="name" value="<?php echo $myuser['name']; ?>" placeholder="entrer name" class="form-control">
<label>Email</label>
<input type="text" name="email"  value="<?php echo $myuser['email']; ?>" placeholder="entrer email" class="form-control">
<label>Interest</label>
<input type="text" name="interest"  value="<?php echo $myuser['interest']; ?>" placeholder="entrer interest" class="form-control">
</div>
<div class="form-group">
<input type="hidden" name="hid" value="<?php echo $myuser['id'];?>">
<input type="submit" name="update" value="Update" class="btn btn-primary">
</div>
</form>
 <?php   
} else {
  ?>  
<form action="index1.php" method="post">
<div class="form-group">
<label>Name</label>
<input type="text" name="name" placeholder="entrer name" class="form-control">
<label>Email</label>
<input type="text" name="email" placeholder="entrer email" class="form-control">
<label>Interest</label>
<input type="text" name="interest" placeholder="entrer interest" class="form-control">
</div>
<div class="form-group">
<input type="submit" name="submit" value="submit" class="btn btn-primary">
</div>
</form>
<?php } // else close ?>
<h4 class="text-center text-danger">Display Abonnées </h4>
<table class="table table-bordered">
<tr class="bg-light text-center">
<th>A.No</th>
<th>Name</th>
<th>Email</th>
<th>Interest</th>
<th>action</th>
</tr>
<?php
/* display users */
$data = $obj->displayusers();
$Ano=1;
foreach ($data as $value){
 ?>
 <tr class="text-center">
    <td><?php echo $Ano++; ?></td>  
    <td><?php echo $value['name']; ?></td>
    <td><?php echo $value['email']; ?></td>
    <td><?php echo $value['interest']; ?></td>
    <td>
       <a href="index1.php?editid=<?php echo $value['id'];?>" class="btn btn-primary">Edit</a>
       <a href="index1.php?deleteid=<?php echo $value['id'];?>" class="btn btn-danger">Delete</a>
    </td>
    </tr>
 <?php
}//foreach close


?>

</table> 
</body>
</html>


 