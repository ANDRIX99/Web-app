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
        <title>Detail Item detail</title>
    </head>
    <body>
        <table>
            <tr>
                <th>Dettagli</th>
            </tr>
            <?php 
                // SELECT Nome FROM item INNER JOIN itemdetail WHERE item.IdItem = itemdetail.IdItem AND itemdail.ItemId <> 0;
                $value = $_REQUEST['value'];
                $sql = "SELECT Nome FROM item INNER JOIN itemdetail WHERE item.IdItem = itemdetail.IdItem AND itemdetail.ItemId = $value";
                
                $result = mysqli_query($conn, $sql);
                $row = null;

                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['Nome'] . "</td>";
                        echo "</tr>";
                    }
                }
            ?>
        </table>
        <a href="ItemDetail.php" >Back</a>
    </body>
</html>

<?php 
    mysqli_close($conn);
?>