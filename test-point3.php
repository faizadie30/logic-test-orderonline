<?php
function pattern_countthat($str, $pattern)
{
    $length_string = strlen($str);
    $length_pattern = strlen($pattern);

    if ($length_pattern == 0 || $length_string == 0) {
        return 0;
    }

    $count = 0;

    for ($s = 0; $s <= $length_string - $length_pattern; $s++) {
        $match = true;

        for ($p = 0; $p < $length_pattern; $p++) {
            if ($str[$s + $p] !== $pattern[$p]) {
                $match = false;
                break;
            }
        }

        $count += $match ? 1 : 0;
    }

    return $count;
}

$quest_test = [
    ["str" => "palindrom", "pattern" => "ind"],
    ["str" => "abakadabra", "pattern" => "ab"],
    ["str" => "hello", "pattern" => ""],
    ["str" => "ababab", "pattern" => "aba"],
    ["str" => "aaaaaa", "pattern" => "aa"],
    ["str" => "hell", "pattern" => "hello"],
];


for ($i = 0; $i < count($quest_test); $i++) {
    $checking = pattern_countthat($quest_test[$i]['str'], $quest_test[$i]['pattern']);

    echo 'output: ' . $checking . "\n";
}
