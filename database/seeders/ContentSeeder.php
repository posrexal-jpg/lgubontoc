<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $singlePages = [
            'aboutus_histories' => ['History', 'Bontoc is a municipality with a rich local history and a community shaped by public service, agriculture, trade, and culture.'],
            'aboutus_locations' => ['Location', '<p>Bontoc is a coastal municipality in the Province of Southern Leyte, Philippines. It is positioned along the province\'s western corridor and serves as a local center for public services, community activities, agriculture, trade, and access to nearby barangays.</p><p>The Municipal Hall and key government offices are accessible through the main road network connecting Bontoc with neighboring towns and provincial service centers. Public transportation and local routes support residents, visitors, and stakeholders traveling to municipal offices, schools, markets, health facilities, and barangay communities.</p><p>Its location gives Bontoc access to coastal resources, upland communities, and regional connections within Southern Leyte, making it an important gateway for local governance, livelihood, tourism, and community development.</p>'],
            'aboutus_missionandvisions' => ['Mission and Vision', 'A progressive, resilient, and service-oriented municipality committed to transparent governance and inclusive development.'],
            'aboutus_municipalityseals' => ['Municipality Seal', 'The official seal represents the identity, values, livelihood, and aspirations of the Municipality of Bontoc.'],
            'aboutus_mandates' => ['Mandate', 'The municipal government delivers basic services, promotes public welfare, and implements programs for sustainable local development.'],
            'aboutus_servicepledges' => ['Service Pledge', 'We commit to serve the people with integrity, courtesy, accountability, and timely public service.'],
            'aboutus_directories' => ['Directory', 'Municipal offices and personnel are available to assist residents with services, documents, and public concerns.'],
            'services_mayorsoffices' => [
                "Mayor's Office",
                '<p>The Office of the Municipal Mayor serves as the chief executive office of the Municipality of Bontoc. It leads the implementation of local programs, coordinates public service delivery, and responds to the needs and concerns of residents, barangays, organizations, and partner agencies.</p><h3>Services and Assistance</h3><ul><li>Receiving and endorsement of requests, concerns, and letters addressed to the Municipal Mayor</li><li>Coordination of municipal programs, projects, and community activities</li><li>Public assistance referrals to the appropriate municipal offices</li><li>Support for barangay concerns, civic activities, and local development initiatives</li><li>Information on mayor-led programs, announcements, and official activities</li></ul><h3>Office Reminders</h3><p>Residents are encouraged to bring a valid ID, complete supporting documents, and a clear written request when visiting the office for assistance or follow-up. For concerns that require action from a specific department, the Mayor\'s Office may refer the request to the proper office for evaluation and processing.</p><h3>Office Hours</h3><p>Monday to Friday, 8:00 AM to 5:00 PM, except holidays and official non-working days.</p>',
            ],
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

        if (Schema::hasColumn('aboutus_missionandvisions', 'mission')) {
            DB::table('aboutus_missionandvisions')->where('id', 1)->update([
                'mission' => '<p>To deliver responsive, transparent, and accountable public service through inclusive programs, efficient governance, and active partnership with the people of Bontoc.</p>',
                'vision' => '<p>A progressive, resilient, and service-oriented municipality where communities are empowered, public trust is strengthened, and development benefits every Bontocanon.</p>',
                'updated_at' => $now,
            ]);
        }

        if (Schema::hasTable('transparency_fdp_reports')) {
            DB::table('transparency_fdp_reports')->updateOrInsert(
                ['id' => 1],
                [
                    'title' => 'Full Disclosure Policy Reports',
                    'quarter' => 'Annual',
                    'year' => (int) date('Y'),
                    'description' => 'Published Full Disclosure Policy reports will be posted here for public access and transparency.',
                    'file_path' => null,
                    'file_name' => null,
                    'sort_order' => 1,
                    'is_published' => true,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }

        if (Schema::hasColumn('aboutus_locations', 'latitude')) {
            DB::table('aboutus_locations')->where('id', 1)->update([
                'address' => 'Municipal Hall, Bontoc, Southern Leyte, Philippines',
                'latitude' => 10.3556,
                'longitude' => 124.9697,
                'map_embed_url' => null,
                'updated_at' => $now,
            ]);
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
        $this->seedTransactionLinks($now);
        $this->seedGovernmentOfficials($now);
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

    private function seedTransactionLinks($now): void
    {
        if (! Schema::hasTable('transaction_links')) {
            return;
        }

        $links = [
            ['Barangay Information System', 'https://brgyprofiling.bitsorg.info/login'],
            ['BOMWASA Billing Inquiry', 'https://bomwasa.bitsorg.info/billinquiry'],
            ['Document Tracking System', 'https://hrmis.bitsorg.info/login'],
        ];

        foreach ($links as $index => [$title, $url]) {
            DB::table('transaction_links')->updateOrInsert(
                ['title' => $title],
                [
                    'url' => $url,
                    'sort_order' => $index + 1,
                    'opens_new_tab' => true,
                    'is_active' => true,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }
    }

    private function seedGovernmentOfficials($now): void
    {
        if (! Schema::hasTable('government_officials')) {
            return;
        }

        if (DB::table('government_officials')->exists()) {
            return;
        }

        $officials = [
            ['elected', 'Hon. Sample Municipal Mayor', 'Municipal Mayor', 'Leads the executive branch of the municipal government and oversees local programs, services, and development priorities.'],
            ['elected', 'Hon. Sample Municipal Vice Mayor', 'Municipal Vice Mayor', 'Presides over the Sangguniang Bayan and supports legislative work and municipal governance.'],
            ['elected', 'Hon. Sample SB Member 1', 'Sangguniang Bayan Member', 'Participates in crafting ordinances, approving resolutions, and reviewing local development programs.'],
            ['elected', 'Hon. Sample SB Member 2', 'Sangguniang Bayan Member', 'Supports policy-making, committee work, and public consultations for municipal concerns.'],
            ['elected', 'Hon. Sample SB Member 3', 'Sangguniang Bayan Member', 'Works with the legislative body on ordinances, resolutions, and community development measures.'],
            ['elected', 'Hon. Sample SB Member 4', 'Sangguniang Bayan Member', 'Represents public concerns through committee hearings, local legislation, and council deliberations.'],
            ['elected', 'Hon. Sample SB Member 5', 'Sangguniang Bayan Member', 'Assists in reviewing municipal programs and supporting responsive local governance.'],
            ['elected', 'Hon. Sample SB Member 6', 'Sangguniang Bayan Member', 'Helps enact local policies and supports priority programs for residents and barangays.'],
            ['elected', 'Hon. Sample SB Member 7', 'Sangguniang Bayan Member', 'Contributes to legislative discussions, public hearings, and community-oriented ordinances.'],
            ['elected', 'Hon. Sample SB Member 8', 'Sangguniang Bayan Member', 'Supports municipal legislation, resolutions, and public welfare initiatives.'],
            ['elected', 'Hon. Sample ABC President', 'ABC President', 'Represents barangay interests in the municipal legislative body.'],
            ['elected', 'Hon. Sample SK Federation President', 'SK Federation President', 'Represents youth concerns and programs in the municipal legislative body.'],

            ['legislative', 'Hon. Sample Municipal Vice Mayor', 'Presiding Officer', 'Leads sessions of the Sangguniang Bayan and guides the legislative agenda.'],
            ['legislative', 'Hon. Sample SB Member 1', 'Chairperson, Committee on Rules', 'Handles legislative procedures, committee coordination, and council rules.'],
            ['legislative', 'Hon. Sample SB Member 2', 'Chairperson, Committee on Finance', 'Reviews budgetary matters, appropriations, and fiscal policies.'],
            ['legislative', 'Hon. Sample SB Member 3', 'Chairperson, Committee on Health', 'Supports policies and programs related to public health and community wellness.'],
            ['legislative', 'Hon. Sample SB Member 4', 'Chairperson, Committee on Education', 'Works on measures supporting education, youth development, and learning programs.'],
            ['legislative', 'Hon. Sample SB Member 5', 'Chairperson, Committee on Infrastructure', 'Reviews public works, infrastructure priorities, and development projects.'],
            ['legislative', 'Hon. Sample SB Member 6', 'Chairperson, Committee on Agriculture', 'Supports legislation for agriculture, livelihood, and local productivity.'],
            ['legislative', 'Hon. Sample SB Member 7', 'Chairperson, Committee on Environment', 'Promotes environmental protection, sanitation, and sustainability policies.'],
            ['legislative', 'Hon. Sample SB Member 8', 'Chairperson, Committee on Peace and Order', 'Supports policies related to public safety, disaster readiness, and local order.'],
            ['legislative', 'Hon. Sample ABC President', 'Ex-Officio Member', 'Brings barangay-level concerns and priorities to the Sangguniang Bayan.'],
            ['legislative', 'Hon. Sample SK Federation President', 'Ex-Officio Member', 'Brings youth programs and concerns to the Sangguniang Bayan.'],
        ];

        $sortOrders = [];

        foreach ($officials as [$category, $name, $position, $description]) {
            $sortOrders[$category] = ($sortOrders[$category] ?? 0) + 1;

            DB::table('government_officials')->updateOrInsert(
                [
                    'category' => $category,
                    'sort_order' => $sortOrders[$category],
                ],
                [
                    'name' => $name,
                    'position' => $position,
                    'photo' => null,
                    'description' => $description,
                    'is_published' => true,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }
    }
}
