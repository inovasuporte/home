<?php
// Exibe todos os erros para ajudar na depuração
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Verifica se o formulário foi enviado via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os campos 'nome', 'email' e 'mensagem' estão definidos
    if (isset($_POST['nome'], $_POST['email'], $_POST['mensagem'])) {
        
        // Sanitiza os dados para evitar injeção de código malicioso
        $nome = htmlspecialchars($_POST['nome']);
        $email = htmlspecialchars($_POST['email']);
        $mensagem = htmlspecialchars($_POST['mensagem']);
        
        // Aqui, você pode adicionar o código para enviar o e-mail.
        // Exemplo de envio de e-mail:
        $to = "seuemail@dominio.com"; // Substitua com o seu e-mail
        $subject = "Mensagem do formulário de contato";
        $body = "Nome: $nome\nE-mail: $email\nMensagem: $mensagem";
        $headers = "From: $email";

        // Tenta enviar o e-mail e verifica se foi bem-sucedido
        if (mail($to, $subject, $body, $headers)) {
            echo "Mensagem enviada com sucesso!";
        } else {
            echo "Erro ao enviar a mensagem.";
        }

    } else {
        // Caso algum campo não tenha sido preenchido
        echo "Por favor, preencha todos os campos.";
    }
} else {
    // Se não for um envio POST, redireciona para a página de contato
    header("Location: contato.html");
    exit();
}
?>