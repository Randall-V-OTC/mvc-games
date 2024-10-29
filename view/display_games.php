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
                        <div><form method='POST' action='addgame.php?action=edit_game'>
                            <button class='btn btn-primary'>Edit</button>
                            <input type='hidden' name='gameId' value='$game[0]'>
                            <input type='hidden' name='gameName' value='$game[1]'>
                            <input type='hidden' name='gamePlatform' value='$game[7]'>
                            <input type='hidden' name='gameGenre' value='$game[6]'>
                            <input type='hidden' name='gameReleaseDate' value='$game[3]'>
                            <input type='hidden' name='gameWebsiteURL' value='$game[4]'>
                            <input type='hidden' name='gameImg' value='$game[5]'>
                            <input type='hidden' name='gameDesc' value='$game[2]'>
                        </form></div>
                    </div>");
            } 

        ?>
    </div>
</body>