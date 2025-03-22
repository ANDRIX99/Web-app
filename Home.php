<?php 
    // Server connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Runar";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn) {
        die(mysqli_error($conn));
    } else {
        echo "<script>console.log('connected')</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HomePage</title>
    </head>
    <body>
        <a href="Item.php" >Item</a>
        <a href="ItemDetail.php" >ItemDetail</a>
    </body>
</html>

<?php 
    mysqli_close($conn);
?>