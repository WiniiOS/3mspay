
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
    <title>3MS</title>
</head>
<body class="g-sidenav-show   bg-gray-100">

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-success" id="sidenav-main">
    <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="#" target="_blank">
    <img src="{{ url('assets/img/logo-minsante.png') }}" class="navbar-brand-img h-100 w-200" alt="main_logo">
    <span class="ms-1 font-weight-bold text-white">3MS-PAY</span>
    </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
    <li class="nav-item mb-2 mt-0">
    <a data-bs-toggle="collapse" href="#ProfileNav" class="nav-link text-white" aria-controls="ProfileNav" role="button" aria-expanded="false">
    <img src="{{ url('assets/img/default.png') }}" class="avatar">
    <span class="nav-link-text ms-2 ps-1">Nom du patient</span>
    </a>
    <div class="collapse" id="ProfileNav" >
    <ul class="nav ">
    <li class="nav-item">
    <a class="nav-link text-white" href="#">
    <span class="sidenav-mini-icon"> MP </span>
    <span class="sidenav-normal  ms-3  ps-1"> Profil </span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-white " href="#">
    <span class="sidenav-mini-icon"> P </span>
    <span class="sidenav-normal  ms-3  ps-1">Parametre </span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-white " href="/Logout" >
    <span class="sidenav-mini-icon"> D </span>
    <span class="sidenav-normal  ms-3  ps-1"> Deconnexion </span>
    </a>
    </li>
    </ul>
    </div>
    </li>
    </ul>
    </div>
</aside>

<main class="main-content  mt-0">
 
<div class="container-fluid my-3 py-3">
<div class="row">
<div class="col-md-10 col-lg-8 col-sm-10 mx-auto">
<form action="{{ route('pay') }}" method="post">
  @csrf
  <div class="card my-sm-5">
  <div class="card-header text-center">
  <div class="row justify-content-between">
  <div class="col-md-4 text-start">
  <img class="mb-2 w-50 p-2" src="{{ url('assets/img/logo-minsante.png') }}"  >
  <h6>
  3MS-MINSANTE, CAMEROUN
  </h6>
  <p class="d-block text-secondary">tel: +237 {{ $user->telephone }}</p>
  </div>

  <div class="col-lg-3 col-md-7 text-md-end text-start mt-5">
  <h6 class="d-block mt-2 mb-0">Patient : {{ $user->firstname }} {{ $user->lastname }}</h6>
  <p class="text-secondary">Camerounais(e)<br>
  Yaoundé<br>
  Cameroun
  </p>
  </div>
  </div>
  <br>
  <div class="row justify-content-md-between">
  <div class="col-md-4 mt-auto">
  <h6 class="mb-0 text-start text-secondary font-weight-normal">
  Reference
  </h6>
  <h5 class="text-start mb-0"> 3M***********X </h5>
  </div>
  <div class="col-lg-5 col-md-7 mt-auto">
  <div class="row mt-md-5 mt-4 text-md-end text-start">
  <div class="col-md-6">
  <h6 class="text-secondary font-weight-normal mb-0">Date sortie:</h6>
  </div>
  <div class="col-md-6">
  <h6 class="text-dark mb-0">{{ $ticket->created_at }}</h6>
  </div>
  </div>
  <div class="row text-md-end text-start">
  <div class="col-md-6">
  <h6 class="text-secondary font-weight-normal mb-0">Date paiement: </h6>
  </div>
  <div class="col-md-6">
  <h6 class="text-dark mb-0">**/**/2022</h6>
  </div>
  </div>
  </div>
  </div>
  </div>
  <div class="card-body">
  <div class="row">
  <div class="col-12">
  <div class="table-responsive">
  <table class="table text-right">
  <thead>
  <tr>
  <th scope="col" class="pe-2 text-start ps-2">Motif du paiement</th>
  <th scope="col" class="pe-2"></th>
  <th scope="col" class="pe-2" colspan="2"></th>
  <th scope="col" class="pe-2">Montant</th>
  </tr>
  </thead>
  <tbody>
  <tr>
  <td class="text-start">Paiement du ticket de session test COVID-19</td>
  <td class="ps-4"></td>
  <td class="ps-4" colspan="2">30.000 FCFA</td>
  <td class="ps-4">30.000 FCFA</td>
  </tr>
  </tbody>
  <tfoot>
  <tr>
  <th></th>
  <th></th>
  <th class="h5 ps-4" colspan="2">Total</th>
  <th colspan="1" class="text-right h5 ps-4">30.000 FCFA</th>
  </tr>
  </tfoot>
  </table>
    <div class="col-lg-7 text-md-end mt-md-0 mt-3">
      <button class="btn bg-gradient-success mt-lg-7 mb-0" type="button" name="button">Payer</button>
    </div>
  </div>
  </div>
  </div>
  </div>

  </div>
</form>
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