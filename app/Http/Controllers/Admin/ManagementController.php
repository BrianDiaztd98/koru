<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Service;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    public function index()
    {
        $about = About::first();
        $categories = Service::categories();
        $serviceGroups = [
            'Service Pillars' => [
                'manual_therapy',
                'recovery_performance',
                'medical_services',
                'koru_at_home',
            ],
            'Other Services' => [
                'booster_shots',
                'iv_therapy',
            ],
        ];
        $services = Service::query()
            ->orderBy('name_en')
            ->get()
            ->groupBy('category');

        return view('admin.manage.index', compact('about', 'categories', 'serviceGroups', 'services'));
    }
}
