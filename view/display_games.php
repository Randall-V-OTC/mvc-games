<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "view/includes/cdnlinks.php" ?>
    </head>

<body class="d-flex flex-column min-vh-100">
    <div class="page-contents">
        <?php

            include "model/game_db.php";

            $games = getGames();

            foreach ($games as $game) {
                echo("<div class='mainGameDiv'>
                        <div class='gameImg'><img src='$game[1]'></div>
                        <div class='gameTitle'><h3><a href='$game[3]' target='_blank'>$game[0]</a></h3></div>
                        <div class='gameDesc'>$game[2]</div>
                        <div class='gamePlatform'>Platform: $game[4]</div>
                        <div class='gameGenre'>Genre: $game[5]</div>
                    </div>");
            } 

        ?>
    </div>
</body>