<?php

$conn = mysqli_connect("localhost", "root", "111111", "opentutorials");

// 1 row
echo "<h1>single row</h1>";
$sql = "
SELECT * FROM topic WHERE id = 10 LIMIT 1000";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result);

print_r($row);

echo "<br>";
echo $row[0].'<br>';
echo $row['title'].'<br>';
echo $row[2].'<br>';
echo $row[3].'<br>';

echo '<h1>'.$row['title'].'</h1>';
echo $row['description'];


// ALL row
echo "<h1>multi row</h1>";
$sql = "SELECT * FROM topic LIMIT 1000";
$result = mysqli_query($conn, $sql);

/*
$row = mysqli_fetch_array($result);
echo '<h2>'.$row['title'].'</h2>';
echo $row['description'];

$row = mysqli_fetch_array($result);
echo '<h2>'.$row['title'].'</h2>';
echo $row['description'];

$row = mysqli_fetch_array($result);
echo '<h2>'.$row['title'].'</h2>';
echo $row['description'];

$row = mysqli_fetch_array($result);
echo '<h2>'.$row['title'].'</h2>';
echo $row['description'];

$row = mysqli_fetch_array($result);
var_dump($row);
*/

while(($row = mysqli_fetch_array($result)) != NULL)
{
    echo '<h2>'.$row['title'].'</h2>';
    echo $row['description'];
}


if($result == false)
    echo mysqli_error($conn);

?>