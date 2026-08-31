<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReorderController extends Controller
{
    public function reorder(Request $request){

    $dataArr = $request->data;
    foreach ($dataArr as $item) {
        $model = $item['model'];
        
        $modelClass = 'App\\Models\\' . $model;

        if (class_exists($modelClass)) {
            $modelClass::where('id', $item['id'])->update(['order' => $item['order']]);
        }

    }

    // return response()->json(['status' => 'success']);
    return response()->json(['message' => 'Reordered successfully']);
    }
}
