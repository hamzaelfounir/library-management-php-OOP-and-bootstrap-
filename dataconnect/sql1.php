<?php
/*data connect */

class User {
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
public function insertusers($post){
    $name = $_POST['name'];
    $email= $_POST['email'];
    $interest= $_POST['interest'];
    $sql = "INSERT INTO users(name,email,interest)VALUES('$name','$email','$interest')";
    $result=$this->conn->query($sql);
    if($result){
        header('location:index1.php?msg=ins');
    }else{
        echo "error".$sql."<br>".$this->conn->error;
    }
 
    }//insertusers function close

    public function iinsertusers($post){
        $name = $_POST['name'];
        $email= $_POST['email'];
        $interest= $_POST['interest'];
        $sql = "INSERT INTO users(name,email,interest)VALUES('$name','$email','$interest')";
        $result=$this->conn->query($sql);
        if($result){
            header('location:abonn.php?msg=ins');
        }else{
            echo "error".$sql."<br>".$this->conn->error;
        }
     
        }//insertusers function close

    public function updateusers($post){
        $name = $_POST['name'];
        $email= $_POST['email'];
        $interest= $_POST['interest'];
        $editid=$_POST['hid'];
        $sql = "UPDATE users SET name='$name',email='$email',interest='$interest'WHERE id='$editid'";
        $result=$this->conn->query($sql);
        if($result){
            header('location:index1.php?msg=ups');
        }else{
            echo "error".$sql."<br>".$this->conn->error;
        }
     
        }//updateusers function close

        public function deleteuser($delid){
            $sql ="DELETE FROM users WHERE id='$delid'";
            $result= $this->conn->query($sql);
            if($result){
              header('location:index1.php?msg=del');
          }else{
              echo "error".$sql."<br>".$this->conn->error;
          }  
      }// delete function close




    public function displayusers(){
        $sql="SELECT * FROM users";
        $result=$this->conn->query($sql);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                 $data[]=$row;
            }//while close
            return $data;
          }//if close
        }//display users close    

        public function displayusersById($editid){
            $sql = "SELECT * FROM users WHERE id = '$editid'";
            $result = $this->conn->query($sql);
             if($result->num_rows==1){
                 $row = $result->fetch_assoc();
                 return $row;
             } //if close
          }// function displayuserssById close

    }

    ?>