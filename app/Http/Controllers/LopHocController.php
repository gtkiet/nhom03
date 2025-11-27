<?php

namespace App\Http\Controllers;

use App\Models\LopHoc;
use Illuminate\Http\Request;

class LopHocController extends Controller
{
    public function index(Request $request)
    {
        $query = LopHoc::query();

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('ma_lop', 'like', "%{$keyword}%")
                  ->orWhere('ten_lop', 'like', "%{$keyword}%");
            });
        }

        $lopHoc = $query->orderBy('id', 'ASC')
                        ->paginate(10)
                        ->withQueryString();

        return view('lop_hoc.index', compact('lopHoc'));
    }

    public function create()
    {
        return view('lop_hoc.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        LopHoc::create($data);

        return redirect()->route('lop_hoc.index')->with('success', 'Thêm thành công');
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
        $data = $request->all();

        $item = LopHoc::findOrFail($id);
        $item->update($data);

        return redirect()->route('lop_hoc.index')->with('success', 'Cập nhật thành công');
    }

    public function destroy($id)
    {
        $item = LopHoc::findOrFail($id);
        $item->delete();

        return redirect()->route('lop_hoc.index')->with('success', 'Xóa thành công');
    }
}
