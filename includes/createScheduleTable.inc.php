<?php

include "includes/connectDB.inc.php";

$query = "SELECT movies.movieName, rooms.roomName, rooms.seat_column, rooms.seat_row, schedule.startDate, schedule.startHours, schedule.schedule_id
          FROM movies
          INNER JOIN schedule ON schedule.movie_id = movies.movie_id
          INNER JOIN rooms ON schedule.room_id = rooms.room_id";

$result = $conn->query($query);
$row = mysqli_fetch_assoc($result);

if ($result->num_rows > 0) {

    foreach ($result as $row) {

?>

<tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <td class="px-6 py-4">
                <?php echo $row['schedule_id']; ?>
                </td>
                <td class="px-6 py-4">
                <?php echo $row['movieName']; ?>
                </td>
                <td class="px-6 py-4">
                <?php echo $row['roomName']; ?>
                </td>
                <td class="px-6 py-4">
                <?php echo $row['seat_column'] * $row['seat_row']; ?>
                </td>
                <td class="px-6 py-4">
                <?php echo $row['startDate'];?>
                </td>
                <td class="px-6 py-4">
                <?php echo $row['startHours'];?></td>
                </td>
                <td class="px-6 py-4 flex gap-2">
                    <a href="classes/schedules.class.php?completeSchedule=<?php echo $row['schedule_id']; ?>&date=<?php echo $row['startDate'];?>&time=<?php echo $row['startHours'];?>&room=<?php echo $row['roomName']; ?>" class="text-green-500">Complete</a>
                    <a href="createSchedule.php?editSchedule=<?php echo $row['schedule_id']; ?>&date=<?php echo $row['startDate'];?>&time=<?php echo $row['startHours'];?>&room=<?php echo $row['roomName']; ?>" class="text-blue-500">Edit</a>
                    <a href="classes/schedules.class.php?cancelSchedule=<?php echo $row['schedule_id'];?>&date=<?php echo $row['startDate'];?>&time=<?php echo $row['startHours'];?>&room=<?php echo $row['roomName']; ?>" class="text-red-500">Cancel</a>
                </td>
            </tr>


<?php
    }
}
?>