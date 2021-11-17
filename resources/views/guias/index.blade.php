@extends('dashboard')

@section('content') 

<div class="container">

    @if (Session::has('mensaje'))
        <div class="alert alert-primary alert-dismissible" role="alert">
            {{  Session::get('mensaje') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <h2>Guias de Aprendizaje</h2>
    @can('guias.create')

    <div class="float-right">
           
        <a href="{{ route('guias.create') }}" class="btn btn-primary">Nueva Guia</a>
    </div>
    @endcan        
   
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Tema</th>
                <th>Duracion</th>
                <th>PDF</th>
                @can('instructor.edit')  
                <th>Acciones</th>
                @endcan
            </tr>
        </thead>
        <tbody>
           @foreach ($guias as $guia)           
            
            <tr>
                <td>{{ $guia->id }}</td>
                <td>{{ $guia->nombre }}</td>
                <td>{{ $guia->descripcion }}</td>
                <td>{{ $guia->tema }}</td>
                <td>{{ $guia->duracion }}</td>
                <td>{{ $guia->guiaPDF }}</td>

                @can('instructor.edit')                   
                
                <td>
                    
                    <a class="btn btn-primary" href="{{ route('guias.edit',$guia) }}" >Editar</a>
                    <form action="{{ route('guias.destroy',$guia) }}" method="post" class="d-inline">|
                        @csrf @method('DELETE')
                        <input type="submit" value="Borrar" class="btn btn-danger" onclick="return confirm('Deseas borrar la guia?')">
                    </form>
                </td>
                @endcan
            </tr>
            @endforeach  
        </tbody>
        
    </table>
    
    
</div>
 @endsection