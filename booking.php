<?php
require "header.php"
    ?>

<main>

    <?php

    $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

    if ($url === "http://localhost/cinema/booking.php?TicketBooked=success") {

        echo '<div style="max-width: fit-content;" class="mt-4 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">Ваши места успешно забронированы!</span>
            </div>';
    } else if ($url === "http://localhost/cinema/booking.php?TicketBooked=failed") {

        echo '<div style="max-width: fit-content;" class="mt-4 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">Не удалось забронировать билет, произошла неизвестная ошибка!</span>
      </div>';
    } else if ($url === "http://localhost/cinema/booking.php?TicketBooked=null") {

        echo '<div style="max-width: fit-content;" class="mt-4 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">Не удалось забронировать билет, вы не выбрали места!</span>
      </div>';
    }

    ?>


    <div class="jumbotron">

        <?php
        //check which button was pressed and display form
        if (isset($_GET['scheduleID'])) { //book now button
        
            $id = $_GET['scheduleID'];

            //connecting to database
            include "includes/connectDB.inc.php";

            $query = "SELECT movies.movieName, rooms.roomName, schedule.startDate, schedule.startHours, schedule.schedule_id
                                        FROM movies
                                        INNER JOIN schedule ON schedule.movie_id = movies.movie_id
                                        INNER JOIN rooms ON schedule.room_id = rooms.room_id
                                        WHERE schedule_id = $id ";

            $result = $conn->query($query);
            $row = mysqli_fetch_assoc($result); ?>

            <div>
                <h1 class="text-center mt-8">Бронирование мест</h1>
                <div class="max-w-[500px] mx-auto mt-4">
                    <form action="classes/booking.class.php" method="POST">

                        <?php
                        //check if administrator is booking and display one more field for the customer input
                        if (isset($_SESSION['userId'])) {
                            if ($_SESSION['userRole'] == "Administrator") {

                                $buttonName = "submit-booking-admin"; //if its the admin we send data with this post name 
                    
                                include "includes/connectDB.inc.php";

                                $selectUser = "SELECT userID, userEmail FROM users"; //select all users emails and ids
                    
                                $result1 = $conn->query($selectUser);
                                $row1 = mysqli_fetch_assoc($result1);

                                ?>
                                <div class="form-group">
                                    <div class="relative">
                                        <select
                                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            id="inputGroupSelectCustomer" name="customer" required>
                                            <option value="" disabled selected>Выберите пользователя</option>
                                            <?php

                                            if ($result1->num_rows > 0) {

                                                foreach ($result1 as $row1) { //display users emails with value their id
                                
                                                    echo '<option value="' . $row1['userID'] . '">' . $row1['userEmail'] . '</option>';

                                                }
                                            }

                                            ?>
                                        </select>
                                        <div
                                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <?php

                            } else {

                                $buttonName = "submit-booking"; //if its the customer we send data with this post name 
                    
                            }
                        }
                        ?>

                        <div class="form-group mt-4 flex items-end gap-4">
                            <div class="relative w-2/3">
                                <select
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="inputGroupSelectMovie" name="movie" required>
                                    <option value="<?php echo $row['movieName']; ?>" selected><?php echo $row['movieName']; ?></option>
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="w-1/3">
                                <select
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="inputGroupSelectRoom" name="room" required>
                                    <option value="<?php echo $row['roomName']; ?>" selected><?php echo $row['roomName']; ?>
                                    </option>
                                </select>
                            </div>

                        </div>

                        <div class="form-group mt-4 flex items-end gap-4">
                            <div class="form-group w-full">
                                <select
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="inputGroupSelectDate" name="date" required>
                                    <option value="<?php echo $row['startDate']; ?>" selected><?php echo $row['startDate']; ?></option>
                                </select>
                            </div>
                            <div class="form-group w-full">
                                <select
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="inputGroupSelectTime" name="hours" required>
                                    <option value="<?php echo $row['startHours']; ?>" selected><?php echo $row['startHours']; ?>
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <div id="teatre-vision">
                                <svg width="500" height="88" viewBox="0 0 1028 88" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 88V35C2 35 195 2 514 2C833 2 1026 35 1026 35V88H2Z"
                                        fill="url(#paint0_linear)" style=""></path>
                                    <path d="M2 35C2 35 193 2.5 514 2.5C835 2.5 1026 35 1026 35" stroke="#60B1DE"
                                        stroke-width="4" stroke-linecap="round"></path>
                                    <defs>
                                        <linearGradient id="paint0_linear" x1="514" y1="2" x2="514" y2="69.5"
                                            gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#60B1DE"></stop>
                                            <stop offset=".01" stop-color="#60B1DE" stop-opacity=".5"></stop>
                                            <stop offset="1" stop-color="#2A2A2A" stop-opacity="0"></stop>
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>

                            <div class="theatre" id="createSeats">

                            </div>
                        </div>
                        <div style="text-align: left;"><button type="submit"
                                class="bg-[#60B1DE] rounded-[8px] text-white px-4 mt-4 py-2 hover:bg-[#59A1CA] text-sm"
                                name="<?php echo $buttonName; ?>">Забронировать</button></div>
                    </form>
                </div>
            </div>

            <?php
        } else if (isset($_GET['editBooking'])) { //edit button
        
            $id = $_GET['editBooking'];

            include "includes/connectDB.inc.php";

            $query = "SELECT movies.movieName, rooms.roomName, schedule.startDate, schedule.startHours, booking.booking_id
                                        FROM movies
                                        INNER JOIN schedule ON schedule.movie_id = movies.movie_id
                                        INNER JOIN rooms ON schedule.room_id = rooms.room_id
                                        INNER JOIN booking ON booking.schedule_id = schedule.schedule_id
                                        WHERE booking_id = $id ";

            $result = $conn->query($query);
            $row = mysqli_fetch_assoc($result);

            //a query that selects scheduled movies so we have options to update the booking
            $query2 = "SELECT movieName FROM movies, schedule WHERE schedule.movie_id = movies.movie_id";

            $result2 = $conn->query($query2);
            $row2 = mysqli_fetch_assoc($result2); ?>

                <div>
                    <h1 class="text-center mt-8">Обновление билета</h1>
                    <div class="max-w-[500px] mx-auto">
                        <form action="classes/booking.class.php" method="POST">
                            <!-- send this old data without displaying them as we need them to manipulate the seats from database -->
                            <input type="text" style="display: none;" name="booking_idH"
                                value="<?php echo $row['booking_id']; ?>">
                            <input type="text" style="display: none;" name="oldSeatID_H" value="<?php echo $_GET['seatID']; ?>">
                            <input type="text" style="display: none;" name="oldDate_H" value="<?php echo $_GET['oldDate']; ?>">
                            <input type="text" style="display: none;" name="oldTime_H" value="<?php echo $_GET['oldTime']; ?>">
                            <input type="text" style="display: none;" name="oldRoom_H" value="<?php echo $_GET['oldRoom']; ?>">
                            <input type="text" style="display: none;" name="oldSeat_H" value="<?php echo $_GET['oldSeat']; ?>">
                            <div class="form-group mt-4 flex items-end gap-4">
                                <div class="relative w-2/3">
                                    <select
                                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="inputGroupSelectMovie" name="movie" required>
                                        <option value="<?php echo $row['movieName']; ?>" selected><?php echo $row['movieName']; ?></option>
                                        <?php
                                        if ($result2->num_rows > 0) {

                                            foreach ($result2 as $row2) {

                                                echo '<option value="' . $row2['movieName'] . '">' . $row2['movieName'] . '</option>';
                                            }
                                        } ?>
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="form-group w-1/3">
                                    <select
                                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="inputGroupSelectRoom" name="room" required>
                                        <option value="<?php echo $row['roomName']; ?>" selected><?php echo $row['roomName']; ?>
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex items-end gap-4 mt-4">
                                <div class="form-group w-1/2">
                                    <select
                                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="inputGroupSelectDate" name="date" required>
                                        <option value="<?php echo $row['startDate']; ?>" selected><?php echo $row['startDate']; ?> </option>
                                    </select>
                                </div>
                                <div class="form-group w-1/2">
                                    <select
                                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="inputGroupSelectTime" name="hours" required>
                                        <option value="<?php echo $row['startHours']; ?>" selected><?php echo $row['startHours']; ?>
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mt-4">
                                <div class="theatre" id="createSeats">

                                </div>
                            </div>
                            <div style="text-align: left;"><button type="submit"
                                    class="bg-[#60B1DE] rounded-[8px] text-white px-4 mt-4 py-2 hover:bg-[#59A1CA] text-sm"
                                    name="submit-bookingUp">Обновить</button></div>
                        </form>
                    </div>
                </div>
            <?php
        } else { //no button pressed
        
            include "includes/connectDB.inc.php";

            //select all the movies that are scheduled 
            $query = "SELECT movieName FROM movies, schedule WHERE schedule.movie_id = movies.movie_id";

            $result = $conn->query($query);
            $row = mysqli_fetch_assoc($result);

            ?>

                <div>
                    <h1 class="text-center mt-8">Бронирование мест</h1>
                    <div class="max-w-[500px] mx-auto mt-4">
                        <form action="classes/booking.class.php" method="post">

                            <?php
                            //check if administrator is booking and display one more field for the customer input
                            if (isset($_SESSION['userId'])) {
                                if ($_SESSION['userRole'] == "Administrator") {

                                    $buttonName = "submit-booking-admin"; //if its the admin we send data with this post name 
                        
                                    include "includes/connectDB.inc.php";

                                    $selectUser = "SELECT userID, userEmail, userFirstName, userLastName FROM users"; //select all users emails and ids
                        
                                    $result1 = $conn->query($selectUser);
                                    $row1 = mysqli_fetch_assoc($result1);

                                    ?>
                                    <div class="form-group">
                                        <div class="relative">
                                            <select
                                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                id="inputGroupSelectCustomer" name="customer" required>
                                                <option value="" disabled selected>Выберите пользователя</option>
                                                <?php

                                                if ($result1->num_rows > 0) {

                                                    foreach ($result1 as $row1) { //display users emails with value their id
                                    
                                                        echo '<option value="' . $row1['userID'] . '">' . $row1['userEmail'] . '</option>';

                                                    }
                                                }

                                                ?>
                                            </select>
                                            <div
                                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>

                                <?php

                                } else {

                                    $buttonName = "submit-booking"; //if its the customer we send data with this post name 
                        
                                }
                            }
                            ?>

                            <div class="form-group mt-4 flex items-end gap-4">
                                <div class="relative w-2/3">
                                    <select
                                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="inputGroupSelectMovie" name="movie" required>
                                        <option value="" disabled selected>Выберите фильм</option>
                                        <?php
                                        if ($result->num_rows > 0) {

                                            foreach ($result as $row) {

                                                echo '<option value="' . $row['movieName'] . '">' . $row['movieName'] . '</option>';
                                            }
                                        } ?>

                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="w-1/3">
                                    <select
                                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="inputGroupSelectRoom" name="room" required>
                                        <!-- We need this to be selected and have a value for a php check -->
                                        <option value="nothing" selected>Зал</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group mt-4 flex items-end gap-4">
                                <select
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="inputGroupSelectDate" name="date" required>
                                    <option value="" disabled selected>Дата</option>
                                </select>
                                <select
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="inputGroupSelectTime" name="hours" required>
                                    <option value="" disabled selected>Время</option>
                                </select>
                            </div>
                            <div class="form-group mt-4">
                                <div id="teatre-vision" class="hidden">
                                    <svg width="500" height="88" viewBox="0 0 1028 88" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2 88V35C2 35 195 2 514 2C833 2 1026 35 1026 35V88H2Z"
                                            fill="url(#paint0_linear)" style=""></path>
                                        <path d="M2 35C2 35 193 2.5 514 2.5C835 2.5 1026 35 1026 35" stroke="#60B1DE"
                                            stroke-width="4" stroke-linecap="round"></path>
                                        <defs>
                                            <linearGradient id="paint0_linear" x1="514" y1="2" x2="514" y2="69.5"
                                                gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#60B1DE"></stop>
                                                <stop offset=".01" stop-color="#60B1DE" stop-opacity=".5"></stop>
                                                <stop offset="1" stop-color="#2A2A2A" stop-opacity="0"></stop>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>

                                <div class="theatre" id="createSeats">



                                </div>
                            </div>
                            <div style="text-align: left;">
                                <button type="submit"
                                    class="bg-[#60B1DE] rounded-[8px] text-white px-4 mt-4 py-2 hover:bg-[#59A1CA] text-sm"
                                    name="<?php echo $buttonName; ?>">Забронировать</button>
                            </div>
                        </form>

                    <?php
        }

        ?>

            </div>
        </div>
    </div>

</main>

<script src="ajaxTicket.js"></script>
<!-- link js file with ajax -->

<?php
require "footer.php"
    ?>