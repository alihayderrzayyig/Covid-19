<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Governorate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCountingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkIsAdmin']);
    }

    public function index()
    {

        $search = request()->query('search');
        if ($search) {
            $counting = DB::table('governorates')
                ->select('id', 'name', 'injury', 'recovery', 'deaths')
                ->where('name', 'LIKE', '%' . $search . '%')->get();
        } else {
            $counting = DB::table('governorates')
                ->select('id', 'name', 'injury', 'recovery', 'deaths')->get();
        }

        return \view('admin.counting.index', [
            'counting' => $counting,
        ]);
    }

    public function edit(Governorate $governorate)
    {
        // \dd($governorate);
        return view('admin.counting.update', [
            'counting' => $governorate,
        ]);
    }

    public function update(Request $request, Governorate $governorate){
        // \dd($request);
        $data = $request->only(['deaths', 'injury', 'recovery']);


        $governorate->update($data);

        session()->flash('success', 'تم تحديث البيانات بنجاح');
        return \redirect()->back();
    }
}
