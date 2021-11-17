@extends('dashboard')

@section('content') 
 

    <form action="{{ route('instructor.update',$user) }}" method="post">        
        @csrf @method('PATCH')
        @include('instructor._form')
        
        <div class="form-group">
            <label for="roles">Roles</label><br>
            <select name="roles" id="role"s required>
                <option value="">Seleccione un rol</option>
                @foreach ($roles as $role)
                <option value="{{$role->id}}">
                 {{$role->name}}</option>
            @endforeach 
            </select>   
        </div>
        
            <button class="btn btn-primary" type="submit">Asignar Rol</button>
        
            <a class="btn btn-secondary" href="{{ route('instructor.index')}}">Regresar</a>
        
    
    </form>
    


</div>
@endsection