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
        height: 50px;
    }
    </style>
</head>

<body>
    <table>
        <tr>
            <td>Id File</td>
            <td>File Name</td>
            <td>File Upload</td>
            <td>Description</td>
        </tr>
        <?php
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=testdb', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $select = "SELECT * FROM upload where id=:id";
          
            $stmt = $pdo->prepare($select);
            $stmt ->bindParam(':id',$id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

                $fileId = $row['id'];
                $fileName = $row['fileName'];
                $fileUpload = $row['fileUpload'];
                $description = $row['fileDescription'];
        ?>
        <tr>
            <td><?php echo $fileId; ?></td>
            <td><?php echo $fileName; ?></td>
            <td><img src="file/<?php echo $fileUpload; ?>" width="80" height="60"></td>
            <td><?php echo $description; ?></td>
        </tr>
        
        <?php
        }
            }
         catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
        ?>
    </table>
</body>

</html>