<?php

namespace App\Http\Controllers;

use App\Models\CompanyStatistic;
use App\Models\OurPrinciple;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //Ngambil data dari halaman admin
    public function index() {
        $statistics = CompanyStatistic::take(4)->get();
        $principles = OurPrinciple::take(4)->get();
        return view('front.index', compact('statistics','principles'));
    }
}
