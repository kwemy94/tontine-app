<?php

namespace App\Repositories\Users;

use App\Models\User;
use App\Repositories\ResourceRepository;


class UserRepository extends ResourceRepository{

    /**
     * Summary of __construct
     * @param \App\Models\User $user
     */
    public function __construct(User $user) {
        $this->model = $user;
    }

    public function getAll(){
        return $this->model->all();
    }

    

}
