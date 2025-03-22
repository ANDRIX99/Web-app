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

    // add the inserted value into the db
    if(isSet($_REQUEST['Nome'])) {
        $value = $_REQUEST['Nome'];
        if(!mysqli_query($conn, "INSERT INTO item (Nome) VALUES ('$value')")) {
            die(mysqli_error($conn));
        }
        header("Location: Item.php");
        mysqli_close($conn);
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
        <form action="AggiungiItem.php" method="get" >
            <input type="text" name="Nome" required />
            <input type="submit" />
        </form>
    </body>
</html>