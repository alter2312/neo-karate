<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inscripciones</title>
    <link rel="stylesheet" href="../../assets/css/formularios.css">
    <link rel="stylesheet" href="../../assets/css/responiveFormularios.css">
    <script src="assets/js/bootstrap.min.js"></script>
</head>

<body>
    <main class="container">
        <h1>Inscri<span>pciones</span></h1>

        <form id="nuevo" name="nuevo" method="POST" action="../../index.php?c=coach&a=inscripcionEquipo" autocomplete="off" class="form-small">

   

            <div class="form-group">
                    <input type="text" class="input-form" id="CI" name="CICompetidor1" required pattern="[0-9]{8}" title="Tu cedula deben ser los 8 dígitos sin la barra"  />
                    <label for="CI" class="label-form">CI capitan</label>
                </div>

                <div class="form-group">
                    <input type="text" class="input-form" id="CI" maxlength="8" minlength="8" name="CICompetidor2" required pattern="[0-9]{8}" title="Tu cedula deben ser los 8 dígitos sin la barra"  />
                    <label for="CI" class="label-form">CI integrante 2</label>
                </div>

                <div class="form-group">
                    <input type="text" class="input-form" id="CI" name="CICompetidor3" maxlength="8" minlength="8" required pattern="[0-9]{8}" title="Tu cedula deben ser los 8 dígitos sin la barra"  />
                    <label for="CI" class="label-form">CI integrante 3</label>
                </div>
                
                <div class="form-group">
                    <input type="text" class="input-form" id="CI" name="CICoach" maxlength="8" minlength="8" required pattern="[0-9]{8}" title="Tu cedula deben ser los 8 dígitos sin la barra"  />
                    <label for="CI" class="label-form">CI coach</label>
                </div>
            </div>

            

            <button id="guardar" name="guardar" type="submit" class="btn">
                Inscribir 
                <span class="bar"></span>
            </button>
        </form>
    </main>
    <script src="../../assets/js/main.js"></script>
</body>
</html>
