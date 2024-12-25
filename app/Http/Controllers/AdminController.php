<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(Request $request)
    {
        $items = Admin::where('id','!=',auth()->user()->id)->get();
        return view('layouts.admin_panel', compact('items'));
    }

    public  function show(Admin $user)
    {

        return view('layouts.admin_panel', compact('admin'));
    }

    public function destroy(Admin $user)
    {
        $user->delete();
        return redirect(route('admin.index'));
    }
}
