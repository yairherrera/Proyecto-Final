@extends('layouts.app')

@section('content')
    <h1 class="row justify-content-center">{{ $producto->precio }}</h1>
    <p class="row justify-content-center">Producto Certificado</p>
    <a  class="row justify-content-center" class="btn btn-primary" href="{{ url('/send-mail') }}" role="button">Enviar Queja</a>
@endsection