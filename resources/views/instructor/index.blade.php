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

    <h2>Aprendices</h2>

        
        <div class="float-lefth">
            
            <a href="{{ route('instructor.create') }}" class="btn btn-primary">Nuevo Aprendiz</a>
        </div>
   
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Ficha</th>
               
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($datos as $aprendiz)   
                             
           
            <tr>
                <td>{{ $aprendiz->id }}</td>
                <td>{{ $aprendiz->name }}</td>
                <td>{{ $aprendiz->email }}</td>

                @if (isset($aprendiz->ficha['ficha']))

                <td>{{ $aprendiz->ficha['ficha']}}</td>
                    
                @else
                   <td>Null</td> 
                @endif
                
                <td>
                    
                    <a class="btn btn-primary" href="{{ route('instructor.edit',$aprendiz->id) }}" >Editar</a>
                    <form action="{{ route('instructor.destroy',$aprendiz->id) }}" method="post" class="d-inline">|
                        @csrf @method('DELETE')
                        <input type="submit" value="Borrar" class="btn btn-danger" onclick="return confirm('Deseas borrar al aprendiz?')">
                    </form>
                </td>
            </tr>
             

            @endforeach  
        </tbody>
        
    </table>
    
    
</div>
 @endsection