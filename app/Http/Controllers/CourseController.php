<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller
{
     public function __construct() {
        $this->middleware('auth')->except(['index','detail']);
    }
    public function index() {
    	$data = Course::orderBy('id', 'desc')->paginate(5);
    	return view('courses/index',[
    		'courses' => $data
    	]);
    }
    public function detail($id) {
    	$course = Course::find($id);
    	return view('courses/detail',[
    		'course' => $course
    	]);

    }
    public function add(){
    	return view('courses/add');
    }
    public function insert() {

        $validator = validator(request()->all(),[
            'cname'=> 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
    	$course = new Course();
    	$course->course_name = request()->cname;
    	$course->save();
    	return redirect('course')->with('courseMSG',$course);
    }
    public function delete($id) {
    	$course = Course::find($id);
    	$course->delete();
    	return redirect('course')->with('CourseDel', $course);
    }
    public function editPage($id) {
        $course = Course::find($id);
        return view('/courses/edit',[
            'editCourse' => $course
        ]);
    }
    public function update($id) {
        $course = Course::find($id);
        $course->course_name = request()->cname;
        $course->save();

        return redirect('course')->with('update', $course);
    }
}
