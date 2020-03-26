<?php

use Illuminate\Database\Seeder;
use App\Student;
use App\Comment;
use App\Course;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20 ; $i++) { 
        $Faker = Faker::create();
        $Student = new Student();
        $Student->student_name =  $Faker->firstName;
        $Student->student_address =  $Faker->address;
        $Student->class_id = rand(1,5);
        $Student->phno = $Faker->phoneNumber;
        $Student->email = $Faker->unique()->email;
        $Student->save();
    	}
    	echo "Insert 20 Students Data\n";
        for ($i=0; $i < 5; $i++) { 
            $faker = Faker::create();
            $comment = new Comment();
            $comment->comment = $faker->sentence;
            $comment->student_id = rand(1,20);
            $comment->save();
        }
        echo "20 comment successfully\n";
        for ($i=0; $i < 5; $i++) { 
            $faker = Faker::create();
            $course = new Course();
            $course->course_name = $faker->colorName;
            $course->save();
        }
        echo "5 course added successfully\n";
    }
}
