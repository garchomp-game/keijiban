<?php


function mb_strimwidth_ja($str, $start, $width, $trimmarker="", $encoding=null) {
    if (is_null($encoding)) {
        $encoding = mb_internal_encoding();
    }
    $str = mb_substr($str, $start, null, $encoding);
    $str_ = mb_convert_encoding($str, "SJIS-win", $encoding);
    $trimmarker_ = mb_convert_encoding($trimmarker, "SJIS-win", $encoding);
    if (strlen($str_) > $width) {
        $result = mb_strcut($str_, 0, $width - strlen($trimmarker_), "SJIS-win") . $trimmarker_;
        return mb_convert_encoding($result, $encoding, "SJIS-win");
    } else {
        return $str;
    }
}
