<?php

namespace App\Http\Controllers;

use App\Models\TransparencyFdpReport;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FdpReportController extends Controller
{
    private array $quarters = [
        '1st Quarter' => '1st Quarter',
        '2nd Quarter' => '2nd Quarter',
        '3rd Quarter' => '3rd Quarter',
        '4th Quarter' => '4th Quarter',
        'Annual' => 'Annual',
    ];

    private function uploadPath(?string $filename = null): string
    {
        $path = public_path('uploads/fdp-reports');

        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }

        if (!is_writable($path)) {
            @chmod($path, 0775);
        }

        return $filename ? $path.DIRECTORY_SEPARATOR.$filename : $path;
    }

    public function index()
    {
        $reports = TransparencyFdpReport::orderByDesc('year')
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('admin.transparency.fdp-reports.index', [
            'reports' => $reports,
            'quarters' => $this->quarters,
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        $data['sort_order'] = $data['sort_order'] ?? 0;

        if ($request->hasFile('file')) {
            $data = array_merge($data, $this->storeFile($request));
        }

        TransparencyFdpReport::create($data);

        return redirect()->route('admin.transparency.fdp-reports.index')
            ->with('success', 'FDP report successfully added.');
    }

    public function update(Request $request, int $id)
    {
        $report = TransparencyFdpReport::findOrFail($id);
        $data = $this->validatedData($request);
        $data['sort_order'] = $data['sort_order'] ?? 0;

        if ($request->hasFile('file')) {
            $this->deleteFile($report->file_path);
            $data = array_merge($data, $this->storeFile($request));
        }

        $report->update($data);

        return redirect()->route('admin.transparency.fdp-reports.index')
            ->with('success', 'FDP report successfully updated.');
    }

    public function destroy(int $id)
    {
        $report = TransparencyFdpReport::findOrFail($id);
        $this->deleteFile($report->file_path);
        $report->delete();

        return redirect()->route('admin.transparency.fdp-reports.index')
            ->with('error', 'FDP report successfully deleted.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'quarter' => ['nullable', 'string', 'max:50'],
            'year' => ['nullable', 'integer', 'min:1900', 'max:2100'],
            'description' => ['nullable', 'string'],
            'file' => ['nullable', 'file', 'mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png', 'max:10240'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_published' => ['required', 'boolean'],
        ]);
    }

    private function storeFile(Request $request): array
    {
        $file = $request->file('file');
        $filename = Str::random(30).'.'.$file->getClientOriginalExtension();
        $file->move($this->uploadPath(), $filename);

        return [
            'file_path' => $filename,
            'file_name' => $file->getClientOriginalName(),
        ];
    }

    private function deleteFile(?string $filename): void
    {
        if ($filename && file_exists($this->uploadPath($filename))) {
            unlink($this->uploadPath($filename));
        }
    }
}
