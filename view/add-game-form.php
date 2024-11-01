<?php

    $id = "";
    $name = "";
    $platform = "";
    $genre = "";
    $releaseDate = "";
    $websiteURL = "";
    $gameImg = "";
    $desc = "";

    // force the superglobal GET variable to be add if no action is selected
    if (!isset($_GET['action'])) {
        $_GET['action'] = "add";
    }

    // if the action is set
    if (isset($_GET['action'])) {

        // if action is edit lets grab the passed data
        if ($_GET['action'] === "edit_game") {

            $id = htmlspecialchars($_POST['gameId']);
            $name = htmlspecialchars($_POST['gameName']);
            $platform = htmlspecialchars($_POST['gamePlatform']);
            $genre = htmlspecialchars($_POST['gameGenre']);
            $releaseDate = htmlspecialchars($_POST['gameReleaseDate']);
            $websiteURL = htmlspecialchars($_POST['gameWebsiteURL']);
            $gameImg = htmlspecialchars($_POST['gameImg']);
            $desc = htmlspecialchars($_POST['gameDesc'], ENT_QUOTES);

        }

    }

?>

<script>

    function showError(element, show) {

        console.log('in showError()');

        let elementStyle = document.getElementById(element).style;
        let elementError = document.getElementById(element + 'Error');

        console.log(elementError);

        if (show) {
            elementError.style.display = "inline-block";
            elementStyle.border = '1px solid red';
            console.log(elementError + 'should display.');
        } else {
            elementError.style.display = "none";
            elementStyle.border = '';
            console.log(elementError + 'should not display');
        }

    }

    function validate(e, update) {

        e.preventDefault();

        let gameName = document.getElementById('gameName');
        let gamePlatform = document.getElementById('gamePlatform');
        let gameGenre = document.getElementById('gameGenre');
        let gameReleaseDate = document.getElementById('gameReleaseDate');
        let gameWebsiteURL = document.getElementById('gameWebsiteURL');
        let gameImg = document.getElementById('gameImg');
        let gameDesc = document.getElementById('gameDesc');
        let keepImg = document.getElementById('keepImg');

        let elements = [gameName, gamePlatform, gameGenre, gameReleaseDate, gameWebsiteURL, gameDesc];

        if (update) {

        }
        
        // if updating the game then don't force the user to require a new image
        if (keepImg != null) {

            if (!keepImg.checked) {
                elements.push(gameImg);
            }

        }

        let formValid = true;

        elements.forEach((element) => {
            if (element.value === "") {
                console.log(element.id + " is required.");
                showError(element.id, true);
                formValid = false;
            } else {
                showError(element.id, false);
            }
        });
        
        if (formValid) {
            console.log('should submit.');
            document.querySelector('form.addGameForm').submit();
        }

    document.getElementById('keepImg').addEventListener('click', function() {

        if (document.getElementById('keepImg').checked) {

            document.getElementById('gameImgError').style.display = "none";
            document.getElementById('gameImg').style.border = "none";

        }

    });

    }

</script>

<?php
    if ($_GET['action'] === "edit_game") {
        echo("<img src='$gameImg' title='Current Game Image' alt='Current Game Image' style='display: inline-flex; margin: 0 auto 1.5rem auto; width: 155px; height: 215px; border: 1px solid black;'>");
    }
?>

<!-- 
 If we are updating the game, make sure the form submits with a get action of update game
 so we can use that later
-->
<?php

    if ($_GET['action'] === 'edit_game') {
        echo("<form class='addGameForm' id='addGameForm' action='../mvc-games/addgame.php?action=update_game' onsubmit='validate(event, true)' method='post' enctype='multipart/form-data'>");
    } else {
        echo("<form class='addGameForm' id='addGameForm' action='../mvc-games/addgame.php?action=add_game' onsubmit='validate(event, false)' method='post' enctype='multipart/form-data'>");
    }

