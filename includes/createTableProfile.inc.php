<?php

$userId = $_SESSION['userId'];

//connecting to database
include "includes/connectDB.inc.php";

//Join 5 tables to get the data we want based on user's id
$query = " SELECT schedule.startDate, movies.movieName, rooms.roomName, booking.booked_date, reservedseats.seatName
            FROM users 
            INNER JOIN booking ON users.userID = booking.user_id
            INNER JOIN schedule ON schedule.schedule_id = booking.schedule_id
            INNER JOIN movies ON schedule.movie_id = movies.movie_id
            INNER JOIN rooms ON schedule.room_id = rooms.room_id
            INNER JOIN reservedseats ON reservedseats.booking_id = booking.booking_id
            WHERE booking.user_id = '$userId'";

$result = $conn->query($query);
$row = mysqli_fetch_assoc($result);

if ($result->num_rows > 0){
    
    foreach($result as $row){
?>
<!-- <tr>
    <td><?php echo $row['startDate']; ?></td>
    <td><?php echo $row['movieName']; ?></td>
    <td><?php echo $row['roomName']; ?></td>
    <td><?php echo $row['seatName']; ?></td>
    <td><?php echo $row['booked_date']; ?></td>
</tr> -->

<tbody>
    <tr class="border-b border-gray-200 dark:border-gray-700">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
            <?php echo $row['startDate']; ?>
        </th>
        <td class="px-6 py-4">
            <?php echo $row['movieName']; ?>
        </td>
        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
            <?php echo $row['roomName']; ?>
        </td>
        <td class="px-6 py-4">
            <?php echo $row['seatName']; ?>
        </td>
        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
            <?php echo $row['booked_date']; ?>
        </td>
    </tr>
</tbody>

<?php
    }
}

?>