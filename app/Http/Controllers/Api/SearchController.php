<?php

namespace App\Http\Controllers\Api;

use App\Repositories\SearchRepository;
use Illuminate\Http\Request;

class SearchController extends BaseController
{
    public $searchRepository;

    public function __construct(SearchRepository $searchRepository)
    {
        parent::__construct();
        $this->searchRepository = $searchRepository;
    }

    public function search(Request $request)
    {
        return $this->searchRepository->search($request);
    }
}
