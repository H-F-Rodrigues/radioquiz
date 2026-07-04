<?php

/*$bdServer = 'sql213.infinityfree.com';
$bdUser = 'if0_41949568';
$bdPassword = 'pOOfllgVGOTrGZx';
$bdData = 'if0_41949568_radioquiz';*/

$bdServer = '127.0.0.1';
$bdUser = 'root';
$bdPassword = '';
$bdData = 'db_radioquiz';

$conection = mysqli_connect($bdServer, $bdUser, $bdPassword, $bdData);

function get_players($conection) {
    $sqlSearch = "SELECT * FROM players";
    $res = mysqli_query($conection, $sqlSearch);

    $players = [];

    while ($player = mysqli_fetch_assoc($res)) {
        $players[] = $player;
    }

    return $players;
}

function record_user ($conection, $player) {
    $sqlRecord = 
    "INSERT INTO players
    (nickname, score, state, joined_at)
    VALUES
    (
        '{$player['nickname']}',
        '{$player['score']}',
        '{$player['state']}',
        '{$player['joined_at']}'
    )";

    mysqli_query($conection, $sqlRecord);
}

function update_player($conection, $user) {
    $sqlUpdate = 
    "UPDATE players SET 
        state = '{$user['state']}' 
    WHERE id = {$user['id']}
    ";
    mysqli_query($conection, $sqlUpdate);
}