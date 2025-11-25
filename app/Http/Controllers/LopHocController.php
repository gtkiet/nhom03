<?php

namespace App\Http\Controllers;

use App\Models\LopHoc;
use Illuminate\Http\Request;

class LopHocController extends Controller
{
    public function index()
    {
        $data = LopHoc::paginate(10);
        return view('lop_hoc.index', compact('data'));
    }

    public function create()
    {
        return view('lop_hoc.create');
    }

    public function store(Request $request)
    {
        LopHoc::create($request->all());
        return redirect()->route('lop_hoc.index');
    }

    public function show($id)
    {
        $item = LopHoc::findOrFail($id);
        return view('lop_hoc.show', compact('item'));
    }

    public function edit($id)
    {
        $item = LopHoc::findOrFail($id);
        return view('lop_hoc.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = LopHoc::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('lop_hoc.index');
    }

    public function destroy($id)
    {
        LopHoc::destroy($id);
        return redirect()->route('lop_hoc.index');
    }
}
