<?php
require "header.php";
?>

	<?php 
	
	$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

	if ($url === "http://localhost/cinema/bookings.php?bookingCanceled=success") {
		
		echo '<div style="max-width: fit-content;" class="mt-4 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">Бронь отменена!</span>
            </div>';

	} else if ($url === "http://localhost/cinema/bookings.php?bookingCanceled=failed") {
		
		echo '<div style="max-width: fit-content;" class="mt-4 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">Не удалось отменить бронь!</span>
      </div>';

	} else if ($url === "http://localhost/cinema/bookings.php?bookingCompleted=success") {

		echo '<div style="max-width: fit-content;" class="mt-4 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">Бронирование прошло успешно!</span>
            </div>';

	} else if ($url === "http://localhost/cinema/bookings.php?bookingCompleted=failed") {

		echo '<div style="max-width: fit-content;" class="mt-4 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">Бронь не завершена, так как находится в расписании!</span>
      </div>';

	} else if ($url === "http://localhost/cinema/bookings.php?bookingEdited=success") {
		
		echo '<div style="max-width: fit-content;" class="mt-4 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">Бронь успешно обновлена!</span>
            </div>';

	} else if ($url === "http://localhost/cinema/bookings.php?bookingEdited=failed") {
		
		echo '<div style="max-width: fit-content;" class="mt-4 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">Не удалось обновить бронь!</span>
      </div>';

	} else if ($url === "http://localhost/cinema/bookings.php?bookingEdited=null") {
		
		echo '<div style="max-width: fit-content;" class="mt-4 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">Не удалось обновить бронь! Не были выбраны места!</span>
      </div>';

	}
	
	?>
	<div class="jumbotron mt-8">
		<h1 class="title">Брони</h1>
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
                    Дата
                </th>
                <th scope="col" class="px-6 py-3">
                    Пользователь
                </th>
                <th scope="col" class="px-6 py-3">
                    Фильм
                </th>
                <th scope="col" class="px-6 py-3">
                    Место
                </th>
                <th scope="col" class="px-6 py-3">
                    Сеанс
                </th>
                <th scope="col" class="px-6 py-3">
                    Управление бронью
                </th>
            </tr>
        </thead>
        <tbody>
            <?php

                include "includes/createAdminTable.inc.php";

            ?>
        </tbody>
    </table>
</div>
			
			</div>
			
			</main>


<?php
require "footer.php";
?>