
<html>

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">


<style>

table

{

border-style:solid;

border-width:2px;

border-color:pink;

}

</style>

</head>

<body bgcolor="#EEFDEF">
    
<?php



echo "<table class='table  table-stripped table-responsive'>";
echo "<tr>
     <th>Transaction ID</th>
     <th>Transaction Code</th>
     <th>Time</th>
     <th>Amount</th>
    <th>Reference Number</th>
    <th>Invoice Number</th>
    <th>Account Balance</th>
     <th>Phone Number</th>
    <th>First Name</th>
    <th>Last Name</th>
     <th>Action</th>
</tr>";

class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
  }

  function beginChildren() {
    echo "<tr>";
  }

  function endChildren() {
    echo "</tr>" . "\n";
  }
}

require 'firebase.php';

$payments = $database->getReference('payments')->getValue();

if($payments){
    foreach($payments as $transID => $data){
        echo "<tr>";
        echo "<td>".$transID."</td>";
        echo "<td>".$data['time']."</td>";
        echo "<td>".$data['amount']."</td>";
        echo "<td>".$data['admission']."</td>";
        echo "<td>".$data['phone']."</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No payments yet</td></tr>";
}
$conn = null;
echo "</table>";



?>
</body>

</html>