<?php

require __DIR__ . "/SamePart.php";

$sample = [
    [
        "input" => [
            "abc xyz",
            "abc xzz"
        ],
        "same_start" => "abc x",
        "same_end" => "z"
    ],
    [
        "input" => [
            "123",
            "456"
        ],
        "same_start" => "",
        "same_end" => "",
    ],
    [
       "input" => [
           "(숙제테스트)20 3월물리학 기본반-6회 | JSH과학학원",
           "(숙제테스트)21 3월 화학1 심화반 4-1회 | JSH과학학원",
           "(숙제테스트)21 3월 화학1 기본반 4-2회 | JSH 과학학원"
       ],
        "same_start" => "(숙제테스트)2",
        "same_end" => "과학학원"
    ],
    [
       "input" => [
           "",
           "",
       ],
        "same_start" => "",
        "same_end" => ""
    ],

];

$passed = 0;
$total = count($sample);
$start_time = microtime(true);

foreach ($sample as $k => $data){
    echo "\n$k======================\n";
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



