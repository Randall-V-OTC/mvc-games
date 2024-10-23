
<form class="addGameForm" action="../mvc-games/model/addGameToDB.php" method="post" enctype="multipart/form-data">

    <label for="gameName">Game Name:</label>
    <input type="text" name="gameName">
    <br>
    <label for="gamePlatform">Game Platform:</label>
    <input type="text" name="gamePlatform">
    <br>
    <label for="gameGenre">Game Genre:</label>
    <input type="text" name="gameGenre">
    <br>
    <label for="gameReleaseDate">Release Date:</label>
    <input type="text" name="gameReleaseDate">
    <br>
    <label for="gameWebsiteURL">Website URL:</label>
    <input type="text" name="gameWebsiteURL">
    <br>
    <label for="gameImg">Choose Image:</label>
    <input type="file" name="gameImg">
    <br>
    <label for="gameDesc">Game Description:</label>
    <textarea name="gameDesc"></textarea>
    <br>
    <button class="btn btn-primary" type="submit">Submit</button>

</form>