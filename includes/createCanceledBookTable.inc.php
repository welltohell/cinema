<?php

include "includes/connectDB.inc.php";

$query = "SELECT * FROM canceledbookings";

/* SELECT users.userEmail, schedule.startDate, movies.movieName, schedule.startHours, canceledbookings.cancelDate
            FROM users
            INNER JOIN canceledbookings ON users.userID = canceledbookings.user_id
            INNER JOIN schedule ON schedule.schedule_id = canceledbookings.schedule_id
            INNER JOIN movies ON schedule.movie_id = movies.movie_id */

$result = $conn->query($query);
$row = mysqli_fetch_assoc($result);

if ($result->num_rows > 0) {

    foreach ($result as $row) {

?>


<tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
    <td class="px-6 py-4"><?php echo $row['canceled_bookingID']; ?></td>
    <td class="px-6 py-4"><?php echo $row['c_Email']; ?></td>
    <td class="px-6 py-4"><?php echo $row['movie']; ?></td>
    <td class="px-6 py-4"><?php echo $row['room']; ?> , <?php echo $row['seat']; ?></td> 
    <td class="px-6 py-4"><?php echo $row['s_date'];?> , <?php echo $row['s_time'];?></td>
    <td class="px-6 py-4"><?php echo $row['cancelDate']; ?></td>
</tr>


<?php
    }
}
?>