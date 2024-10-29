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

            $id = $_POST['gameId'];
            $name = $_POST['gameName'];
            $platform = $_POST['gamePlatform'];
            $genre = $_POST['gameGenre'];
            $releaseDate = $_POST['gameReleaseDate'];
            $websiteURL = $_POST['gameWebsiteURL'];
            $gameImg = $_POST['gameImg'];
            $desc = $_POST['gameDesc'];

        }

    }

    // ternary operator to show the appropriate header
    $heading = $_GET['action'] === "add" ? "Add A Game" : "Edit Game";

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

    function validate(e) {

        e.preventDefault();

        let gameName = document.getElementById('gameName');
        let gamePlatform = document.getElementById('gamePlatform');
        let gameGenre = document.getElementById('gameGenre');
        let gameReleaseDate = document.getElementById('gameReleaseDate');
        let gameWebsiteURL = document.getElementById('gameWebsiteURL');
        let gameImg = document.getElementById('gameImg');
        let gameDesc = document.getElementById('gameDesc');

        let elements = [gameName, gamePlatform, gameGenre, gameReleaseDate, gameWebsiteURL, gameImg, gameDesc];

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

    }

    function getCurrentPlatform() {

        switch ($_POST['gamePlatform']) {

            case "Xbox":
                return "Xbox";
            
            case "PlayStation":
                return "PlayStation";

        }

    }

</script>

<h1><?=$heading?></h1>

<form class="addGameForm" id="addGameForm" action="../mvc-games/addgame.php" onsubmit="validate(event)" method="post" enctype="multipart/form-data">

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
            echo("<input type='text' name='gameName' id='gameName'>");
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
        <span id='gamePlatformError' style='display: none; color: red;'>*Required*</span>
        ");

        }
    ?>
    
    <br>

    <label for="gameGenre">Game Genre:</label>
    <input type="text" name="gameGenre" id="gameGenre">
    <span id="gameGenreError" style="display: none; color: red;">*Required*</span>

    <br>

    <label for="gameReleaseDate">Release Date:</label>
    <input type="date" name="gameReleaseDate" id="gameReleaseDate">
    <span id="gameReleaseDateError" style="display: none; color: red;">*Required*</span>

    <br>

    <label for="gameWebsiteURL">Website URL:</label>
    <input type="text" name="gameWebsiteURL" id="gameWebsiteURL">
    <span id="gameWebsiteURLError" style="display: none; color: red;">*Required*</span>

    <br>

    <label for="gameImg">Choose Image:</label>
    <input type="file" name="gameImg" id="gameImg">
    <span id="gameImgError" style="display: none; color: red;">*Required*</span>

    <br>

    <label for="gameDesc">Game Description:</label>
    <textarea name="gameDesc" id="gameDesc"></textarea>
    <span id="gameDescError" style="display: none; color: red;">*Required*</span>

    <br>

    <input type="submit" value="Submit" class="btn btn-primary mb-4">

</form>