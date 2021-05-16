<?php

namespace App\Http\Controllers;

use App\Session;
use App\Student;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = Session::all();
        return view('admin.sessions.index', ['sessions' => $sessions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sessions.create');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        return view('admin.sessions.show', ['session' => $session]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function edit(Session $session)
    {
        return view('admin.sessions.edit', ['session' => $session]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session)
    {
        $session->delete();
        return redirect(route('session.index'));
    }
    public function acceptStudent()
    {
        $student = Student::where('id', $_GET['s'])->first();
        if ($student) {
            foreach ($student->sessions as $application) {
                if ($application->pivot->student_id == $student->id && $application->pivot->session_id == $_GET['p']) {
                    $student->sessions()->updateExistingPivot($_GET['p'], ['book_status' => "accepted"]);
                    $student->notifications()->firstOrCreate([
                        'student_id' => $student->id,
                        'session_id' => $application->pivot->session_id,
                        'category' => "success",
                        'message' => "Your session has been booked successfully",
                        'type' => "session",
                        'seen' => false
                    ]);
                    $student->save();
                    break;
                }
            }
            return redirect(route('session.show', $_GET['p']));
        }
        return view('admin.sessions.index');
    }

    public function rejectStudent()
    {
        $student = Student::where('id', $_GET['s'])->first();
        if ($student) {
            foreach ($student->sessions as $application) {
                if ($application->pivot->student_id == $student->id && $application->pivot->session_id == $_GET['p']) {
                    $student->sessions()->updateExistingPivot($_GET['p'], ['book_status' => "rejected"]);
                    $student->notifications()->firstOrCreate([
                        'student_id' => $student->id,
                        'session_id' => $application->pivot->session_id,
                        'category' => "rejected",
                        'message' => "Unfortunately, your session booking were rejected",
                        'type' => "session",
                        'seen' => false
                    ]);
                    $student->save();
                    break;
                }
            }
            return redirect(route('session.show', $_GET['p']));
        }
        return view('admin.sessions.index');
    }
    public function sessionAchieved()
    {
        $student = Student::where('id', $_GET['s'])->first();
        if ($student) {
            foreach ($student->sessions as $application) {
                if ($application->pivot->student_id == $student->id && $application->pivot->session_id == $_GET['p']) {
                    $student->sessions()->updateExistingPivot($_GET['p'], ['book_status' => "achieved"]);
                    $student->notifications()->firstOrCreate([
                        'student_id' => $student->id,
                        'session_id' => $application->pivot->session_id,
                        'category' => "important",
                        'message' => "Review your finished session",
                        'type' => "session",
                        'seen' => false
                    ]);
                    $student->save();
                    break;
                }
            }
            return redirect(route('session.show', $_GET['p']));
        }
        return view('admin.sessions.index');
    }
}
