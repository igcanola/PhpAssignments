<?php
  // To save some time we are going to create a class to hold the database connection information.
  // As mentioned in the PDF we will define our class using the class keyword followed by the name of our class.
  class Database{
    // A private keyword, as the name suggests is the one that can only be accessed from within the class in which it is defined. All the keywords are by default under the public category unless they are specified as private or protected.
    private $connection;
    function __construct(){
      // In PHP, $this keyword references the current object of the class. The $this keyword allows you to access the properties and methods of the current object within the class using the object operator
      $this->connect_db();
    }
    // The public access modifier allows you to access properties and methods from both inside and outside of the class.
    public function connect_db(){
      $this->connection = mysqli_connect('localhost', 'root', '', 'personadb');
      if(mysqli_connect_error()){
        die("Database Connection Failed" . mysqli_connect_error());
      }
    }
    public function create($fname, $email, $fphone, $faddress, $postal, $country){
      $sql = "INSERT INTO detperson (fname, phone, faddress, postal_code, country, email) VALUES ('$fname', '$fphone', '$faddress', '$postal', '$country', '$email')";
      $res = mysqli_query($this->connection, $sql);
      if($res){
	 		    return true;
		  }
      else{
			    return false;
		  }
    }
    public function read(){
		    $sql = "SELECT * FROM detperson";
 		    $res = mysqli_query($this->connection, $sql);
 		    return $res;
	  }
    
     // Update customer data into customer table
    public function updateRecord($fname, $email, $fphone, $faddress, $postal, $country, $id_person)
    {
      $query = "UPDATE detperson SET country = '$country', email = '$email', faddress = '$faddress', fname = '$fname', phone = '$fphone', postal_code = '$postal' WHERE id_person = '$id_person'";
      $sql = mysqli_query($this->connection, $query);
      if ($sql==true) {
        header("Location:index.php?msg2=update");
      }else{
        echo "Registration updated failed try again!";
      }
    }

    public function deleteRecord($id_person)
    {
      $query = "DELETE FROM detperson WHERE id_person = '$id_person'";
      $sql = mysqli_query($this->connection, $query);
      if ($sql==true) {
        header("Location:access.php?msg3=delete");
      }else{
        echo "Record does not delete try again";
      }
    }

    public function displayRecordById($id_person)
    {
      $query = "SELECT * FROM detperson WHERE id_person = '$id_person'";
      $result = mysqli_query($this->connection, $query);
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
      }
    }
  }
  $rObj = new Database();
?>
