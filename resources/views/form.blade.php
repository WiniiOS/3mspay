<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ url('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href=" assets/css/nucleo-svg.css " rel="stylesheet" />

    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href=" assets/css/nucleo-svg.css " rel="stylesheet" />

    <link id="pagestyle" href="{{ url('assets/css/argon-dashboard.min790f.css?v=2.0.1') }}" rel="stylesheet" />
    <title>3mspay</title>
</head>
<body class="g-sidenav-show   bg-gray-100">

<main class="main-content  mt-0">
    <div class="container-fluid py-4">
        <div class="row mb-5">
            <div class="col-12">
                <div class="multisteps-form mb-5">
                
                    <div class="row">
                        <div class="col-12 col-lg-8 mx-auto my-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="multisteps-form__progress">
                                        <button class="multisteps-form__progress-btn js-active" type="button" title="User Info">
                                        <span>Informations</span>
                                        </button>
                                        <button class="multisteps-form__progress-btn" type="button" title="Address">Coordonnées</button>
                                        <button class="multisteps-form__progress-btn" type="button" title="Socials">Mode de paiement</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-12 col-lg-8 m-auto">
                            <form method='post' action="{{ route('ticket.save') }}" class="multisteps-form__form mb-8"> 
                                @csrf
                                <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                                    <h5 class="font-weight-bolder mb-0">Informations personelles</h5>
                                    <p class="mb-0 text-sm">Entrez vos informations</p>
                                    <div class="multisteps-form__content">
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                            <label>Nom</label>
                                            <input class="multisteps-form__input form-control" type="text" placeholder="ex. Michael" />
                                            </div>
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                            <label>Prénom</label>
                                            <input class="multisteps-form__input form-control" type="text" placeholder="ex. Ange" />
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                            <label>Date de naissance</label>
                                            <input class="multisteps-form__input form-control" type="date"/>
                                            </div>
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                            <label>Lieu de naissance</label>
                                            <input class="multisteps-form__input form-control" type="email" placeholder="ex. support@bloosat.com" />
                                            </div>
                                        </div>
                                        <div class="button-row d-flex mt-4">
                                        <button class="btn bg-gradient-success ms-auto mb-0 js-btn-next" type="button" title="Next">Suivant</button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card multisteps-form__panel p-3 border-radius-xl bg-white" data-animation="FadeIn">
                                    <h5 class="font-weight-bolder">Adresses</h5>
                                    <div class="multisteps-form__content">
                                        <div class="row mt-3">
                                        <div class="col">
                                        <label>Nationalité </label>
                                        <input class="multisteps-form__input form-control" type="text" placeholder="ex. Camerounaise" />
                                        </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <label>Téléphone</label>
                                                <input class="multisteps-form__input form-control" type="text" placeholder="ex: 655387654" />
                                            </div>
                                            <div class="col-md-6">
                                                <label>E-mail</label>
                                                <input name='email' class="multisteps-form__input form-control" type="email" placeholder="ex: mon.nom@gmail.com" />
                                            </div>
                                        </div>
                                       
                                        <div class="button-row d-flex mt-4">
                                        <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Précédent</button>
                                        <button class="btn bg-gradient-success ms-auto mb-0 js-btn-next" type="button" title="Next">Suivant</button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card multisteps-form__panel p-3 border-radius-xl bg-white" data-animation="FadeIn">
                                    <div class="row text-center">
                                        <div class="col-10 mx-auto">
                                        <h5 class="font-weight-normal">Comment ça fonctionne ? </h5>
                                        <p>Selectionnez l'un des modes de payement qui s'affiche </p>
                                        </div>
                                    </div>
                                    <div class="multisteps-form__content">
                                        <div class="row mt-4">
                                            <div class="col-sm-3 ms-auto">
                                            <input type="checkbox" class="btn-check" id="btncheck1">
                                            <label class="btn btn-lg btn-outline-secondary border-2 px-6 py-5" for="btncheck1">
                                            <img src="{{ url('assets/img/Orange-Money-logo.png') }}" width="50px">
                                            </label>
                                            <h6>Orange Money</h6>
                                            </div>
                                            <div class="col-sm-3">
                                            <input type="checkbox" class="btn-check" id="btncheck2">
                                            <label class="btn btn-lg btn-outline-secondary border-2 px-6 py-5" for="btncheck2">
                                                <img src="{{ url('assets/img/mobile-money-logo.png') }}" width="50px">
                                            </label>
                                            <h6>Mobile Money</h6>
                                            </div>
                                            <div class="col-sm-3 me-auto">
                                            <input type="checkbox" class="btn-check" id="btncheck3">
                                            <label class="btn btn-lg btn-outline-secondary border-2 px-6 py-5" for="btncheck3">
                                                <img src="{{ url('assets/img/MasterCard_Logo.svg.png') }}" width="50px">
                                            </label>
                                            <h6>MasterCard</h6>
                                            </div>
                                        </div>
                                        <div class="button-row d-flex mt-4">
                                        <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Precedent</button>
                                        <button class="btn bg-gradient-success ms-auto mb-0 js-btn-send" type="button" title="Send">Terminer</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</main>

<script src=" {{ url('assets/js/core/popper.min.js') }}"></script>
<script src=" {{ url('assets/js/core/bootstrap.min.js') }}"></script>
<script src=" {{ url('assets/js/plugins/perfect-scrollbar.min.js') }} "></script>
<script src=" {{ url('assets/js/plugins/smooth-scrollbar.min.js') }} "></script>
<script src=" {{ url('assets/js/plugins/multistep-form.js') }} "></script>

<script src=" {{ url('assets/js/plugins/dragula/dragula.min.js') }} "></script>
<script src=" {{ url('assets/js/plugins/jkanban/jkanban.js') }} "></script>
<script src="{{ url('assets/js/plugins/sweetalert.min.js') }}"></script>

<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>

<script async defer src="https://buttons.github.io/buttons.js"></script>

<script src=" {{ url('assets/js/argon-dashboard.min.js?v=2.0.1') }} "></script>

</body>
</html>