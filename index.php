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
                text: "Вы успешно вошл!",
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

    <div class="jumbotron">

        <div class="jumbotron" style="">
            <h1 class="title">Scheduled Movies</h1>
        </div>

        <div class="container-xl">

            <div class="jumbotron">

                <!-- Start cards -->
                <div class="row row-cols-1 row-cols-md-3 grid gap-4 grid-cols-3">

                    <?php

                    include "includes/createIndexMovieCards.inc.php";

                    ?>

                </div>
                <!-- End cards -->

            </div>

            <?php
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
            ?>

        </div>
    </div>

</main>

<?php
require "footer.php";
?>