<?php

define('STATE_FILE', __DIR__ . '/../quiz_state.json');

function get_game_state() {
    if (!file_exists(STATE_FILE)) {
        $default = ['status' => 'waiting', 'reset_counter' => 1];
        file_put_contents(STATE_FILE, json_encode($default));
        return $default;
    }
    $content = file_get_contents(STATE_FILE);
    return json_decode($content, true);
}

function set_game_state($state) {
    file_put_contents(STATE_FILE, json_encode($state));
}

// Altera o status e opcionalmente incrementa reset_counter
function set_game_status($status, $incrementReset = false) {
    $state = get_game_state();
    $state['status'] = $status;
    if ($incrementReset) {
        $state['reset_counter'] = ($state['reset_counter'] ?? 1) + 1;
    }
    set_game_state($state);
}

function reset_quiz($conection) {
    // Limpa as respostas e jogadores
    mysqli_query($conection, "TRUNCATE TABLE answers");
    mysqli_query($conection, "DELETE FROM players");
    
    // Atualiza estado global: volta para waiting e incrementa reset_counter
    set_game_status('waiting', true);
}
