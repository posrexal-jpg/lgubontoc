<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageHeroSetting extends Model
{
    protected $fillable = [
        'eyebrow',
        'title',
        'description',
        'primary_button_label',
        'primary_button_url',
        'secondary_button_label',
        'secondary_button_url',
        'fact_1_title',
        'fact_1_text',
        'fact_2_title',
        'fact_2_text',
        'fact_3_title',
        'fact_3_text',
    ];

    public static function defaults(): array
    {
        return [
            'eyebrow' => 'Official LGU Portal',
            'title' => 'Municipality of Bontoc, Southern Leyte',
            'description' => 'Access public services, announcements, transparency documents, tourism information, and municipal resources from one official source.',
            'primary_button_label' => "Citizen's Charter",
            'primary_button_url' => '/services/citizenscharter',
            'secondary_button_label' => 'Transparency',
            'secondary_button_url' => '/transparency/fdp-reports',
            'fact_1_title' => 'Public Service Desk',
            'fact_1_text' => 'Municipal Hall, Bontoc',
            'fact_2_title' => 'Emergency Hotline',
            'fact_2_text' => '911 and local response offices',
            'fact_3_title' => 'Office Hours',
            'fact_3_text' => 'Monday to Friday, 8:00 AM - 5:00 PM',
        ];
    }
}
