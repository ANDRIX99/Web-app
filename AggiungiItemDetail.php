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
    if(isSet($_REQUEST['ItemId'])) {
        $ItemId = $_REQUEST['ItemId'];
        $amount = $_REQUEST['Amount'];
        $IdItem = $_REQUEST['IdItem'];
        //echo $IdItem;
        if(!mysqli_query($conn, "INSERT INTO itemdetail (ItemId, Amount, IdItem) VALUES ('$ItemId', '$amount', '$IdItem')")) {
            die(mysqli_error($conn));
        }
        header("Location: ItemDetail.php");
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
        <form action="AggiungiItemDetail.php" method="get" >
            <!-- <input type="number" placeholder="itemid" name="ItemId" /> -->
            <select name="ItemId">
                <option value="0" default>Null</option>
                <?php 
                    $result = mysqli_query($conn, "SELECT * FROM item");
                    $row = null;

                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            $IdItem = $row['IdItem'];
                            $Nome = $row['Nome'];
                            echo "<option value='$IdItem'>$Nome</option>";
                        }
                    }
                ?>
            </select>
            <input type="number" placeholder="amount" name="Amount" required />
            <!-- <input type="number" placeholder="iditem" name="IdItem" /> -->
            <select name="IdItem">
                <?php 
                    $result = mysqli_query($conn, "SELECT * FROM item");
                    $row = null;

                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            $IdItem = $row['IdItem'];
                            $Nome = $row['Nome'];
                            echo "<option value='$IdItem'>$Nome</option>";
                        }
                    }
                ?>
            </select>
            <input type="submit" />
        </form>
    </body>
</html>