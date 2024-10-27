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

</script>

<form class="addGameForm" id="addGameForm" action="../mvc-games/addgame.php" onsubmit="validate(event)" method="post" enctype="multipart/form-data">

    <label for="gameName">Game Name:</label>
    <input type="text" name="gameName" id="gameName">
    <span id="gameNameError" style="display: none; color: red;">*Required*</span>

    <br>

    <label for="gamePlatform">Game Platform:</label>
    <select name="gamePlatform" id="gamePlatform">
        <option selected value="" disabled>Choose platform</option>
        <option value="Xbox">Xbox</option>
        <option value="PlayStation">PlayStation</option>
        <option value="Nintendo">Nintendo</option>
        <option value="PC">PC</option>
    </select>
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

    <input type="submit" value="Submit" class="btn btn-primary mb-4">

</form>