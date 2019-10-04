<?php

namespace App\Http\Controllers;

use App\Models\Bid;

class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        return response()->view('auth.dashboard', [
            'labels' => Bid::pluck('created_at'),
            'amounts' => Bid::pluck('amount'),
        ]);
    }
}
