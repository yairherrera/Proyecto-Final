@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 bg-light ">
                @if (count(Cart::getContent()))
                    <table class="table table-striped">
                        <thead>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                        </thead>
                        <tbody>
                            @foreach (Cart::getContent() as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>
                                        <a class="btn btn-danger" href="{{ url('/remove/'.$item['id']) }}">X</a>
                                        

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection 