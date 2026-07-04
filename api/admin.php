<?php

function login_adm($password) {
    if ($password == 'Radioquiz'/*'Radioquiz de Química Farmaceutica'*/) {
        $_SESSION['admin'] = [
            'nickname' => 'Radioquiz',
        ];
    }
    header('Location: index.php');
}

function out_admin() {
    unset($_SESSION['admin']);
    header('Location: index.php');
}