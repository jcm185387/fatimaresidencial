<?php

namespace MiResidenciaEnLinea\Http\Controllers;

use Illuminate\Http\Request;
use MiResidenciaEnLinea\Trainer;
use MiResidenciaEnLinea\Http\Requests\StoreTrainerRequest;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        //return 'Hola desde el controlador resource';
        $request->user()->authorizeRoles(['ADMIN','SUPERADMIN']);
        $trainers = Trainer::all();
        return view("trainers.index", compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  
        return view('trainers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrainerRequest $request)
    {   
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);
        }
        $trainer = new Trainer();
        $trainer->name = $request->input('name');
        $trainer->avatar = $name;
        $trainer->slug = $request->input('slug');
        $trainer->descripcion =$request->input('descripcion');
        $trainer->save();
        return redirect()->route('trainers.index');
        //return 'Saved';
        
        //return $request;     

    }

    /**
     * 
     *
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function show($id)
    //public function show($slug)
    public function show(Trainer $trainer)
    {
        //
        //return 'tengo que retornar el recurso con id'.$id;
        //$trainer = Trainer::find($id);

        //$trainer = Trainer::where('slug','=',$slug)->firstOrFail();
        return view('trainers.show',compact('trainer'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainer)
    {
        //
        return view('trainers.edit', compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainer $trainer)
    {
        //
        //$trainer->fill($request->all());
        $trainer->fill($request->except('avatar'));
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $trainer->avatar = $name;
            $file->move(public_path().'/images/',$name);
        }
        $trainer->save();
        return redirect()->route('trainers.show',[$trainer])->with('status','Entrenador actualizado correctamente');
        //return 'Updated';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainer $trainer)
    {
        //
        $file_path = public_path().'/images/'.$trainer->avatar;
        \File::delete($file_path);
        
        $trainer->delete();
        //return 'deleted';
        return redirect()->route('trainers.index');

    }
}
