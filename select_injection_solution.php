<?php
require "connect.php";

$cid = $_GET["CustomerID"];

$sql = "SELECT customer.CustomerID,
               customer.Name,
               customer.Email,
               country.CountryName,
               customer.OutstandingDebt
        FROM customer
        INNER JOIN country
        ON customer.CountryCode = country.CountryCode
        WHERE customer.CustomerID = :customerID";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':customerID', $cid);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Customer Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 30px auto;
            background: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #a7a7aa;
            color: white;
        }

        tr:hover {
            background: #f1f1f1;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>

<body>

    <h2>Customer Information</h2>

    <table>
        <tr>
            <th>Customer ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Country</th>
            <th>Outstanding Debt</th>
        </tr>

        <?php
        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>" . $row['CustomerID'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>" . $row['CountryName'] . "</td>";
            echo "<td>" . $row['OutstandingDebt'] . "</td>";
            echo "</tr>";
        }
        ?>

    </table>

</body>

</html>

<?php
$conn = null;
?>