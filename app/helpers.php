<?php

if (!function_exists('limit_html')) {
    function limit_html($text, $limit = 100, $end = '...') {
        // Strip tags but preserve line breaks
    $text = strip_tags($text, '<p><a><img><strong><em><br><h1><h2><h3><h4><h5><h6>');

    // Use mb_substr to safely limit multibyte character strings
    if (mb_strlen($text) > $limit) {
        // Find the last closing HTML tag before the limit
        $text = mb_substr($text, 0, $limit);
        return $text . $end;
    }

    return $text;
    }
}
