<?php

namespace App\Http\Controllers;

use App\Models\CompanyAbout;
use App\Models\CompanyStatistic;
use App\Models\HeroSection;
use App\Models\OurPrinciple;
use App\Models\OurTeam;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //Ngambil data dari halaman admin
    public function index() {
        $statistics = CompanyStatistic::take(4)->get();
        $principles = OurPrinciple::take(4)->get();
        $products = Product::take(3)->get();
        $teams = OurTeam::take(7)->get();
        $testimonials = Testimonial::take(8)->get();
        $hero_sections= HeroSection::orderbyDesc('id')->take(1)->get();

        return view('front.index', compact('statistics','principles', 'products','teams',
                                            'testimonials', 'hero_sections'));
    }

    public function team() {

    $teams = OurTeam::take(12)->get();
    $statistics = CompanyStatistic::take(4)->get();
    $products = Product::take(6)->get();
    
    return view('front.team', compact('teams','statistics', 'products'));                                       
    }

    public function about() {

    $teams = OurTeam::take(12)->get();
    $statistics = CompanyStatistic::take(4)->get();
    $abouts = CompanyAbout::with('keypoints')
    ->latest()
    ->take(3)
    ->get();


    
    return view('front.about', compact('teams','statistics', 'abouts'));                                       
    }

    public function product() {

    $statistics = CompanyStatistic::take(4)->get();
    $products = Product::take(6)->get();
    
    return view('front.product', compact('statistics', 'products'));                                       
    }
}
