<?php

namespace App\Http\Controllers;

use App\Models\Tontine;
use App\Repositories\Cycles\CycleRepository;
use App\Repositories\Tontines\TontineRepository;
use Exception;
use Illuminate\Http\Request;

class TontineController extends Controller
{
    private $tontineRepository;
    private $cycleRepository;
    public function __construct(TontineRepository $tontineRepository, CycleRepository $cycleRepository)
    {
        $this->tontineRepository = $tontineRepository;
        $this->cycleRepository = $cycleRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tontines = $this->tontineRepository->getAll();
        $cycles = $this->cycleRepository->getAll();
        return view('dashboard.tontine.index', compact('tontines', 'cycles'));
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
                'name_tontine' => 'required|unique:tontines',
                'cycle_id' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'amount_tontine' => 'required'
            ]);
            $inputs = $request->all();
            $this->tontineRepository->store($inputs);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
            return redirect()->back()->with('danger', 'Erreur de création de la tontine');
        }

        return redirect()->back()->with('success', 'Tontine créer avec succès');
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
    public function edit($id)
    {
        $tontine = $this->tontineRepository->getById($id);
        $cycles = $this->cycleRepository->getAll();
        if ($tontine) {
            $view = view('dashboard.tontine.edit', compact('tontine', 'cycles'))->render();

            return response()->json([
                'success' => true,
                'view' => $view
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => "Tontine non existante"
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $inputs = $request->all();
        try {
            $tontine = $this->tontineRepository->getById($id);
            if ($tontine) {
                $this->tontineRepository->update($id, $inputs);
            } else {
                throw new Exception("Tontine non existante");
            }
        } catch (Exception $ex) {
            dd($ex);
            return redirect()->back()->with('danger', "Echec de mise à jour!");
        }

        return redirect()->back()->with('success', "Mise à jour éffectuée!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tontine = $this->tontineRepository->getById($id);
        // dd($tontine);

        if ($tontine) {
            $tontine->delete();
            return redirect()->back()->with('success', 'Tontine supprimée');
        }
        return redirect()->back()->with('success', 'Tontine non existante');
    }
}
