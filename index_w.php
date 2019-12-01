<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Login Form</title>
  <link rel="stylesheet" href="css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <section class="container">
    <div class="login">
      <h1>Accès à TICTAN Web App</h1>
      <form method="post" action="validate.php">
        <p><input type="text" name="login" value="" placeholder="Nom Utilisateur"></p>
        <p><input type="password" name="password" value="" placeholder="Mot de passe"></p>
        <p class="remember_me">
          <label>
            <input type="checkbox" name="remember_me" id="remember_me">
            Se souvenir
          </label>
        </p>
        <p class="submit"><input type="submit" name="commit" value="Login"></p>
		<p class=<span> Vérifiez votre code utilisateur et votre mot de passe </span>
      </form>
    </div>

    <div class="login-help">
      <p>Mot de passe oublié? <a href="index_w.php">Réinitialiser</a>.</p>
    </div>
  </section>

  
</body>
</html>
