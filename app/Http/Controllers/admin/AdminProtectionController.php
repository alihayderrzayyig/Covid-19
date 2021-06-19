<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Protection;
use Illuminate\Http\Request;
// use Intervention\Image\Image;
use Intervention\Image\Facades\Image;

class AdminProtectionController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('admin.protection.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('img/protection/', $filename);

            $img2 = Image::make('img/protection/' . $filename)->resize(600, 500);
            $img2->save();

            $image = 'img/protection/' . $filename;
        }


        Protection::create([
            'name'     => $request->name,
            'image'     => $image,
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Protection $protection)
    {
        return \view('admin.protection.create', [
            'protection' => $protection
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Protection $protection)
    {
        $date = $request->only(['name']);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('img/protection/', $filename);

            $img2 = Image::make('img/protection/' . $filename)->resize(600, 500);
            $img2->save();

            $date['image'] = 'img/protection/' . $filename;
            $protection->deleteImage();
        }

        $protection->update($date);

        session()->flash('success', 'تمة عملة التحديث بنجاح');
        return \redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Protection $protection)
    {
        $protection->deleteImage();
        $protection->delete();
        session()->flash('success', 'تمة عملة الحذف بنجاح');
        return \redirect()->back();
    }
}
