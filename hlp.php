<?php
include('qrlib.php');
$link = mysqli_connect("localhost", "root", "root", "sbu_ht.sql");
 
// Check connection
if($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error()); }
else {
    echo "Connected to Database  ";
}
$sq = "SELECT * FROM `studentmaster`";
 
$connStatus = $link->query($sq);
 
$numberOfRows = mysqli_num_rows($connStatus);
 
echo "<br>"."no of rows: ".$numberOfRows."<br>"."<br>"; 
$randarray = array(); 
for($i = 0; $i <=$numberOfRows; ) 
{ 
    unset($rand); 
    $rand = rand(10000000,999999999); 
    if(!in_array($rand, $randarray)) 
    { 
        $randarray[$i] = $rand; 
        echo ' '.$rand;
		if (!file_exists('C:\MAMP\htdocs\php\eggs\eggs'.$i.'.png')) 
		{
			QRcode::png( $rand , 'C:\MAMP\htdocs\php\eggs\eggs'.$i.'.png');
			echo 'File generated!';
			echo '<hr />';
		}
		else 
		{
			echo 'File already generated!';
			echo '<hr />';
		}
		$i++;
	}
}
print_r ($randarray);
for($j =1; $j <=$numberOfRows;)
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