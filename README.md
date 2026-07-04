📡 Radioquiz – Química Farmacêutica
Sistema de quiz colaborativo com painel de administrador e placar em tempo real, desenvolvido em PHP e MySQL. Os jogadores respondem a 10 perguntas sobre radioisótopos na indústria farmacêutica; o administrador controla o andamento (iniciar, finalizar, resetar) e visualiza os resultados.

✨ Funcionalidades
Administrador

Login com senha fixa (padrão: a)

Iniciar / finalizar / resetar o quiz

Ver lista de jogadores e placar atualizado em tempo real (via polling)

Jogador

Cadastro com nickname (único)

Responde às perguntas em sequência

Visualiza seu desempenho e placar final, com detalhamento de cada resposta

Atualização automática

A página do administrador e a sala de espera são atualizadas a cada 4 segundos via JavaScript (polling)

Se o status do quiz mudar ou for resetado, a página recarrega automaticamente

🛠 Tecnologias
PHP 7.4+ (com extensão mysqli)

MySQL / MariaDB

HTML5, CSS3, JavaScript (vanilla)

JSON para estado do quiz (arquivo quiz_state.json)

📦 Instalação
1. Clone o repositório
bash
git clone https://github.com/seu-usuario/radioquiz.git
cd radioquiz
2. Crie o banco de dados
Execute o script db/schema.sql no seu SGBD (ex.: phpMyAdmin, MySQL CLI):

sql
-- O script já cria o banco e as tabelas
SOURCE db/schema.sql;
Ou copie o conteúdo do arquivo e execute manualmente.

3. Configure as credenciais do banco
Abra o arquivo db/database.php e ajuste as variáveis de conexão:

php
$bdServer   = '127.0.0.1';   // ou o endereço do seu servidor
$bdUser     = 'root';        // seu usuário
$bdPassword = '';            // sua senha
$bdData     = 'db_radioquiz'; // nome do banco criado
⚠️ Segurança: Para ambientes de produção, mova essas credenciais para um arquivo .env ou config.php fora do repositório e inclua-o no .gitignore.

4. Permissões de escrita
O arquivo data/quiz_state.json será criado automaticamente pelo sistema. Certifique-se de que o servidor web tenha permissão de escrita na pasta data/:

bash
chmod 755 data/
5. Acesse no navegador
Coloque os arquivos no diretório do seu servidor (ex.: htdocs do XAMPP, ou publique em um host) e abra:

text
http://localhost/radioquiz/index.php
🎮 Como usar
👤 Jogador
Na página inicial, insira um nickname (ex.: MARIA) e clique em Vamos Lá!

Aguarde o administrador iniciar o quiz (status "Aguardando")

Quando o quiz estiver ativo, responda as 10 perguntas clicando na alternativa desejada

Ao final, veja sua pontuação, quantas acertou e o detalhamento de cada resposta

👨‍💼 Administrador
Faça login usando o campo Password no topo da página (senha padrão: a) – se o formulário não aparecer, acesse diretamente admin_login.php (caso exista) ou use o campo na própria página inicial

Controles disponíveis:

▶️ Iniciar Quiz – libera as perguntas para os jogadores

⏹️ Finalizar Quiz – encerra a rodada e mostra o placar final

🔄 Resetar Quiz – apaga todos os dados (jogadores e respostas) e volta ao estado de espera

Durante o quiz, você vê a lista de jogadores e o placar em tempo real (atualizado automaticamente)

🎨 Personalização
Perguntas: edite o arquivo data/questions.php – cada pergunta é um array com pergunta, alternativas (A–D) e correta.

Estilo: modifique o arquivo css/style.css para alterar cores, fontes, etc.

QR Code: substitua a imagem img/qr-code.svg pelo código QR do link do seu quiz.

Ícone: troque img/atom.png pelo seu favicon.

🔒 Segurança
A senha do administrador está hardcoded em api/admin.php ($password === 'a'). Em produção, recomenda‑se:

Armazenar a senha com hash (ex.: password_hash()) e verificar com password_verify()

Ler a senha de uma variável de ambiente (ex.: $_ENV['ADMIN_PASS'])

O arquivo quiz_state.json contém dados de estado; coloque‑o fora da raiz pública ou proteja com .htaccess.

Certifique‑se de que display_errors esteja desligado em produção.

🤝 Contribuição
Sinta‑se à vontade para abrir issues e pull requests. Toda ajuda é bem‑vinda!

📄 Licença
Este projeto é de uso educacional – livre para adaptação e estudo.
Nenhuma garantia implícita ou explícita.

Desenvolvido com ⚛️ para fins didáticos sobre radioquímica farmacêutica.