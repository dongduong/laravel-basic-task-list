<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskTagRequest;
use App\Http\Requests\UpdateTaskTagRequest;
use App\TaskTag;

class TaskTagApiController extends Controller
{
    public function index()
    {
        $taskTags = TaskTag::all();

        return $taskTags;
    }

    public function store(StoreTaskTagRequest $request)
    {
        return TaskTag::create($request->all());
    }

    public function update(UpdateTaskTagRequest $request, TaskTag $taskTag)
    {
        return $taskTag->update($request->all());
    }

    public function show(TaskTag $taskTag)
    {
        return $taskTag;
    }

    public function destroy(TaskTag $taskTag)
    {
        $taskTag->delete();

        return response("OK", 200);
    }
}
