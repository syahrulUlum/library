<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.author');
    }

    public function api()
    {
        $authors = Author::all();

        foreach ($authors as $key => $author) {
            $author->date = convert_date($author->created_at);
        }

        $datatables = datatables()->of($authors)->addIndexColumn();

        return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:authors,email',
            'phone_number' => 'required|max:15',
            'address' => 'required',
        ], [
            'name.required' => 'The Author Name field is required',
            'email.required' => 'The Email field is required',
            'email.unique' => 'The Email has already been taken',
            'phone_number.required' => 'The Phone Number field is required',
            'phone_number.max' => 'The Phone Number field max 15',
        ]);

        Author::create($request->all());

        return redirect('authors');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required|max:15',
            'address' => 'required',
        ], [
            'name.required' => 'The Author Name field is required',
            'email.required' => 'The Email field is required',
            'phone_number.required' => 'The Phone Number field is required',
            'phone_number.max' => 'The Phone Number field max 15',
        ]);

        $author->update($request->all());

        return redirect('authors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
    }
}
