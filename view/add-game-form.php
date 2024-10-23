<script>

    function showError(element, show) {

        let elementError = document.getElementById(element.id + 'Error');

        if (!elementError) return;

        if (!show) {
            element.style.display = "none";
        } else {
            element.style.display = "inline-block";
        }

    }

    function validate(e) {

        e.preventDefault();

        let formValid = true;

        // grab the form as a whole and then grab all of the elements
        let formElements = document.querySelector('.addGameForm').elements;

        // loop over all of the elements
        for (let element of formElements) {

            if (element.value.trim() === "" ) {

                formValid = false;
                showError(element, true);

            } else {
                showError(element, false);
            }

        }

        if (formValid) {
            document.querySelector('.addGameForm').submit();
        }

    }

</script>

<form class="addGameForm" action="../mvc-games/addgame.php" onsubmit="validate(event)" method="post" enctype="multipart/form-data">

    <label for="gameName">Game Name:</label>
    <input type="text" name="gameName" id="gameName">
    <span id="gameNameError" style="display: none; color: red;">*Required*</span>

    <br>

    <label for="gamePlatform">Game Platform:</label>
    <input type="text" name="gamePlatform" id="gamePlatform">
    <span id="gamePlatformError" style="display: none; color: red;">*Required*</span>

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

    <input type="submit" value="Submit" class="btn btn-primary mb-4" name="submit" id="submit">

</form>