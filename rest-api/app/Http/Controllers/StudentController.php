<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //membuat method menampilkan data student
    public function index()
    {
        $students = Student::all();

        if ($students->isEmpty()) {
            $data = [
                'message' => 'resource is empty'
            ];
            return response()->json($data, 204);
        }

        $data = [
            'message' => 'Get all Student',
            'data' => $students
        ];

        return response()->json($data, 200);
    }


    //membuat method menambahkan data student
    public function store(request $request){
        request()->validate([
            'nama'=> 'required',
            'nim'=> 'required',
            'email'=> 'required|email',
            'jurusan' => 'required',
        ]);

        $input = [
            'nama'=> $request->nama,
            'nim'=> $request->nim,
            'email'=> $request->email,
            'jurusan'=> $request->jurusan,
        ];

        $student = Student::create($input);

        $data = [
            'message'=> 'Student is created succesfully',
            'data'=> $student,
        ];

        return response()->json($data,201);
    }

    //membuat method untuk mengubah data student
    public function update(Request $request, $id)
    {
        $student = Student::find($id);


        if (!$student) {
            $data = [
                'message' => 'Student not found',
            ];
            return response()->json($data, 404);
        }

        // Update student data with the request input
        $input = [
            'nama' => $request->nama ?? $student->nama,
            'nim' => $request->nim ?? $student->nim,
            'email' => $request->email ?? $student->email,
            'jurusan' => $request->jurusan ?? $student->jurusan,
        ];

        $student->update($input);

        $data = [
            'message' => 'Student data updated successfully',
            'data' => $student
        ];
        
        return response()->json($data, 200);
    }

    //membuat method untuk menghapus data
    public function destroy($id)
    {
        $student = Student::find($id);

        if (!$student) {
            $data = [
                'message' => 'Student not found',
            ];
            return response()->json($data, 404);
        }

        $student->delete();

        $data = [
            'message' => 'Student data has been deleted successfully',
            'data' => $student
        ];

        return response()->json($data, 200);
    }

    public function show($id){
        $student = Student::find($id);

        if ($student) {
            $data = [
                'message'=> 'Get detail student',
                'data'=> $student,
            ];

            return response()->json($data, 200);
        }
        else {
            $data = [
                'message'=> 'Student not found',
            ];

            return response()->json($data, 404);
        }
    }

}
