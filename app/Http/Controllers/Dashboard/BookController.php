<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Services\ImageService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::latest()->paginate(3);

        return view('books.index', compact('books'));
    }

    public function get_user_books_by_user(Request $request)
    {
        $books = Book::where('user_id', $request->user()->id)->paginate(10);

        return view('books.index', compact('books'));

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
    public function store(StorebookRequest $request)
    {
        $book = Book::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => ImageService::storeFiles($request->file('image'), 'books/Images'),
        ]);

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDashboardbookRequest $request, Book $book)
    {
        $book->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if (isset($request->image)) {
            $new_image = ImageService::storeFiles($request->file('image'), 'books/Images');
            $book->update([
                'image' => $new_image,
            ]);
        }
        $books = Book::paginate(10);

        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }
}
