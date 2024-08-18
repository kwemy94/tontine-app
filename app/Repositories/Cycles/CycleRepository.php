<?php

namespace App\Repositories\Cycles;

use App\Models\Cycle;
use App\Repositories\ResourceRepository;


class CycleRepository extends ResourceRepository{

    /**
     * Summary of __construct
     * @param \App\Models\Cycle $cycle
     */
    public function __construct(Cycle $cycle) {
        $this->model = $cycle;
    }

    public function getAll(){
        return $this->model->all();
    }

    

}
