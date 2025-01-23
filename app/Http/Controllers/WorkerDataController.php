<?php

namespace App\Http\Controllers;

use App\Models\WorkerData;
use Illuminate\Http\Request;
use App\Models\Workers;
class WorkerDataController extends Controller
{
    public function addWorker(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required|string",
            "phone" => "required|string",
            "photo" => "required|url",
            "workerListName" => "required|string"
        ]);
        $worker = Workers::where('workerListName', $validatedData['workerListName'])->first();
        
        $data = [
            'name'=> $validatedData['name'],
            'phone'=> $validatedData['phone'],
            'photo'=> $validatedData['photo'],
            'id'=> $worker->id,
        ];
        $workerData = WorkerData::create($data);
        return [
            "status"=> true,
            "data"=> $workerData,
        ];
    }
}
