<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Service;

class ManagementController extends Controller
{
    public function index()
    {
        $about = About::first() ?? new About;
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
        $services = collect(Service::query()
            ->orderBy('name_en')
            ->get()
            ->groupBy('category'));
        $activeTarget = request()->query('section', 'inicio');

        return view('livewire.admin.admin-dashboard', compact('about', 'categories', 'serviceGroups', 'services', 'activeTarget'));
    }
}
