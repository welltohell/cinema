<?php
require "header.php";
?>

<?php

$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

if ($url === "http://localhost/cinema/createSchedule.php?scheduleCreated=success") {

    echo '<div style="max-width: fit-content;" class="mt-4 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    <span class="font-medium">Сеанс успешно добавлен!</span>
        </div>';
} else if ($url === "http://localhost/cinema/createSchedule.php?scheduleCreated=failed") {

    echo '<div style="max-width: fit-content;" class="mt-4 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
    <span class="font-medium">Не удалось добавить сеанс!</span>
  </div>';
}

?>

<main>
    <div class="mt-8">

        <?php

        if (isset($_GET['editSchedule'])) { //check if edit button was pressed and display the edit form
        
            include "includes/connectDB.inc.php";

            $scheduleID = $_GET['editSchedule'];

            //select all the data that exists on this schedule id and then display them as vaules
            $query = "SELECT movies.movieName, rooms.roomName, rooms.seat_column, rooms.seat_row, schedule.startDate, schedule.startHours, schedule.schedule_id
                FROM movies
                INNER JOIN schedule ON schedule.movie_id = movies.movie_id
                INNER JOIN rooms ON schedule.room_id = rooms.room_id
                WHERE schedule.schedule_id = $scheduleID ";

            $result = $conn->query($query);
            $row = mysqli_fetch_assoc($result);

            $query2 = "SELECT movieName FROM movies";

            $result2 = $conn->query($query2);
            $row2 = mysqli_fetch_assoc($result2);

            $query3 = "SELECT roomName FROM rooms";

            $result3 = $conn->query($query3);
            $row3 = mysqli_fetch_assoc($result3);

            echo '<h1 class="title text-center">Обновить сеанс</h1>
    <div class="max-w-[500px] mx-auto">
                <form action="classes/schedules.class.php" method="POST">
                <input type="text" style="display: none;" name="schedule_idH" value="' . $row['schedule_id'] . '">
                <input type="text" style="display: none;" name="oldScheduleRoom_H" value="' . $_GET['room'] . '">
                <input type="text" style="display: none;" name="oldScheduleDate_H" value="' . $_GET['date'] . '">
                <input type="text" style="display: none;" name="oldScheduleTime_H" value="' . $_GET['time'] . '">

                <div class="form-group mt-4">
                <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="inputGroupSelect01" name="sch_movieName" required>
                            <option value="' . $row['movieName'] . '" selected>' . $row['movieName'] . '</option>';

            if ($result2->num_rows > 0) {

                foreach ($result2 as $row2) {

                    echo '<option value="' . $row2['movieName'] . '">' . $row2['movieName'] . '</option>';

                }
            }

            echo '</select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
            </div>';

            echo '<div class="form-group mt-4">
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="inputGroupSelect01" name="sch_movieRoom" required>
                            <option value="' . $row['roomName'] . '" selected>' . $row['roomName'] . '</option>';

            if ($result3->num_rows > 0) {

                foreach ($result3 as $row3) {

                    echo '<option value="' . $row3['roomName'] . '">' . $row3['roomName'] . '</option>';

                }
            }

            echo '</select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
            </div>';

            echo '
            <div class="flex items-end gap-4 mt-4">
                <div class="form-group w-1/2">
                    <label for="exampleFormControlSelect1">Дата и время:</label>
                    <input type="date" class="form-control block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="exampleFormControlFile1" name="sch_movieDate" value="' . $row['startDate'] . '" required>
                </div>
                <div class="form-group w-1/2">
                    <input type="time" class="form-control block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="exampleFormControlFile1" name="sch_movieTime" value="' . $row['startHours'] . '" required>
                </div>
            </div>
                    <div style="text-align: left;">
                        <button type="submit" class="btn mt-4 text-white bg-[#60B1DE] hover:bg-[#59A1CA] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="submit-scheduleUp">Обновить</button>
                    </div>
                </form>
            </div>';
        } else {

            include "includes/connectDB.inc.php";

            $query = "SELECT movieName FROM movies";

            $result = $conn->query($query);
            $row = mysqli_fetch_assoc($result);

            $query2 = "SELECT roomName FROM rooms";

            $result2 = $conn->query($query2);
            $row2 = mysqli_fetch_assoc($result2); ?>

            <h1 class="title text-center mb-4">Добавить сеанс</h1>
            <div class="max-w-[500px] mx-auto">
                <form action="classes/schedules.class.php" method="POST">

                    <div class="form-group">
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="inputGroupSelect01" name="sch_movieName" required>
                                <option disabled selected>Выберите фильм</option>
                                <?php
                                if ($result->num_rows > 0) {

                                    foreach ($result as $row) {

                                        echo '<option value="' . $row['movieName'] . '">' . $row['movieName'] . '</option>';
                                    }
                                } ?>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="inputGroupSelect01" name="sch_movieName" required>
                                <option disabled selected>Выберите зал</option>
                                <?php
                                if ($result2->num_rows > 0) {

                                    foreach ($result2 as $row2) {

                                        echo '<option value="' . $row2['roomName'] . '">' . $row2['roomName'] . '</option>';
                                    }
                                } ?>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-end gap-4 mt-4">
                        <div class="form-group w-1/2">
                            <label for="exampleFormControlSelect1">Дата и время:</label>
                            <input type="date"
                                class="form-control block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="exampleFormControlFile1" name="sch_movieDate" required>
                        </div>
                        <div class="form-group w-1/2">
                            <input type="time"
                                class="form-control block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="exampleFormControlFile1" name="sch_movieTime" required>
                        </div>
                    </div>
                    <div style="text-align: left;">
                        <button type="submit"
                            class="btn mt-4 text-white bg-[#60B1DE] hover:bg-[#59A1CA] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            name="submit-scheduleCr">Добавить</button>
                    </div>
                </form>
            </div>

            <?php

        }

        ?>

    </div>

</main>


<?php
require "footer.php";
?>