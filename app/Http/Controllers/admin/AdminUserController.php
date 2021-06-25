<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
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
        $search = request()->query('search');
        if ($search) {
            $users = DB::table('users')
                ->select('id', 'name', 'email', 'created_at')
                ->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')
                ->paginate(30);
        } else {
            $users = DB::table('users')
                ->select('id', 'name', 'email', 'created_at')
                ->paginate(30);
        }

        return view('admin.user.index', ['users' => $users])->with('no', 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $governorates = Governorate::all();
        return view('admin.user.create');
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
        if ($request->isAdmin === 'on') {
            $isAdmin = true;
        } else {
            $isAdmin = false;
        }


        $user = User::create([
            'name'      => $request->name,
            'phone'     => $request->phone,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'isAdmin'   => $isAdmin,
        ]);

        session()->flash('success', 'تم اضافة المستخدم بنجاح');

        return redirect()->route('admin.users.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show', [
            'user'          => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.create', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if ($request->isAdmin === 'on') {
            $isAdmin = true;
        } else {
            $isAdmin = false;
        }


        $date_user = $request->only(['name']);

        if ($request->phone) {
            $date_user['phone'] = $request->phone;
        }

        if ($request->email) {
            $date_user['email'] = $request->email;
        }

        if ($request->password) {
            $date_user['password'] = Hash::make($request->password);
        }

        $date_user['isAdmin'] = $isAdmin;

        $user->update($date_user);

        session()->flash('success', 'تم تحديث البيانات بنجاح');
        return \redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Auth::user()->isAdmin && (Auth::user()->id != $user->id)) {
            $user->delete();
            session()->flash('success', 'تمة عملة الحذف بنجاح');
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
