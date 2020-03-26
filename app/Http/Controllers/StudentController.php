<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Student;
use App\Course;

class StudentController extends Controller
{
	 public function __construct() {
        $this->middleware('auth')->except(['index','detail']);
    }
   public function index() {
   	$data = Student::orderBy('id','desc')->paginate(5);
   	return view('students/index',[
   		'students' => $data
   		]);
	}
	public function add() {
		$data = Course::all();
		return view('students/add',[
			'courses' => $data
		]);
	}
	public function insert() {

		$validator = validator(request()->all(),[
			'studentName' => 'required|min:4',
			'studentAddress' => 'required',
			'classID' => 'required',
			'phno' => 'required|min:6',
			'email' => 'required',
		]);
		if($validator->fails()){
			return back()->withErrors($validator);
		}
		$Students = new Student();
		$Students->student_name = request('studentName');
		$Students->student_address = request('studentAddress');
		$Students->class_id = request('classID');
		$Students->phno = request('phno');
		$Students->email = request('email');
		$Students->save();

		return redirect('student')->with('insertMSG',$Students);//'New student added sucessfully');
	}
	public function detail($id) {
		$data = Student::find($id);
		return view('students/detail', [
			'student' => $data
		]);
	}
	public function delete($id) {
		$student = Student::find($id);
		$student->delete();
		return redirect('student')->with('delMSG',$student);
	}
	public function editPage($id) {
		$student = Student::find($id);
		$course = Course::all();
		return view('/students/edit',[
			'editStudent' => $student,
			'courses' => $course
		]);
	}
	public function update($id){
		$student = Student::find($id);
		$student->student_name = request()->studentName;
		$student->student_address = request()->studentAddress;
		$student->email = request()->email;
		$student->class_id = request()->classID;
		$student->phno = request()->phno;
		$student->save();

		return redirect('student')->with('Supdate', $student);
	}
}