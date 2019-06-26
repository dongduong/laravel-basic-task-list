<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;
use App\Test;

class TestsApiController extends Controller
{
    public function index()
    {
        $tests = Test::all();

        return $tests;
    }

    public function store(StoreTestRequest $request)
    {
        return Test::create($request->all());
    }

    public function update(UpdateTestRequest $request, Test $test)
    {
        return $test->update($request->all());
    }

    public function show(Test $test)
    {
        return $test;
    }

    public function destroy(Test $test)
    {
        $test->delete();

        return response("OK", 200);
    }
}
