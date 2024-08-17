<?php

namespace App\Http\Controllers;

use App\Models\Tontine;
use App\Repositories\Tontines\TontineRepository;
use Illuminate\Http\Request;

class TontineController extends Controller
{
    private $tontineRepository;
    public function __construct(TontineRepository $tontineRepository){
        $this->tontineRepository = $tontineRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tontines = $this->tontineRepository->getAll();
        // dd($tontines);
        return view('dashboard.tontine.index', compact('tontines'));
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
        // dd($request->all());
        try {
            $validatedData = $request->validate([
                'name_tontine' => 'required',
                'cycle' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'amount_tontine' => 'required'
            ]);
           $inputs = $request->all();
            $this->tontineRepository->store($inputs);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Tontine $tontine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tontine $tontine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tontine $tontine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tontine $tontine)
    {
        //
    }
}
