<?php

function strLimit($text, $limit = 20, $end = '...') {
    return mb_strlen($text) > $limit
        ? mb_substr($text, 0, $limit) . $end
        : $text;
}
