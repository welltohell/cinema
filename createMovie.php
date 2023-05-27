<?php
require "header.php";
?>

<main>

<?php
//checking if someone that is not logged in or administrator tries to access the page through url
if(isset($_SESSION['userId'])){
    if($_SESSION['userRole'] == "Administrator"){ //if it is administrator display else display nothing

$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

//check creation and alert
if ($url === "http://localhost/cinema/createMovie.php?movieCreated=success") {
		
		echo '<div style="max-width: fit-content;" class="mt-4 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">Фильм успешно добавлен!</span>
            </div>';

} else if ($url === "http://localhost/cinema/createMovie.php?movieCreated=failed") {

    echo '<div style="max-width: fit-content;" class="mt-4 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
    <span class="font-medium">Не удалось добавить фильм!</span>
  </div>';

} 
//check deletion and alert
else if ($url === "http://localhost/cinema/createMovie.php?movieDeleted=success") {

    echo '<div style="max-width: fit-content;" class="mt-4 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    <span class="font-medium">Фильм успешно удален!</span>
        </div>';

} else if ($url === "http://localhost/cinema/createMovie.php?movieDeleted=failed") {

    echo '<div style="max-width: fit-content;" class="mt-4 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
    <span class="font-medium">Не удалось удалить фильм, он добавлен в сеансы!</span>
  </div>';

} 
//check editetion and alert
else if ($url === "http://localhost/cinema/createMovie.php?movieEdited=success") {

    echo '<div style="max-width: fit-content;" class="mt-4 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    <span class="font-medium">Фильм успешно изменен!</span>
        </div>';

} else if ($url === "http://localhost/cinema/createMovie.php?movieEdited=failed") {

    echo '<div style="max-width: fit-content;" class="mt-4 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
    <span class="font-medium">Не удалось изменить фильм!</span>
  </div>';

}

?>
    <h1 class="title my-4 text-center">Фильмы</h1>

<div class="flex justify-between">

    

    <div class="grid grid-cols-2 gap-8 px-4 overflow-y-auto h-[500px]">

    

        <?php

    include "includes/createAdminMovieC.inc.php";

    ?>

    </div>

    <div class="w-[400px]">


    <?php 
    
    if (isset($_GET['editMovie'])) { //check if edit button was pressed and display the edit form

        include "includes/connectDB.inc.php";

        $movieID = $_GET['editMovie'];

        $query = "SELECT * FROM movies WHERE movie_id = $movieID ";

        $result = $conn->query($query);
        $row = mysqli_fetch_assoc($result);
    
        echo '<h1 class="text-black text-center mb-2">Изменить фильм</h1>
        <div style="">
            <form action="classes/movies.class.php" method="POST" enctype="multipart/form-data">
            <input type="text" style="display: none;" name="movie_idH" value="' . $row['movie_id'] . '">
                <div class="form-group">
                    <input type="text" class="form-control appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="formGroupExampleInput" name="movieName"
                        value="' . $row['movieName'] . '" required>
                </div>
                <div class="form-group my-4">
                    <textarea class="form-control min-h-[200px] form-control appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="exampleFormControlTextarea1" rows="3"
                     name="movieDescription" required>' . $row['movieDescription'] . '</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Выберите изображение:</label><br>
                    <div class="text-red-400 max-w-[300px] my-2" role="alert">
                Если вы меняете данные, изображение должно быть выбрано повторно!
                            </div>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="movieImage" required>
                </div>
                <div style="text-align: left;">
                    <button type="submit" class="mt-4 text-white bg-[#60B1DE] hover:bg-[#59A1CA] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="submit-movieUP">Изменить</button>
                </div>
            </form>
        </div>';
    
    } else {

        echo '<h1 class="title text-black text-center mb-2">Добавить фильм</h1>
        <div style="">
            <form class="text-black" action="classes/movies.class.php" method="POST" enctype="multipart/form-data">
                <div class="form-group mb-4">
                    <input type="text" class="form-control appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="formGroupExampleInput" name="movieName"
                        placeholder="Название фильма" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="exampleFormControlTextarea1" rows="3"
                        placeholder="Описание" name="movieDescription" required></textarea>
                </div>
                <div class="form-group mt-4">
                    <label for="exampleFormControlFile1">Выберите изображение:</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="movieImage" required>
                </div>
                <div style="text-align: left;">
                    <button type="submit" class="mt-4 text-white bg-[#60B1DE] hover:bg-[#59A1CA] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="submit-movieCr">Добавить</button>
                </div>
            </form>
        </div>';

    }

    ?>

    </div>
</div>

<?php 
    } 
}
?>

</main>


<?php
require "footer.php";
?>