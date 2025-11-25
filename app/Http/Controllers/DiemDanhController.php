<?php

namespace App\Http\Controllers;

use App\Models\DiemDanh;
use App\Models\SinhVien;
use App\Models\LopMonHoc;
use Illuminate\Http\Request;

class DiemDanhController extends Controller
{
    public function index()
    {
        $data = DiemDanh::with(['sinhVien', 'lopMonHoc'])->paginate(10);
        return view('diem_danh.index', compact('data'));
    }

    public function create()
    {
        $sinhVien = SinhVien::all();
        $lopMonHoc = LopMonHoc::all();
        return view('diem_danh.create', compact('sinhVien', 'lopMonHoc'));
    }

    public function store(Request $request)
    {
        DiemDanh::create($request->all());
        return redirect()->route('diem_danh.index');
    }

    public function show($id)
    {
        $item = DiemDanh::with(['sinhVien', 'lopMonHoc'])->findOrFail($id);
        return view('diem_danh.show', compact('item'));
    }

    public function edit($id)
    {
        $item = DiemDanh::findOrFail($id);
        $sinhVien = SinhVien::all();
        $lopMonHoc = LopMonHoc::all();
        return view('diem_danh.edit', compact('item', 'sinhVien', 'lopMonHoc'));
    }

    public function update(Request $request, $id)
    {
        $item = DiemDanh::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('diem_danh.index');
    }

    public function destroy($id)
    {
        DiemDanh::destroy($id);
        return redirect()->route('diem_danh.index');
    }
}

