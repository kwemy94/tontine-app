<?php

namespace App\Http\Controllers;

use App\Models\TontineUser;
use App\Repositories\Tontines\TontineRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\TontineUser\TontineUserRepository;

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
        $tontines = $this->tontineRepository->getAll();

        return view('dashboard.payment.my-tontine.index', compact('myTontines', 'tontines'));
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
    public function show(TontineUser $tontineUser)
    {
        //
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
    public function destroy(TontineUser $tontineUser)
    {
        //
    }
}