<?php
require "header.php";
?>

	<?php 
	
	$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

	if ($url === "http://localhost/cinema/schedules.php?scheduleCanceled=success") {

        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Schedule canceled successfully!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';

    } else if ($url === "http://localhost/cinema/schedules.php?scheduleCanceled=failed") {

		echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		Schedule did not cancel, It is booked by a customer!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';

	} else if ($url === "http://localhost/cinema/schedules.php?scheduleEdited=success"){

		echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
		Schedule updated!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';

	} else if ($url === "http://localhost/cinema/schedules.php?scheduleEdited=failed") {

		echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		Schedule did not update, Unknown error occured!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';

	} else if ($url === "http://localhost/cinema/schedules.php?scheduleCompleted=success") {

		echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Schedule completed!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';

	} else if ($url === "http://localhost/cinema/schedules.php?scheduleCompleted=failed") {

		echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		Schedule did not complete, as it is booked by a customer!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';

	}
	
	?>

<div class="jumbotron">
		<h1 class="title">Список расписаний</h1>
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
                    Изменить
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