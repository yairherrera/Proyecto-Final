    @extends('layouts.app')

    @section('title', 'Compra')
    
    @section('content')

    <h1 class="row justify-content-center">Presente su Queja</h1>
        <div class="row justify-content-center">
        <form  action="{{route('compra.store')}}" method="POST">


        @csrf
        <div class="form-group">
        <label for="">
            Nombre:
            <br>
            <input class="form-control" type="text" name="name" placeholder="Introduzca su nombre">
        </label>
        </div>
        <br>

        @error('name')
        <p><strong>{{$message}}</strong></p>
            
        @enderror
        <div class="form-group">
        <label>
            Correo:
            <br>
            <input type="email" class="form-control" id="exampleInputEmail1" name="correo" aria-describedby="emailHelp" placeholder="Ingresa tu correo">
            <small id="emailHelp" class="form-text text-muted">No compartiremos tu correo con nadie.</small>
        </label>
        </div>
        <br>
        <div class="form-group">
        <label>
            Mensaje:
            <br>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="mensaje"></textarea>
        </label>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Enviar Queja</button>
        </form>
    </div>    
    @endsection