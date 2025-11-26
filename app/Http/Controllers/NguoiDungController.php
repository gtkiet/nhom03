<?php

namespace App\Http\Controllers;

use App\Models\NguoiDung;
use App\Http\Requests\NguoiDungRequest;
use Illuminate\Http\Request;

class NguoiDungController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $nguoiDung = NguoiDung::when($keyword, function ($query, $keyword) {
            return $query->where('ho_ten', 'LIKE', "%{$keyword}%")
                ->orWhere('email', 'LIKE', "%{$keyword}%");
        })
            ->orderBy('id', 'DESC')
            ->paginate(10)
            ->withQueryString();
        return view('nguoi_dung.index', compact('nguoiDung'));
    }


    public function create()
    {
        return view('nguoi_dung.create');
    }

    public function store(NguoiDungRequest $request)
    {
        $data = $request->validated();

        // mật khẩu tự mã hoá nhờ mutator trong Model
        NguoiDung::create($data);

        return redirect()->route('nguoi_dung.index')
            ->with('success', 'Thêm người dùng thành công!');
    }

    public function edit($id)
    {
        $nguoiDung = NguoiDung::findOrFail($id);
        return view('nguoi_dung.edit', compact('nguoiDung'));
    }

    public function update(NguoiDungRequest $request, $id)
    {
        $nguoiDung = NguoiDung::findOrFail($id);

        $data = $request->validated();

        // Nếu mật khẩu để trống → không cập nhật
        if (empty($data['mat_khau'])) {
            unset($data['mat_khau']);
        }

        $nguoiDung->update($data);

        return redirect()->route('nguoi_dung.index')
            ->with('success', 'Cập nhật thành công!');
    }

    public function destroy($id)
    {
        NguoiDung::findOrFail($id)->delete();

        return redirect()->route('nguoi_dung.index')
            ->with('success', 'Xóa người dùng thành công!');
    }
}
