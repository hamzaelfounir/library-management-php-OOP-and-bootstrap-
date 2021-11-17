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
         <h1>  Books dashboard </h1>
    </div>
    
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>    
</body>
</html>

<?php
/*include sql.php */
include __DIR__ . '/../dataconnect/sql.php';
$obj = new Book();
/* insert book */
if (isset($_POST['submit'])){
    $obj->insertbooks($_POST);
}
/* update book */
if (isset($_POST['update'])){
    $obj->updatebooks($_POST);
}
/*delete book*/
if(isset($_GET['deleteid'])){
    $delid = $_GET['deleteid'];
    $obj->deletebook($delid);
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

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<h2 class="text-center text-primary"><h2>
<div class="container">
<!--success msg -->
<?php
if(isset($_GET['msg']) AND $_GET['msg']=='ins'){
  echo'<div class="alert alert-dark" role="alert">
       book inserted successfully..! 
</div>';
}
if(isset($_GET['msg']) AND $_GET['msg']=='ups'){
    echo'<div class="alert alert-dark" role="alert">
         book updated successfully..! 
  </div>';
}
if(isset($_GET['msg']) AND $_GET['msg']=='del'){
    echo'<div class="alert alert-dark" role="alert">
         book deleted successfully..! 
  </div>';
}
?>
<?php
/*fetch books for update */
 if(isset($_GET['editid'])){
     $editid = $_GET['editid'];
     $mybook = $obj->displaybooksById($editid);
     ?>
     <!-- update form -->
     <form action="index.php" method="post">
<div class="form-group">
<label>titre</label>
<input type="text" name="titre" value="<?php echo $mybook['titre']; ?>"placeholder="entrer titre" class="form-control">
<label>auteur</label>
<input type="text" name="auteur" value="<?php echo $mybook['auteur']; ?>" placeholder="entrer auteur" class="form-control">
</div>
<div class="col-lg-6 col-sm-6 col-12">
<h4>choose file
<span class="file-input btn btn-block btn-primary btn-file">
<input type="file" id="myFile" name="image" multiple>
</span>
</div>
<div class="form-group">
<input type="hidden" name="hid" value="<?php echo $mybook['id'];?>">
<input type="submit" name="update" value="Update" class="btn btn-primary">
</div>
</form>
     <?php
 } else {
 ?>
 <form action="index.php" method="post">
<div class="form-group">
<label>Titre</label>
<input type="text" name="titre" placeholder="entrer titre" class="form-control">
<label>Auteur</label>
<input type="text" name="auteur" placeholder="entrer auteur" class="form-control">
</div>
<div class="col-lg-6 col-sm-6 col-12">
<h4>choose file
<span class="file-input btn btn-block btn-primary btn-file">
<input type="file" id="myFile" name="image" multiple>
</span>
</div>
<div class="form-group">
<input type="submit" name="submit" value="submit" class="btn btn-primary">
</div>
</form>
<?php } //else close ?>
 
 <br>
<h4 class="text-center text-danger">display books</h4>
<table class="table table-bordered">
<tr class="bg-light text-center">
<th>L.No</th>
<th>titre</th>
<th>auteur</th>
<th>image</th>
<th>edit</th>
<th>delete</th>
</tr>
<?php
/* display books*/
$data = $obj->displaybooks();
$lno=1;
foreach ($data as $value){
 ?>
 <tr class="text-center">
    <td><?php echo $lno++; ?></td>  
    <td><?php echo $value['titre']; ?></td>
    <td><?php echo $value['auteur']; ?></td>
    <td><img src="/y-library/images/<?php echo $value['image'];?>"width="100px" height="100px" class="image"></td>
    <td>
       <a href="index.php?editid=<?php echo $value['id'];?>" class="btn btn-primary">Edit</a>
    </td>
    <td>
       <a href="index.php?deleteid=<?php echo $value['id'];?>" class="btn btn-danger">Delete</a>
    </td>
    </tr>
 <?php
}//foreach close

?>
</body>
</html>