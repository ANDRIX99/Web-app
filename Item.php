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
        <style>
            <?php include "style.css"; ?>
        </style>
        <title>Item</title>
    </head>
    <body>
        <div class="container">
            <a href="aggiungiItem.php" >aggiungi</a>
        </div>
        <table>
            <tr>
                <th>Id Item</th>
                <th>Nome</th>
            </tr>
                <!-- Printing all record in item table -->
                <?php 
                    $result = mysqli_query($conn, "SELECT * FROM item");
                    $row = null;

                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['IdItem'] . "</td>";
                            echo "<td>" . $row['Nome'] . "</td>";
                            echo "</tr>";
                        }
                    }
                ?>
        </table>
    </body>
</html>

<?php 
    mysqli_close($conn);
?>