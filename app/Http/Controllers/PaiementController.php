<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Payment;
use App\Models\Tontine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Cycles\CycleRepository;
use App\Repositories\Payments\PaymentRepository;
use App\Repositories\Tontines\TontineRepository;
use App\Repositories\TontineUser\TontineUserRepository;


class PaiementController extends Controller
{
    private $paymentRepository;
    private $tontineUserRepository;
    private $cycleRepository;
    private $tontineRepository;
    public function __construct(PaymentRepository $paymentRepository, TontineUserRepository $tontineUserRepository, CycleRepository $cycleRepository, TontineRepository $tontineRepository)
    {
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


        return view('dashboard.payment.index', compact('payments', 'myTontines', 'cycles', 'openTontines'));
    }


    public function currentUserPayment()
    {
        $user = Auth::user();
        $payments = $this->paymentRepository->paymentUser($user->id);

        foreach($payments as $pay){
            if(strtolower($pay->status) == 'pending'){
                $ref = json_decode($pay->reference, true)['reference'];
                $resp = $this->paymentRepository->paymentStatusApi($ref);
                if ($resp['status'] == 200) {
                    $datas['status'] = $resp['datas']['status'];
                    $datas['reference'] = json_encode($resp['datas']);
                    $this->paymentRepository->update($pay->id, $datas);
                }
            }
        }
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

        $inputs['phone_number'] = $request->phone_number;
        $inputs['period'] = $request->period;
        try {
            $tontine = $this->tontineRepository->getById($request->tontine_id);

            $inputs['name_tontine'] = $tontine->name_tontine;
            $inputs['amount_tontine'] = $tontine->amount_tontine;
            // dd($inputs);
            $paymentApi = $this->paymentRepository->paymentApi($inputs);
            
            $user = Auth::user();
            $paymentInputs['user_id'] = $user->id;
            $paymentInputs['tontine_id'] = $tontine->id;
            $paymentInputs['payment_amount'] = $tontine->amount_tontine;
            $paymentInputs['period'] = $request->period;
            $paymentInputs['phone_number'] = $request->phone_number;

            if($paymentApi['status'] == 200){
                $paymentInputs['reference'] = json_encode($paymentApi['datas']);
                $paymentInputs['status'] = "Pending";
                
                $this->paymentRepository->store($paymentInputs);
            } else {
                // dd($paymentApi);
                throw new Exception('Erreur : ' .$paymentApi);
            }
        } catch (\Throwable $th) {
            # ecrire dans le fichier le log l'erreur
            dd($th);
            return redirect()->back()->with('danger', 'Oups!! Une erreur survenue !');
        }
        return redirect()->route('paiement.current-user')->with('success', 'Bien vouloir confirmer le paiement sur votre mobile !');


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
