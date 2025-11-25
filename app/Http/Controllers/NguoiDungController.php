<?php

namespace App\Http\Controllers;

use App\Models\NguoiDung;
use Illuminate\Http\Request;

class NguoiDungController extends Controller
{
    public function index()
    {
        $data = NguoiDung::paginate(10);
        return view('nguoi_dung.index', compact('data'));
    }

    public function create()
    {
        return view('nguoi_dung.create');
    }

    public function store(Request $request)
    {
        NguoiDung::create($request->all());
        return redirect()->route('nguoi_dung.index');
    }

    public function show($id)
    {
        $item = NguoiDung::findOrFail($id);
        return view('nguoi_dung.show', compact('item'));
    }

    public function edit($id)
    {
        $item = NguoiDung::findOrFail($id);
        return view('nguoi_dung.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = NguoiDung::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('nguoi_dung.index');
    }

    public function destroy($id)
    {
        NguoiDung::destroy($id);
        return redirect()->route('nguoi_dung.index');
    }
}
