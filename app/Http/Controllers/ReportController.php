<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReportRequest;
use App\Http\Requests\UpdateReportRequest;
use Illuminate\Http\Request;
use App\Models\Report;
use Carbon\Carbon;
use Auth;
use App\Models\User;
use App\Models\Department;
use App\Models\UserRole;
use function redirect;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reportTimes = Report::orderBy('created_at', 'DESC')->get()->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('d-m-Y');
        });
        $data = [
            'reportTimes' => $reportTimes,
        ];
        return view('reports.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateReportRequest $request)
    {
        $report = new Report();
        $report->today_do = $request->today_do;
        $report->tomorrow_do = $request->tomorrow_do;
        $report->problems = $request->problems;
        $report->user_id = Auth::id();
        $report->save();
        return redirect()->route('reports.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = Report::findOrFail($id);
        $data = [
            'report' => $report,
        ];
        return view('reports.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report = Report::findOrFail($id);
        $data = [
            'report' => $report,
        ];
        return view('reports.edit', $data);
    }


    public function update(UpdateReportRequest $request, $id)
    {
        $report = Report::findOrFail($id);
        $report->update([
            'today_do' => $request->today_do,
            'tomorrow_do' => $request->tomorrow_do,
            'problems' => $request->problems,
            'user_id' => Auth::id()
        ]);
        return redirect()->route('reports.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();
        return redirect()->route('reports.index');
    }
}
