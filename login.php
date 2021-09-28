<html>
    <header>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/sb-admin.min.css">
        <title>Login</title>

    </header>

    <body class="bg-dark" style=" background-image: url('startbootstrap-clean-blog-gh-pages/img/login.jpeg');   background-size: 100%; background-repeat: repeat-y;">

        <div class="container">
            <div class="card card-login mx-auto mt-5">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <form action="loginProcessar.php" method="post">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu email" required>
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite a senha" required>
                        </div>
                        <div class="form-group">
                          
                        </div>
                        <button class="btn btn-primary btn-block">Entrar no Sistema</button>
                        <div class="text-center">
                            
                        </div>
                    </form>
                </div>


            </div>

        </div>
       


        <script src="bootstrap2/jquery/jquery.min.js"></script>
        <script src="bootstrap2/js/bootstrap.bundle.min.js"></script>
      
    </body>
</html>