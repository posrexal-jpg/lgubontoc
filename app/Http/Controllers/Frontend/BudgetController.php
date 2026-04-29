<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BudgetDocument;

class BudgetController extends Controller
{
    public function index()
    {
        $documents = BudgetDocument::where('active', true)
            ->orderBy('year', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('frontend.transparency.budget.index', compact('documents'));
    }
}
