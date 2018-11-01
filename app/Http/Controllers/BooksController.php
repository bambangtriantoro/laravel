<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Book;
use Session;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if(!empty($request->search)){
        //     $books = Book::where('description', 'like', '%' .$request->search. '%')
        //     ->orwhere('description', 'like', '%'.$request->search. '%')->get();
        //     return view('books.index', compact('books'));
        // }else{
        //     $books = Book::all();
        //     return view('books.index')->with('books', $books);
        // }
        if ($request->ajax()) 
        {
            if(!empty($request->keywords)){
            $books = Book::where('description', 'like', '%' . $request->keywords . '%')
                ->orwhere('description', 'like', '%' . $request->keywords . '%')->get();
                $view = (string) view('books.list')->with('books', $books)->render();
                return response()->json(['view' => $view, 'status' => 'success']);
            }
            else if (!empty($request->sort))
            {
                if($request->sort=='asc'){
                    $books = Book::orderBy('created_at', $request->sort)->get();
                    $view = (string) view('books.list')->with('books', $books)->render();
                    return response()->json(['view' => $view, 'status' => 'success']);
                }else{
                    $books = Book::orderBy('created_at', $request->sort)->get();
                    $view = (string) view('books.list')->with('books', $books)->render();
                    return response()->json(['view' => $view, 'status' => 'success']);
                }
            }
        } 
        else 
        {
            $books = Book::paginate(5);
            return view('books.index')->with('books', $books);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $books = Book::create($request->all());
        $books->authors()->create(['book_id'=> $books->id, 'user'=>$request->user ]);
        Session::flash("notice", "book success created");
        return redirect()->route("books.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        $commentbook = Book::find($id)->commentsbooks->sortBy('created_at');
        $author = Book::find($id)->authors->sortBy('created_at');
        // dd($author);
        return view('books.show')->with('book', $book)
        ->with('commentsbooks', $commentbook)->with('authors', $author);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book=Book::find($id);
        return view('books.edit', compact("book"));
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
        Book::find($id)->update($request->all());
        Session::flash('notice', "books success updated");
        return redirect()->route('books.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::destroy($id);
        Session::flash('notice', "books success deleted");
        return redirect()->route('books.index');
    }
}
