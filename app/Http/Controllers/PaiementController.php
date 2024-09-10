<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Tontine;
use App\Repositories\Cycles\CycleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Payments\PaymentRepository;
use App\Repositories\Tontines\TontineRepository;
use App\Repositories\TontineUser\TontineUserRepository;


class PaiementController extends Controller
{
    private $paymentRepository;
    private $tontineUserRepository;
    private $cycleRepository;
    private $tontineRepository;
    public function __construct(PaymentRepository $paymentRepository,TontineUserRepository $tontineUserRepository,CycleRepository $cycleRepository, TontineRepository $tontineRepository){
        $this->paymentRepository = $paymentRepository;
        $this->tontineUserRepository = $tontineUserRepository;
        $this->cycleRepository = $cycleRepository;
        $this->tontineRepository = $tontineRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $payments = $this->paymentRepository->getAll();
        $myTontines = $this->tontineUserRepository->myTontines($user->id);
        $cycles = $this->cycleRepository->getAll();
        $openTontines = $this->tontineRepository->getAll(0);


        return view('dashboard.payment.index', compact('payments','myTontines','cycles','openTontines'));
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
                'period' => 'required',

                'phone_number' => 'required',
            ]);

            // $this->tontineUserRepository->store($data);
            $tontine = $this->tontineRepository->getById($request->tontine_id);
            // dd($tontine);
            // $tontine->save();
            // $payements = $request->all();
            // $this->paymentRepository->store($tontine);
            $payements = new Payment();
            $user = Auth::user();
            $payements->user_id = $user->id;
            $payements->tontine_id = $tontine->id;
            $payements->payment_amount = $tontine->amount_tontine;
            $payements->period = $request->period;
            $payements->reference = json_encode('ref');
            $payements->phone_number = $request->phone_number;
            $payements->save();
            // return redirect('dashboard/payment/index')->with('success', 'payement effectué avec succès');
        // return redirect()->back()->with('success', 'payement effectué avec succès');


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
