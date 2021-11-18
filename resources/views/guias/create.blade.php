@extends('dashboard')
@section('content')
<div class="container">

   
<form action="{{ route('guias.store') }}" method="post" id="generarPDF">
    @csrf 
    @include('guias._form')
    <button class="btn btn-primary" type="submit">Enviar</button>
    <a class="btn btn-warning" href="{{ route('guias.index')}}">Regresar</a>
</form>
</div>
@endsection