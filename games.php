<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "view/includes/cdnlinks.php" ?>
    </head>

<body class="d-flex flex-column min-vh-100">

<div>

    <?php

        include "view/includes/navbar.php";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $username = filter_input(INPUT_POST, 'username');
            $password = filter_input(INPUT_POST, 'password');
            $action = filter_input(INPUT_POST, 'action');

            switch ($action) {

                case "login":

                    include "model/user_db.php";

                    $match = matchUser($username, $password);

                    if ($match) {
                        include "view/display_games.php";
                        break;
                    } else {
                        include "view/login-form.php";
                        echo("<script>alert('User does not exist or username and/or password are incorrect.');</script>");
                        break;
                    }

                case "edit_game":
                    include "view/edit-game-form.php";
                    break;

                default:
                    include "view/login-form.php";

            }

        } else {
            include "view/login-form.php";
        }

    ?>

</div>
<?php include "view/includes/foot.php" ?>
</body>