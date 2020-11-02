@extends('layouts.app')

@section('content')


@if(Session::has('Mensaje'))
    <div class="alert alert-success" role="aler">
    {{Session::get('Mensaje')}}
    </div>
@endif

<br>

<a href="{{url('cliente/create')}}" class="btn btn-primary">Agregar Cliente</a>
<br>
<br>

<table class="table table-light table-hover" >
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>RFC</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>IdCiudad</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    @foreach ($clientest as $cliente )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{  $cliente->rfc   }}</td>
                <td>{{  $cliente->nombre  }}</td>
                <td>{{  $cliente->edad  }}</td> 
                <td>{{  $cliente->idciudad }}</td>
                <td>
                     <a class="btn btn-secondary" href="{{ url('/cliente/'.$cliente->id.'/edit')}}">
                     Editar
                    <!-- <button>Editar</button>  -->
                    </a>
                    
                
                    <form method="post" action="{{ url('/cliente/'.$cliente->id)}}" style="display:inline;">
                        {{csrf_field()}}
                        {{method_field('DELETE') }}
                        <button class="btn btn-danger"  type="submit" onclick="return confirm('¿Desea borrar?');" > Borrar</button>
                    </form>
                </td>
            </tr>
    @endforeach
    </tbody>
</table>

{{ $clientest->links() }}
@endsection