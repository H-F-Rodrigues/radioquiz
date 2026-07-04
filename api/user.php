<?php
function create_user($conection, $username) {
    $nickname = strtoupper(trim($username));
    $gameState = get_game_state();
    $check = mysqli_query($conection, "SELECT id FROM players WHERE nickname = '$nickname'");
    if (mysqli_num_rows($check) > 0) {

        $row = mysqli_fetch_assoc($check);
        $player_id = $row['id'];

        $scoreRes = mysqli_query($conection, "SELECT score FROM players WHERE id = $player_id");
        $scoreRow = mysqli_fetch_assoc($scoreRes);
        $_SESSION['player'] = [
            'id' => $player_id,
            'nickname' => $nickname,
            'score' => $scoreRow['score'],
            'current_question' => 1,
            'finished' => false
        ];
        header('Location: index.php');
        exit;
    }
    
    $user = [
        'nickname' => $nickname,
        'score' => 0,
        'state' => 'Respondendo',
        'joined_at' => date('Y-m-d H:i:s')
    ];
    record_user($conection, $user);
    $player_id = mysqli_insert_id($conection);
    
    $_SESSION['player'] = [
        'id' => $player_id,
        'nickname' => $nickname,
        'score' => 0,
        'current_question' => 1,
        'finished' => false,
        'reset_counter' => $gameState['reset_counter']
    ];
    header('Location: index.php');
}

function finish_user_quiz($conection) {
    if (!isset($_SESSION['player'])) {
        return;
    }
    $player_id = $_SESSION['player']['id'];
    $state = 'Finalizado';
    $sqlUpdate = "UPDATE players SET state = '$state' WHERE id = $player_id";
    mysqli_query($conection, $sqlUpdate);
    // Opcional: atualiza também na sessão
    $_SESSION['player']['state'] = $state;
}
