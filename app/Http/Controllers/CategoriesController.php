<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use Session;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $categoriesRepository;

    public function __construct(Categories $categories){
        $this->categoriesRepository = new $categories;
    }

    public function index()
    {
        $categories = $this->categoriesRepository::where('users_id', Auth::user()->id)->get();
        return view('categories.categories',[
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
            $categorie = $this->categoriesRepository::create([
                'title' => $request->title,
                'color' => $request->color,
                'icon' => $request->icon,
                'users_id' => Auth::user()->id
            ]);
            Session::flash('message', 'Cadastrado com sucesso'); 
        } catch (\Throwable $th) {
            dd($th);
        }


        return redirect('/categorias');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie = $this->categoriesRepository::findOrFail($id);
        return view('categories.edit', [
            'categorie' => $categorie
        ]);
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
        $categorie = $this->categoriesRepository::findOrFail($id);
        $categorie->update([
            'title' => $request->title,
            'color' => $request->color,
            'icon' => $request->icon
        ]);

        Session::flash('message', 'Atualizado com sucesso');
        return redirect('/categorias');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie = $this->categoriesRepository::findOrFail($id);
        $categorie->destroy($id);
        Session::flash('message', 'Excluído com sucesso');
        return redirect('/categorias'); 
    }

}
