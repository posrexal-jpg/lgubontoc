<?php

namespace App\Http\Controllers;

use App\Models\TransactionLink;
use Illuminate\Http\Request;

class TransactionLinkController extends Controller
{
    public function index()
    {
        return view('admin.transactions.links.index', [
            'links' => TransactionLink::orderBy('sort_order')->orderBy('title')->paginate(10),
        ]);
    }

    public function store(Request $request)
    {
        TransactionLink::create($this->validatedData($request));

        return redirect()->route('admin.transactions.links.index')->with('success', 'Transaction link successfully added.');
    }

    public function update(Request $request, int $id)
    {
        TransactionLink::findOrFail($id)->update($this->validatedData($request));

        return redirect()->route('admin.transactions.links.index')->with('success', 'Transaction link successfully updated.');
    }

    public function destroy(int $id)
    {
        TransactionLink::findOrFail($id)->delete();

        return redirect()->route('admin.transactions.links.index')->with('error', 'Transaction link successfully deleted.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url', 'max:2048'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'opens_new_tab' => ['required', 'boolean'],
            'is_active' => ['required', 'boolean'],
        ]);
    }
}
