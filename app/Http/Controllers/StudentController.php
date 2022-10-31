<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // membuat method index
    public function index()
    {
        // menggunakan model student untuk select data
        $students = Student::all();

        $data = [
            'message' => 'Get all students',
            'data' => $students,
        ];

        // menggunakan response json laravel
        // otomatis set header content type json
        // otomatis mengubah data array ke JSON
        // mengatur status code`
        return response()->json($data, 200);
    }

    // membuat method store
    public function store(Request $request)
    {
        // menangkap data request
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
        ];

        // menggunakan Student untuk insert data
        $students = Student::create($input);

        $data = [
            'message' => 'Student is created successfully',
            'data' => $students,
        ];

        // mengembalikan data (json) status code 201
        return response()->json($data, 201);
    }

    // membuat method update
    public function update(Request $request, $id)
    {
        $students = Student::find($id);

        $students->jurusan = $request->jurusan;

        $students->save();

        $data = [
            'message' => 'Student is updated',
            'data' => $students
        ];

        return response()->json($data, 200);
    }

    // membuat method delete
    public function delete($id)
    {
        $students = Student::find($id);

        $students->delete();

        $data = [
            'message' => 'Student is deleted',
            'data' => $students
        ];

        return response()->json($data, 200);
    }
}
