<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NguoiDungRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('nguoi_dung'); // lấy id khi update

        return [
            'ho_ten'     => 'required|string|max:100',
            'email'      => "required|email|max:100|unique:nguoi_dung,email,$id",
            'mat_khau'   => $id ? 'nullable|min:6' : 'required|min:6',
            'vai_tro'    => 'required|in:admin,sinh_vien',
            'trang_thai' => 'required|in:hoat_dong,khoa',
        ];
    }
}
