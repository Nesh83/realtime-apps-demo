<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class SurveyController
 *
 * @package App\Http\Controllers
 *
 * @author Nenad Stevanovic <nenad.stevanovic@quantox.com>
 */
class SurveyController extends Controller
{
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:surveys,email',
            'position' => 'required',
            'experience' => 'required',
            'years' => 'required',
            'framework' => 'required',
        ]);

        $inputs = $request->only(['email', 'position', 'experience', 'years', 'framework']);

        $survey = Survey::create($inputs);

        return $survey;
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

    /**
     * Return statistics per field
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function statistics(Request $request)
    {
        $this->validate($request, [
           'field' => 'required|in:position,experience,years,framework'
        ]);

        $field = $request->field;

        $stats = Survey::groupBy($field)
            ->selectRaw($field.' as field, count(*) as total')
            ->get();

        return $stats;

    }
}
