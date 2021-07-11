<?php

//if (!function_exists('activeMenuLink')) {
//    function activeMenuLink() {
//        if (request()->is('/')) {
//            return 'menu-link__active';
//        }
//        return '';
//    }
//}
//
//if (!function_exists('activeArticleLink')) {
//    function activeArticleLink() {
//        if ((request()->is('articles') or request()->is('articles/*'))) {
//            return 'menu-link__active';
//        }
//        return '';
//    }
//}

if (!function_exists('true_word_form')) {
    function true_word_form($num, $word1, $word2, $word3) {
        $num = abs($num) % 100;
        $num_x = $num % 10;
        if ($num == 0) {
            return $word3;
        }
        if ($num > 10 && $num < 20) {
            return $word3;
        }
        if ($num_x > 1 && $num_x < 5) {
            return $word2;
        }
        if ($num_x == 1) {
            return $word1;
        }
        return $word3;
    }
}
