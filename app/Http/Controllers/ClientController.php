<?php


namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Program;
use Illuminate\Http\Request;

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
            'client_name' => 'required'
        ]);

        Client::create($request->only('client_name'));
        return redirect('/clients')->with('success', 'Client registered!');
    }

    public function enroll(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'program_ids' => 'required|array'
        ]);

        $client = Client::find($request->client_id);
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
        return response()->json($client);
    }
}
