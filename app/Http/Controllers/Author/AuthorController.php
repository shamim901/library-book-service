<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use App\Http\Resources\Author\AuthorCollection;
use App\Http\Resources\Author\AuthorResource;
use Illuminate\Http\Request;
use App\Models\Author;
use Symfony\Component\HttpFoundation\Response;

class AuthorController extends Controller
{
    public function index () {
        return AuthorCollection::collection(Author::paginate(20));
    }

    public function store (AuthorRequest $authorRequest) {
        $requestAll = $authorRequest->all();

        $author = Author::create($requestAll);

        return response([
            'data' => new AuthorResource($author)
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return new AuthorResource($author);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $author->update($request->all());

        return response([
            'data' => new AuthorResource($author)
        ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $book)
    {
        $book->delete();

        return response(null,Response::HTTP_NO_CONTENT);
    }
}
