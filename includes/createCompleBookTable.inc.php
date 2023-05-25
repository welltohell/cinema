<?php

//connecting to database
include "includes/connectDB.inc.php";

    

$query = "SELECT * FROM completed_bookings";

$result = $conn->query($query);
$row = mysqli_fetch_assoc($result);

if ($result->num_rows > 0){
    
    foreach($result as $row){
?>

<tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
    <td class="px-6 py-4"><?php echo $row['compB_id']; ?></td>
    <td class="px-6 py-4"><?php echo $row['userEmail']; ?></td>
    <td class="px-6 py-4"><?php echo $row['movieName']; ?></td>
    <td class="px-6 py-4"><?php echo $row['roomName']; ?> , <?php echo $row['seatName']; ?></td> 
    <td class="px-6 py-4"><?php echo $row['startDate'];?> , <?php echo $row['startHours'];?></td>
</tr>

<?php 
    }
}

?>