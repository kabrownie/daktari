<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        return view('programs.index', compact('programs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'program_name' => 'required'
        ]);

        Program::create($request->only('program_name'));
        return redirect('/programs')->with('success', 'Program created!');
    }
}
