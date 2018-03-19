<?php

namespace App\Http\Controllers;

use App\Models\ReportOT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportOTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reportots = ReportOT::all();
        $data = [
            'reportots' => $reportots,
        ];
        return view('reportots.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('reportots.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reportOTs = new ReportOT();
        $reportOTs->starts_at = $request->starts_at;
        dd($reportOTs);
        $reportOTs->ends_at = $request->end_at;
        $reportOTs->contents = $request->contents;
        $reportOTs->user_id = Auth::id();
        $reportOTs->save();
        return redirect()->route('reportots.index');
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
        $reportot = ReportOT::findOrFail($id);
        $data = [
            'reportot' => $reportot,
        ];
        return view('reportots.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
