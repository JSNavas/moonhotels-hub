<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Services\Hub;

class HubController extends Controller
{
    public function search(SearchRequest $request)
    {
        $hub = new Hub();
        $response = $hub->search($request);

        return response()->json($response);
    }
}
