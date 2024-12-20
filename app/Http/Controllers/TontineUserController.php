<?php

namespace App\Http\Controllers;

use App\Models\TontineUser;
use App\Models\User;
use App\Repositories\Tontines\TontineRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\TontineUser\TontineUserRepository;
use Exception;

class TontineUserController extends Controller
{
    private $tontineUserRepository;
    private $tontineRepository;
    public  function __construct(TontineUserRepository $tontineUserRepository,
        TontineRepository $tontineRepository){
        $this->tontineUserRepository = $tontineUserRepository;
        $this->tontineRepository = $tontineRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $myTontines = $this->tontineUserRepository->myTontines($user->id);
        $openTontines = $this->tontineRepository->getAll();
        return view('dashboard.payment.my-tontine.index', compact('myTontines', 'openTontines'));
    }

    public function showUserTontines()
    {
        $user = Auth::user();
        $tontineCount= $this->tontineUserRepository->myTontines($user->id);
        return view('dashboard.dashboard', compact('tontineCount'));
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
        $user = Auth::user();
        $inputs = $request->all();
        $inputs['user_id'] = $user->id;

        try {
            $tontine = $this->tontineRepository->getById($request->tontine_id);
            if($tontine){
                $nbreNom = $this->tontineUserRepository->isMember($tontine->id, $user->id);
                if($nbreNom >= $tontine->max_name_per_member){
                    throw new Exception("Vous ne pouvez plus souscrire à cette tontine. (max $tontine->max_name_per_member nom) par membre");
                }
                if ($nbreNom > 0) {
                    $inputs['nombre_de_nom'] = $user->name .' '. $nbreNom +1;
                }else{
                    $inputs['nombre_de_nom'] = $user->name;
                }
                $this->tontineUserRepository->store($inputs);

            }else{
                throw new Exception('Tontine non existante');
            }
        } catch (Exception $ex) {
            return redirect()->back()->with('danger', $ex->getMessage());
        }
        return redirect()->back()->with('success', 'Inscription réussie !');
    }

    /**
     * Display the specified resource.
     */
    public function show(TontineUser $tontineUser)
    {
        // $user = Auth::user();
        // $myTontines = $this->tontineUserRepository->myTontines($user->id);
        // $tontineCount = $user->tontineUserRepository->myTontines($user->id)->count();
        // return view('dashboard.dashboard', compact('nbreTontine '));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TontineUser $tontineUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TontineUser $tontineUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       try {
        $tontineUser = $this->tontineUserRepository->getById($id);

        // dd($tontineUser, $id);

        if ($tontineUser) {
            $tontineUser->delete();
        }
        else{
            throw new Exception("Adhésion non existante");
        }

        } catch (Exception $th) {
            $err = "Erreur survenue : ".$th->getMessage();
            return redirect()->back()->with('error', $err);
        }

        return redirect()->back()->with('success', 'Adhésion supprimée');
    }

    public function tontiner($id){

        $tontine = $this->tontineRepository->getById($id) ;
        if ($tontine) {
            $view = view('dashboard.payment.my-tontine.tontiner', compact('tontine'))->render();
            return response()->json([
                'success' => true,
                'view' => $view
            ]);

        }

        return response()->json([
            'success' => false,
            'view' =>''
        ]);
    }
}
