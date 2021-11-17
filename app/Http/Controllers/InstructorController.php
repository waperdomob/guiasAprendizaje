<?php

namespace App\Http\Controllers;

use App\Models\ficha;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $datos =  User::where('id','>',1)->with('ficha')->get();
        //return $datos;
        return view('instructor.index',compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('instructor.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $password = Hash::make('SENAaprendiz2021');
        $role = request()->get('role');
        $datos = request()->except(['role','_token','ficha']);
        $datos['password'] = $password;
        $ficha = request()->get('ficha');
        $idficha = DB::table('fichas')->select('id')->where('ficha', '=', $ficha)->first();
        //return $ficha;
        if ($idficha) {
            User::insert($datos);   
            User::where('email','=',$datos['email'])->update(['ficha_id'=>$idficha->id]);
            //DB::insert('insert into users ( ficha_id) values (?)', [$idficha->id]);

            return redirect()->route('instructor.index');
        } 
        else { 
            DB::insert('insert into fichas (ficha) values (?)', [$ficha]) ;
            User::insert($datos);
            $idficha = DB::table('fichas')->select('id')->where('ficha', '=', $ficha)->first();
            User::where('email','=',$datos['email'])->update(['ficha_id'=>$idficha->id]);
            //$user = User::find($datos['correo']);            
           // $user->roles()->sync($request->role);
            return redirect()->route('instructor.index');

        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        
        $user = User::where('id','=',$id)->first();
        $roles = Role::all();
        //return $roles;
        return view('instructor.edit',compact('user', 'roles')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $datos = $request->except(['_token','_method']);
        $user = User::where('email','=',$datos['email'])->first();
        //return $user;
        $user->roles()->sync($request->roles);
        return redirect()->route('instructor.index')->with('mensaje','Se asignó el rol correctamente');
    }

    
    public function destroy($id)
    {
        $relacion = DB::select('select id from guia_user where user_id = ?', [$id]);
        return $relacion;
        //$user =  User::where('id','=',$id)->with('guia_id')->get();
        //return $user;
        //$user->guias()->detach();
        User::destroy($id);
        return redirect()->route('guias.index');
    }
}
