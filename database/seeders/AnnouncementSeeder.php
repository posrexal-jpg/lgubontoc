<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Announcement;

class AnnouncementSeeder extends Seeder
{
    public function run(): void
    {
        $announcements = [
            [
                'title'       => 'Community Clean-Up Drive – All Barangays Invited',
                'content'     => "The Municipal Government of Bontoc invites all residents to participate in the scheduled Community Clean-Up Drive.\n\nDate: Every last Saturday of the month\nTime: 7:00 AM – 10:00 AM\nVenue: All barangays, Bontoc, Southern Leyte\n\nFor more information, please contact the Municipal Environment and Natural Resources Office (MENRO).",
                'type'        => 'announcement',
                'date_posted' => now()->subDays(2)->format('Y-m-d'),
                'status'      => 'active',
            ],
            [
                'title'       => 'Public Advisory: Real Property Tax Amnesty',
                'content'     => "The Municipal Treasurer's Office of Bontoc announces the Real Property Tax Amnesty Program.\n\nAll real property owners with delinquent taxes may avail of the amnesty, which covers the waiver of all penalties and surcharges.\n\nPeriod: January 1 – March 31 of the current year\nWhere to pay: Municipal Treasurer's Office, Bontoc, Southern Leyte\n\nBring the following: Property Tax Declaration, Valid ID\n\nFor inquiries, call +63-9566483040.",
                'type'        => 'advisory',
                'date_posted' => now()->subDays(5)->format('Y-m-d'),
                'status'      => 'active',
            ],
            [
                'title'       => 'Notice: Regular Sangguniang Bayan Session Schedule',
                'content'     => "The Sangguniang Bayan of Bontoc, Southern Leyte, hereby announces its regular session schedule for this quarter.\n\nRegular sessions are held every Thursday at 9:00 AM at the Municipal Session Hall.\n\nThe public is invited to attend and observe. For agenda requests or matters to be deliberated, please coordinate with the Office of the Sangguniang Bayan Secretary at least five (5) days before the session.",
                'type'        => 'notice',
                'date_posted' => now()->subDays(7)->format('Y-m-d'),
                'status'      => 'active',
            ],
            [
                'title'       => 'Invitation: Bontoc Founding Anniversary Celebration',
                'content'     => "The Municipal Government of Bontoc, Southern Leyte, cordially invites all residents and stakeholders to the Annual Founding Anniversary Celebration.\n\nHighlights:\n- Cultural presentations\n- Sports activities\n- Municipal parade\n- Recognition of outstanding citizens\n\nAll are welcome. Let us celebrate the rich history and culture of our beloved municipality.",
                'type'        => 'announcement',
                'date_posted' => now()->subDays(10)->format('Y-m-d'),
                'status'      => 'active',
            ],
            [
                'title'       => 'Public Advisory: Anti-Rabies Vaccination Campaign',
                'content'     => "The Rural Health Unit (RHU) of Bontoc, Southern Leyte, in coordination with the Provincial Veterinary Office, will conduct free anti-rabies vaccination for dogs and cats.\n\nSchedule: Please check your barangay bulletin board for the schedule in your area.\n\nReminder: Dog registration is mandatory under local ordinance. Unregistered dogs may be impounded.\n\nFor more details, contact the Municipal Agricultural Office.",
                'type'        => 'advisory',
                'date_posted' => now()->subDays(14)->format('Y-m-d'),
                'status'      => 'active',
            ],
            [
                'title'       => 'Notice: Business Permit Renewal – Deadline Reminder',
                'content'     => "The Municipal Business Permits and Licensing Office (BPLO) reminds all business owners in Bontoc, Southern Leyte, to renew their business permits on or before January 20.\n\nRequired documents:\n- Barangay Clearance\n- Previous year's Official Receipt\n- Community Tax Certificate\n- Sanitary Permit\n\nLate renewals are subject to penalties. For faster processing, business owners are encouraged to transact early.\n\nOffice hours: Monday to Friday, 8:00 AM – 5:00 PM",
                'type'        => 'notice',
                'date_posted' => now()->subDays(20)->format('Y-m-d'),
                'status'      => 'active',
            ],
        ];

        foreach ($announcements as $data) {
            Announcement::updateOrCreate(
                ['title' => $data['title']],
                $data
            );
        }
    }
}
