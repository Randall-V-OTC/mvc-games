<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "view/includes/cdnlinks.php" ?>
    </head>
<body class="d-flex flex-column min-vh-100">
    <?php include "view/includes/navbar.php" ?>

    <h1 class="text-center">Add A Game</h1>

    <div class="page-contents text-center">

        <?php 
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {

                include "view/add-game-form.php"; 

            } else {

                include "view/addGameToDB.php";

                $host = "localhost";
                $db = "video_games";
                $user = "root";
                $pass = "";

                try {

                    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);

                }
                catch (PDOException $ex) {
                    die("Couldn't connect" . $ex->getMessage());
                }

                

            }
        ?>

    </div>

    <?php include "view/includes/foot.php" ?>
</body>
</html>