<?php

namespace App\Repositories\TontineUser;

use App\Models\TontineUser;
use App\Repositories\ResourceRepository;


class TontineUserRepository extends ResourceRepository{

    /**
     * Summary of __construct
     * @param \App\Models\TontineUser $tontineUser
     */
    public function __construct(TontineUser $tontineUser) {
        $this->model = $tontineUser;
    }

    public function getAll(){
        return $this->model->all();
    }
    public function myTontines($userId){
        return $this->model->where('user_id', $userId)->with('tontine')->get();
    }

    

}
