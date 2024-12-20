<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "view/includes/cdnlinks.php" ?>
    </head>
<body class="d-flex flex-column min-vh-100">
    <?php 

        include "view/includes/navbar.php";

        // a ternary operator to determine the heading
        $heading = $_GET['action'] == "add" ? "Add A Game" : "Edit Game";

    ?>

    <h1 class="text-center page-title"><?=$heading?></h1>

    <div class="page-contents text-center">

        <?php 
            if ($_SERVER['REQUEST_METHOD'] != 'POST' || $_GET['action'] === "edit_game") {
                include "view/add-game-form.php"; 
            } else {
                include "view/addGameToDB.php";
            }
        ?>
    </div>

    <?php include "view/includes/foot.php" ?>
</body>
</html>