<!DOCTYPE html>
<html>

<head>
    <title>View Insert</title>
    <style> 
    table,
    td,
    th {

        border: 2px solid black;
        border-collapse: collapse;
        width: 500px;
        height: 100px;
    }

    </style>
</head>

<body>
    
        
        <?php
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=testdb', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $select = "SELECT * FROM upload";
            $stmt = $pdo->query($select);

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $fileId = $row['id'];
                $fileName = $row['fileName'];
                $fileUpload = $row['fileUpload'];
                $description = $row['fileDescription'];
        ?>
        <div>
            
            <a style="font-size:30px;"  href="produkti.php?id=<?php echo $fileId;  ?>"><?php echo $fileName; ?></a><br>
            <img src="file/<?php echo $fileUpload; ?>" width="400" height="300"></td>
            <p><?php echo $description; ?></p>
            </div>
        <?php
            }
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
        ?>
    </table>
</body>

</html>