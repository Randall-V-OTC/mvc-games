<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "view/includes/cdnlinks.php" ?>
    </head>

<body class="d-flex flex-column min-vh-100">

    <div class="text-center page-title">
        <h1>Games</h1>
    </div>

    <div class="page-contents-grid">
        <?php

            include "model/game_db.php";
            include "view/includes/functions.php";

            $games = getGames();

            foreach ($games as $game) {
                //$gamePlat = $game[7] = determineIcon(null) ? determineIcon($game[7]) : "";
                echo("<div class='mainGameDiv'>
                        <div class='gameImg text-center'><img src='$game[5]'></div>
                        <div class='gameTitle'><h3><a href='$game[4]' target='_blank'>$game[1]</a></h3></div>
                        <div class='gamePlatform'>Platform: <img class='platIcon' src='" . determineIcon($game[7])  . "' title='$game[7]'></img></div>
                        <div class='gameGenre'>Genre: $game[6]</div>
                        <div class='gameDesc'>$game[2]</div>
                    </div>");
            } 

        ?>
    </div>
</body>