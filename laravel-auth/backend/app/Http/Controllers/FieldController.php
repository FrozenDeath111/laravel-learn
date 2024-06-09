<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    public function show()
    {
        return view('eight_form');
    }

    public function store(Request $request)
    {
        $field = new Field();

        $field->field1 = $request->field1;
        $field->field2 = $request->field2;
        $field->field3 = $request->field3;
        $field->field4 = $request->field4;
        $field->field5 = $request->field5;
        $field->field6 = $request->field6;
        $field->field7 = $request->field7;
        $field->field8 = $request->field8;

        $field->save();

        return $field;
    }
}
