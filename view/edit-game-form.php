<?php

    $id = $_POST['gameId'];

?>

<h1 class="text-center page-title">Edit Game</h1>

<form>

    <label for="id">Id:</label>
    <input readonly type="text" name="id" value="<?=$id?>">

</form>