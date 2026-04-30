<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transparency_municipalordinance;
use App\Models\Transparency_resolution;
use App\Models\TransparencyFdpReport;


class TransparencyController extends Controller
{

public function indexmunicipalordinances()
    {
        return $this->sbDocuments(
            Transparency_municipalordinance::class,
            'SB Ordinances',
            'Review approved Sangguniang Bayan ordinances and local legislative measures.',
            'SB Ordinances'
        );
     }


public function indexresolutions()
    {
        return $this->sbDocuments(
            Transparency_resolution::class,
            'SB Resolutions',
            'Review approved Sangguniang Bayan resolutions and public legislative actions.',
            'SB Resolutions'
        );
     }

public function indexFdpReports()
    {
        $reports = TransparencyFdpReport::where('is_published', true)
            ->orderByDesc('year')
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('frontend.transparency.fdp-reports.index', [
            'reports' => $reports,
        ]);
     }

private function sbDocuments(string $modelClass, string $title, string $description, string $breadcrumb)
    {
        $query = $modelClass::where('is_published', true);

        if ($search = trim((string) request('q'))) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('document_number', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($year = request('year')) {
            $query->where('year', $year);
        }

        $documents = $query->orderByDesc('year')
            ->orderBy('sort_order')
            ->orderByDesc('approved_date')
            ->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString();

        $years = $modelClass::where('is_published', true)
            ->whereNotNull('year')
            ->select('year')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year');

        return view('frontend.transparency.sb-documents.index', [
            'documents' => $documents,
            'years' => $years,
            'title' => $title,
            'description' => $description,
            'breadcrumb' => $breadcrumb,
        ]);
     }
}
