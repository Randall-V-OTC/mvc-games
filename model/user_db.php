<?php

    function matchUser($username, $password) {

        $filtered_username = filter_input(INPUT_POST, 'username');
        $filtered_password = filter_input(INPUT_POST, 'password');
                            
        $file = fopen("model/user_data.csv", "rb");

        if ($file === false) {
            die("Error opening the file: $file");
        }

        while (!feof($file)) {
            $user = fgetcsv($file);
            if ($user === false) continue;
            $users[] = $user;
        }

        foreach ($users as $user) {
            if ($user[0] === $filtered_username) {
                if ($user[1] === $filtered_password) {
                    return true;
                }
            }
        }

        fclose($file);

    }

?>