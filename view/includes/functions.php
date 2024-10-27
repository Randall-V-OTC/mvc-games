<?php

    include "constants.php";

    function determineIcon($platform) {

        switch ($platform) {

            case "Xbox":
                return XBOX_ICON;
            
            case "PlayStation":
                return PLAYSTATION_ICON;

            case "Nintendo":
                return NINTENDO_ICON;

            case "PC":
                return PC_ICON;

            default:
                return "";

        }

    }