<?php

namespace App\Http\Controllers;

use App\Models\BodyInspection;
use App\Models\Product;
use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function create()
    {
        $body_inspections=BodyInspection::all();
        $products=Product::all();

        return view('record.create',['body_inspections'=>$body_inspections,'products'=>$products]);
    }
    public function store()
    {
        request()->validate([
            'date'=>'required',
            'body_inspection'=>'required',
            'product'=>'required',
            'description'=>'required',
            'safe'=>'required',
        ]);

        if(request('date')<=now())
        {
            Record::create([
               'date'=>request('date'),
                'body_inspection_id'=> request('body_inspection'),
                'product_id'=>request('product'),
                'description'=>request('description'),
                'safe'=>request('safe')
            ]);
        }

        return back();
    }
    public function index(Request $request)
    {
        $body_inspections=BodyInspection::all();

        if($request->body_inspection!=null && $request->from_date<$request->to_date) {
            $records = Record::where('body_inspection_id', '=', $request->body_inspection)
                ->where('date', '>=', $request->from_date)
                ->where('date', '<=', $request->to_date)
                ->orderBy('date','ASC')->get();
        }
        else
        {
            $records=Record::orderBy('date','ASC')->get();
        }

        return view('record.index',['records'=>$records,'body_inspections'=>$body_inspections]);
    }
    public function destroy(Record $record)
    {
        $record->delete();

        return back();
    }
    public function edit(Record $record)
    {
        $body_inspections=BodyInspection::all();
        $products=Product::all();

        return view('record.edit',['body_inspections'=>$body_inspections,'products'=>$products,'record'=>$record]);
    }
    public function update(Record $record)
    {
        request()->validate([
            'date'=>'required',
            'body_inspection'=>'required',
            'product'=>'required',
            'description'=>'required',
            'safe'=>'required',
        ]);

        if(request('date')<=now()) {
            $record->date = request('date');
            $record->body_inspection_id = request('body_inspection');
            $record->product_id = request('product');
            $record->description = request('description');
            $record->safe = request('safe');
            $record->update();
        }

        return back();
    }
}
