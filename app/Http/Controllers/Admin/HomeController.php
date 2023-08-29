<?php

namespace App\Http\Controllers\Admin;

use App\Models\GiftDonation;
use App\Models\GiftRedeem;
use App\Services\Admin\DashboardService;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    private $dashboardService;
    private $giftDonation;
    private $giftRedeem;
    
    public function __construct(DashboardService $dashboardService)
    {
        $this->middleware('auth');
        $this->dashboardService =  $dashboardService;
    }

    public function index()
    {
        return view('admin.home')->with([]);
    }
}
