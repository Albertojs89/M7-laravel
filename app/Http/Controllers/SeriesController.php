<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $series = Series::all();
        return view('series.index', compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('series.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:series',
            'description' => 'nullable|string',
            'portal' => 'required|string|max:255|unique:series',
        ]);

        Series::create($request->all());

        return redirect()->route('series.index')->with('success', 'Series created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Series $series)
    {
        return view('series.show', compact('series'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Series $series)
    {
        return view('series.edit', compact('series'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Series $series)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:series,title,' . $series->id,
            'description' => 'nullable|string',
            'portal' => 'required|string|max:255|unique:series,portal,' . $series->id,
        ]);

        $series->update($request->all());

        return redirect()->route('series.index')->with('success', 'Series updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Series $series)
    {
        $series->delete();

        return redirect()->route('series.index')->with('success', 'Series deleted successfully.');
    }
}
