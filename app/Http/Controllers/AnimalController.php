<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    //property animals
    public $animals = ['Kucing', 'Ayam', 'Ikan'];

    public function index() {
        echo "Menampilkan data animals: ";
        foreach ($this->animals as $animal) {
            echo "\n- ".$animal;
        }
    }

    public function store(Request $request) {
        echo "Menambahkan data animals \n";
        array_push($this->animals, $request->nama);
        $this->index();
    }

    public function update(Request $request, $id) {
        $this->animals[$id] = $request->nama;
        echo "Mengupdate data animals id: $id \n";
        $this->index();
    }

    public function delete($id) {
        unset($this->animals[$id]);
        echo "Menghapus data animals id: $id";
        $this->index();
    }
}
?>