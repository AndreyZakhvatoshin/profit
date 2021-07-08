<?php

namespace App\Http\Controllers;

use App\Helpers\SprintHelper;
use App\Http\Requests\SprintRequest;
use App\Models\Sprint;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SprintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carbon = new Carbon();
        // dd($carbon->year);
        $converted = Str::substr($carbon->year, 2, 2);
        dd($converted);
        // dd($carbon->dayOfWeek);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SprintRequest $request)
    {
        $sprintData = SprintHelper::createSprintData($request->input('week'));
        $sprint = Sprint::create($sprintData);
        return response()->json(['year' => $sprint->year, 'week' => $sprint->week]);
    }

    public function start($id)
    {
        if (!SprintHelper::checkEstimateTask($id)) {
            return response()->json(['Global' => 'Невозможно начать спринт. Оцените все задачи']);
        }
        if (SprintHelper::hasActiveSprint()) {
            return response()->json(['Global' => 'Есть активный спринт']);
        }
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
