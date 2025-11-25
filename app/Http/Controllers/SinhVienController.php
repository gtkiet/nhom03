<?php

namespace App\Http\Controllers;

use App\Models\SinhVien;
use App\Models\LopHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SinhVienController extends Controller
{
    public function index()
    {
        $data = SinhVien::with('lopHoc')->paginate(10);
        return view('sinh_vien.index', compact('data'));
    }

    public function create()
    {
        $lopHoc = LopHoc::all();
        return view('sinh_vien.create', compact('lopHoc'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ma_sinh_vien' => 'required|unique:sinh_vien,ma_sinh_vien',
            'ho_ten' => 'required|string|max:100',
            'email' => 'nullable|email',
            'so_dien_thoai' => 'nullable|regex:/^[0-9]{10,11}$/',
            'gioi_tinh' => 'nullable|in:Nam,Nữ,Khác',
            'id_lop_hoc' => 'nullable|exists:lop_hoc,id',
            'anh_dai_dien' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->all();

        // Upload ảnh
        if ($request->hasFile('anh_dai_dien')) {
            $path = $request->file('anh_dai_dien')->store('avatar', 'public');
            $data['anh_dai_dien'] = $path;
        }

        SinhVien::create($data);

        return redirect()->route('sinh_vien.index')
            ->with('success', 'Thêm sinh viên thành công');
    }

    public function show($id)
    {
        $item = SinhVien::with('lopHoc')->findOrFail($id);
        return view('sinh_vien.show', compact('item'));
    }

    public function edit($id)
    {
        $item = SinhVien::findOrFail($id);
        $lopHoc = LopHoc::all();
        return view('sinh_vien.edit', compact('item', 'lopHoc'));
    }

    public function update(Request $request, $id)
    {
        $item = SinhVien::findOrFail($id);

        $request->validate([
            'ma_sinh_vien' => 'required|unique:sinh_vien,ma_sinh_vien,' . $id,
            'ho_ten' => 'required|string|max:100',
            'email' => 'nullable|email',
            'so_dien_thoai' => 'nullable|regex:/^[0-9]{10,11}$/',
            'gioi_tinh' => 'nullable|in:Nam,Nữ,Khác',
            'id_lop_hoc' => 'nullable|exists:lop_hoc,id',
            'anh_dai_dien' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->all();

        // Upload ảnh mới
        if ($request->hasFile('anh_dai_dien')) {
            // Xóa ảnh cũ nếu có
            if ($item->anh_dai_dien) {
                Storage::disk('public')->delete($item->anh_dai_dien);
            }

            $path = $request->file('anh_dai_dien')->store('avatar', 'public');
            $data['anh_dai_dien'] = $path;
        }

        $item->update($data);

        return redirect()->route('sinh_vien.index')
            ->with('success', 'Cập nhật thành công');
    }

    public function destroy($id)
    {
        $item = SinhVien::findOrFail($id);

        // Không cho xóa nếu sinh viên đang đăng ký môn học
        if ($item->dangKyHoc()->exists()) {
            return redirect()->back()->with('error', 'Không thể xóa vì sinh viên đang đăng ký môn học!');
        }

        // Xóa avatar nếu có
        if ($item->anh_dai_dien) {
            Storage::disk('public')->delete($item->anh_dai_dien);
        }

        $item->delete();

        return redirect()->route('sinh_vien.index')
            ->with('success', 'Xóa sinh viên thành công');
    }
}
