<?php

namespace App\Http\Controllers;

use App\Models\Realty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $realty = Realty::where('user_id', Auth::user()->id)->get();
        return view('home', compact('realty'));
    }

    public function show(Realty $realty)
    {
        return view('home', compact('realty'));
    }

    public function create()
    {
        return redirect('/');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $storeData = $request->validate([
        //     'user_id' => 'required',
        //     'price' => 'required',
        //     'territory' => 'required',
        //     'availability' => 'required',
        //     'square' => 'required',
        // ]);
        // $realties = Realty::create($storeData);
        // return redirect()->route('index')->with('success','Realty has been created successfully.');

        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'price' => 'required',
            'territory' => 'required',
            'availability' => 'required',
            'square' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                        'error' => $validator->errors()->all()
                    ]);
        }

        Realty::create([
            'user_id' => $request->user_id,
            'price' => $request->price,
            'territory' => $request->territory,
            'availability' => $request->availability,
            'square' => $request->square,
        ]);

        return response()->json(['success' => 'Realty created successfully.']);
    }

    public function destroy($realty_id)
    {
        $realty = Realty::find($realty_id)->delete();
        return response()->json(['success' => 'Realty Deleted Successfully!']);
    }

}
