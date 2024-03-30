<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../assets/css/login.css">
  <link rel="stylesheet" href="../../assets/css/login-responsive.css">
  
  <title>Login</title>
</head>
<body>
  <main class="container">
    <form id="login" name="login" method="POST" action="../../index.php?c=usuarios&a=validar" autocomplete="off">

        <h1>LOG <span>IN</span></h1>
        <div class="form-group">
        <label for="user" class="label-form label">User</label>
						<select name="user" class="input-form" id="user">

              
							<option value=""></option>
							<option value="Juez1">Juez1</option>
							<option value="Juez2">Juez2</option>
							<option value="Juez3">Juez3</option>
							<option value="Juez4">Juez4</option>
							<option value="Juez5">Juez5</option>
							<option value="Juez6">Juez6</option>
							<option value="Juez7">Juez7</option>
							<option value="Administrador">Administrador</option>
							<option value="AdministradorBDKarate">Administrador de usuario</option>
						</select>

           
           

        </div>

        <div class="form-group">
        <input type="password" name="password" maxlength="30" minlength="" required title="la contraseña debe de tener 8 minimo caracteres y al menos una mayuscula"   class="input-form">
          <label for="password" class="label-form">Password</label>
        </div>

        <div class="form-group">
<label for="grupoUsuario" class="label-form label">Grupo</label>
						<select name="grupoUsuario" class="input-form" id="grupoUsuario">

              
							<option value=""></option>
							<option value="Juez">Juez</option>
							<option value="Juez1">Juez1</option>
							<option value="Administrador">Administrador</option>
							<option value="AdministradorBDKarate">Administrador de usuario</option>
						</select>
</div>
        
         
            <button name="btn-ingresar" type="submit" class="btn btn-login">
              Iniciar
            <span class="bar"></span>

            </button>
     
      </form>

  </main>

</body>
</html>