<?php

namespace App\Repositories;
use App\Models\Admin\Feedback;

class FeedbackRepository extends BaseRepository
{
    public function __construct(Feedback $model)
    {
        parent::__construct($model);
    }

    public function lists($condition = [] , $order = 'id DSEC', $page = 1 , $pagesize = 20)
    {
        $order = $order ? explode(' ' , $order) : ['id' ,'DESC'];
        return $this->model->where($condition)->orderBy($order[0] , $order[1])->get();
    }
}