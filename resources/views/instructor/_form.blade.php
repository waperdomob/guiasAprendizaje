<div class="form-group">
    <label for="name">Nombre</label>
    <input id="name" class="form-control" type="text" name="name" value="{{ isset($user->name)?$user->name:old('name')}}" required >
</div> 
<div class="form-group">
    <label for="email">Correo</label>
    <input id="email" class="form-control" type="email" name="email" value="{{ isset($user->email)?$user->email:old('email')}}" >
</div>
{{-- <div class="form-group">
    <label for="password">Contraseña</label>
    <input id="password" class="form-control" type="password" name="password" value="SENAaprendiz2021" >
</div> --}}
<div class="form-group">
    <label for="ficha">Ficha</label>
    <input id="ficha" class="form-control" type="text" name="ficha"
     value="{{ isset($user->ficha['ficha'])?$user->ficha['ficha']:old('ficha')}}" >
</div>


