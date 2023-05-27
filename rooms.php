<?php
require "header.php";
?>

<main>

  <div class="container-xl">

    <?php

    //checking URL to display alerts
    $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

    if ($url === "http://localhost/cinema/rooms.php?roomDeleted=success") {

      echo '<div style="max-width: fit-content;" class="mt-4 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
      <span class="font-medium">Зал успешно удален!</span>
          </div>';
    } else if ($url === "http://localhost/cinema/rooms.php?roomDeleted=failed") {

      echo '<div style="max-width: fit-content;" class="mt-4 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
      <span class="font-medium">Не удалось удалить зал, активный сеанс!</span>
    </div>';
    } else if ($url === "http://localhost/cinema/rooms.php?roomEdited=success") {

      echo '<div style="max-width: fit-content;" class="mt-4 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
      <span class="font-medium">Зал успешно изменен!</span>
          </div>';
    } else if ($url === "http://localhost/cinema/rooms.php?roomEdited=failed") {

      echo '<div style="max-width: fit-content;" class="mt-4 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
      <span class="font-medium">Не удалось изменить зал!</span>
    </div>';
    }

    ?>

    <div class="mt-4">
      <h1 class="title uppercase text-[21px] italic font-bold">Доступные залы</h1>
      <div class="mt-4 grid gap-4 grid-cols-3">

        <?php

        include "includes/connectDB.inc.php";

        $query = "SELECT * FROM rooms";

        $result = $conn->query($query);
        $row = mysqli_fetch_assoc($result);

        if ($result->num_rows > 0) {

          foreach ($result as $row) {

        ?>

            <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <?php echo '<img src="data:image;base64,' . base64_encode($row['room_image']) . '" class="w-full h-[200px] object-cover">'; ?>
              <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2"><?php echo $row['roomName']; ?></div>
                <p class="text-gray-700 text-base">
                  <?php echo $row['roomDescription']; ?>
                </p>
              </div>
              <div class="px-6 pt-4 pb-2">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"><?php echo $row['seat_column'] * $row['seat_row'];?> мест</span>
              </div>
              <?php
                if (isset($_SESSION['userId'])) { //Check first if someone is logged in
                  if ($_SESSION['userRole'] == "Administrator") { //than check who logged in
                ?>
              <div class="px-6 flex gap-2 mb-2">
                <a href="createRoom.php?editRoom=<?php echo $row['room_id']; ?>" class="transition text-slate-400 border border-blue-200 px-2 py-1 rounded hover:text-black">Изменить</a>
                <a href="classes/rooms.class.php?deleteRoom=<?php echo $row['room_id']; ?>" class="transition border text-slate-400 border-red-200 px-2 py-1 rounded hover:text-black">Удалить</a>
              </div>
              <?php
                  }
                }
                ?>
            </div>

        <?php
          }
        } else {

          echo '<h3 style="text-align: center;">No rooms are opened!</h3>';
        }

        ?>

      </div>
    </div>
  </div>

</main>


<?php
require "footer.php";
?>