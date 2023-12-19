<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Candidature;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCandidatureRequest;

class CandidatureController extends Controller
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
    public function store(CreateCandidatureRequest $request)
    {
        try {
            $candidat = new Candidature();
            
             $candidat->statut = $request->statut;
            $candidat->date_candidature = $request->date_candidature;
            // $candidat->admin_id=1;
    
            $candidat->save();
    
            return response()->json([
                'status_code' =>200,
                'status_message' => 'la candidature a été enregistré avec succes',
                'data'=>$candidat
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
