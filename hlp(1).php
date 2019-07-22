<?php

$link = mysqli_connect("localhost", "root", "root", "sbu_ht.sql");
 
// Check connection
if($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error()); }
else {
    echo "Connected to Database";
}
$randarray = array(); 
for($i = 1; $i <=6; ) 
{ 
    unset($rand); 
    $rand = rand(1,7); 
    if(!in_array($rand, $randarray)) 
    { 
        $randarray[] = $rand; 
        echo $rand;
        $i++; 
    } 
}
print_r ($randarray);
for($j =1; $j <=6;)
{

echo $randarray[$j];
$sql = "UPDATE studentmaster SET uniquekey1='$randarray[$j]' WHERE id='$j'";
   // echo "UPDATE studentmaster SET uniquekey1='$randarray[$j]' WHERE id='$j'"."<br>";
$j++; 

$query = mysqli_query($link, $sql);
echo "Query: " . $query;
if(mysqli_query($link, $sql)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}

// Close connection
mysqli_close($link);
?> 