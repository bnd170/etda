<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Inertia\Inertia;
use Inertia\Response;

class PodcastController extends Controller
{
    private const PODCAST_EPISODE_LIST = [
        '5hoyKrEgAHeKjVTi4Z1e8m',
    ];

    public function index(Request $request): Response
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $itemCollection = collect(self::PODCAST_EPISODE_LIST);
        $perPage = 5;
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
        $paginatedItems->setPath($request->url());

        return Inertia::render('Podcast/Index', [
            'episodes' => $paginatedItems,
        ]);
    }
}
