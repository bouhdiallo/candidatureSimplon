<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Formation;
use Illuminate\Http\Request;
use App\Http\Requests\CreateFormationRequest;
use App\Http\Requests\UpdateFormationRequest;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateFormationRequest $request)
    {
        
        try {
            $simplon = new Formation();
            
             $simplon->name = $request->name;
            $simplon->date_debut = $request->date_debut;
            $simplon->admin_id=1;
    
            $simplon->save();
    
            return response()->json([
                'status_code' =>200,
                'status_message' => 'la formation a été ajouté avec succes',
                'data'=>$simplon
            ]);
    
           } catch (Exception $e) {
             
             return response()->json($e);
           }
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFormationRequest $request, $id)
    {        
        try {
            $simplon = Formation::find($id);
            $simplon->name = $request->name;
            $simplon->date_debut = $request->date_debut;
            $simplon->admin_id=1;

   
            $simplon->save();
   
    
            return response()->json([
                'status_code' =>200,
                'status_message' => 'la formation a été modifié',
                'data'=>$simplon
            ]);
    
           } catch (Exception $e) {
             
             return response()->json($e);
           }
          }
    

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Formation $simplon)
    {
        try{
          
            $simplon->delete();

            return response()->json([
              'status_code' =>200,
              'status_message' => 'la formation a été supprimé',
              'data'=>$simplon
          ]);



      }catch(Exception $e){
          return response()->json($e);
      }
  }
    }

