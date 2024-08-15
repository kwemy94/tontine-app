<?php

namespace App\Repositories\Tirages;

use App\Models\Tirage;
use App\Repositories\ResourceRepository;


class TirageRepository extends ResourceRepository{

    /**
     * Summary of __construct
     * @param \App\Models\Tirage $tirage
     */
    public function __construct(Tirage $tirage) {
        $this->model = $tirage;
    }

    public function getAll(){
        return $this->model->all();
    }



}
