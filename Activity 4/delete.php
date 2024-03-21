<?php
//This variable stores the hostname of mysql server.
$serverName = "localhost";

//This variable stores the username used to connect to the MySQL database.
$user = "root";

//This variable stores the pass used to connect to the MySQL database.

$pass = "";

//This variable stores the name of the database yo want to connect to within the MySQL server.
$databaseName = "database";

//Establishing the connection between php and your database
$conn = new mysqli($serverName, $user, $pass, $databaseName);

//Checking the connection if its successfully established or not
if ($conn->connect_error) {
    die("Connection Failed: ".$conn->connect_error);

}
?>
<?php 

if (isset($_POST['delete'])) {

    $id = $_POST['id'];

    $sql = "DELETE FROM `registration` WHERE `id`='$id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo "Record deleted successfully.";

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

?>
<?php
if (isset($_GET['id'])) {

$id = $_GET['id']; 

$sql = "SELECT * FROM `registration` WHERE `id`='$id'";

$result = $conn->query($sql); 

if ($result->num_rows > 0) {        

    while ($row = $result->fetch_assoc()) {

 
        $student_id = $row['student_id'];

        $fullname = $row['fullname'];

        $email = $row['email'];
        
        $address = $row['address'];

        $contact  = $row['contact'];

        $birthday = $row['birthday'];

        $id = $row['ID'];

    } 

?>

    <h2>Student Profile Delete Form</h2>



        <form action="" method="post">

          <fieldset>

            <legend>Personal information:</legend>

           Student ID:<br>

            <input type="text" name="student_id" value="<?php echo $student_id; ?>">

            <input type="hidden" name="demo_id" value="<?php echo $id; ?>">

            <br>

            Fullname:<br>

            <input type="text" name="fullname" value="<?php echo $fullname; ?>">

            <br>

            Email:<br>

            <input type="email" name="email" value="<?php echo $email; ?>">

            <br>

            Address:<br>

            <input type="text" name="address" value="<?php echo $address; ?>">

            <br>
            Contact:<br>

            <input type="phone" name="contact" value="<?php echo $contact; ?>">

            <br>

            Birthdate:<br>

            <input type="date" name="birthday" value="<?php echo $birthday;?>">

            
            <br><br>


        <input type="submit" value="Delete" name="delete">

      </fieldset>

    </form> 
    </body>
    </html>
<?php
} else { 

    header('Location: demoDB.php');

} 
}
?> 