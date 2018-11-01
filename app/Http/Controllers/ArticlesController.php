<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Session;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) 
        {
            if(!empty($request->keywords)){
            $articles = Article::where('title', 'like', '%' . $request->keywords . '%')
                ->orwhere('content', 'like', '%' . $request->keywords . '%')->get();
                $view = (string) view('articles.list')->with('articles', $articles)->render();
                return response()->json(['view' => $view, 'status' => 'success']);
            }
            else if (!empty($request->sort))
            {
                if($request->sort=='asc'){
                    $articles = Article::orderBy('created_at', $request->sort)->get();
                    $view = (string) view('articles.list')->with('articles', $articles)->render();
                    return response()->json(['view' => $view, 'status' => 'success']);
                }else{
                    $articles = Article::orderBy('created_at', $request->sort)->get();
                    $view = (string) view('articles.list')->with('articles', $articles)->render();
                    return response()->json(['view' => $view, 'status' => 'success']);
                }
                // $articles = $articles->orderBy('created_at', $request->keywords);
                // $articles = $articles->paginate(5);

                // $request->keywords == 'asc' ? $keywords = 'desc' : $keywords = 'asc';
                // $request->keywords == '' ? $keywords = '' : $keywords = $request->keywords;
                // $view = (string) view('articles.list')->with('articles', $articles)->render();
                // return response()->json(['view' => $view, 'status' => 'success']);
            }
        } 
        else 
        {
            $articles = Article::paginate(5);
            return view('articles.index')->with('articles', $articles);
        }
    }

    //     if(!empty($request->search)){
    //         $articles = article::where('title', 'like', '%' .$request->search .'%')
    //         ->orwhere('content', 'like', '%' .$request->search .'%')
    //         ->get();
    //         return view('articles.index', compact("articles"));
    //     }
    //     else{
    //     $articles = Article::all();
    //     return view('articles.index')->with('articles',$articles);
    //     }
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Article::create($request->all());
        Session::flash("notice", "Article success created");
        return redirect()->route("articles.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        $comments = Article::find($id)->comments->sortBy('Comment.created_at');
        return view('articles.show')->with('article', $article)
            ->with('comments', $comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit')->with('article', $article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Article::find($id)->update($request->all());
        Session::flash("notice", "Article success update");
        return redirect()->route("articles.show", $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = article::find($id);
        $article->comments()->delete();
        $article->delete();
        Session::flash("notice", "Article success deleted");
        return redirect()->route("articles.index");
    }
}
