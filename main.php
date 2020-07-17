<?php

define('MIN_OF_SPEC', 120);
define('MIN_OF_CAPACITY', 90);
define('MIN_OF_SPEED', 10);
define('MIN_OF_DISTANCE', 100);
define('MIN_OF_LUCK', 120);


$bodys = [
    ['name' => 'ブロンコ級船体', 'params' => [0, 0, 0, 80, -10], 'cost' => 3],
    ['name' => 'インビンシブル級船体', 'params' => [0, 0, 0, 94, -14], 'cost' => 6],
    ['name' => 'エンタープライズ級船体', 'params' => [0, 0, 0, 108, -18], 'cost' => 11],
    ['name' => 'インビンシブル級改船体', 'params' => [0, 0, 0, 122, -22], 'cost' => 16],
    ['name' => 'オデッセイ級船体', 'params' => [0, 0, 0, 136, -26], 'cost' => 21],
    ['name' => 'タタノラ級船体', 'params' => [0, 0, 0, 150, -30], 'cost' => 26],
    ['name' => 'ヴィルトガンス級船体', 'params' => [0, 0, 0, 164, -34], 'cost' => 31],
];

$outfittings = [
    ['name' => 'ブロンコ級気嚢', 'params' => [0, -10, 80, -10, 0], 'cost' => 3],
    ['name' => 'インビンシブル級回転翼', 'params' => [0, -14, 94, -14, 0], 'cost' => 6],
    ['name' => 'エンタープライズ級気嚢', 'params' => [0, -18, 108, -18, 0], 'cost' => 11],
    ['name' => 'インビンシブル級回転翼', 'params' => [0, -22, 122, -22, 0], 'cost' => 16],
    ['name' => 'オデッセイ級気嚢', 'params' => [0, -26, 136, -26, 0], 'cost' => 21],
    ['name' => 'タタノラ級回転翼', 'params' => [0, -30, 150, -30, 0], 'cost' => 26],
    ['name' => 'ヴィルトガンス級霊翼', 'params' => [0, -34, 164, -34, 0], 'cost' => 31],
];

$heads = [
    ['name' => 'ブロンコ級船首', 'params' => [80, 0, 0, 0, 80], 'cost' => 3],
    ['name' => 'インビンシブル級船首', 'params' => [94, 0, 0, 0, 94], 'cost' => 6],
    ['name' => 'エンタープライズ船首', 'params' => [108, 0, 0, 0, 108], 'cost' => 11],
    ['name' => 'インビンシブル級船首', 'params' => [122, 0, 0, 0, 122], 'cost' => 16],
    ['name' => 'オデッセイ級船首', 'params' => [136, 0, 0, 0, 136], 'cost' => 21],
    ['name' => 'タタノラ級船首', 'params' => [150, 0, 0, 0, 150], 'cost' => 26],
    ['name' => 'ヴィルトガンス級船首', 'params' => [164, 0, 0, 0, 164], 'cost' => 31],
];

$tails = [
    ['name' => 'ブロンコ級船尾', 'params' => [-10, 80, -10, 0, 0], 'cost' => 3],
    ['name' => 'インビンシブル級船尾', 'params' => [-14, 94, -14, 0, 0], 'cost' => 6],
    ['name' => 'エンタープライズ船尾', 'params' => [-18, 108, -18, 0, 0], 'cost' => 11],
    ['name' => 'インビンシブル級船尾', 'params' => [-22, 122, -22, 0, 0], 'cost' => 16],
    ['name' => 'オデッセイ級船尾', 'params' => [-26, 136, -26, 0, 0], 'cost' => 21],
    ['name' => 'タタノラ級船尾', 'params' => [-30, 150, -30, 0, 0], 'cost' => 26],
    ['name' => 'ヴィルトガンス級船尾', 'params' => [-34, 164, -34, 0, 0], 'cost' => 31],
];

$result = [];
foreach ($bodys as $body) {
    foreach ($outfittings as $outfitting) {
        foreach ($heads as $head) {
            foreach ($tails as $tail) {
                if (($body['cost'] + $outfitting['cost'] + $head['cost'] + $tail['cost']) <= 61) {
                    $spec = $body['params'][0] + $outfitting['params'][0] + $head['params'][0] + $tail['params'][0];
                    $capacity = $body['params'][1] + $outfitting['params'][1] + $head['params'][1] + $tail['params'][1];
                    $speed = $body['params'][2] + $outfitting['params'][2] + $head['params'][2] + $tail['params'][2];
                    $distance = $body['params'][3] + $outfitting['params'][3] + $head['params'][3] + $tail['params'][3];
                    $luck = $body['params'][4] + $outfitting['params'][4] + $head['params'][4] + $tail['params'][4];
                    if ($spec >= MIN_OF_SPEC) {
                        if ($capacity >= MIN_OF_CAPACITY) {
                            if ($speed >= MIN_OF_SPEED) {
                                if ($distance >= MIN_OF_DISTANCE) {
                                    if ($luck >= MIN_OF_LUCK) {
                                        $cost = $body['cost'] + $outfitting['cost'] + $head['cost'] + $tail['cost'];
                                        $result[] = [
                                            'body' => $body['name'], 
                                            'outfitting' => $outfitting['name'], 
                                            'head' => $head['name'], 
                                            'tail' => $tail['name'],
                                            'spec' => $spec,
                                            'capacity' => $capacity,
                                            'speed' => $speed,
                                            'distance' => $distance,
                                            'luck' => $luck,
                                            'sum' => $spec + $capacity + $speed + $distance + $luck,
                                            'cost' => $cost,
                                        ];
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

$sort = [];
foreach ($result as $key => $value) {
    $sort[$key] = $value['sum'];
}
array_multisort($sort, SORT_DESC, $result);
foreach ($result as $data) {
    printf(
        "%-32s %-32s %-32s %-32s %03d %03d %03d %03d %03d %03d %02d\n", 
        $data['body'], $data['outfitting'], $data['head'], $data['tail'], $data['spec'], $data['capacity'], $data['speed'], $data['distance'], $data['luck'], $data['sum'], $data['cost']);
}