<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreBookRequest;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Repository\BookRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Log;

class BookController extends Controller
{
    public $bookRepoInterface;

    public function __construct(BookRepositoryInterface $bookRepoInterface)
    {
        $this->bookRepoInterface = $bookRepoInterface;
    }

    public function index()
    {
        // $data = Book::with('author');

        // return response([
        //     'success' => true,
        //     'message' => 'Task Heading list',
        //     'data' => $data
        // ]);

        $books = $this->bookRepoInterface->all();

        // Log::info($books);

        return $books;
        // return view('book', ['books' => $book]);
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $bookStore = $this->bookRepoInterface->create($request->all());

        return  $bookStore;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return new BookResource($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book->update($request->all());

        return $book;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return $book;
    }
}
