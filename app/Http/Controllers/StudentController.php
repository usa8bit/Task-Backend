<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // pertemuan 5
    // membuat method index
    public function index()
    {
        // menggunakan model student untuk select data
        $students = Student::all();

        if ($students) {
            $data = [
                'message' => 'Get all students',
                'data' => $students,
            ];
    
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student is Empty'
            ];

            return response()->json($data, 404);
        }

        // menggunakan response json laravel
        // otomatis set header content type json
        // otomatis mengubah data array ke JSON
        // mengatur status code`
    }

    // membuat method store
    public function store(Request $request)
    {
        // menangkap data request
        $validate = $request->validate([
            'nama' => 'required',
            'nim' => 'numeric|required',
            'email' => 'email|required',
            'jurusan' => 'required',
        ]);

        // menggunakan Student untuk insert data
        $students = Student::create($validate);

        $data = [
            'message' => 'Student is created successfully',
            'data' => $students,
        ];

        // mengembalikan data (json) status code 201
        return response()->json($data, 201);
    }

    // membuat method update
    // public function update(Request $request, $id)
    // {
    //     $students = Student::find($id);

    //     $students->jurusan = $request->jurusan;

    //     $students->save();

    //     $data = [
    //         'message' => 'Student is updated',
    //         'data' => $students
    //     ];

    //     return response()->json($data, 200);
    // }

    // membuat method delete
    // public function delete($id)
    // {
    //     $students = Student::find($id);

    //     $students->delete();

    //     $data = [
    //         'message' => 'Student is deleted',
    //         'data' => $students
    //     ];

    //     return response()->json($data, 200);
    // }

    // pertemuan 6
    // membuat method show
    public function show($id)
    {
        // mencari data student
        $students = Student::find($id);

        if ($students) {
            $data = [
                'message' => 'Get Detail Student',
                'data' => $students,
            ];
    
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student Not Found'
            ];

            return response()->json($data, 404);
        }
    }

    // mengupdate resource student
    public function update(Request $request, $id)
    {
        $students = Student::find($id);

        if ($students) {
            $validate = $request->validate([
                'nama' => 'required',
                'nim' => 'numeric|required',
                'email' => 'email|required',
                'jurusan' => 'required',
            ]);
    
            $students->update($validate);
    
            $data = [
                'message' => 'Data Student Updated',
                'data' => $students,
            ];
    
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student Not Found'
            ];

            return response()->json($data, 404);
        }
    }

    // delete resource student
    public function destroy($id)
    {
        $students = Student::find($id);

        if ($students) {
            $students->delete();

            $data = [
                'message' => 'Student is Deleted',
                'data' => $students
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student Not Found',
            ];
        }
    }
}
