<?php

//connecting to database
include "includes/connectDB.inc.php";

    

$query = "SELECT * FROM completed_schedule";

$result = $conn->query($query);
$row = mysqli_fetch_assoc($result);

if ($result->num_rows > 0){
    
    foreach($result as $row){
?>

<tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
    <td class="px-6 py-4"><?php echo $row['compS_id']; ?></td>
    <td class="px-6 py-4"><?php echo $row['movieName']; ?></td>
    <td class="px-6 py-4"><?php echo $row['roomName']; ?></td>
    <td class="px-6 py-4"><?php echo $row['startDate'];?></td>
    <td class="px-6 py-4"><?php echo $row['startHours'];?></td>
</tr>

<?php 
    }
}

?>