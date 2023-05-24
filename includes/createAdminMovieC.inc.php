<?php

//connecting to database
include "includes/connectDB.inc.php";

$query = "SELECT * FROM movies";

$result = $conn->query($query);
$row = mysqli_fetch_assoc($result);

if ($result->num_rows > 0) {

  foreach ($result as $row) {

    ?>

    <div class="movie-card w-min">
      <?php echo '<img src="data:image;base64,' . base64_encode($row['movieImage']) . '" class="w-full h-[240px] object-fill object-left rounded-xl">'; ?>
      <div class="py-2">
        <div class="font-bold text-xl mb-2 h-[80px]">
          <?php echo $row['movieName']; ?>
        </div>
      </div>
      <div class="flex gap-2">
        <a href="createMovie.php?editMovie=<?php echo $row['movie_id']; ?>"
          class="transition text-slate-400 border border-blue-200 px-2 py-1 rounded hover:text-black">Изменить</a>
        <a href="classes/movies.class.php?delete=<?php echo $row['movie_id']; ?>"
          class="transition border text-slate-400 border-red-200 px-2 py-1 rounded hover:text-black">Удалить</a>
      </div>
    </div>

    <?php
  }

} else {

  echo '<h3 style="color: white; text-align: center;">No movies</h3>';

}