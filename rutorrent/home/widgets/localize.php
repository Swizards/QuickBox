<?php
    // setup locale and translation
    // QuickBox is looking for translators. We'll be builing in the needed lang files soon.
    setlocale(LC_ALL, $locale);
    require "../lang/$language.php";

    function T($str)
    {
        global $L;
        if (isset($L[$str]))
            return $L[$str];
        else
            return $str;
    }

?>
