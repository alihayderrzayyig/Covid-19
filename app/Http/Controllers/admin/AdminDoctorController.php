<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;


class AdminDoctorController extends Controller
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
        $search = request()->query('doctors');
        if ($search) {
            $doctors = DB::table('users')
                ->select('id', 'name', 'phone', 'location', 'specialty')
                ->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('location', 'LIKE', '%' . $search . '%')
                ->paginate(30);
        } else {
            $doctors = DB::table('doctors')
                ->select('id', 'name', 'phone', 'location', 'specialty')
                ->paginate(30);
        }

        return view('admin.doctor.index', ['doctors' => $doctors])->with('no', 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doctor.create');
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
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('img/doctor/', $filename);

            $img2 = Image::make('img/doctor/' . $filename)->resize(600, 500);
            $img2->save();

            $image = 'img/doctor/' . $filename;
        }


        Doctor::create([
            'name'          => $request->name,
            'phone'         => $request->phone,
            'specialty'     => $request->specialty,
            'location'      => $request->location,
            'image'         => $image,
        ]);


        session()->flash('success', 'تمة عملة الاضافة بنجاح');
        return \redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        return \view('admin.doctor.show', [
            'doctor' => $doctor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        return view('admin.doctor.create', [
            'doctor' => $doctor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        // \dd($request);

        $date = $request->only([
            'name',
            'phone',
            'specialty',
            'location'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('img/doctor/', $filename);

            $img2 = Image::make('img/doctor/' . $filename)->resize(600, 500);
            $img2->save();

            $date['image'] = 'img/doctor/' . $filename;
            $doctor->deleteImage();
        }

        $doctor->update($date);

        session()->flash('success', 'تمة عملة التحديث بنجاح');
        return \redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->deleteImage();
        $doctor->delete();
        session()->flash('success', 'تمة عملة الحذف بنجاح');
        return redirect()->back();
    }
}
