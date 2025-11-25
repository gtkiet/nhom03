<?php

namespace App\Http\Controllers;

use App\Models\MonHoc;
use Illuminate\Http\Request;

class MonHocController extends Controller
{
    public function index()
    {
        $data = MonHoc::paginate(10);
        return view('mon_hoc.index', compact('data'));
    }

    public function create()
    {
        return view('mon_hoc.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ma_mon' => 'required|unique:mon_hoc,ma_mon',
            'ten_mon' => 'required|string|max:100',
            'so_tin_chi' => 'required|integer|min:1|max:10',
            'mo_ta' => 'nullable|string|max:1000',
        ]);

        MonHoc::create($request->all());

        return redirect()->route('mon_hoc.index')->with('success', 'Thêm môn học thành công');
    }

    public function show($id)
    {
        $item = MonHoc::findOrFail($id);
        return view('mon_hoc.show', compact('item'));
    }

    public function edit($id)
    {
        $item = MonHoc::findOrFail($id);
        return view('mon_hoc.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ma_mon' => 'required|unique:mon_hoc,ma_mon,' . $id,
            'ten_mon' => 'required|string|max:100',
            'so_tin_chi' => 'required|integer|min:1|max:10',
            'mo_ta' => 'nullable|string|max:1000',
        ]);

        $item = MonHoc::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('mon_hoc.index')->with('success', 'Cập nhật thành công');
    }

    public function destroy($id)
    {
        $item = MonHoc::findOrFail($id);

        // Kiểm tra xem môn học có đang được dùng tại lớp học phần không
        if ($item->lopMonHoc()->exists()) {
            return back()->with('error', 'Không thể xóa vì môn học đang được sử dụng trong lớp học phần!');
        }

        $item->delete();

        return redirect()->route('mon_hoc.index')->with('success', 'Xóa thành công');
    }
}
