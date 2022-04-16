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
<body>

    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
            <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                    <div class="card card-plain">
                    <div class="card-header pb-0 text-start">
                        <img src="{{ url('assets/img/logo-minsante.png') }}" height="110px" width="">

            @yield('content')

                <span class="mask bg-gradient-success opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Bienvenu  sur le 3ms"</h4>
                <p class="text-white position-relative">Effectuez votre pre-enrolerement de test COVID, en tout securite et aussi en toute confidentialite.</p>
                </div>
                </div>
                </div>
            </div>
            </div>
        </section>
    </main>
    
</body>
</html>