?>
<!-- <form class="addGameForm" id="addGameForm" action="../mvc-games/addgame.php" onsubmit="validate(event)" method="post" enctype="multipart/form-data"> -->

    <!--
        Game Name:
        if action = edit game then use the passed game name and input it in the text field
        otherwise
        if action = add game then bring in a blank game name field
    -->
    <label for="gameName">Game Name:</label>
    <?php
        if ($_GET['action'] === "edit_game") {
            echo("<input type='text' name='gameName' id='gameName' value='$name'>");
        } else {
            echo("<input type='text' name='gameName' id='gameName' value=''>");
        }
    ?>
    <span id="gameNameError" style="display: none; color: red;">*Required*</span>
    <!-- END GAME NAME LOGIC -->

    <br> 

    <!--
        Game Platform:
        grabs the passed gamePlatform and uses ternary operators to select the correct option
    -->
    <label for="gamePlatform">Game Platform:</label>
    <?php
        if ($_GET['action'] === "edit_game") {
            $gamePlat = $_POST['gamePlatform'] ?? '';
            echo("<select name='gamePlatform' id='gamePlatform'>"
                . "<option disabled value='' " . ($gamePlat === '' ? 'selected' : '') . ">Select a platform</option>"
                . "<option value='Xbox' " . ($gamePlat === 'Xbox' ? 'selected' : '') . ">Xbox</option>"
                . "<option value='PlayStation' " . ($gamePlat === 'PlayStation' ? 'selected' : '') . ">PlayStation</option>"
                . "<option value='Nintendo' " . ($gamePlat === 'Nintendo' ? 'selected' : '') . ">Nintendo</option>"
                . "<option value='PC' " . ($gamePlat === 'PC' ? 'selected' : '') . ">PC</option>"
            . "</select>");
            
        } else {

        echo("<select name='gamePlatform' id='gamePlatform'>
            <option selected value='' disabled>Choose platform</option>
            <option value='Xbox'>Xbox</option>
            <option value='PlayStation'>PlayStation</option>
            <option value='Nintendo'>Nintendo</option>
            <option value='PC'>PC</option>
        </select>
        ");

        }
        echo("<span id='gamePlatformError' style='display: none; color: red;'>*Required*</span>");
    ?>
    <!--------- END GAME PLATFORM LOGIC -------->
    
    <br>

    <!--
        Game genre logic
    -->
    <label for="gameGenre">Game Genre:</label>
    <?php
        if ($_GET['action'] === "edit_game") {
            echo("<input type='text' name='gameGenre' id='gameGenre' value='$genre'>");
        } else {
            echo("<input type='text' name='gameGenre' id='gameGenre' value=''>");
        }
    ?>
    <span id="gameGenreError" style="display: none; color: red;">*Required*</span>
    <!-- END GAME GENRE LOGIC -->

    <br>

    <!--
        Game release date logic
    -->
    <label for="gameReleaseDate">Release Date:</label>
    <?php
        if ($_GET['action'] === "edit_game") {
            echo("<input type='date' name='gameReleaseDate' id='gameReleaseDate' value='$releaseDate'>");
        } else {
            echo("<input type='date' name='gameReleaseDate' id='gameReleaseDate' value=''>");
        }
    ?>
    <span id="gameReleaseDateError" style="display: none; color: red;">*Required*</span>
    <!-- END RELEASE DATE LOGIC -->

    <br>

    <!-- BEGIN WEBSITE URL LOGIC -->
    <label for="gameWebsiteURL">Website URL:</label>
    <?php
        if ($_GET['action'] === "edit_game") {
            echo("<input type='text' name='gameWebsiteURL' id='gameWebsiteURL' value='$websiteURL'>");
        } else {
            echo("<input type='text' name='gameWebsiteURL' id='gameWebsiteURL' value=''>");
        }
    ?>
    <span id="gameWebsiteURLError" style="display: none; color: red;">*Required*</span>
    <!-- END WEBSITE URL LOGIC -->

    <br>

    <!-- BEGIN GAME IMG LOGIC -->
    <?php
        if ($_GET['action'] === "edit_game") {
            $img = $_POST['gameImg'];
            echo("
                <label for='gameImg'>Change Image:</label>
                <input type='file' name='gameImg' id='gameImg' value='$gameImg'>
                <input type='hidden' name='gameImgUpdate' id='gameImgUpdate' value='$img'>
                <div>
                    <input type='checkbox' name='keepImg' id='keepImg'>
                    <label for='keepImg'>Keep Current Image?</label>
                </div>
            ");
        } else {
            echo("
                <label for='gameImg'>Choose Image:</label>
                <input type='file' name='gameImg' id='gameImg'>
            ");
        }
    ?>
    <span id="gameImgError" style="display: none; color: red;">*Required*</span>
    <!-- END GAME IMG LOGIC -->

    <br>

    <!-- BEGIN GAME DESCRIPTION LOGIC -->
    <label for="gameDesc">Game Description:</label>
    <?php
        if ($_GET['action'] === "edit_game") {
            echo("<textarea name='gameDesc' id='gameDesc'>$desc</textarea>");
        } else {
            echo("<textarea name='gameDesc' id='gameDesc'></textarea>");
        }
    ?>
    <span id="gameDescError" style="display: none; color: red;">*Required*</span>
    <!-- END GAME DESCRIPTION LOGIC -->

    <br>

    <!-- <?php if ($_GET['action'] === 'edit_game') {
        echo("<script>alert('game id = $id');</script>");
        echo("<input type='hidden' name='gameId' id='gameId' value='$id'>");
    }
    ?> -->
    <input type='hidden' name='gameId' id='gameId' value='<?=$id?>'>
    <input type="submit" value="Submit" class="btn btn-primary mb-4">

</form>

<script>

    img = document.getElementById('gameImg').value;
    let checkbox = document.getElementById('keepImg');

    document.getElementById('keepImg').addEventListener('click', function() {

        const file = document.getElementById('gameImg').files[0] = img;

        if (checkbox.checked) {
            console.log(file);
            document.getElementById('gameImg').files[0] = img;
        } else {
            document.getElementById('gameImg').files[0] = '';
        }

    });

</script>