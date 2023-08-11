<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;

class StatusController extends Controller
{
    public function index(Request $request)
    {
        $search = '%'.$request->query('search').'%';
            $status = Status::where('name', 'like', $search)
            ->latest()->paginate(10);
        return view('master.status.index',compact('status'));
    }

    public function create()
    {
        return view('master.status.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:status,name',
        ]);

        Status::create([
            'name' => $request->name,
            'description' => $request->description ?? '',
        ]);

        return redirect()->route('status.index')->with('success','Status created successfully.');
    }

    public function edit(Status $status)
    {
        return view('master.status.edit',compact('status'));
    }

    public function update(Request $request, Status $status)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $status->update($validated);
        return redirect()->route('status.index')->with('success','Status updated successfully.');
    }

    public function destroy(Status $status)
    {
        $status->delete();
        return redirect()->route('status.index')->with('success','Status deleted successfully.');
    }
}
