<?php
require "header.php";
?>

<main class="bg-red">

    <script>

        var element = document.getElementById('inputPhone');
        var maskOptions = {
            mask: '+{7}(000)000-00-00'
        };
        var mask = IMask(element, maskOptions);

        //check url and display alert
        if (window.location.href == "http://localhost/cinema/index.php?login=success") {
            Toastify({
                text: "Вы успешно вошли!",
                duration: 3000,
                newWindow: true,
                close: false,
                gravity: "bottom", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "#5cb85c",
                },
                onClick: function () { } // Callback after click
            }).showToast();
        } else if (window.location.href == "http://localhost/cinema/index.php?login=failed") {
            Toastify({
                text: "Неверный пароль!",
                duration: 3000,
                newWindow: true,
                close: false,
                gravity: "bottom", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "#ff4545",
                },
                onClick: function () { } // Callback after click
            }).showToast();
        } else if (window.location.href == "http://localhost/cinema/index.php?login=notExists") {
            Toastify({
                text: "Пользователь не найден!",
                duration: 3000,
                newWindow: true,
                close: false,
                gravity: "bottom", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "#ff4545",
                },
                onClick: function () { } // Callback after click
            }).showToast();
        }

        if (window.location.href == "http://localhost/cinema/index.php?signup=success") {
            Toastify({
                text: "Вы успешно зарегистрировались!",
                duration: 3000,
                newWindow: true,
                close: false,
                gravity: "bottom", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "#5cb85c",
                },
                onClick: function () { } // Callback after click
            }).showToast();
        } else if (window.location.href == "http://localhost/cinema/index.php?signup=failed") {
            Toastify({
                text: "Ошибка регистрации!",
                duration: 3000,
                newWindow: true,
                close: false,
                gravity: "bottom", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "#ff4545",
                },
                onClick: function () { } // Callback after click
            }).showToast();
        }

        if (window.location.href == "http://localhost/cinema/index.php?signup=userNameExists") {
            Toastify({
                text: "Данный логин уже зарегистрирован!",
                duration: 3000,
                newWindow: true,
                close: false,
                gravity: "bottom", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "#ff4545",
                },
                onClick: function () { } // Callback after click
            }).showToast();
        } else if (window.location.href == "http://localhost/cinema/index.php?signup=emailExists") {
            Toastify({
                text: "Данный email уже зарегистрирован!",
                duration: 3000,
                newWindow: true,
                close: false,
                gravity: "bottom", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "#ff4545",
                },
                onClick: function () { } // Callback after click
            }).showToast();
        }

    </script>


    <div class="mt-[80px] main-content flex justify-beetwen gap-8">
        <div class="main_about max-w-[500px] flex flex-col gap-8 items-left">
            <h1 class="text-[21px] font-bold uppercase">
                Добро пожаловать в кинотеатр Синтез!
            </h1>
            <p class="text-[18px] leading-[25px] max-w-[480px]">
                Мы - уникальный VR-кинотеатр, который позволит вам окунуться в захватывающий мир виртуальной реальности
                и насладиться новым уровнем кинематографического опыта.
            </p>
            <?php
            if (isset($_SESSION['userId'])) {
                echo '<button class="bg-[#A3D8F5] text-white max-w-[150px] p-2 rounded text-[14px] hover:bg-[#59A1CA] transition-all">
                Забронировать
            </button>';
            } else {
                echo '<p class="text-[18px] leading-[25px] max-w-[480px]">
                Зарегистрируйтесь или войдите в свой аккаунт и бронируйте места прямо сейчас!
            </p>';
            }
            ?>
        </div>
        <div class="main_image">
            <img src="images/main.jpg" alt="">
        </div>
    </div>

    <div class="mt-[70px]">

        <div class="jumbotron flex items-center gap-2 mb-4" style="">
            <h1 class="title uppercase text-[21px] italic font-bold">Сеансы</h1>
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                <path fill="currentColor" d="m12 20l-1.425-1.4l5.6-5.6H4v-2h12.175l-5.6-5.6L12 4l8 8l-8 8Z" />
            </svg>
        </div>

        <div class="container-xl">

            <div class="jumbotron">

                <!-- Start cards -->
                <div class="row row-cols-1 row-cols-md-3 grid gap-4 grid-cols-4">

                    <?php

                    include "includes/createIndexMovieCards.inc.php";

                    ?>

                </div>
                <!-- End cards -->

            </div>

            <!-- <?php
            if (isset($_SESSION['userId'])) {
                echo '<h1 class="title">Thank you for choosing us!</h1>
			<p>Book a ticket now and enjoy the best movies out there in good and clean conditions!</p> ';
            } else {
                echo '<h1 class="title">Book a ticket now!</h1>
			<p>You can preorder a ticket for the upcoming movies or you can go to movies and see the movies
			that are playing now!</p>
			<p>But first you have to Sign up and log in!!</p>
			<p>Click <a href="index.php" class="text-decoration-none">here</a> to sign up.</p>';
            }
            ?> -->

        </div>
    </div>

</main>

<?php
require "footer.php";
?>