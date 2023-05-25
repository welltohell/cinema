<?php

include "includes/connectDB.inc.php";

$query = "SELECT * FROM canceledschedules ";

/* SELECT  movies.movieName,
                    canceledschedules.cancelDate,
                    canceledschedules.startDate,
                    canceledschedules.startHours,
                    rooms.roomName,
                    rooms.seat_column, 
                    rooms.seat_row
            FROM movies
            INNER JOIN canceledschedules ON canceledschedules.movie_id = movies.movie_id
            INNER JOIN rooms ON canceledschedules.room_id = rooms.room_id */

$result = $conn->query($query);
$row = mysqli_fetch_assoc($result);

if ($result->num_rows > 0) {

    foreach ($result as $row) {

?>


<tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
    <td class="px-6 py-4"><?php echo $row['cS_id']; ?></td>
    <td class="px-6 py-4"><?php echo $row['movieName']; ?></td>
    <td class="px-6 py-4"><?php echo $row['roomName']; ?></td>
    <td class="px-6 py-4"><?php echo $row['startDate'];?> , <?php echo $row['startHours'];?></td>
    <td class="px-6 py-4"><?php echo $row['cancelDate'];?></td>
</tr>


<?php
    }
}
?>