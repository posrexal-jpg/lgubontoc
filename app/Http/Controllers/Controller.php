<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function browseSimpleContent(string $modelClass, string $heading, array $routes, $editItem = null)
    {
        return view('admin.shared.simple-content.index', [
            'items' => $modelClass::latest()->get(),
            'item' => $editItem,
            'heading' => $heading,
            'routes' => $routes,
        ]);
    }

    protected function readSimpleContent(string $modelClass, string $heading, array $routes, int $id)
    {
        return view('admin.shared.simple-content.show', [
            'item' => $modelClass::findOrFail($id),
            'heading' => $heading,
            'routes' => $routes,
        ]);
    }

    protected function saveSimpleContent(Request $request, string $modelClass, string $indexRoute)
    {
        $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        $record = $request->id ? $modelClass::findOrFail($request->id) : new $modelClass();
        $record->title = $request->title;
        $record->description = $request->description;
        $record->save();

        return redirect()->route($indexRoute)->with('success', 'Record successfully saved.');
    }

    protected function deleteSimpleContent(string $modelClass, string $indexRoute, int $id)
    {
        $modelClass::findOrFail($id)->delete();

        return redirect()->route($indexRoute)->with('error', 'Record successfully deleted.');
    }
}
