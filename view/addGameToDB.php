<?php

    function upload() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            echo("<script>alert('Method does equal post.');</script>");

            if (isset($_FILES['gameImg'])) {

                echo("<script>alert('gameImg is set.');</script>");

                $file = $_FILES['gameImg'];

                // using PHP's "magic constant" (__DIR__) to calculate
                // the img_directory based on this files location
                $img_directory = __DIR__ . "/../model/images/";

                echo("<script>alert('directory: $img_directory');</script>");

                $target_file = $img_directory . basename($file["name"]);

                echo("<script>alert('$target_file');</script>");

                if (move_uploaded_file($file["tmp_name"], $target_file)) {
                    return true;
                } else {
                    return false;
                }

            }

        }
    }
?>

<div>
    <?php if (upload()) {
        $uploaded_img = basename($_FILES['gameImg']['name']);
        $img_path = "model/images/" . $uploaded_img;
        echo("<h3>Game was successfully added to the database. You can now log in and see the new addition &#x1F603;</h3><br>");
        echo("<h5>Here's the information you entered:</h5>
        <div class='inputtedGameInfo text-start'>
            Game Name: " . $_POST['gameName'] . "<br>" .
            "Game Platform: " . $_POST['gamePlatform'] . "<br>" .
            "Game Genre: " . $_POST['gameGenre'] . "<br>" .
            "Release Date: " . $_POST['gameReleaseDate'] . "<br>" .
            "Website URL: " . $_POST['gameWebsiteURL'] . "<br>" .
            "Image: <a href=" . $img_path . ">" . $img_path . "</a><br>" .
            "Game Description: " . $_POST['gameDesc'] .
        '</div>'
        );
    } else {
        echo("<h3>There was an error adding the game to the database.</h3>");
    }
    ?>
</div>