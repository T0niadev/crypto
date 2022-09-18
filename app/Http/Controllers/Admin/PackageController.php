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
        //

        $packages = Package::all();
        return view('admin.packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            "max_amount" => 'required',
            "duration" => 'required',
            "duration_mode" => 'required',
            // "milestones" => 'required',
            // "payout_mode" => 'required',
            "description" => 'required',
            "image" => 'mimes:jpeg,png|max:5000',
            "status" => 'required',
        ]);


        // $extension =request()->file('image')->getClientOriginalExtension();
		// $name = time();

        // $packages = new Package([

        //     "name" => required('name'),
        //     "roi" => required('roi'),
        //     "start_date" => required('start_date'),
        //     "slots" => required('slots'),
        //     "min_amount" => required('min_amount'),
        //     "max_amount" => required('max_amount'),
        //    "duration" => required('duration'),
        //    "duration_mode" => required('duration_mode'),
        //    "milestones" => required('milestones'),
        //    'image' => $name . "." . $extension,
        //    "payout_mode" => required('payout_mode'),

        //    "type" => required('type'),
        //    "rollover" => required('rollover'),
        //    "status" => required('status'),


        // ]);

        // $this->addImage(request()->file('image'));
        // $packages->save();


        // return redirect('/packages');


        // if ($request->hasFile("image")) {
        //     $file = $request->image;
        //     $imageName = time() . "_" . $file->getClientOriginalName();
        //     $file->move(public_path('images/packages'), $imageName);

            Package::create([
                "name"  => $request->name,
                "roi"  => $request->roi,
                "start_date"  => $request->start_date,
                "min_amount"  => $request->min_amount,
                "max_amount"  => $request->max_amount,
                "duration"  => $request->duration,
                "duration_mode"  => $request->duration_mode,
                "milestones"  => $request->milestones,
                "payout_mode"  => $request->payout_mode,
                "description"  => $request->description,
                "type"  => $request->type,
                "status"  => $request->status,
            ]);


        // $this->addImage(request()->file('image'));
        // $packages->save();

            return redirect('admin/packages')->with([
                "success" => "Package Added Succesfully"
            ]);


    }


    public function edit(Package $package)
    {

        $package = Package::findorfail($id);

        return view('admin.packages.edit', compact('package'));
    }


    public function update(Request $request, Package $package)
    {

        $request->validate([
            "name" => 'required',
            "roi" => 'required',
            "start_date" => 'required',
            "slots" => 'required',
            "min_amount" => 'required',
            "max_amount" => 'required',
            "duration" => 'required',
            "duration_mode" => 'required',
            "milestones" => 'required',
            "payout_mode" => 'required',
            "description" => 'required',
            "image" => 'mimes:jpeg,png|max:5000',
            "type" => 'required',
            "rollover" => 'required',
            "status" => 'required',
        ]);

        if ($request->hasFile("image")) {
            $file = $request->image;
            $imageName = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('images/packages'), $imageName);

            Package::create([
                "name"  => $request->name,
                "roi"  => $request->roi,
                "start_date"  => $request->start_date,
                "slots"  => $request->slots,
                "min_amount"  => $request->min_amount,
                "max_amount"  => $request->max_amount,
                "duration"  => $request->duration,
                "duration_mode"  => $request->duration_mode,
                "milestones"  => $request->milestones,
                "payout_mode"  => $request->payout_mode,
                "description"  => $request->description,
                "type"  => $request->type,
                "rollover"  => $request->rollover,
                "status"  => $request->status,
            ]);



            return redirect('admin/packages')->with([
                "success" => "Package Added Succesfully"
            ]);
        }

        // $input = $request->except(['image']);

        //     $package->name = $request->get('name');
        //     $package->roi = $request->get('roi');
        //     $package->start_date = $request->get('start_date');
        //     $package->slots = $request->get('slots');
        //     $package->min_amount = $request->get('min_amount');
        //     $package->max_amount = $request->get('max_amount');
        //     $package->duration = $request->get('duration');
        //     $package->duration_mode = $request->get('duration_mode');
        //     $package->milestones = $request->get('milestones');
        //     $package->payout_mode = $request->get('payout_mode');
        //     $package->description = $request->get('description');

        //     $package->type = $request->get('type');
        //     $package->rollover = $request->get('rollover');
        //     $package->status = $request->get('status');

        // $input = $request->except(['image']);

        //     $package->name = $request->get('name');
        //     $package->roi = $request->get('roi');
        //     $package->start_date = $request->get('start_date');
        //     $package->slots = $request->get('slots');
        //     $package->min_amount = $request->get('min_amount');
        //     $package->max_amount = $request->get('max_amount');
        //     $package->duration = $request->get('duration');
        //     $package->duration_mode = $request->get('duration_mode');
        //     $package->milestones = $request->get('milestones');
        //     $package->payout_mode = $request->get('payout_mode');
        //     $package->description = $request->get('description');

        //     $package->type = $request->get('type');
        //     $package->rollover = $request->get('rollover');
        //     $package->status = $request->get('status');


        //     if ($file = request()->file('image')) {
        //         \File::delete(public_path(). '/assets/packages/' .$package->image);

        //         $this->addImage(request()->file('image'));

        //         $extension =request()->file('image')->getClientOriginalExtension();
        //         $name = time();


        //         $input['image'] = $name.".".$extension;
        //     }


        // $package->update($input);




        // return redirect('/admin/packages');
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
}
