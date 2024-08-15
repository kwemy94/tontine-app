<?php

namespace App\Repositories\Payments;

use App\Models\Payment;
use App\Repositories\ResourceRepository;


class PaymentRepository extends ResourceRepository{

    /**
     * Summary of __construct
     * @param \App\Models\Payment $payment
     */
    public function __construct(Payment $payment) {
        $this->model = $payment;
    }

    public function getAll(){
        return $this->model->all();
    }



}
