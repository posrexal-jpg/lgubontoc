<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Aboutus_directory;
use App\Models\Aboutus_history;
use App\Models\Aboutus_location;
use App\Models\Aboutus_mandate;
use App\Models\Aboutus_missionandvision;
use App\Models\Aboutus_municipalityseal;
use App\Models\Aboutus_servicepledge;
use App\Models\Careers_jobvacancies;
use App\Models\HomepageModel;
use App\Models\NewsandUpdates_news;
use App\Models\NewsandUpdates_upcomingupdates;
use App\Models\Others_downloadableforms;
use App\Models\Others_gallery;
use App\Models\Others_memorandom;
use App\Models\Services_mayorsoffice;
use App\Models\Tourism_bontocattractions;
use App\Models\TransparencyFdpReport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = trim((string) $request->query('q', ''));
        $results = collect();

        if ($query !== '') {
            $results = collect($this->searchSources())
                ->flatMap(fn ($source) => $this->searchModel($source, $query))
                ->sortBy('title')
                ->values();
        }

        return view('frontend.search.index', [
            'query' => $query,
            'results' => $results,
        ]);
    }

    private function searchSources(): array
    {
        return [
            ['model' => HomepageModel::class, 'label' => 'Homepage News', 'route' => fn ($item) => route('home.show', $item->id)],
            ['model' => NewsandUpdates_news::class, 'label' => 'News', 'route' => fn ($item) => route('newsandupdates.news.show', $item->id)],
            ['model' => NewsandUpdates_upcomingupdates::class, 'label' => 'Announcement', 'route' => fn ($item) => route('newsandupdates.upcomingupdates.show', $item->id)],
            ['model' => Tourism_bontocattractions::class, 'label' => 'Tourism', 'route' => fn ($item) => route('tourism.bontocattractions.show', $item->id)],
            ['model' => Careers_jobvacancies::class, 'label' => 'Career', 'route' => fn ($item) => route('careers.jobvacancies.show', $item->id)],
            ['model' => Others_gallery::class, 'label' => 'Gallery', 'route' => fn ($item) => route('others.gallery.show', $item->id)],
            ['model' => Others_downloadableforms::class, 'label' => 'Downloadable Form', 'route' => fn () => route('others.downloadableforms')],
            ['model' => Others_memorandom::class, 'label' => 'Memorandum', 'route' => fn () => route('others.memorandom')],
            ['model' => Services_mayorsoffice::class, 'label' => 'Service', 'route' => fn () => route('services.mayorsoffice')],
            ['model' => TransparencyFdpReport::class, 'label' => 'FDP Report', 'route' => fn () => route('transparency.fdp-reports')],
            ['model' => Aboutus_history::class, 'label' => 'About', 'route' => fn () => route('about.history')],
            ['model' => Aboutus_location::class, 'label' => 'About', 'route' => fn () => route('about.location')],
            ['model' => Aboutus_missionandvision::class, 'label' => 'About', 'route' => fn () => route('about.missionandvision')],
            ['model' => Aboutus_municipalityseal::class, 'label' => 'About', 'route' => fn () => route('about.municipalityseal')],
            ['model' => Aboutus_mandate::class, 'label' => 'About', 'route' => fn () => route('about.mandate')],
            ['model' => Aboutus_servicepledge::class, 'label' => 'About', 'route' => fn () => route('about.servicepledge')],
            ['model' => Aboutus_directory::class, 'label' => 'About', 'route' => fn () => route('about.directory')],
        ];
    }

    private function searchModel(array $source, string $query): Collection
    {
        /** @var class-string<Model> $model */
        $model = $source['model'];

        return $model::query()
            ->where(function ($builder) use ($query) {
                $builder->where('title', 'like', "%{$query}%")
                    ->orWhere('description', 'like', "%{$query}%");
            })
            ->limit(8)
            ->get()
            ->map(function ($item) use ($source) {
                return [
                    'title' => $item->title ?: 'Untitled',
                    'type' => $source['label'],
                    'url' => $source['route']($item),
                    'excerpt' => Str::limit(strip_tags((string) $item->description), 180),
                ];
            });
    }
}
