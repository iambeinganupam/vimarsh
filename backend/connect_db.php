<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vimarsh_db";

$connect_db = mysqli_connect($servername, $username, $password, $dbname);

if(!$connect_db){
    ?>
    <script>
        alert("Connection to database failed...");
    </script>
    <?php
}
?>