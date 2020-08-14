<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    //
    public function index() {
        $students = Student::paginate(10);
        return view('pages.students',['students'=>$students]);
    }

    public function create() {
        return view('pages.create');
    }

    public function store(StudentRequest $request) {
        $avatar = null;
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $avatar = uniqid() . "_" . $file->getClientOriginalName();
            $request->file('avatar')->storeAs('public', $avatar);
        }

        Student::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'avatar' => $avatar,
            'address' => $request->address,
            'gender' => $request->gender
        ]);

        return redirect()->route('students.index')->with('message', trans('message.create_success'));
    }

    public function edit($id) {
        $student = Student::find($id);
        return view('pages.edit', ['student'=>$student]);
    }

    public function update(StudentRequest $request, $id) {
        $student = $request->all();
        
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $avatar = uniqid() . "_" . $file->getClientOriginalName();
            $old_avatar = Student::find($id)->avatar;
            Storage::delete('public/'.$old_avatar);
            $request->file('avatar')->storeAs('public', $avatar);
            $student['avatar'] = $avatar;
        }

        Student::find($id)->update($student);

        return redirect()->route('students.index')->with('message', trans('message.update_success'));
    }

    public function destroy($id) {
        Student::find($id)->delete();
        return redirect()->route('students.index');
    }
}
