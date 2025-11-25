<?php

namespace App\Http\Controllers;

use App\Models\DangKyHoc;
use App\Models\SinhVien;
use App\Models\LopMonHoc;
use Illuminate\Http\Request;

class DangKyHocController extends Controller
{
    public function index()
    {
        $data = DangKyHoc::with(['sinhVien', 'lopMonHoc'])->paginate(10);
        return view('dang_ky_hoc.index', compact('data'));
    }

    public function create()
    {
        $sinhVien = SinhVien::all();
        $lopMonHoc = LopMonHoc::all();
        return view('dang_ky_hoc.create', compact('sinhVien', 'lopMonHoc'));
    }

    public function store(Request $request)
    {
        DangKyHoc::create($request->all());
        return redirect()->route('dang_ky_hoc.index');
    }

    public function show($id)
    {
        $item = DangKyHoc::with(['sinhVien', 'lopMonHoc'])->findOrFail($id);
        return view('dang_ky_hoc.show', compact('item'));
    }

    public function edit($id)
    {
        $item = DangKyHoc::findOrFail($id);
        $sinhVien = SinhVien::all();
        $lopMonHoc = LopMonHoc::all();
        return view('dang_ky_hoc.edit', compact('item', 'sinhVien', 'lopMonHoc'));
    }

    public function update(Request $request, $id)
    {
        $item = DangKyHoc::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('dang_ky_hoc.index');
    }

    public function destroy($id)
    {
        DangKyHoc::destroy($id);
        return redirect()->route('dang_ky_hoc.index');
    }
}
