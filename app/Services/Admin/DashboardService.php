<?php

namespace App\Services\Admin;

use App\Models\Dispute;
use App\Models\GiftDonation;
use App\Models\GiftRedeem;
use App\Models\Message;
use App\Models\ParentUser;
use App\Models\Teacher;

class DashboardService
{
    public function getdata($model)
    {
        //dd($model);
        $list = $model->get();
        return $list;
    }
}
