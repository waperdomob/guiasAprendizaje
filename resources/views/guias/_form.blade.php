
<div class="form-group">
    <label for="nombre">Nombre</label>
    <input id="nombre" class="form-control" type="text" name="nombre"
    value="{{ isset($guia->nombre)?$guia->nombre:old('nombre')}} " required>
</div> 
<div class="form-group">
    <label for="descripcion">Descripcion</label>
    <input id="descripcion" class="form-control" type="text" name="descripcion"
    value="{{ isset($guia->descripcion)?$guia->descripcion:old('descripcion')}} " required>
</div>
<div class="form-group">
    <label for="tema">Tema</label>
    <input id="tema" class="form-control" type="text" name="tema"
    value="{{ isset($guia->tema)?$guia->tema:old('tema')}} " required>
</div>
<div class="form-group">
    <label for="duracion">Duración</label>
    <input id="duracion" class="form-control" type="datetime" name="duracion"
    value="{{ isset($guia->duracion)?$guia->duracion:old('duracion')}} " required>
</div>
<div class="form-group">
    
</div>
<div class="form-group">
    @if ( $id )
        <input id="user_id" class="form-control" type="number" name="user_id"  value="{{ $id }}" hidden>
    @endif    
</div>

