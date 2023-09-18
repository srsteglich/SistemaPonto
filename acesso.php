<?php
session_start();
include('config.php');
$id = $_GET['id'];

$sql = "SELECT * FROM usuarios WHERE id = '$id'";

$query = mysqli_query($conn, $sql);
while ($result = mysqli_fetch_array($query)) {
    $id  = $result['id'];
    $nome = $result['nome'];
    $tipo = $result['tipo'];
}
?>
<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Ponto</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #f2f2f2;
        }

        .login {
            width: 100%;
            height: 100vh;
            align-items: center;
            justify-content: center;
            display: flex;
        }

        h3 {
            text-align: center;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">Sistema Registro de Ponto</a>
            <?php
            print "<a href='./index.php' class='btn btn-danger'>Voltar</a>";
            ?>
        </div>
    </nav>
    <div class="login">
        <div class=" container">
            <div class="row">
                <div class=" col-lg-4 offset-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h3>Acesso Restrito</h3>
                        </div>
                        <div class="card-body">
                            <form action="login.php" method="POST">
                                <div class="mb-3">
                                    <label>Nome: </label>
                                    <input type="text" name="nome" value="<?php print $nome ?>" class=" form-control" />
                                </div>
                                <div class=" mb-3">
                                    <label>Senha</label>
                                    <input type="password" name="senha" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <script src="js/bootstrap.bundle.min.js"></script>
            </div>
        </div>
    </div>
</body>

</html>