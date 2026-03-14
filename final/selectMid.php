<html> 

    <head>
        <title> Select and show detail</title>
    </head>

    <body>

<?php

require 'connectMid.php';

$sql = "select * from customer";
$stmt = $dbHandler->prepare($sql);
$stmt->execute();
?>

<table width="500" border="2">
  <tr>
    <th width="90"> <div align="center">รหัสผู้ใช้ </div></th>
    <th width="140"> <div align="center">ชื่อ </div></th>  
    <th width="100"> <div align="center">ประเทศ </div></th>
  </tr>

<?php
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>

  <tr>
    <td>   
        <a href="detailMid.php?CustomerID=<?php echo $result['CustomerID']; ?>">
        <?php echo $result['CustomerID']; ?>
        </a>

    <td>
        <?php echo $result['Name']; ?></div></td>
    <td>
        <?php echo $result['CountryCode']; ?></div></td>
        
  </tr>

<?php
  }
?>


    </table>
<?php
$dbHandler = null;
?>


    </body>  

</html>