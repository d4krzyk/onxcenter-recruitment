<?php

class Pipeline {
    public static function make(...$funcs) {
        return function ($arg) use ($funcs) {
            $out = $arg;
            foreach ($funcs as $f) {
                $out = $f($out);
            }
            return $out;
        };
    }
}

//Usage:
$function = Pipeline::make(
    function ($var) { return $var * 3; },
    function ($var) { return $var + 1; },
    function ($var) { return $var / 2; }
);

$result = $function(3);
echo $result;
?>
