<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Paiement en attente</title>
        <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
        <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <style>@import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap');

            html,
            body {
                height: 100%
            }

            body {
                display: grid;
                place-items: center;
                width: 100%;
                height: 100vh;
                background-image: linear-gradient(to bottom right, rgb(10, 153, 209), rgb(5, 76, 122));
                text-align: center;
                font-size: 16px
            }

            .modal-content {
                border-radius: 1rem
            }

            .modal-content:hover {
                box-shadow: 2px 2px 2px black
            }

            .fa {
                color: #2b84be;
                font-size: 90px;
                padding: 30px 0px
            }

            .b1 {
                background-color: #2b84be;
                box-shadow: 0px 4px #337095;
                font-size: 17px
            }

            .r3 {
                color: #c1c1c1;
                font-weight: 500
            }

            a,
            a:hover {
                text-decoration: none
            }
        </style>
        </head>
        <body oncontextmenu='return false' class='snippet-body modal-open'>
        
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#form"> Payer</button>

        <div class="modal fade show" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: block;" >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content py-md-5 px-md-4 p-sm-3 p-4">
                    <h3 style='color:#2b84be;'>En attente de votre paiement</h3>                     
                    
                    <h6 tyle='font-family:bold;font-size:2em;'> Composer #150*50# <br/> Saisir votre code secret Orange Money </h6>
                    <div class="d-flex justify-content-center">
                      <div class="spinner-border text-success" role="status">
                        <span class="sr-only">Loading...</span>
                      </div>
                    </div>

                    <p class="r3 px-md-5 px-sm-1">Entrez votre code secret pour accéder à votre ticket de session.</p>
                    <div class="text-center mb-3"> <button class="btn btn-primary w-50 rounded-pill b1">Annuler</button> </div>
                </div>
            </div>
        </div>

        <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
        <script type='text/javascript' src=''></script>
        <script type='text/javascript' src=''></script>
        <script type='text/Javascript'></script>
    </body>

        <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
    </body> -->
</html>