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
        <title>Item Detail</title>
    </head>
    <body>
        <div class="container">
            <a href="AggiungiItemDetail.php" >Aggiungi</a>
        </div>
        <table>
            <tr>
                <th>IdItemDetail</th>
                <th>ItemId</th>
                <th>Amount</th>
                <th>IdItem</th>
                <th>Button</th>
            </tr>
            <tr>
                <?php
                    // SELECT item.Nome, itemdetail.IdItemDetail, itemdetail.ItemId, itemdetail.Amount FROM item INNER JOIN itemdetail WHERE item.IdItem = itemdetail.IdItem;
                    // with this query I can see all the item name
                    $sql = "SELECT item.Nome, itemdetail.IdItemDetail, itemdetail.ItemId, itemdetail.Amount, itemdetail.IdItem FROM item INNER JOIN itemdetail WHERE item.IdItem = itemdetail.IdItem;";
                    $result = mysqli_query($conn, $sql);
                    $row = null;

                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['IdItemDetail'] . "</td>";
                            echo "<td>" . $row['ItemId'] . "</td>";
                            echo "<td>" . $row['Amount'] . "</td>";
                            echo "<td>" . $row['Nome'] . "</td>";
                            echo "<td> <a href='Detail.php?value=" . $row['IdItem'] . "' />Dettagli</td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </tr>
        </table>
    </body>
</html>

<?php 
    mysqli_close($conn);
?>