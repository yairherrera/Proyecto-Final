@extends('layouts.app') 

@section('content')
<div class="row justify-content-center">
    <h2>Nueva Publicación</h2>
</div>
<div class="row justify-content-center">
    @if (count($errors)>0)
        <div class="row alert alert-danger">
            <p>¡Opsss! Hubo problemas con los dtos proporcionados </p>
            <ul>
                @foreach ($errors ->all() as $error)
                    <li>{{ $error }}</li>
                    
                @endforeach
            </ul>
        </div>
        
    @endif
    <form action="{{ route('productos.update',$id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre" class="col-sm-12 col-form-table">
                {{__('Nombre')}}
            </label>
            <div class="col-sm-12">
                <input type="text" id="nombre" name="nombre" class="form-control 
                {{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{old('nombre') }}" autofocus>
                @if ($errors->has('nombre'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('nombre')}}</strong>
                    </span> 
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="precio" class="col-sm-12 col-form-label">
                {{__('Precio')}}
            </label>
            <div class="col-sm-12">
                <input name="precio" id="precio"rows="3" 
                class="form-control{{ $errors->has('precio') ?  ' is-invalid' : '' }}" value="{{old('precio')}}">
                @if ($errors->has('precio'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('precio')}}</strong>
                    </span>  
                @endif
            </div>
        </div>
        <div class="form-group" >
            <label for="categoria" class="col-sm-12 col-form-label">{{__('Categoría')}}</label>
            <div class="col-sm-12">
                <select class="form-control" name="categoria" id="categoria">
                    <option>Celulares</option>
                    <option>Desktop</option>
                    <option>Accesorios</option>
                </select>
            </div>
            
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <div class="custom-file">
                    <input type="file" id="imagen" name="imagen" 
                    class="custom-file-input {{ $errors->has('imagen') ? ' is-invalid' : ''}}">
                    <label for="customFile" class="custom-file-label">{{__('Choose image')}}</label>
                    @if ($errors->has('imagen'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('imagen')}}</strong>
                        </span>   
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="cantidad" class="col-sm-12 col-form-label">
                {{__('Cantidad')}}
            </label>
            <div class="col-sm-12">
                <input name="cantidad" id="cantidad"rows="3" 
                class="form-control{{ $errors->has('cantidad') ?  ' is-invalid' : '' }}" value="{{old('cantidad')}}">
                @if ($errors->has('cantidad'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('cantidad')}}</strong>
                    </span>  
                @endif
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">
                    {{__('Create')}}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection