<?php
require "header.php";
?>

<main>

	<div class="jumbotron mt-8">
		<h1 class="title">Завершенные сеансы</h1>
	</div>

	<div class="container-xl mt-4">

		<div class="mt-4 relative overflow-x-auto shadow-md sm:rounded-lg">
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
							Дата фильма
						</th>
						<th scope="col" class="px-6 py-3">
							Время фильма
						</th>
					</tr>
				</thead>
				<tbody>
					<?php

					include "includes/createCompleSchTable.inc.php";

					?>
				</tbody>

			</table>
		</div>

	</div>

</main>

<?php
require "footer.php";
?>