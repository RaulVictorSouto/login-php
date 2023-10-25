<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4">
                <form action="login.php" method="post">
                    <div class="mb-3">
                        <label for="usuario">Usuário</label>
                        <input type="text" name="usuario" id="usuario" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" id="senha" class="form-control">
                    </div>
                    <div class="mb-3 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                        <a href="nova_senha.php" class="btn btn-link float-end">Esqueceu sua senha?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>



