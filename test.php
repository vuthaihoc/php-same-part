<?php

require __DIR__ . "/SamePart.php";

$sample = [
    [
        "input" => [
            "abc xyz",
            "abc xzz"
        ],
        "same_start" => "abc",
        "same_end" => "z"
    ],
    [
        "input" => [
            "123",
            "456"
        ],
        "same_start" => "",
        "same_end" => ""
    ],

];

$passed = 0;
$total = count($sample);
$start_time = microtime(true);

foreach ($sample as $data){
    echo "Data : \n";
    foreach ($data['input'] as $str){
        echo "\t - " . $str . "\n";
    }
    $same_start = SamePart::sameStart(...$data['input']);
    $same_end = SamePart::sameEnd(...$data['input']);
    echo "\t\tstart : " . var_export($data['same_start'], true) . "\t\t" . var_export($same_start, true);
    echo "\n\t\tend : " . var_export($data['same_end'], true) . "\t\t" . var_export($same_end, true);
    if($data['same_start'] == $same_start &&
    $data['same_end'] == $same_end){
        $passed++;
    }
}
$end_time = microtime(true);

echo "\n\n======== RESULT =========================================\n";
echo "\n\tPassed " . $passed . "/" . $total;
echo "\n\tTime " . ($end_time - $start_time);
echo "\n\n\nDone";



