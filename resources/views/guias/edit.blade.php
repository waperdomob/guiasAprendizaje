@extends('dashboard')

@section('content') 
<div class="container">
      <form action="{{ route('guias.update',$guia->id) }}" method="post" enctype="multipart/form-data">        
        @csrf @method('PATCH')
        @include('guias._form')
        
        <div class="form-group">
            <label for="guiaPDF">Guia PDF</label><br>
            <input type="file" class="form-control" name="guiaPDF" id="guiaPDF" value=""><br>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="ficha_id">Fichas</label><br>
                <select name="ficha_id" id="ficha_id">
                    <option value="">Seleccione un ficha</option>
                    @foreach ($fichas as $ficha)
                        <option value="{{$ficha->id}}">
                        {{$ficha->ficha}}</option>
                    @endforeach 
                </select> 
            </div> 
            <div class="col-md-4">
                <label for="aprendiz">Aprendices</label><br>
                <select name="aprendiz" id="aprendiz">
                    <option value="">Seleccione el aprendiz</option>
                    @foreach ($aprendices as $aprendiz)
                    <option value="{{$aprendiz->id}}">
                    {{$aprendiz->name}}</option>
                @endforeach 
                </select> 
            </div> 
        </div>
            <br>
            <button class="btn btn-primary" type="submit">Asignar Guia</button>
        
            <a class="btn btn-secondary" href="{{ route('guias.index')}}">Regresar</a>         
    </form>
</div>
@endsection
@section('script')
<script src="{{asset('js/edit.js')}}"> </script>    
@endsection




