<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminVaccineController extends Controller
{


    public function __construct()
    {
        $this->middleware(['auth', 'checkIsAdmin']);
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('ttt');

        $search = request()->query('search');
        if ($search) {
            $vaccines = DB::table('vaccines')
                ->select('id', 'title', 'sub_title', 'desc', 'number_of_doses', 'Effectiveness', 'temperature', 'price')
                ->where('title', 'LIKE', '%' . $search . '%')
                ->orWhere('sub_title', 'LIKE', '%' . $search . '%')
                ->get();
        } else {
            $vaccines = DB::table('vaccines')
                ->select('id', 'title', 'sub_title', 'desc', 'number_of_doses', 'Effectiveness', 'temperature', 'price')
                ->get();
        }

        return \view('admin.vaccine.index', ['vaccines' => $vaccines]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('admin.vaccine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // \dd($request);
        Vaccine::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'desc' => $request->desc,
            'number_of_doses' => $request->number_of_doses,
            'Effectiveness' => $request->Effectiveness,
            'temperature' => $request->temperature,
            'price' => $request->price,
        ]);


        session()->flash('success', 'تم عملة الاضافة بنجاح');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vaccine $vaccine)
    {
        return \view('admin.vaccine.show', [
            'vaccine' => $vaccine
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vaccine $vaccine)
    {
        return \view('admin.vaccine.create', [
            'vaccine' => $vaccine
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vaccine $vaccine)
    {
        // \dd('ttttt');
        $date = $request->only([
            'title',
            'sub_title',
            'desc',
            'number_of_doses',
            'Effectiveness',
            'temperature',
            'price',
        ]);

        $vaccine->update($date);
        session()->flash('success', 'تم تحديث البيانات بنجاح');
        return \redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vaccine $vaccine)
    {
        $vaccine->delete();
        session()->flash('success', 'تمة عملة الحذف بنجاح');
        return redirect()->back();
    }
}
