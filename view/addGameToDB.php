<?php
    include "model/game_db.php";
?>

<div>
    <?php if (upload()) {
        $uploaded_img = basename($_FILES['gameImg']['name']);
        $img_path = "model/images/" . $uploaded_img;
        if ($uploaded_img === '') {
            $img_path = $_POST['gameImgUpdate'];
        }
        
        if ($_GET['action'] === 'update_game') {
            echo("<h3>Game was successfully updated. You can now <a href='games.php'>log in</a> and see the new details. &#x1F603;</h3><br>");
            echo("<h5>Here's the updated game information:</h5>
            <div class='updatedGameInfo text-start'>
                Game Name: " . $_POST['gameName'] . "<br>" .
                "Game Platform: " . $_POST['gamePlatform'] . "<br>" .
                "Game Genre: " . $_POST['gameGenre'] . "<br>" .
                "Release Date: " . $_POST['gameReleaseDate'] . "<br>" .
                "Website URL: " . $_POST['gameWebsiteURL'] . "<br>" .
                "Image: <a href=" . $img_path . ">" . $img_path . "</a><br>" .
                "Game Description: " . $_POST['gameDesc'] .
            "</div>"
            );
        } else {

            echo("<h3>Game was successfully added to the database. You can now <a href='games.php'>log in</a> and see the new addition. &#x1F603;</h3><br>");
            echo("<h5>Here's the information you entered:</h5>
            <div class='inputtedGameInfo text-start'>
                Game Name: " . $_POST['gameName'] . "<br>" .
                "Game Platform: " . $_POST['gamePlatform'] . "<br>" .
                "Game Genre: " . $_POST['gameGenre'] . "<br>" .
                "Release Date: " . $_POST['gameReleaseDate'] . "<br>" .
                "Website URL: " . $_POST['gameWebsiteURL'] . "<br>" .
                "Image: <a href=" . $img_path . ">" . $img_path . "</a><br>" .
                "Game Description: " . $_POST['gameDesc'] .
            "</div>"
            );
        }
    } else {
        if ($_GET['action'] === 'update_game') {
            echo("<h3>There was an error updating the game.</h3>");
        } else {
            echo("<h3>There was an error adding the game to the database.</h3>");
        }
    }
    ?>
</div>