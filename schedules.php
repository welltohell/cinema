<?php
require "header.php";
?>

	<?php 
	
	$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

	if ($url === "http://localhost/cinema/schedules.php?scheduleCanceled=success") {

        echo '<div style="max-width: fit-content;" class="mt-4 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">Сеанс успешно отменен!</span>
            </div>';

    } else if ($url === "http://localhost/cinema/schedules.php?scheduleCanceled=failed") {

		echo '<div style="max-width: fit-content;" class="mt-4 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">Не удалось отменить сеанс, он забронирован!</span>
      </div>';

	} else if ($url === "http://localhost/cinema/schedules.php?scheduleEdited=success"){

		echo '<div style="max-width: fit-content;" class="mt-4 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">Сеанс успешно изменен!</span>
            </div>';

	} else if ($url === "http://localhost/cinema/schedules.php?scheduleEdited=failed") {

		echo '<div style="max-width: fit-content;" class="mt-4 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">Не удалось обновить сеанс!</span>
      </div>';

	} else if ($url === "http://localhost/cinema/schedules.php?scheduleCompleted=success") {

		echo '<div style="max-width: fit-content;" class="mt-4 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">Сеанс успешно завершен!</span>
            </div>';

	} else if ($url === "http://localhost/cinema/schedules.php?scheduleCompleted=failed") {

		echo '<div style="max-width: fit-content;" class="mt-4 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">Не удалось завершить сеанс, он забронирован!</span>
      </div>';

	}
	
	?>

    <div class="jumbotron mt-8">
		<h1 class="title">Сеансы</h1>
	</div>
	<div class="container-xl mt-4">

            
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Фильм
                </th>
                <th scope="col" class="px-6 py-3">
                    Зал
                </th>
                <th scope="col" class="px-6 py-3">
                    Мест
                </th>
                <th scope="col" class="px-6 py-3">
                    Дата
                </th>
                <th scope="col" class="px-6 py-3">
                    Время
                </th>
                <th scope="col" class="px-6 py-3">
                    Управление сеансом
                </th>
            </tr>
        </thead>
        <tbody>
            <?php

                include "includes/createScheduleTable.inc.php";

            ?>
        </tbody>
    </table>
</div>
			
			</div>

			
			</main>


<?php
require "footer.php";
?>