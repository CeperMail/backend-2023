<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    //properti animals
    public $animals=["kucing", "ayam","ikan"];

    //method menampilkan
    public function index(){
        echo"menampilkan data animals <br>";

        // loop property animals
        foreach ($this->animals as $animal){
            echo "- $animal <br>";
    }}

    //method tambah
    public function store(Request $request){
        echo"menambahkan hewan baru <br>";

        //menambahkan data ke properti animal
        array_push($this->animals, $request->animal);

        //panggil method index
        $this->index();
    }

    //method update/edit
    public function update($id, Request $request){
        echo "mengupdate data hewan id $id. <br>";
        
        //update data hewan
        $this->animals[$id] = $request->animal;

        //panggil method index
        $this->index();
    }

    //method hapus
    public function destroy($id){
        echo "menghapus data hewan id $id <br>";

        //menghapus data
        unset($this->animals[$id]);

        //panggil method index
        $this->index();
    }
}
