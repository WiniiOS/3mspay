@extends('layouts.app')
@section('content')

            <p class="mb-0 pt-2">Entrez vos informations pour vous connecter :</p>
            </div>
                <div class="card-body">

                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger" role="alert"> {{ $error }} </div>
                        @endforeach
                    @endif

                    <form action="{{ route('signin') }}" method="post">
                        @csrf
                        <div class="mb-3">
                        <input type="text" class="form-control form-control-lg" name="cni_pass" placeholder="CNI/Passport" aria-label="Email">
                        </div>
                        <div class="mb-3">
                        <input type="password" class="form-control form-control-lg" name="password" placeholder="Mot de passe" aria-label="Password">
                        </div>
                        <div class="form-check form-switch">
                            
                        </div>
                        <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-success btn-lg w-100 mt-4 mb-0">Se connecter</button>
                        </div>
                    </form>
                </div>

                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                    <p class="mb-4 text-sm mx-auto">
                    Vous n'etes pas encore inscrit?
                    <a href="{{ route('register') }}" class="text-primary text-gradient font-weight-bold">Inscrivez-vous</a>
                    </p>
                </div>

            </div>
        </div>
        
        <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
        <div class="position-relative bg-gradient-success h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image:url('assets/img/pexels-photo-5863365.jpeg');
              background-size: cover;">
    

@endsection