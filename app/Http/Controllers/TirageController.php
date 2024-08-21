<?php

namespace App\Http\Controllers;

use App\Models\Tirage;
use App\Models\Tontine;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\Tirages\TirageRepository;
use App\Repositories\Tontines\TontineRepository;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Random;

class TirageController extends Controller
{
    private $tirageRepository;
    private $tontineRepository;
    public function __construct(TirageRepository $tirageRepository, TontineRepository $tontineRepository)
    {
        $this->tirageRepository = $tirageRepository;
        $this->tontineRepository = $tontineRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tirages = $this->tirageRepository->getAll();
        $tontines = $this->tontineRepository->getAll();
        return view('dashboard.tirage.index', compact('tirages', 'tontines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $tontines = Tontine::all();
        // return view('dashboard.tirage.create', compact('tontines'));
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

    public function lancerTirage($tontineId)
    {
        $user = Auth::user;
        //Récupère le tontine sélectionnée
        // $tontine = $request->select('tontine_id');

        //Compter le nombre d'utilisateurs de la table tontine-user
        $nombreUtilisateur = User::where('tontine_id',$tontineId )->count();

        //requete qui recupère la tontine dans la table tontine qui a comme id, tontineId
        $tontine = Tontine::where('id', $tontineId);

        //
        $orderP = json_decode($tontine->order_of_passage);
        $existNumber = [];
        if (!empty($orderP)) {
            foreach ($orderP as $key => $value) {
                array_push($existNumber, $value);
            }
        }

        do{
            $numero = rand(1, $nombreUtilisateur);
        } while(in_array($numero, $existNumber));

        array_push($orderP, ["t_".$user->id => $numero]);
        \DB::table('tontines')->update($tontineId, ['order_of_passage' =>json_encode($orderP)]);

        //Générer un numéro de tirage pour chaque utilisateur
        $tirages = [];
        for ($i = 1; $i <= $nombreUtilisateur; $i++)
        {
            $numeroTirage = mt_rand(1000, 9999);
            $tirages[] = [
                'user_id' => $i,
                'draw_number' => $numeroTirage
            ];
        }

        // $tirage->save();

        //Retourner le numéro de ti rage pour affichage dans la popup
         return response()->json(['numero_tirage' => $numeroTirage]);
    }

}
