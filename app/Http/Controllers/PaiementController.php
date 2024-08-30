<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Tontine;
use App\Repositories\Cycles\CycleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Payments\PaymentRepository;
use App\Repositories\TontineUser\TontineUserRepository;


class PaiementController extends Controller
{
    private $paymentRepository;
    private $tontineUserRepository;
    private $cycleRepository;
    public function __construct(PaymentRepository $paymentRepository,TontineUserRepository $tontineUserRepository,CycleRepository $cycleRepository){
        $this->paymentRepository = $paymentRepository;
        $this->tontineUserRepository = $tontineUserRepository;
        $this->cycleRepository = $cycleRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $payments = $this->paymentRepository->getAll();
        $myTontines = $this->tontineUserRepository->myTontines($user->id);
        $cycle = $this->cycleRepository->getAll();
        // $tontine = Tontine::find($request->tontine_id);

        //     if($tontine->cycle->intitule === 'Mensuel')
        //     {

        //     }

        return view('dashboard.payment.index', compact('payments','myTontines'));
    }


    public function currentUserPayment(){
        $user = Auth::user();
        $payments = $this->paymentRepository->paymentUser($user->id);

        return view('dashboard.payment.cotisation.index', compact('payments'));
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

         $validatedData = $request->validate([
                'name_tontine' => 'required|unique:tontines',
                'payment_amount' => 'required',
                'period' => 'required',
                'reference' => 'required',
            ]);
            $data = $request->all();
            $this->tontineUserRepository->store($data);

        return redirect()->back()->with('success', 'payement effectué avec succès');


    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
