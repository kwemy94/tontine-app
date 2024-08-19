<?php

namespace App\Http\Controllers;

use App\Models\Tirage;
use Illuminate\Http\Request;
use App\Repositories\Tirages\TirageRepository;

class TirageController extends Controller
{
    private $tirageRepository;
    public function __construct(TirageRepository $tirageRepository)
    {
        $this->tirageRepository = $tirageRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tirages = $this->tirageRepository->getAll();
        return view('dashboard.tirage.index', compact('tirages'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tirage $tirage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tirage $tirage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tirage $tirage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tirage $tirage)
    {
        //
    }
}
