<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione Ordini, Clienti e Prodotti</title>
    <!-- Includi il link a Bootstrap (assicurati di avere una connessione Internet) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .card {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Gestione Ordini, Clienti e Prodotti</h1>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Clienti</h5>
                        <p class="card-text">Gestisci i tuoi clienti.</p>
                        <a href="clienti.php" class="btn btn-primary">Vai a Clienti</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ordini</h5>
                        <p class="card-text">Gestisci i tuoi ordini.</p>
                        <a href="ordini.php" class="btn btn-primary">Vai a Ordini</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Prodotti</h5>
                        <p class="card-text">Gestisci i tuoi prodotti.</p>
                        <a href="prodotti.php" class="btn btn-primary">Vai a Prodotti</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Includi la libreria jQuery e Bootstrap JS (assicurati di avere una connessione Internet) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>