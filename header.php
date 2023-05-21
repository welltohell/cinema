<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<title>СИНТЕЗ</title>
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
		integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
		rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="stylingWeb1.css">
	<script src="https://kit.fontawesome.com/9f11db8bcf.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"
		integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
	<script src="https://cdn.tailwindcss.com"></script>
	<script src="https://unpkg.com/imask"></script>

</head>

<body>

	<header x-data="{ login: false, register: false }">
		<!-- Login modal -->
		<div x-show="login"
			class="fixed flex items-center top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[100%] max-h-full bg-black bg-opacity-50">
			<div class="relative m-auto w-full max-w-md max-h-full">
				<!-- Modal content -->
				<div x-show="login" x-transition @click.away="login = false"
					class="relative bg-white rounded-lg shadow dark:bg-gray-700">
					<button type="button"
						class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
						<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
							xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd"
								d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
								clip-rule="evenodd"></path>
						</svg>
						<span class="sr-only">Закрыть</span>
					</button>
					<div class="px-6 py-6 lg:px-8">
						<form class="space-y-6" action="classes/login.class.php" method="post">
							<div>
								<label for="username"
									class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ваш
									логин</label>
								<input type="text" name="Lusername" id="username"
									class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
									placeholder="" required>
							</div>
							<div>
								<label for="Lpassword"
									class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ваш
									пароль</label>
								<input type="password" name="Lpassword" id="Lpassword" placeholder=""
									class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
									required>
							</div>
							<button type="submit" name="login-submit"
								class="w-full text-white bg-[#60B1DE] hover:bg-[#59A1CA] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Войти</button>
							<div class="text-sm font-medium text-gray-500">
								Нет аккаунта? <a @click="login = false , register = !register"
									class="cursor-pointer text-[#60B1DE] hover:underline">Зарегистрироваться</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Register modal -->
		<div x-show="register"
			class="fixed flex items-center top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[100%] max-h-full bg-black bg-opacity-50">
			<div class="relative m-auto w-full max-w-md max-h-full">
				<!-- Modal content -->
				<div x-show="register" x-transition @click.away="register = false"
					class="relative bg-white rounded-lg shadow dark:bg-gray-700">
					<button type="button"
						class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
						<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
							xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd"
								d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
								clip-rule="evenodd"></path>
						</svg>
						<span class="sr-only">Закрыть</span>
					</button>
					<div class="px-6 py-6 lg:px-8">
						<form class="space-y-6" action="classes/signup.class.php" method="post">
							<div>
								<label for="inputFullname"
									class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Имя</label>
								<input type="text" name="firstname" id="inputFullname"
									class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
									placeholder="" required>
							</div>
							<div>
								<label for="inputFullname"
									class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Фамилия</label>
								<input type="text" name="lastname" id="inputFullname"
									class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
									placeholder="" required>
							</div>
							<div>
								<label for="inputEmail4"
									class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
								<input type="email" name="email" id="inputEmail4"
									class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
									placeholder="" required>
							</div>
							<div>
								<label for="username"
									class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Логин</label>
								<input type="text" name="username" id="username"
									class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
									placeholder="" required>
							</div>
							<div>
								<label for="inputPassword4"
									class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Пароль</label>
								<input type="password" name="password" id="inputPassword4" placeholder=""
									class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
									required>
							</div>
							<div>
								<label for="inputPhone"
									class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Телефон</label>
								<input type="text" name="phonenumber" id="inputPhone" placeholder=""
									class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
									required>
							</div>
							<button type="submit" name="signup-submit"
								class="w-full text-white bg-[#60B1DE] hover:bg-[#59A1CA] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Зарегистрироваться</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<nav class="h-[80px] justify-between bg-white flex items-center px-[140px]">
			<div class="nav-side flex items-center gap-8">
				<div class="logo text-[21px] font-bold">
					<a href="index.php">
						СИНТЕЗ
					</a>
				</div>
				<ul class="flex gap-6 text-[#6E6D7A]">
					<li>
						<a class="hover:text-black" href="index.php">Главная</a>
					</li>
					<li>
						<a class="hover:text-black" href="rooms.php">Комнаты</a>
					</li>
					<?php
					if (isset($_SESSION['userId'])) {
						if ($_SESSION['userRole'] == "Administrator" || $_SESSION['userRole'] == "Customer") {
							echo
								'<li>
								<a class="hover:text-black" href="booking.php">Билеты</a>
							</li>';
						}
						if ($_SESSION['userRole'] == "Customer") {
							echo
								'<li>
								<a class="hover:text-black" href="profile.php">Профиль</a>
							</li>';
						}
						if ($_SESSION['userRole'] == "Administrator") {
							echo
								'<li x-data="{ manage: false }">
							<a @click="manage = !manage" class="cursor-pointer hover:text-black">Управление</a>
							<div x-show="manage" x-transition @click.away="manage = false"
								class="drop-down absolute bg-white z-10 border border-slate-100 rounded">
								<div class="flex flex-col gap-1 py-2">
									<a href="addUser.php" class="px-2 hover:bg-slate-100">Добавить пользователя</a>
									<a href="createMovie.php" class="px-2 hover:bg-slate-100">Добавить фильм</a>
									<a href="createRoom.php" class="px-2 hover:bg-slate-100">Добавить зал</a>
									<a href="createSchedule.php" class="px-2 hover:bg-slate-100">Добавить расписание</a>
									<a href="schedules.php" class="px-2 hover:bg-slate-100">Расписание</a>
									<a href="bookings.php" class="px-2 hover:bg-slate-100">Брони</a>
								</div>
							</div>
							<!-- dropdown -->
							</li>';
						}
						if ($_SESSION['userRole'] == "Administrator") {
							echo
								'<li x-data="{ history: false }">
							<a @click="history = !history" class="cursor-pointer hover:text-black">История</a>
							<div x-show="history" x-transition @click.away="history = false"
								class="drop-down absolute bg-white z-10 border border-slate-100 rounded">
								<div class="flex flex-col gap-1 py-2">
									<a href="completedBookings.php" class="px-2 hover:bg-slate-100">Завершенные
										бронирования</a>
									<a href="completedSchedules.php" class="px-2 hover:bg-slate-100">Завершенные сеансы</a>
									<a href="canceledBookings.php" class="px-2 hover:bg-slate-100">Отмененные
										бронирования</a>
									<a href="canceledSchedules.php" class="px-2 hover:bg-slate-100">Отмененные сеансы</a>
								</div>
							</div>
							<!-- dropdown -->
						</li>';
						}
					}
					?>
				</ul>
			</div>
			<div class="btns-side flex items-center gap-4">
				<?php
				if (isset($_SESSION['userId'])) {
					echo
						'
					<div class="text-black">
						<p class="text-black"> Приветствуем, '
						. $_SESSION['name'] .
						'!</p>
					</div>
					<div class="">
					<a href="includes/logout.inc.php">Выйти</a>
					</div>
					';
				} else {
					echo '
					<button @click="login = !login" class="bg-[#60B1DE] rounded-[8px] text-white px-[24px] py-2 hover:bg-[#59A1CA]">
					Войти
					</button>
					<div class="text-[#6E6D7A]">
						<a class="cursor-pointer" @click="register = !register">Регистрация</a>
					</div>
					';
				}
				?>
			</div>
		</nav>

	</header>

	<div class="h-[25px] bg-[#F5F5F5]">

	</div>

	<div class="max-w-[1052px] m-auto">