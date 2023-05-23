<?php
require "header.php";
?>

<?php

$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

if ($url === "http://localhost/cinema/addUser.php?userAdded=succes") {

    echo '<div style="max-width: fit-content;" class="mt-4 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    <span class="font-medium">Пользователь успешно добавлен!</span>
        </div>';
} else if ($url === "http://localhost/cinema/addUser.php?userAdded=failed") {

    echo '<div style="max-width: fit-content;" class="mt-4 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
    <span class="font-medium">Не удалось добавить пользователя!</span>
  </div>';
}

?>

<main>

    <div class="mt-8">
        <h1 class="title text-center mb-4">Добавить пользователя</h1>
        <div style="max-width: 50%; margin: auto;">
            <form action="classes/signup.class.php" method="post" id="signup-form" class="w-full max-w-lg">
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="inputFullname">
                            Имя
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                            id="inputFullname" type="text" placeholder="Иван" name="firstname" required>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="inputFullname">
                            Фамилия
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                            id="inputFullname" type="text" placeholder="Иванов" name="lastname" required>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mt-4">
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="inputUsername">
                            Логин
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="inputUsername" type="text" placeholder="login" name="username" required>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="inputPassword4">
                            Пароль
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="inputPassword4" type="password" placeholder="******************" name="password" required>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mt-4 mb-2">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="inputPhone">
                            Телефон
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="inputPhone" type="text" placeholder="+7-(777)-77-77" name="phonenumber" required>
                    </div>
                    <div class="w-full md:w-1/3 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="inputEmail4">
                            Email
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="inputEmail4" type="email" placeholder="ivanov@mail.com" name="email" required>
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="exampleFormControlSelect1">
                            Роль
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="inputGroupSelect01" name="userRole" required>
                                <option value="Customer">Гость</option>
                                <option value="Administrator">Админ</option>
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
                </div>
                <button type="submit" class="mt-4 text-white bg-[#60B1DE] hover:bg-[#59A1CA] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="signup-submit-admin">Добавить</button>
            </form>
        </div>
    </div>
</main>


<?php
require "footer.php";
?>