<link rel="stylesheet" href="list.css">

<?php
//This variable stores the hostname of mysql server.
$serverName = "localhost";


//This variable stores the username used to connect to the MySQL database.
$user = "root";

//This variable stores the pass used to connect to the MySQL database.
$pass = "";

//This variable stores the name of the database you want to connect to within the MySQL server.
$databaseName = "database";

//Establishing the connection between php and your database
$conn = new mysqli($serverName, $user, $pass, $databaseName);

//Checking the connection if it's successfully established or not
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM registration";
$result = $conn->query($sql);
?>



    </form>
    </div>
    <div class="container">

        <h2>STUDENT LIST</h2>

        <table class="table">

            <thead>

                <tr>
                    <th>ID</th>

                    <th>STUDENT ID</th>

                    <th>Username</th>

                    <th>Fullname</th>

                    <th>Email</th>

                    <th>Contact</th>

                    <th>Address</th>

                    <th>Birthday</th>

                    <th>Action</th>

                </tr>

            </thead>

            <tbody>
            <?php

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>
                        <tr>
                            <td><?php echo $row['ID']; ?></td>
                            <td><?php echo $row['student_id']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['fullname']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['contact']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['birthday']; ?></td>
                            <td>
                                <a class="btn btn-info" href="update.php?id=<?php echo $row['ID']; ?>">UPDATE</a>&nbsp;
                                <a class="btn btn-danger" name="delete" href="delete.php?id=<?php echo $row['ID']; ?>">DELETE</a>
                            </td>
                        </tr>

                        <?php }
                }

                ?>
            </tbody>

        </table>
    </div>

</body>

</html>

<?php
$conn->close();
?>
