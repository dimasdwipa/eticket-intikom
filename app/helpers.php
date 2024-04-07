<?php

// File: app/helpers.php

if (!function_exists('formatDate')) {
    function formatDate($date) {
        return $date ? date_format(date_create($date), 'd M Y H:i:s') : '';
    }
}



?>