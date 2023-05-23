<?php
require "header.php";
?>

<?php

$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

//check urls to display the correct alert
if ($url === "http://localhost/cinema/createRoom.php?roomCreated=success") {

    echo '<div style="max-width: fit-content;" class="mt-4 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    <span class="font-medium">Зал успешно добавлен!</span>
        </div>';

} else if ($url === "http://localhost/cinema/createRoom.php?roomCreated=failed"){

    echo '<div style="max-width: fit-content;" class="mt-4 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
    <span class="font-medium">Не удалось добавить зал!</span>
  </div>';

}

?>

<main>

    <?php

    if (isset($_GET['editRoom'])) { //check if edit button was pressed and display the edit form

        include "includes/connectDB.inc.php";

        $roomID = $_GET['editRoom'];

        $query = "SELECT * FROM rooms WHERE room_id = $roomID ";

        $result = $conn->query($query);
        $row = mysqli_fetch_assoc($result);

        //show edit form
        echo '
        <div class="mt-8">
        <h1 class="text-center mb-4">Изменить зал</h1>
        <div class="max-w-[500px] mx-auto">
            <form action="classes/rooms.class.php" method="POST" enctype="multipart/form-data">
            <input type="text" style="display: none;" name="room_idH" value="' . $row['room_id'] . '">
            <div class="form-group">
                <input type="text" class="form-control appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="formGroupExampleInput" name="roomName"
                    value="' . $row['roomName'] . '" required>
            </div>
            <div class="form-group mt-4">
                <textarea class="form-control appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="exampleFormControlTextarea1" rows="3"
                    name="roomDescription">' . $row['roomDescription'] . '</textarea> 
            </div>
            <div class="form-group mt-4 flex gap-4 items-center">
                <label for="exampleFormControlFile1">Кол-во:</label>
                <input type="numeric" class="form-control-file appearance-none block w-1/3 bg-gray-200 text-gray-700 border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="exampleFormControlFile1" name="columnNr" value="' . $row['seat_column'] . '" required>
                <input type="numeric" class="form-control-file appearance-none block w-1/3 bg-gray-200 text-gray-700 border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="exampleFormControlFile1" name="rowNr" value="' . $row['seat_row'] . '" required>
            </div>
            <div class="form-group mt-4">
                <label for="exampleFormControlFile1">Выберите изображение:</label><br>
                <div class="text-red-400 max-w-[300px] my-2" role="alert">
                    Если вы меняете данные, изображение должно быть выбрано повторно!
                            </div>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="uploadfile" required>
            </div>
            <div style="text-align: left;">
                <button type="submit" class="btn mt-4 text-white bg-[#60B1DE] hover:bg-[#59A1CA] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" name="submit-roomUp">Изменить</button>
            </div>
        </form>
            ';
    } else { //else show creation form
        echo '
        <div class="mt-8">
        <h1 class="text-center mb-4">Добавить зал</h1>
        <div class="max-w-[500px] mx-auto">
                <form action="classes/rooms.class.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" class="form-control appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="formGroupExampleInput" name="roomName"
                    placeholder="Название зала" required>
            </div>
            <div class="form-group mt-4">
                <textarea class="form-control appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="exampleFormControlTextarea1" rows="3"
                    placeholder="Описание зала" name="roomDescription"></textarea>
            </div>
            <div class="form-group mt-4 flex gap-4 items-center">
                <label for="exampleFormControlFile1">Кол-во:</label>
                <input type="numeric" class="form-control-file appearance-none block w-1/3 bg-gray-200 text-gray-700 border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="exampleFormControlFile1" name="columnNr" placeholder="Рядов" required>
                <input type="numeric" class="form-control-file appearance-none block w-1/3 bg-gray-200 text-gray-700 border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="exampleFormControlFile1" name="rowNr" placeholder="Мест" required>
            </div>
            <div class="form-group mt-4">
                <label for="exampleFormControlFile1">Выберите изображение:</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="uploadfile" required>
            </div>
                <button type="submit" class="btn mt-4 text-white bg-[#60B1DE] hover:bg-[#59A1CA] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="submit-roomCr">Добавить</button>
        </form>
        ';
    }

    ?>

    </div>
    </div>

</main>


<?php
require "footer.php";
?>