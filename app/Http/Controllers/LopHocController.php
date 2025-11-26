<?php

namespace App\Http\Controllers;

use App\Models\LopHoc;
use Illuminate\Http\Request;

class LopHocController extends Controller
{
    public function index(Request $request)
    {
        $query = LopHoc::query();

        if ($request->keyword) {
            $query->where('ma_lop', 'like', "%{$request->keyword}%")
                ->orWhere('ten_lop', 'like', "%{$request->keyword}%");
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
        LopHoc::create($request->all());
        return redirect()->route('lop_hoc.index');
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
        $item = LopHoc::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('lop_hoc.index');
    }

    public function destroy($id)
    {
        LopHoc::destroy($id);
        return redirect()->route('lop_hoc.index');
    }
}
