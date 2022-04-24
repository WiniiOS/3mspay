@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-success" role="alert"> {{ $error }} </div>
    @endforeach
@endif