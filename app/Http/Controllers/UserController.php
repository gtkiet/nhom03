<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $User = User::when($keyword, function ($query, $keyword) {
            return $query->where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('email', 'LIKE', "%{$keyword}%");
        })
            ->orderBy('id', 'ASC')
            ->paginate(10)
            ->withQueryString();
        return view('user.index', compact('User'));
    }


    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // mật khẩu tự mã hoá nhờ mutator trong Model
        User::create($data);

        return redirect()->route('user.index')
            ->with('success', 'Thêm người dùng thành công!');
    }

    public function edit($id)
    {
        $User = User::findOrFail($id);
        return view('user.edit', compact('User'));
    }

    public function update(Request $request, $id)
    {
        $User = User::findOrFail($id);

        $data = $request->all();

        // Nếu mật khẩu để trống → không cập nhật
        if (empty($data['password'])) {
            unset($data['password']);
        }

        $User->update($data);

        return redirect()->route('user.index')
            ->with('success', 'Cập nhật thành công!');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('user.index')
            ->with('success', 'Xóa người dùng thành công!');
    }
}
