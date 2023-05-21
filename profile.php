<?php 
	require "header.php";
?>

<main>
		<div class="container-xl">
		<div class="jumbotron">
			<h1 class="text-xl my-4">Ваши бронирования</h1>
		</div>
		
		<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
		<thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                   	Дата
                </th>
                <th scope="col" class="px-6 py-3">
                    Фильм
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    Зал
                </th>
                <th scope="col" class="px-6 py-3">
                    Место
                </th>
				<th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    Время брони
                </th>
            </tr>
        </thead>

			<?php 
			
				include "includes/createTableProfile.inc.php";

			?>


			</tr>
			</table>
			
			</div>
			
			</main>
			
			<?php 
			require "footer.php";
			?>			