<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Process;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
     
    public function index()
    {
        return view('admin.process.index');
    }

    public function create()
    {
        return view('admin.process.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:191',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|string|max:100',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('processes', 'public');
            $data['image'] = $path;
        }
        $process = Process::create($data);
        if($process->save()){
            return redirect()->route('admin.process.index')->with('success', 'Process created successfully!');
        }else{
            return redirect()->route('admin.process.index')->with('error', 'Process creation failed!');
        }
    }

    public function edit(Request $request,$id)
    {
        $process = Process::find($id);
        return view('admin.process.edit', compact('process'));
    }

    public function update(Request $request, $id)
    {
        $process = Process::find($id);
        $process->update($request->all());
        return redirect()->route('admin.process.index');
    }

    public function destroy($id)
    {
        $process = Process::find($id);
        $process->delete();
        return redirect()->route('admin.process.index');
    }
}
