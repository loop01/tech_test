<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\DatabaseJson\Models\User;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Http;

class UserApiController extends Controller
{

    public function store(StorePostRequest $request) {

        try {
            User::create($request->all());
            return response('success', Response::HTTP_OK);
            // return Response::json(User::create($request->all()), status: 201);
        } catch (\Exception $e) {
            return Response::json($e);
        }
    }
}
