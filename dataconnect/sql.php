<?php
/*data connect */

class Book {
    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'biblio';
    private $conn;

    function __construct(){
        $this->conn = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
        if($this->conn->connect_error){
            echo 'connection failed';
        }else{
            return $this->conn;
        }
        }
    /*function define for insert  in our database */
    public function insertbooks($post){
       $titre = $_POST['titre'];
       $auteur= $_POST['auteur'];
       $image= $_POST['image'];
       $sql = "INSERT INTO book(titre,auteur,image)VALUES('$titre','$auteur','$image')";
       $result=$this->conn->query($sql);
       if($result){
           header('location:index.php?msg=ins');
       }else{
           echo "error".$sql."<br>".$this->conn->error;
       }
    
       }//insert books function close

       public function updatebooks($post){
        $titre = $_POST['titre'];
        $auteur= $_POST['auteur'];
        $image= $_POST['image'];
        $editid=$_POST['hid'];
        $sql = "UPDATE book SET titre='$titre',auteur='$auteur',image='$image' WHERE id='$editid'";
        $result=$this->conn->query($sql);
        if($result){
            header('location:index.php?msg=ups');
        }else{
            echo "error".$sql."<br>".$this->conn->error;
        }  
    }//update function close 
    
    public function deletebook($delid){
      $sql ="DELETE FROM book WHERE id='$delid'";
      $result= $this->conn->query($sql);
      if($result){
        header('location:index.php?msg=del');
    }else{
        echo "error".$sql."<br>".$this->conn->error;
    }  


    }// delete function close
      public function displaybooks(){
          $sql="SELECT * FROM book";
          $result=$this->conn->query($sql);
          if($result->num_rows>0){
              while($row=$result->fetch_assoc()){
                   $data[]=$row;
              }//while close
              return $data;
            }//if close
          }//display books close

    public function displaybooksById($editid){
      $sql = "SELECT * FROM book WHERE id = '$editid'";
      $result = $this->conn->query($sql);
       if($result->num_rows==1){
           $row = $result->fetch_assoc();
           return $row;
       } //if close
    }// function displaybooksById
      
    }//classe close


    ?>
