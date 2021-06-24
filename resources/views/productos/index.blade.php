@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                    <h2>Productos</h2>
                </div>
            <div class="pull-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Crear Producto
                  </button>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Categoria</th>
            <th>Descripción</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($products as $product)
	    <tr>
	        <td>{{ $product->nombre }}</td>
	        <td>{{ $product->precio }}</td>
            <td>{{ $product->categoria }}</td>
            <td>{{ $product->descripcion }}</td>
	        <td>
                
                <a class="btn btn-info" href="{{ route('productos.show',$product->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('productos.edit',$product->id) }}">Edit</a>
                <form action="{{ route('productos.destroy',$product->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                <form action="{{route('cart.add')}}" method="post">
                    @csrf
                    <input type="hidden" name="producto_id" value="{{$product->_id}}">
                    <input type="submit" name="btn" class="btn btn-success" value="Agregar al carrito">
                </form>
                
                
	        </td>
	    </tr>
	    @endforeach
    </table>
        </div>
        <div class="container">
            @if (count(Cart::getContent()))
            <a href="{{route('cart.checkout')}}">VER CARRITO <span class="badge badge-danger">{{count(Cart::getContent())}}</span></a>
            @endif
           
        </div>
    </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

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
                    <form action="{{ route('productos.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
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
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
      
    
  </div>

    


@endsection