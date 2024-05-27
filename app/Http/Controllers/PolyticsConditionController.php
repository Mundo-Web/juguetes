<?php

namespace App\Http\Controllers;

use App\Models\PolyticsCondition;
use App\Http\Requests\StorePolyticsConditionRequest;
use App\Http\Requests\UpdatePolyticsConditionRequest;
use Illuminate\Http\Request;

class PolyticsConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePolyticsConditionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $politicDev = PolyticsCondition::first();
        return view('public.popupPolyticsCondition', compact('politicDev'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $terms = PolyticsCondition::first();
        if (!$terms) {
            $terms = PolyticsCondition::create(['content' => '']);
        }
        return view('pages.polyticDev.edit', compact('terms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $terms = PolyticsCondition::first();
        $terms->content = $request->input('content');
        $terms->save();

        return redirect()->route('dev.edit')->with('success', 'Politica de devolucion modificado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PolyticsCondition $polyticsCondition)
    {
        //
    }
}
