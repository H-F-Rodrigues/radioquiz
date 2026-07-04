<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin – Radioquiz</title>
    <!-- Usa o mesmo CSS do resto do sistema -->
    <link rel="stylesheet" href="../css/style.css?v=<?= filemtime(__DIR__ . '/../css/style.css') ?>">
    <link rel="shortcut icon" href="../img/atom.png" type="image/x-icon">
    <style>
        /* Ajustes específicos para a página de login */
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(160deg, var(--sky-soft) 0%, #FFFFFF 60%);
        }
        .login-card {
            max-width: 420px;
            width: 100%;
            padding: 2.5rem 2rem;
            background: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            border: 1px solid var(--grey-light);
            text-align: center;
        }
        .login-card h1 {
            margin: 0 0 0.5rem 0;
            font-size: 1.8rem;
            color: var(--navy);
        }
        .login-card .sub {
            color: var(--grey);
            margin-bottom: 1.8rem;
            font-size: 0.95rem;
        }
        .login-card .icon {
            font-size: 3rem;
            display: block;
            margin-bottom: 0.25rem;
        }
        .login-card form {
            margin: 0;
            padding: 0;
            background: transparent;
            box-shadow: none;
            border: none;
        }
        .login-card label {
            text-align: left;
        }
        .login-card input[type="password"] {
            margin-top: 0.25rem;
        }
        .login-card button {
            width: 100%;
            margin-top: 1.5rem;
            padding: 0.85rem;
            font-size: 1.1rem;
        }
        .login-card .error-msg {
            background: #fde8e8;
            color: var(--danger);
            padding: 0.75rem;
            border-radius: 8px;
            margin-top: 1rem;
            font-weight: 500;
            display: none;
        }
        .login-card .error-msg.show {
            display: block;
        }
        /* Responsivo */
        @media (max-width: 480px) {
            .login-card {
                margin: 1rem;
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>

    <div class="login-card">
        <span class="icon">⚛️</span>
        <h1>Radioquiz</h1>
        <p class="sub">Acesso do administrador</p>

        <!-- O formulário envia para ../index.php (como original) -->
        <form action="../index.php" method="POST">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" placeholder="Digite a senha" required autofocus>

            <button type="submit">Entrar</button>
        </form>

        <!-- Área para exibir erros (caso a senha esteja incorreta) -->
        <div id="login-error" class="error-msg">Senha incorreta. Tente novamente.</div>
    </div>

    <script>
        // Verifica se a URL contém um parâmetro de erro (ex: ?error=1)
        const params = new URLSearchParams(window.location.search);
        if (params.get('error') === '1') {
            document.getElementById('login-error').classList.add('show');
        }

        // Remove o erro ao digitar novamente
        document.getElementById('password').addEventListener('input', function() {
            document.getElementById('login-error').classList.remove('show');
        });
    </script>

</body>
</html>