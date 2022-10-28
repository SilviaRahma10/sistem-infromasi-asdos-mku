<?php

namespace App\Http\Controllers;

use App\Models\DocumentRegistration;
use App\Http\Requests\StoreDocumentRegistrationRequest;
use App\Http\Requests\UpdateDocumentRegistrationRequest;

class DocumentRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDocumentRegistrationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentRegistrationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DocumentRegistration  $documentRegistration
     * @return \Illuminate\Http\Response
     */
    public function show(DocumentRegistration $documentRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DocumentRegistration  $documentRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit(DocumentRegistration $documentRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocumentRegistrationRequest  $request
     * @param  \App\Models\DocumentRegistration  $documentRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocumentRegistrationRequest $request, DocumentRegistration $documentRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DocumentRegistration  $documentRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocumentRegistration $documentRegistration)
    {
        //
    }
}
