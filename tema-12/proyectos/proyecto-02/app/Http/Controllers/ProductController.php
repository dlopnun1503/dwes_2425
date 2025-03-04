<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return 'Mostrando product index';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return 'Mostrando product create';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        return 'Mostrando product store';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return 'Mostrando product show';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return 'Mostrando product edit';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        return 'Mostrando product update';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        return 'Mostrando product destroy';
    }
}
