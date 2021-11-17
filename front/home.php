<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<body>
<?php
  define ('MYSITE',true);
  include __DIR__ . '/../front/navbar.php';
  ?>
<style>
.div{
  text-align: center;
  font-family: "Times New Roman", Times, serif;
}
</style>
    <div class="div" data-aos="fade-up" data-aos-duration="2000">
    <h1 >livres disponible</h1>
    </div>
    
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>    
</body>
</html>
<?php
include __DIR__ . '/../dataconnect/sql.php';
$obj = new Book ();
/* display books*/
$data = $obj->displaybooks();
foreach ($data as $value){
 ?>
 <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
  <div class="row">
    <div class="col-12">
		<table class="table table-image">
		  <thead>
		    <tr>
		      <th scope="col"></th>
		      <th scope="col">title</th>
		      <th scope="col">Author</th>
		    
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
            <td class="w-25">
			      <img src="/y-library/images/<?php echo $value['image'];?>"class="img-fluid img-thumbnail" alt="Sheep">
		      </td>
		      <td><?php echo $value['titre']; ?></td>
		      <td><?php echo $value['auteur']; ?></td>
        </tr>
		    
		  </tbody>
		</table>   
    </div>
  </div>
</div>
  </body>
</html>
 <?php
}//foreach close

?>
<?php
  include __DIR__ . '/../front/footer.php';
  ?>



  




