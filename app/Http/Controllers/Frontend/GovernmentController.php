<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\GovernmentOfficial;

class GovernmentController extends Controller
{
    public function electedOfficials()
    {
        return $this->officialsPage('elected', 'Elected Officials', 'Meet the elected municipal officials serving the people of Bontoc.');
    }

    public function legislative()
    {
        return $this->officialsPage('legislative', 'Legislative', 'View the members and offices supporting local legislative work in Bontoc.');
    }

    private function officialsPage(string $category, string $title, string $description)
    {
        $officials = GovernmentOfficial::where('category', $category)
            ->where('is_published', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('frontend.government.officials.index', [
            'officials' => $officials,
            'title' => $title,
            'description' => $description,
        ]);
    }
}
