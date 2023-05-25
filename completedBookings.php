<?php
require "header.php";
?>


<main>

	<div class="container-xl mt-8">
		<div class="jumbotron">
			<h1 class="title">Завершенные бронирования</h1>
		</div>

		<div class="mt-4 relative overflow-x-auto shadow-md sm:rounded-lg">
			<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
				<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
					<tr>
						<th scope="col" class="px-6 py-3">
							Id
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
							Дата
						</th>
					</tr>
				</thead>
				<tbody>
					<?php

					include "includes/createCompleBookTable.inc.php";

					?>
				</tbody>

			</table>
		</div>

	</div>

</main>

<?php
require "footer.php";
?>