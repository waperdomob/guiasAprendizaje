@extends('dashboard')

@section('content') 

<div class="container">
    <form action="{{ route('instructor.store') }}" method="post">
        @csrf 
        @include('instructor._form')

        <button class="btn btn-primary" type="submit">Enviar</button>
        
        <a class="btn btn-secondary" href="{{ route('instructor.index')}}">Regresar</a>
    
    </form>
    
    

</div>
@endsection