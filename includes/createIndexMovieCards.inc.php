<?php

//connecting to database
include "includes/connectDB.inc.php";

$query = "SELECT movies.movieName, movies.movieImage, movies.movieDescription, rooms.roomName, schedule.startDate, schedule.startHours, schedule.schedule_id
            FROM movies
            INNER JOIN schedule ON schedule.movie_id = movies.movie_id
            INNER JOIN rooms ON schedule.room_id = rooms.room_id";

$result = $conn->query($query);
$row = mysqli_fetch_assoc($result);

if ($result->num_rows > 0) {

    foreach ($result as $row) {
?>

        <div class="rounded cursor-pointer">
            <div class="relative h-[100%]">
                <?php echo '<img src="data:image;base64,' . base64_encode($row['movieImage']) . '" class="card-img-top h-[100%] rounded">'; ?>
                <div class="absolute flex flex-col inset-0 bg-black/80 opacity-0 hover:opacity-100 transition-opacity duration-300">
                    <p class="text-white text-[18px] font-bold w-full p-2 text-left"><?php echo $row['movieName']; ?></p>
                    <p class="text-white text-sm w-full px-2 text-left"><?php echo $row['startDate']; ?></p>
                    <p class="text-white text-sm w-full px-2 text-left"><?php echo $row['startHours']; ?></p>
                    <p class="text-white text-[12px] w-full p-2 text-left"><?php echo $row['movieDescription']; ?></p>
                    <?php
                    if (isset($_SESSION['userId'])) {
                        echo '<a href="booking.php?scheduleID='.$row['schedule_id'].'" class="absolute m-2 bottom-0 p-2 bg-[#73a5ff] text-sm rounded text-white">Бронь</a>';
                    }
                    ?>
                </div>
            </div>
            
        </div>

<?php
    }
} else { ?>


 <h4 style="color: white; font-family: Simplifica; text-align: center;">No scheduled movies!!</h4>



<?php } ?>