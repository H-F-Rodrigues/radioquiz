CREATE DATABASE db_radioquiz;
USE db_radioquiz;

CREATE TABLE players (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nickname VARCHAR(100) UNIQUE NOT NULL,
    score INT DEFAULT 0,
    state VARCHAR(50) DEFAULT 'Respondendo',
    joined_at DATETIME
);

CREATE TABLE answers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    player_id INT NOT NULL,
    question_order INT NOT NULL,
    selected_option CHAR(1),
    is_correct BOOLEAN,
    points_awarded INT,
    FOREIGN KEY (player_id) REFERENCES players(id) ON DELETE CASCADE
);