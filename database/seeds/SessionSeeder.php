<?php

use App\Coach;
use App\Session;
use App\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('sessions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Session::create([
            'title' => 'CV writing service',
            'desc' => 'Our aim is to make you 100% satisfied with your CV; that’s why we offer a first draft that you approve before you receive the final version of your document.
            Now you can get expert feedback on your CV and profile, Perfect your CV & profile to better reflect your skills, and Refine your job search strategy',
            'price' => 150,
            'image' => 'session1.png',
            'coach_id' => rand(1, Coach::all()->count())
        ]);

        Session::create([
            'title' => 'Interview coaching',
            'desc' => 'Our career coaches will help you overcome your interview fears and refine your answers, to enhance your chances of getting the job. you will understand your strengths and blind spots in interviews through a personality assessment, Practice and rehearse your answers to your most challenging interview questions, Get detailed, personalized feedback on your interview answers, body language, manner of speaking, etc.',
            'price' => 150,
            'image' => 'session2.png',
            'coach_id' => rand(1, Coach::all()->count())
        ]);
        Session::create([
            'title' => 'Make the right career move',
            'desc' => 'Do you want to fully prepare yourself for the right career path? your dedicated career coach will help you answer the question, “what is the best career for me?” through identifying your personality, skills, interests, and career values, Accurately identify how ready you are for your targeted career and how satisfied you would be in this career, Put together a tailored and detailed career plan for your next career move.',
            'price' => 150,
            'image' => 'session3.png',
            'coach_id' => rand(1, Coach::all()->count())
        ]);
        Session::create([
            'title' => 'Career Coaching & Advising Services',
            'desc' => 'Get a career package that includes CV & Profile Review and Interview Coaching plus the career path coaching you will enhance your CV & profile to better reflect your skills, Refine your job search strategy, Understand your strengths and blind spots in interviews through a personality and body language assessment, Practice and rehearse your answers to the most challenging interview questions, and identifying your personality, skills, interests, and career values, and how ready you are for your targeted career.',
            'price' => 700,
            'image' => 'session1.png',
            'coach_id' => rand(1, Coach::all()->count())
        ]);

        for ($i = 0; $i < 10; $i++) {
            DB::table('student_sessions')->insert([
                'booking_date' => now()->toDateTime(),
                'student_id' => rand(1, Student::all()->count()),
                'session_id' => rand(1, Session::all()->count()),
            ]);
        }
        for ($i = 0; $i < 20; $i++) {
            DB::table('student_session_reviews')->insert([
                'student_id' => rand(1, Student::all()->count()),
                'session_id' => rand(1, Session::all()->count()),
                'comment' => $faker->text,
                'rate' => rand(1, 5)
            ]);
        }
        // factory(Session::class, 5)->create();
    }
}
