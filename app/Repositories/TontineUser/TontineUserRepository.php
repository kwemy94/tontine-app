<?php

namespace App\Repositories\TontineUser;

use App\Models\TontineUser;
use Illuminate\Support\Facades\Auth;
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
        return $this->model->where('user_id', $userId)->with('tontine')->orderBy('tontine_id','desc')->get();
    }
    public function isMember($tontineId, $userId){
        return $this->model->where([['user_id', $userId], ['tontine_id', $tontineId]])->count();
    }

    public function allTontineMember($tontineId){
        return  $this->model
            ->where('tontine_id', $tontineId)
            ->count();
    }
    public function nbreNomuserInTontine($tontineId){
        $user = Auth::user();
        return  $this->model
            ->where([['tontine_id', $tontineId], ['user_id', $user]])
            ->count();
    }


}
