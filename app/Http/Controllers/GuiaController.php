<?php

namespace App\Http\Controllers;

use App\Models\ficha;
use Illuminate\Http\Request;
use App\Models\Guia;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Guia as GlobalGuia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

//use PDF;

class GuiaController extends Controller
{
    

    public function index()
    {
        $datos['guias'] =  Guia::paginate(5);
        return view('guias.index',$datos);
    }

    public function create()
    {
        $id = auth()->user()->id;      
        return view('guias.create',['guias'=> new Guia(),
        'id' => $id
        ] );
    }

   
    public function store(Request $request)
    {
        $today = Carbon::now()->format('d/m/Y/H/m');
        $nombreGuia = request()->get('nombre');
        $datos = request()->except(['_token','user_id']);        
        $user_id = request()->get('user_id');
        $instructor = User::where('id','=',$user_id)->get('name'); 
        Guia::insert($datos);
        $pdf = PDF::loadView('guias.pdf',compact('datos','instructor'));
        
        return $pdf->download($today.'_'.$nombreGuia.'.pdf');
        //return $pdf->stream($today.$nombreGuia.'guias.pdf');
        
        //return redirect()->route('guias.index');
    }

   
    public function show($guiaPDF)
    {
        $pdf_name= $guiaPDF;
        $url = url('pdf/'.$pdf_name);
        return Storage::get($url);
        
    }

   
    public function edit(Guia $guia)
    {
        $id = auth()->user()->id; 
        
        $guia = Guia::where('id','=',$guia->id)->first();
        $aprendices = User::where('id','!=',$id)->with('ficha')->get();
        
        $fichas = ficha::all();
        return view('guias.edit',['guia'=>$guia,'id'=>$id, 'fichas'=> $fichas,'aprendices'=>$aprendices ]);      
        
    }
   
    public function update(Request $request, $id)
    {
        $datos = $request->except(['_token','_method','guiaPDF','ficha_id','aprendiz','user_id']);
       
        $guia = Guia::findOrfail($id);

        if ($request->hasfile('guiaPDF')) {         
            $file = $request->file('guiaPDF');              
            Storage::delete(['public/'. $guia->guiaPDF]);
            $nombre = $datos['nombre'].".".$file->guessExtension();
            $ruta = public_path('pdf/'.$nombre);

            if ($file->guessExtension()=="pdf"){
                copy($file, $ruta);
            }
            else{
                 return redirect()->route('guias.index')->with('mensaje','el archivo no es un PDF');
            }
        }
        if ($request['ficha_id'])
        {
            
            $aprendices= User::where('ficha_id','=',$request['ficha_id'])->get();
            Guia::where('id','=',$id)->update($datos);
            Guia::where('id','=',$id)->update(['guiaPDF'=>$nombre]);
            
            foreach ($aprendices as $aprendiz) {
                
            $guia->users()->attach($aprendiz->id);
            }
            return redirect()->route('guias.index');
        }
        elseif ($request['aprendiz']) {
            Guia::where('id','=',$id)->update($datos);
            Guia::where('id','=',$id)->update(['guiaPDF'=>$nombre]);
            $guia->users()->attach($request['aprendiz']);
            return redirect()->route('guias.index');
        }
        
    }

   
    public function destroy(Guia $guia)
    {
        
        //$guiaaa = Guia::where('id','=',$guia->id)->get();
        
        $relaciones = DB::select('select id from guia_user where guia_id = ?', [$guia->id]);

        foreach ($relaciones as $id) {

            $guia->users()->detach($id);

        }
        Guia::destroy($guia->id);
        return redirect()->route('guias.index');
    }

    public function getAprendices($id){

      return User::where('ficha_id',$id)->get();
    }

   
}

