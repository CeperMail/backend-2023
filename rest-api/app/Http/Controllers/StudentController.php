<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //membuat method menampilkan data student
    public function index(){
        $students = Student::all();

        $data = [
            'message' => 'Get all Student',
            'data' => $students
        ];

        return response()->json($data,200);
    }

    //membuat method menambahkan data student
    public function store(request $request){
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
            'nama' => $request->input('nama', $student->nama),
            'nim' => $request->input('nim', $student->nim),
            'email' => $request->input('email', $student->email),
            'jurusan' => $request->input('jurusan', $student->jurusan),
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


}
