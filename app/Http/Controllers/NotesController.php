<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use App\Models\Categories;
use App\Models\User;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Auth;
use Session;

class NotesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $notesRepository;
    private $categoriesRepository;


    public function __construct(){
        $this->notesRepository = new Notes();
        $this->categoriesRepository = new Categories();
    }


    public function index()
    {
        $notes = $this->notesRepository::where('users_id', Auth::user()->id)->with('categories')->get();

        return view('notes.notes', [
            'notes' => $notes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoriesRepository::where('users_id', Auth::user()->id)->get();

        return view('notes.create', [
            'categories' => $categories
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $note = $this->notesRepository::create([
                'title' => $request->title,
                'content' => $request->content,
                'categories_id' => $request->categories_id,
                'users_id' => Auth::user()->id
            ]);
            Session::flash('message', 'Cadastrado com sucesso');
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect()->route('notes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function show(Notes $notes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function edit(Notes $notes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notes $notes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notes $notes)
    {
        //
    }
}
