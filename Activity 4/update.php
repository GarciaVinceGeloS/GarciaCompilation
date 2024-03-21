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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 

    if (isset($_POST['update'])) {

        $id = $_POST['id'];

        $username = $_POST['username'];

        $fullname = $_POST['fullname'];

        $student_id = $_POST['student_id'];

        $email = $_POST['email'];

        $address = $_POST['address'];

        $contact = $_POST['contact'];

        $birthday = $_POST['birthday'];

        $sql = "UPDATE `registration` SET `username`='$username',`fullname`='$fullname',`student_id`='$student_id',`email`='$email',`address`='$address',`contact`='$contact',`birthday`='$birthday' WHERE `id`='$id'"; 

        $result = $conn->query($sql); 

        if ($result == TRUE) {

            echo "Record updated successfully.";

        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    } 

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

        <h2>Student Profile Update Form</h2>

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

            <input type="submit" value="Update" name="update">

          </fieldset>

        </form> 



</body>
</html>
<?php
} else { 

    header('Location: studentlist.php');

} 
}
?> 