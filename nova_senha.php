<?php
    // Verifica se o formulário foi submetido
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Verifica se o email foi enviado via POST
        if(isset($_POST["email"])){
            // Configure as credenciais do banco de dados
            include('config.php');

            // Verifica a conexão
            if ($conn->connect_error) {
                die("Falha na conexão: " . $conn->connect_error);
            }

            $email = $conn->real_escape_string($_POST["email"]);
            $nova_senha = $conn->real_escape_string($_POST["nova_senha"]);
            $confirmar_nova_senha = $conn->real_escape_string($_POST["confirmar_nova_senha"]);

            // Verifica se as senhas correspondem
            if($nova_senha === $confirmar_nova_senha){
                // Atualiza a nova senha no banco de dados
                $sql = "UPDATE usuarios SET senha = '{$nova_senha}' WHERE email = '{$email}'";
                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('Senha atualizada com sucesso');</script>";
                    echo "<script>window.location.href = 'index.php';</script>";
                    exit;
                } else {
                    echo "Erro ao atualizar a senha: " . $conn->error;
                }
            } else {
                echo "As senhas não correspondem";
            }

            // Fecha a conexão com o banco de dados
            $conn->close();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form class="mt-5" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="nova_senha" class="form-label">Nova Senha:</label>
                        <input type="password" id="nova_senha" name="nova_senha" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="confirmar_nova_senha" class="form-label">Confirmar Nova Senha:</label>
                        <input type="password" id="confirmar_nova_senha" name="confirmar_nova_senha" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Redefinir Senha</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

