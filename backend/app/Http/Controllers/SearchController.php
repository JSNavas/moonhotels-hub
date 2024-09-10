<?php

namespace App\Http\Controllers;

use App\Actions\SearchAction;
use App\http\Requests\SearchRequest;

final class SearchController extends Controller
{
    public function __invoke(SearchRequest $request, SearchAction $action)
    {
        $data = $action->__invoke($request->validated());
        //return new DataCollection($data);
    }
}
