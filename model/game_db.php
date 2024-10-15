<?php

    function getGames() {

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

?>