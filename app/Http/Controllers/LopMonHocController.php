<?php

namespace App\Http\Controllers;

use App\Models\LopMonHoc;
use App\Models\MonHoc;
use Illuminate\Http\Request;

class LopMonHocController extends Controller
{
    public function index()
    {
        $data = LopMonHoc::with('monHoc')->paginate(10);
        return view('lop_mon_hoc.index', compact('data'));
    }

    public function create()
    {
        $monHoc = MonHoc::all();
        return view('lop_mon_hoc.create', compact('monHoc'));
    }

    public function store(Request $request)
    {
        LopMonHoc::create($request->all());
        return redirect()->route('lop_mon_hoc.index');
    }

    public function show($id)
    {
        $item = LopMonHoc::with('monHoc')->findOrFail($id);
        return view('lop_mon_hoc.show', compact('item'));
    }

    public function edit($id)
    {
        $item = LopMonHoc::findOrFail($id);
        $monHoc = MonHoc::all();
        return view('lop_mon_hoc.edit', compact('item', 'monHoc'));
    }

    public function update(Request $request, $id)
    {
        $item = LopMonHoc::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('lop_mon_hoc.index');
    }

    public function destroy($id)
    {
        LopMonHoc::destroy($id);
        return redirect()->route('lop_mon_hoc.index');
    }
}

