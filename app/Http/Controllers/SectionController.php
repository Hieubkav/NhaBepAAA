<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function show($id)
    {
        $section = Section::with(['cats' => function($query) {
            $query->where('status', true);
        }])->findOrFail($id);

        return view('shop.section', [
            'section' => $section,
            'cats' => $section->cats
        ]);
    }
}