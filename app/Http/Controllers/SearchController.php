<?php

namespace App\Http\Controllers;

use App\Models\{Article, User};
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $results = NULL;
        $users = User::get();
        if ($query = $request->get('query')) {
            $results = Article::search($query, function ($meilisearch, $query, $options) use ($request) {
                if ($userId = $request->get('user_id')) {
                    $options['filters'] = 'user_id ='. $userId;
                }
                return $meilisearch->search($query, $options);
            })->paginate(5)->withQueryString();
        }
        return view('search', array(
            'results' => $results,
            'users' => $users
        ));
    }
}
