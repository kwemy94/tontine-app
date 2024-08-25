<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Payments\PaymentRepository;

class PaiementController extends Controller
{
    private $paymentRepository;
    public function __construct(PaymentRepository $paymentRepository){
        $this->paymentRepository = $paymentRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = $this->paymentRepository->getAll();

        return view('dashboard.payment.index', compact('payments'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Paiement $paiement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paiement $paiement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paiement $paiement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paiement $paiement)
    {
        //
    }
}
