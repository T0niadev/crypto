<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use illuminate\Support\Facades\File;
use DataTables;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $packages = Package::orderBy('created_at', 'desc')->get();
        return view('admin.packages.index', compact('packages'));
    }


    public function create()
    {
        return view('admin.packages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            "name" => 'required',
            "roi" => 'required',
            "start_date" => 'required',
            "min_amount" => 'required',
            // "max_amount" => 'required',
            "duration" => 'required',
            // "duration_mode" => 'required',
            "description" => 'required',
            "image" => 'mimes:jpeg,png|max:5000',
            "status" => 'required',
        ]);




        Package::create([
            "name"  => $request->name,
            "roi"  => $request->roi,
            "start_date"  => $request->start_date,
            "min_amount"  => $request->min_amount,
            // "max_amount"  => $request->max_amount,
            "duration"  => $request->duration,
            // "duration_mode"  => $request->duration_mode,
            "description"  => $request->description,
            "status"  => $request->status,
        ]);




        return redirect('admin/packages')->with([
            "success" => "Package Added Succesfully"
        ]);
    }




    public function destroy(Package $package)
    {
        // check if package doesn't have investment
        if ($package->investments()->count() > 0) {
            return back()->with('error', 'Can\'t delete package, investments already associated');
        }
        unlink($package['image']);
        if ($package->delete()) {
            return redirect()->route('admin.packages')->with('success', 'Package deleted successfully');
        }

        // return redirect('/admin/packages');
    }

    public function editpackage(Package $package)
    {
        return view('admin.packages.edit', compact('package'));
    }



    public function updatepackage(Request $request, Package $package)
    {
        $request->validate([
            "name" => 'required',
            "roi" => 'required',
            "start_date" => 'required',
            "min_amount" => 'required',
            // "max_amount" => 'required',
            "duration" => 'required',
            // "duration_mode" => 'required',
            "description" => 'required',
            "image" => 'mimes:jpeg,png|max:5000',
            "status" => 'required',
        ]);

        $package->fill($request->post())->save();

        return redirect('/admin/packages')->with('success', 'Status updated succesfully');
    }

    public function search(Request $request)
    {
        $name = $request->name;

        $packages = Package::where('name', 'like', "%{$name}%")->get();

       

        return view('admin.packages.index', compact('packages'));
    }
}