<?php

namespace App\Http\Controllers;

use App\article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $objArticle = new Article();
        $articles = $objArticle->paginate(5);
        return view('index', ['articles' => $articles]);
    }

    public function add()
    {
        return view('add');
    }

    public function addRequest(Request $request)
    {
        $data = $request->except(['_token']);
        $article = Article::create($data);
        return redirect(route('index'));
    }

    public function edit(Request $request)
    {
        $objArticle = new Article();
        $article = $objArticle->find($request['id']);
        return view('edit', ['article' => $article]);
    }

    public function editRequest(Request $request)
    {
        $data = $request->except(['_token']);

        $article = Article::find($request['id'])->update($data);
        return redirect(route('index'));
    }

    public function delete(Request $request)
    {
        $article = Article::find($request['id'])->delete();
        return redirect(route('index'));
    }
}
