<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $singlePages = [
            'aboutus_histories' => ['History', 'Bontoc is a municipality with a rich local history and a community shaped by public service, agriculture, trade, and culture.'],
            'aboutus_locations' => ['Location', 'Bontoc is located in Southern Leyte and serves residents through accessible municipal offices and local services.'],
            'aboutus_missionandvisions' => ['Mission and Vision', 'A progressive, resilient, and service-oriented municipality committed to transparent governance and inclusive development.'],
            'aboutus_municipalityseals' => ['Municipality Seal', 'The official seal represents the identity, values, livelihood, and aspirations of the Municipality of Bontoc.'],
            'aboutus_mandates' => ['Mandate', 'The municipal government delivers basic services, promotes public welfare, and implements programs for sustainable local development.'],
            'aboutus_servicepledges' => ['Service Pledge', 'We commit to serve the people with integrity, courtesy, accountability, and timely public service.'],
            'aboutus_directories' => ['Directory', 'Municipal offices and personnel are available to assist residents with services, documents, and public concerns.'],
            'services_mayorsoffices' => ["Mayor's Office", 'The Office of the Municipal Mayor leads local governance, public service delivery, and community development programs.'],
            'transparency_municipalordinances' => ['Municipal Ordinances', 'Published municipal ordinances are available for public information and transparency.'],
            'transparency_resolutions' => ['Resolutions', 'Approved resolutions are published to keep residents informed about local legislative actions.'],
            'others_downloadableforms' => ['Downloadable Forms', 'Common municipal forms and documents are available for convenient public access.'],
            'others_galleries' => ['Gallery', 'Photos and updates from municipal events, programs, and community activities.'],
            'others_memorandoms' => ['Memorandum', 'Official memoranda and announcements from the municipal government are published here.'],
        ];

        foreach ($singlePages as $table => [$title, $description]) {
            DB::table($table)->updateOrInsert(
                ['id' => 1],
                [
                    'title' => $title,
                    'description' => $description,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }

        $this->seedList('careers_jobvacancies', [
            ['Administrative Aide', 'Assist with records, front desk support, and day-to-day office coordination.'],
            ['Community Program Assistant', 'Support municipal programs, field coordination, and community documentation.'],
        ], $now);

        $this->seedList('tourism_bontocattractions', [
            ['Bontoc Boulevard', 'A popular waterfront destination for leisure, gatherings, and sunset views.'],
            ['Catmon Cave', 'A local natural attraction for visitors looking to experience Bontoc tourism sites.'],
            ['Tag-Abaka Falls', 'A scenic nature destination in Pamigsian, Bontoc, Southern Leyte.'],
        ], $now);

        $this->seedNews('newsand_updates_news', [
            ['Municipal Service Caravan Reaches More Barangays', '<p>The municipal government continues to bring basic services closer to barangay residents through its regular service caravan. Residents received assistance for frontline transactions, public information, and community concerns.</p>', '2026-04-01'],
            ['Clean and Green Program Strengthens Community Participation', '<p>Community volunteers, barangay officials, and municipal teams joined the latest clean and green activity to promote cleaner public spaces and stronger environmental awareness.</p>', '2026-04-10'],
            ['Bontoc Holds Disaster Preparedness Orientation', '<p>The Municipal Disaster Risk Reduction and Management Office conducted an orientation on preparedness, early warning, and response coordination for local stakeholders.</p>', '2026-04-18'],
            ['Local Health Outreach Serves Residents', '<p>Municipal health personnel provided basic consultations, information materials, and preventive health reminders during the latest outreach activity for residents.</p>', '2026-04-24'],
            ['Tourism Office Highlights Bontoc Destinations', '<p>The municipal tourism team shared updates on local attractions, cultural sites, and community destinations as part of efforts to promote Bontoc to visitors and residents.</p>', '2026-04-29'],
        ], $now);

        $this->seedNews('newsand_updates_upcomingupdates', [
            ['Public Consultation Schedule', 'Residents are invited to attend the upcoming public consultation at the municipal hall.', '2026-05-05'],
            ['Job Fair Announcement', 'A local job fair will be held for applicants seeking employment opportunities.', '2026-05-20'],
        ], $now);

        $this->seedHomes($now);
        $this->seedCarouselItems($now);
        $this->seedFeaturedItems($now);
    }

    private function seedList(string $table, array $items, $now): void
    {
        foreach ($items as $index => [$title, $description]) {
            DB::table($table)->updateOrInsert(
                ['id' => $index + 1],
                [
                    'title' => $title,
                    'description' => $description,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }
    }

    private function seedNews(string $table, array $items, $now): void
    {
        foreach ($items as $index => [$title, $description, $datePosted]) {
            DB::table($table)->updateOrInsert(
                ['id' => $index + 1],
                [
                    'title' => $title,
                    'description' => $description,
                    'image_file' => null,
                    'date_posted' => $datePosted,
                    'status' => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }
    }

    private function seedHomes($now): void
    {
        $items = [
            ['Bontoc Municipal Update', 'Latest updates and public information from the Municipality of Bontoc.', '2026-04-01'],
            ['Community Services', 'Programs and services are available to support residents and local communities.', '2026-04-15'],
        ];

        foreach ($items as $index => [$title, $description, $datePosted]) {
            DB::table('homes')->updateOrInsert(
                ['id' => $index + 1],
                [
                    'title' => $title,
                    'description' => $description,
                    'date_posted' => $datePosted,
                    'image' => null,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }
    }

    private function seedCarouselItems($now): void
    {
        $items = [
            ['Welcome to Bontoc', 'resources/background/background-1.jpg', 'Official updates and services from the Municipality of Bontoc.'],
            ['Public Service', 'resources/background/background-2.jpg', 'Responsive local governance for every Bontocanon.'],
        ];

        foreach ($items as $index => [$title, $image, $description]) {
            DB::table('carousel_items')->updateOrInsert(
                ['id' => $index + 1],
                [
                    'title' => $title,
                    'image' => $image,
                    'description' => $description,
                    'sort_order' => $index + 1,
                    'active' => true,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }
    }

    private function seedFeaturedItems($now): void
    {
        $items = [
            ['Featured Service', 'services', 'Explore available municipal services and citizen support programs.', '2026-04-01'],
            ['Tourism Highlight', 'tourism', 'Discover Bontoc attractions and local destinations.', '2026-04-15'],
        ];

        foreach ($items as $index => [$title, $section, $description, $datePosted]) {
            DB::table('featured_items')->updateOrInsert(
                ['id' => $index + 1],
                [
                    'title' => $title,
                    'section' => $section,
                    'description' => $description,
                    'image' => null,
                    'date_posted' => $datePosted,
                    'sort_order' => $index + 1,
                    'active' => true,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }
    }
}
