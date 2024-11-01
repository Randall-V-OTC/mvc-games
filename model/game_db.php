<?php

    $host = "localhost";
    $db = "video_games";
    $user = "root";
    $pass = "";
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8";

    // grabs the games that exist in the csv file (deprecated - now use sql method below)
    function getGamesCSV() {

        $file = fopen("model/game_data.csv", "rb");

        if (!$file) {
            die("Error opening $file");
        }

        //this skips the first line of the csv file so the page doesn't try to read the file headers
        fgetcsv($file);

        while (!feof($file)) {
            $game = fgetcsv($file);
            if (!$game) continue;
            $games[] = $game;
        }

        return $games;

    }

    // grabs the games that exist in the sql database using the above db information
    function getGames() {

        // grab the global scope of these vars
        global $dsn, $user, $pass;

        // try catch to try and create a new PDO object to work with the db and catch any errors.
        try {

            $db = new PDO($dsn, $user, $pass);

        }
        catch (PDOException $ex) {
            echo("<script>console.log('PDOException in game_db.php : getGames() - $ex->getMessage');</script>");
            die("Connection failed in game_db.php : getGames() - $ex->getMessage");
        }

        // initial query to select all entries from the games table
        $init_qry = "SELECT * FROM `game`";

        // submit the above query
        $qry_statement = $db->query($init_qry);

        // fetch all of the returned results from the above submit
        return $qry_statement->fetchAll();

    }

    function submitToDatabase() {

        global $db;
        global $dsn;
        global $user;
        global $pass;

        try {

            $db = new PDO($dsn, $user, $pass);

        }
        catch (PDOException $ex) {
            echo("<script>console.log('game_db.php Error: $ex->getMessage');</script>");
            die("Connection failed: " . $ex.getMessage());
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // grab all of the passed fields
            $gameId = $_POST['gameId'];
            $gameName = $_POST['gameName'];
            $gamePlatform = $_POST['gamePlatform'];
            $gameGenre = $_POST['gameGenre'];
            $gameReleaseDate = $_POST['gameReleaseDate'];
            $gameWebsiteURL = $_POST['gameWebsiteURL'];
            $gameDesc = $_POST['gameDesc'];

            $edit = $_GET['action'] == "update_game" ? "update_game" : "";

            // proper way to handle the passed images directory location
            $target_dir = "../model/images/";
            $gameImg = basename($_FILES["gameImg"]["name"]);
            $target_file = $target_dir . $gameImg; // pass this to the game_img_url in our db

            // debugging
            //echo("<script>alert('gameImg is set.');</script>");

            $file = $_FILES['gameImg'];
            $imgName = $file['name'];

            // using PHP's "magic constant" (__DIR__) to calculate
            // the img_directory based on this files location
            $img_directory = __DIR__ . "/../model/images/";

            // debugging
            //echo("<script>alert('directory: $img_directory');</script>");

            $target_file = $img_directory . basename($file["name"]);

            // if this is an edit_game instead of add game then go here first
            if ($edit === "update_game") {

                if ($imgName === '') {
                    $update_query = "UPDATE `game` SET `game_name` = '$gameName', `game_description` = '$gameDesc', 
                `game_website_url` = '$gameWebsiteURL', `game_genre` = '$gameGenre', 
                `game_platform` = '$gamePlatform' WHERE `game`.`game_id` = $gameId; ";
                } else {
                    $update_query = "UPDATE `game` SET `game_name` = '$gameName', `game_description` = '$gameDesc', 
                    `game_website_url` = '$gameWebsiteURL', `game_img_url` = 'model/images/$imgName', 
                    `game_genre` = '$gameGenre', `game_platform` = '$gamePlatform' WHERE `game`.`game_id` = $gameId; ";
                }

                //echo("<script>alert('update?');</script>");

                try {

                    $result = $db->query($update_query);

                    return true;

                }
                catch (PDOException $ex) {
                    echo("Error updating game -> game_db.php -> submitToDatabse(): " . $ex->getMessage());
                }
                return false;

            }

            // insert query to insert our newly filled out form information to our database
            $insert_qry = "INSERT INTO `game` (`game_name`, `game_description`, `game_release_date`, `game_website_url`, 
            `game_img_url`, `game_genre`, `game_platform`) VALUES ('$gameName', '$gameDesc', '$gameReleaseDate', 
            '$gameWebsiteURL', 'model/images/$imgName', '$gameGenre', '$gamePlatform');";

            // debugging
            //echo($insert_qry);

            try {

                // query the db using our insert query to add the game
                $result = $db->query($insert_qry);

                // make a new query to query the db where the game name is the newly inputted game
                $check_qry = "SELECT * FROM `game` WHERE game_name = '$gameName';";

                // submit the query from above
                $check_qry_statement = $db->query($check_qry);

                // fetch the submitted query results
                $check_qry_result = $check_qry_statement->fetch();

                //echo("<script>alert('$target_file');</script>");

                // if our returned query game name is equal to the one we just submitted, then we know the db was updated
                if ($check_qry_result['game_name'] === $gameName) {
                    return true;
                } else {
                    return false;
                }
            }
            catch(PDOException $ex) {
                if (str_contains($ex->getMessage(), "Duplicate")) {
                    echo("<div class='duplicateEntry'>
                        <h4>That game already exists in the database. &#x1F643;</h4>
                    </div>");
                }
                die();
            }

        }

    }


    // put this method in the game_db.php file and then include that php file so we can keep the mvc format (this needs to go in the model folder since it's directly working with data)
    function upload() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // debugging
            //echo("<script>alert('Method does equal post.');</script>");

            if (isset($_FILES['gameImg'])) {

                //----------------------- DELETE BELOW??????
                // if ($_POST['action'] === "edit_game") {

                //     echo("<script>Game updated!</script>");

                //     return true;

                // }
                //--------------------- END DELETE?????

                // debugging
                //echo("<script>alert('gameImg is set.');</script>");

                $file = $_FILES['gameImg'];

                // using PHP's "magic constant" (__DIR__) to calculate
                // the img_directory based on this files location
                $img_directory = __DIR__ . "/../model/images/";

                //echo("<script>alert('directory: $img_directory');</script>");

                $target_file = $img_directory . basename($file["name"]);

                //echo("<script>alert('$target_file');</script>");

                if ($_GET['action'] === 'update_game') {

                    try {

                        // submit to the db
                        submitToDatabase();

                    }
                    catch (PDOExcaption $ex) {
                        echo("<script>console.log('game_db.php : upload() - $ex->getMessage');</script>");
                    }
                    return true;
                } else {

                    if (move_uploaded_file($file["tmp_name"], $target_file)) {

                        try {

                            // submit to the db
                            submitToDatabase();

                        }
                        catch (PDOExcaption $ex) {
                            echo("<script>console.log('game_db.php : upload() - $ex->getMessage');</script>");
                        }

                        return true;
                    } else {
                        return false;
                    }
                }
                return false;

            }

        }
    }

?>