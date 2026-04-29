<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BudgetDocument;

class BudgetDocumentSeeder extends Seeder
{
    public function run(): void
    {
        $currentYear = date('Y');
        $prevYear    = $currentYear - 1;
        $prev2Year   = $currentYear - 2;

        $documents = [
            // Current Year
            [
                'title'       => 'Annual Budget FY ' . $currentYear,
                'year'        => $currentYear,
                'category'    => 'annual-budget',
                'description' => 'Approved Annual Budget of the Municipality of Bontoc for Fiscal Year ' . $currentYear . '.',
                'file_path'   => null,
                'active'      => true,
            ],
            [
                'title'       => '1st Quarter Financial Report ' . $currentYear,
                'year'        => $currentYear,
                'category'    => 'financial-report',
                'description' => 'Statement of Receipts and Expenditures for the 1st Quarter of Fiscal Year ' . $currentYear . '.',
                'file_path'   => null,
                'active'      => true,
            ],
            [
                'title'       => '1st Quarter Disbursement Report ' . $currentYear,
                'year'        => $currentYear,
                'category'    => 'disbursement',
                'description' => 'Report on disbursements for the period January–March ' . $currentYear . '.',
                'file_path'   => null,
                'active'      => true,
            ],
            [
                'title'       => 'Annual Procurement Plan (APP) ' . $currentYear,
                'year'        => $currentYear,
                'category'    => 'procurement',
                'description' => 'Annual Procurement Plan of the Municipality of Bontoc for ' . $currentYear . '.',
                'file_path'   => null,
                'active'      => true,
            ],
            // Previous Year
            [
                'title'       => 'Annual Budget FY ' . $prevYear,
                'year'        => $prevYear,
                'category'    => 'annual-budget',
                'description' => 'Approved Annual Budget of the Municipality of Bontoc for Fiscal Year ' . $prevYear . '.',
                'file_path'   => null,
                'active'      => true,
            ],
            [
                'title'       => 'Annual Financial Report ' . $prevYear,
                'year'        => $prevYear,
                'category'    => 'financial-report',
                'description' => 'Annual Statement of Receipts and Expenditures for Fiscal Year ' . $prevYear . '.',
                'file_path'   => null,
                'active'      => true,
            ],
            [
                'title'       => 'Annual Disbursement Report ' . $prevYear,
                'year'        => $prevYear,
                'category'    => 'disbursement',
                'description' => 'Annual report on all disbursements made in Fiscal Year ' . $prevYear . '.',
                'file_path'   => null,
                'active'      => true,
            ],
            [
                'title'       => 'Commission on Audit (COA) Report ' . $prevYear,
                'year'        => $prevYear,
                'category'    => 'audit-report',
                'description' => 'Annual Audit Report issued by the Commission on Audit for Fiscal Year ' . $prevYear . '.',
                'file_path'   => null,
                'active'      => true,
            ],
            [
                'title'       => 'Annual Procurement Plan (APP) ' . $prevYear,
                'year'        => $prevYear,
                'category'    => 'procurement',
                'description' => 'Annual Procurement Plan of the Municipality of Bontoc for ' . $prevYear . '.',
                'file_path'   => null,
                'active'      => true,
            ],
            // Two Years Ago
            [
                'title'       => 'Annual Budget FY ' . $prev2Year,
                'year'        => $prev2Year,
                'category'    => 'annual-budget',
                'description' => 'Approved Annual Budget of the Municipality of Bontoc for Fiscal Year ' . $prev2Year . '.',
                'file_path'   => null,
                'active'      => true,
            ],
            [
                'title'       => 'Annual Financial Report ' . $prev2Year,
                'year'        => $prev2Year,
                'category'    => 'financial-report',
                'description' => 'Annual Statement of Receipts and Expenditures for Fiscal Year ' . $prev2Year . '.',
                'file_path'   => null,
                'active'      => true,
            ],
            [
                'title'       => 'Commission on Audit (COA) Report ' . $prev2Year,
                'year'        => $prev2Year,
                'category'    => 'audit-report',
                'description' => 'Annual Audit Report issued by the Commission on Audit for Fiscal Year ' . $prev2Year . '.',
                'file_path'   => null,
                'active'      => true,
            ],
        ];

        foreach ($documents as $data) {
            BudgetDocument::updateOrCreate(
                ['title' => $data['title'], 'year' => $data['year']],
                $data
            );
        }
    }
}
