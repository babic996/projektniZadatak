<?php

namespace App\Http\Controllers;

use App\Models\BodyInspection;
use App\Models\Inspectorate;
use App\Models\Jurisdiction;
use Illuminate\Http\Request;

class BodyInspectionController extends Controller
{
    public function create()
    {
        $jurisdictions=Jurisdiction::all();
        $inspectorates=Inspectorate::all();

        return view('body_inspections.create',['jurisdictions'=>$jurisdictions,'inspectorates'=>$inspectorates]);
    }
    public function store()
    {
        request()->validate([
            'name'=>'required',
            'jurisdiction'=>'required',
            'inspectorate'=>'required',
            'contact_person'=>'required'
        ]);

        BodyInspection::create([
            'name'=>request('name'),
            'inspectorate_id'=>request('inspectorate'),
            'jurisdiction_id'=>request('jurisdiction'),
            'contactPerson'=>request('contact_person')
        ]);

        return back();
    }
    public function index()
    {
        $body_inspections=BodyInspection::all();

        return view('body_inspections.index',['body_inspections'=>$body_inspections]);
    }
    public function destroy(BodyInspection $bodyInspection)
    {
        $bodyInspection->delete();
        return back();
    }
    public function edit(BodyInspection $bodyInspection)
    {
        $jurisdictions=Jurisdiction::all();
        $inspectorates=Inspectorate::all();

        return view('body_inspections.edit',['bodyInspection'=>$bodyInspection,'jurisdictions'=>$jurisdictions,'inspectorates'=>$inspectorates]);
    }
    public function update(BodyInspection $bodyInspection)
    {
        request()->validate([
            'name'=>'required',
            'jurisdiction'=>'required',
            'inspectorate'=>'required',
            'contact_person'=>'required'
        ]);



        $bodyInspection->name=request('name');
        $bodyInspection->inspectorate_id=request('inspectorate');
        $bodyInspection->jurisdiction_id=request('jurisdiction');
        $bodyInspection->contactPerson=request('contact_person');
        $bodyInspection->update();

        return back();

    }
}
