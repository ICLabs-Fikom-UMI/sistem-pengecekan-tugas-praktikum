<?php

class Home_model {
    public static function getTime() {
        $now = new DateTime();
        return $now->format('H:i:s');
    }
}

?>
