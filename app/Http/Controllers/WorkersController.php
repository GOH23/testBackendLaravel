<?php

namespace App\Http\Controllers;

use App\Models\Workers;
use Illuminate\Http\Request;

class WorkersController extends Controller
{
    public function index()
    {
        $workers = Workers::whereNull('parent_id')->with(['children','workers'])->get();
        $tree =$this ->buildTree($workers);
        return response()->json([
            "success" => true,
            "data" => $tree 
        ]);
    }
    public function store(Request $request)
    {

        $validated = $request->validate([
            'workerListName' => 'required'
        ]);
        
        $worker = Workers::create($validated);
        return response()->json([
            "success" => true,
            "data" => $worker
        ]);
    }
    //Рекурсивная функция для создания дерева
    public function buildTree($workers){
        return $workers->map(function($worker){
            return [
                "id"=> $worker->id,
                "name"=> $worker->workerListName,
                "workers"=> $worker->workers,
                "children"=> $this->buildTree($worker->children),
            ];
        });
    }
    public function addParent(Request $request)
    {

        $validated = $request->validate([
            'parentName' => 'required',
            'childListName' => 'required'
        ]);

        $worker = Workers::where('workerListName', $validated['parentName'])->first();
        $data = [
            "parent_id" => $worker->id,
            "workerListName"=> $validated["childListName"],
        ];
        $worker = Workers::create( $data);
        return response()->json([
            "success" => true,
            "data" => $worker
        ]);
    }
}
