<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        $programs = Program::all();
        return view('clients.index', compact('clients', 'programs'));
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required',
            'sex' => 'required|in:Male,Female,Other', // optional: restrict to allowed values
            'age' => 'required|integer|min:0',
            'telephone' => 'required|string|digits:10',
        ]);
    
        $timestamp = now()->format('YmdHis'); // e.g., 20240426173055
        $clientId = 'CL-' . $timestamp;
    
        Client::create([
            'clients_id' => $clientId,
            'client_name' => $request->client_name,
            'sex' => $request->sex,
            'age' => $request->age,
            'telephone' => $request->telephone,
        ]);
    
        return redirect('/clients')->with('success', 'Client registered!');
    }
    


    public function enroll(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'program_ids' => 'required|array'
        ]);

        $client = Client::findOrFail($request->client_id);
        $client->programs()->syncWithoutDetaching($request->program_ids);

        return redirect('/clients')->with('success', 'Client enrolled in program(s)!');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $clients = Client::where('client_name', 'LIKE', "%$query%")->get();
        $programs = Program::all();
        return view('clients.index', compact('clients', 'programs'));
    }

    public function show($id)
    {
        $client = Client::with('programs')->findOrFail($id);
        return view('clients.show', compact('client'));
    }

    // API Profile
    public function profile($id)
{
    $client = Client::with('programs')->findOrFail($id);

    return response()->json([
        'client_id' => $client->client_id,
        'name' => $client->client_name,
        'sex' => $client->sex,
        'age' => $client->age,
        'telephone' => $client->telephone,
        'programs' => $client->programs->map(function ($program) {
            return [
                'program_id' => $program->id,
                'program_name' => $program->program_name,
            ];
        }),
    ]);
}

   
}
