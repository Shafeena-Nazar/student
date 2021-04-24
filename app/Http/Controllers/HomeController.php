<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Student;
use App\Mark;
use Illuminate\Support\MessageBag;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $results['students'] = Student::orderBy('created_at','DESC')->get()->toarray();
        return view('home',$results);
    }
    public function newStudent()
    {
        $errors = new MessageBag();
        if(request()->input('btnsubmit')) {
            request()->validate([
                'name'              => 'required',
                'age'               => 'required|integer|min:1',
                'gender'            => 'required',
                'reportingTeacher'  => 'required',
            ]);
            $check = Student::create([
                'name'   => request()->input('name'),
                'age'   => request()->input('age'),
                'gender'   => request()->input('gender'),
                'reportingTeacher'   => request()->input('reportingTeacher'),
            ]);
            if($check) {
                return redirect()->route('home')->with('succeess','Student added');
            } else {
                $errors->add('name', 'Unable to process the request');
                return redirect()->back()->withErrors($errors);
            }
        }
        return view('students.addStudent');
    }
    public function editStudent($id)
    {
        $results['profile'] = Student::where('studentsId',$id)->first();
        return view('students.addStudent',$results);
    }
    public function updateStudent()
    {
        $errors = new MessageBag();
        if(request()->input('studentsId')) {
            request()->validate([
                'name'              => 'required',
                'age'               => 'required|integer|min:1',
                'gender'            => 'required',
                'reportingTeacher'  => 'required',
            ]);
            $check = Student::where('studentsId',request()->input('studentsId'))->update([
                'name'              => request()->input('name'),
                'age'               => request()->input('age'),
                'gender'            => request()->input('gender'),
                'reportingTeacher'  => request()->input('reportingTeacher'),
            ]);
            if($check) {
                return redirect()->route('home')->with('succeess','Student updated');
            } else {
                $errors->add('name', 'Unable to process the request');
                return redirect()->back()->withErrors($errors);
            }
        } else {
            return redirect()->route('home');
        }
    }
    public function delete_data()
    {
        $id=request()->input('id');
        $table=request()->input('table');
        if($table=='students') {
            $check=Student::where('studentsId',$id)->delete();
            Mark::where('student',$id)->delete();
            if($check) {
                $data['status']=1;
            } else {
                $data['status']=0;
            }
        } 
        if($table=='marks') {
            $check=Mark::where('marksId',$id)->delete();
            if($check) {
                $data['status']=1;
            } else {
                $data['status']=0;
            }
        } 
        echo json_encode($data);
    }
    public function studentMarks()
    {
        $results['marks'] = Mark::join('students','students.studentsId','marks.student')->get()->toarray();
        return view('students.marks',$results);
    }
    public function addNewMark()
    {
        $errors = new MessageBag();
        if(request()->input('btnsubmit')) {
            request()->validate([
                'student'         => 'required',
                'markMaths'       => 'required|integer|min:0',
                'markHistory'     => 'required|integer|min:0',
                'markScience'     => 'required|integer|min:0',
                'term'            => 'required',
            ]);
            $check = Mark::create([
                'student'       => request()->input('student'),
                'markMaths'     => request()->input('markMaths'),
                'markHistory'   => request()->input('markHistory'),
                'markScience'   => request()->input('markScience'),
                'term'          => request()->input('term'),
                'markTotal'     => request()->input('markMaths')+request()->input('markHistory')+request()->input('markScience'),
            ]);
            if($check) {
                return redirect()->route('studentMarks')->with('succeess','Mark added');
            } else {
                $errors->add('student', 'Unable to process the request');
                return redirect()->back()->withErrors($errors);
            }
        }
        $results['students'] = Student::orderBy('created_at','DESC')->get()->toarray();
        return view('students.addMark',$results);
    }
    public function editMark($id)
    {
        $results['profile'] = Mark::where('marksId',$id)->join('students','students.studentsId','marks.student')->first();
        $results['students'] = Student::orderBy('created_at','DESC')->get()->toarray();
        return view('students.addMark',$results);
    }
    public function updateMark()
    {
        $errors = new MessageBag();
        if(request()->input('marksId')) {
            request()->validate([
                'markMaths'       => 'required|integer|min:0',
                'markHistory'     => 'required|integer|min:0',
                'markScience'     => 'required|integer|min:0',
                'term'            => 'required',
            ]);
            $check = Mark::where('marksId',request()->input('marksId'))->update([
                'markMaths'     => request()->input('markMaths'),
                'markHistory'   => request()->input('markHistory'),
                'markScience'   => request()->input('markScience'),
                'term'          => request()->input('term'),
                'markTotal'     => request()->input('markMaths')+request()->input('markHistory')+request()->input('markScience'),
            ]);
            if($check) {
                return redirect()->route('studentMarks')->with('succeess','Mark updated');
            } else {
                $errors->add('name', 'Unable to process the request');
                return redirect()->back()->withErrors($errors);
            }
        } else {
            return redirect()->route('home');
        }
    }
}
