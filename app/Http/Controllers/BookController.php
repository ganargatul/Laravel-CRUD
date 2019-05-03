<?php

namespace App\Http\Controllers;

use App\book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    /**
        *   $table->bigIncrements('id');
        *       $table->string('judul');
        *      $table->string('pengarang');
        *     $table->string('kategori');
        *    $table->integer('tahun_terbit');
        *   $table->string('penerbit');
     */

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //show
    public function index()
    {
        $data = book::all()->toArray();
        return view('data.index', compact('data'));
    }
      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //create
    public function create()
    {
        return view('data.create');
    }
    public function store(Request $request)
    {
      $this->validate($request, [
          'judul'         =>  'required',
          'pengarang'     =>  'required',
          'kategori'      =>  'required',
          'tahun_terbit'   =>  'required',
          'penerbit'      =>  'required'
      ]);
      $data = new book([
          'judul'         =>  $request->get('judul'),
          'pengarang'     =>  $request->get('pengarang'),
          'kategori'      =>  $request->get('kategori'),
          'tahun_terbit'   =>  $request->get('tahun_terbit'),
          'penerbit'      =>  $request->get('penerbit')
      ]);
      $data->save();
      return redirect()->route('data.create')->with('success', 'Data Added');
    }
     /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(book $book)
    {
        //
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    //update
    public function edit($id)
    {
        $data = book::find($id);
        return view('data.edit', compact('data', 'id'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    {
      $this->validate($request, [
          'judul'         =>  'required',
          'pengarang'     =>  'required',
          'kategori'      =>  'required',
          'tahun_terbit'   =>  'required',
          'penerbit'      =>  'required'
      ]);
      $data = book::find($id);
      $data->judul=$request->get('judul');
      $data->pengarang=$request->get('pengarang');
      $data->kategori=$request->get('kategori');
      $data->tahun_terbit=$request->get('tahun_terbit');
      $data->penerbit=$request->get('penerbit');
      $data->save();
      return redirect()->route('data.index')->with('success', 'Data Updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    //delete
    public function destroy($id)
    {
      $data = book::find($id);
      $data->delete();
      return redirect()->route('data.index')->with('success', 'Data Deleted');
    }
}
