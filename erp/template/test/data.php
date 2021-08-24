
<?php
require('../../database.php');
$conn = OpenCon();
$id = $_GET['id'];

$sql = "SELECT product_id FROM wine_list WHERE product_id = '$id'";
$result = $conn->query($sql);

echo $id;

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo $row['product_id'];
  }
}
?>