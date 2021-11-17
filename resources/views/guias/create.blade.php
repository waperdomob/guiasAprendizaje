@extends('dashboard')
@section('content')
<div class="container">

    <script>
        function recargar(segs) {
            setTimeout(function() {
               location.reload();
            }, parseFloat(segs) * 1000);
        }
   </script>

<form action="{{ route('guias.store') }}" method="post" id="generarPDF"         onsubmit="recargar(1)">
    @csrf 
    @include('guias._form')
    {!! Session::has('success')!!}
    <button class="btn btn-primary" type="submit">Enviar</button>
    <a class="btn btn-warning" href="{{ route('guias.index')}}">Regresar</a>
</form>
</div>
@endsection