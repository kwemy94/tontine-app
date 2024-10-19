<?php

namespace App\Repositories\Payments;

use Exception;
use App\Models\Payment;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Repositories\ResourceRepository;

class PaymentRepository extends ResourceRepository
{

    /**
     * Summary of __construct
     * @param \App\Models\Payment $payment
     */
    public function __construct(Payment $payment)
    {
        $this->model = $payment;
    }

    public function getAll()
    {
        return $this->model->all();
    }
    public function paymentUser($userId)
    {
        return $this->model
            ->where('user_id', $userId)
            ->with('tontine', 'user')
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function paymentAuthApi()
    {
        $auth = config('app.campay_api.auth');
        $baseUrl = config('app.campay_api.base_url');
        $res = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post($baseUrl . 'api/token/', $auth);

        return $res;
    }
    public function paymentApi($data)
    {
        try {
            $auth = $this->paymentAuthApi();

            $dataAuth = $auth->json();
            $status = $auth->status();

            if ($status == 200 && $dataAuth['token']) {
                $baseUrl = config('app.campay_api.base_url');
                $inputs = [
                    "amount" => $data['amount_tontine'],
                    "currency" => "XAF",
                    "from" => "237" . $data['phone_number'],
                    "description" => $data['name_tontine'] . ' - ' . $data['period'],
                    "external_reference" => "",
                    "external_user" => ""
                ];
                // dd($inputs);
                $response = Http::withHeaders([
                    'Authorization' => 'Token ' . $dataAuth['token'],
                    'Content-Type' => 'application/json'
                ])->post($baseUrl . 'api/collect/', $inputs);

            } else {
                throw new Exception("Echec d'authentification");
            }

        } catch (Exception $e) {
            dd($e);
            return [
                'status' => 500,
                'message' => $e
            ];

        }

        return [
            'status' => $response->status(),
            'datas' => $response->json(),
        ];
    }

    public function paymentStatusApi($reference)
    {
        try {
            $auth = $this->paymentAuthApi();

            $dataAuth = $auth->json();
            $status = $auth->status();

            if ($status == 200 && $dataAuth['token']) {
                $baseUrl = config('app.campay_api.base_url');

                $response = Http::withHeaders([
                    'Authorization' => 'Token ' . $dataAuth['token'],
                    'Content-Type' => 'application/json'
                ])->get($baseUrl . 'api/transaction/' . $reference);


            } else {
                throw new Exception("Echec d'authentification");
            }

        } catch (Exception $e) {
            return [
                'status' => 500,
                'message' => $e
            ];
        }

        return [
            'status' => $response->status(),
            'datas' => $response->json(),
        ];


    }



}
