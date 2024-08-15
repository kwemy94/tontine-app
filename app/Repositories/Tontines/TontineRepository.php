<?php

namespace App\Repositories\Tontines;

use App\Models\Tontine;
use App\Repositories\ResourceRepository;


class TontineRepository extends ResourceRepository{

    /**
     * Summary of __construct
     * @param \App\Models\Tontine $tontine
     */
    public function __construct(Tontine $tontine) {
        $this->model = $tontine;
    }

    public function getAll(){
        return $this->model->all();
    }



}
