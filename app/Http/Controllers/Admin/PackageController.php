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
        return view('admin.packages.index');
    }

    /**
     * Get the data for listing in yajra.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function fetchPackages(Request $request)
    {
        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowPerPage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = Package::select('count(*) as allcount')->count();
        $totalRecordsWithFilter = Package::select('count(*) as allcount')->where('name', 'like', '%' . $searchValue . '%')->count();

        // Fetch records
        $records = Package::orderBy($columnName, $columnSortOrder)
            ->where('packages.name', 'like', '%' . $searchValue . '%')
            ->orWhere('packages.roi', 'like', '%' . $searchValue . '%')
            ->orWhere('packages.min_amount', 'like', '%' . $searchValue . '%')
            ->orWhere('packages.max_amount', 'like', '%' . $searchValue . '%')
            ->orWhere('packages.start_date', 'like', '%' . $searchValue . '%')
            ->orWhere('packages.end_date', 'like', '%' .$searchValue . '%')
            ->orWhere('packages.duration', 'like', '%' .$searchValue . '%')
            ->orWhere('packages.duration_mode', 'like', '%' .$searchValue . '%')
            ->orWhere('packages.rollover', 'like', '%' .$searchValue . '%')
            ->orWhere('packages.status', 'like', '%' .$searchValue . '%')
            ->select('packages.*')
            ->skip($start)
            ->take($rowPerPage)
            ->get();

        $data_arr = array();

        foreach ($records as $record) {
            $id = $record->id;
            $name = $record->name;
            $roi = $record->roi;
            $min_amount = $record->min_amount;
            $max_amount = $record->max_amount;
            $start_date = $record->start_date;
            $end_date = $record->end_date;
            $duration = $record->duration;
            $duration_mode = $record->duration_mode;
            $rollover = $record->rollover;
            $status = $record->status;

            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "roi" => $roi,
                "min_amount" => $min_amount,
                "max_amount" => $max_amount,
                "start_date" => $start_date,
                "end_date" => $end_date,
                "duration" => $duration,
                "duration_mode" => $duration_mode,
                "rollover" => $rollover,
                "status" => $status
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordsWithFilter,
            "aaData" => $data_arr
        );

        return response()->json($response);
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


        $extension = request()->file('image')->getClientOriginalExtension();
        $name = time();

        $packages = new Package([

            "name" => $request['name'],
            "roi" => $request['roi'],
            "start_date" => $request['start_date'],
            "slots" => $request['slots'],
            "min_amount" => $request['min_amount'],
            "max_amount" => $request['max_amount'],
            "duration" => $request['duration'],
            "duration_mode" => $request['duration_mode'],
            "milestones" => $request['milestones'],
            'image' => $name . "." . $extension,
            "payout_mode" => $request['payout_mode'],
            "type" => $request['type'],
            "rollover" => $request['rollover'],
            "status" => $request['status'],


        ]);

        $this->addImage(request()->file('image'));
        $packages->save();


        return redirect('/packages');
    }


    public function edit(Package $package)
    {
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

        // $input = $request->except(['image']);

        $package->name = $request->get('name');
        $package->roi = $request->get('roi');
        $package->start_date = $request->get('start_date');
        $package->slots = $request->get('slots');
        $package->min_amount = $request->get('min_amount');
        $package->max_amount = $request->get('max_amount');
        $package->duration = $request->get('duration');
        $package->duration_mode = $request->get('duration_mode');
        $package->milestones = $request->get('milestones');
        $package->payout_mode = $request->get('payout_mode');
        $package->description = $request->get('description');

        $package->type = $request->get('type');
        $package->rollover = $request->get('rollover');
        $package->status = $request->get('status');




        if ($request->file('image')) {
            File::delete(public_path() . '/assets/packages/' . $package->image);

            $this->addImage(request()->file('image'));

            $extension = request()->file('image')->getClientOriginalExtension();
            $name = time();


            $input['image'] = $name . "." . $extension;
        }


        $package->update($input);






        return redirect('/admin/packages');
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

        return back()->with('error', 'Error deleting package');
    }
}
