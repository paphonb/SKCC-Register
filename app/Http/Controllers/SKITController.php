<?php

namespace App\Http\Controllers;

use App\SKITStudent;
use App\SKITTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class SKITController extends Controller
{

    public function index()
    {
        return view('skit');
    }

    public function register()
    {
        return view('reg-skit');
    }

    public function registerSubmit(Request $request)
    {
        $this->validate($request, $this->rules());
        $teamName = $request->input('team-name');
        $school = $request->input('school');
        $teacherName = $request->input('teacher-name');
        $teacherTel = $request->input('teacher-tel');
        $students = [];
        // The first one will be a team leader
        foreach (['one', 'two', 'three'] as $no) {
            $students[] = [
                'namePrefix' => $request->input($no . '-' . 'intro-name'),
                'firstName' => $request->input($no . '-' . 'name'),
                'lastName' => $request->input($no . '-' . 'last-name'),
                'gradeLevel' => $request->input($no . '-' . 'education'),
                'phoneNumber' => $request->input($no . '-' . 'tel'),
                'email' => $request->input($no . '-' . 'email'),
                'facebook' => $request->input($no . '-' . 'fb'),
            ];
        }
        // Team
        // if team name already exists
        if (SKITTeam::where('name', $teamName)->exists())
            return view('reg-skit', ['exists' => true]);
        // otherwise create new team
        try {
            DB::transaction(function () use ($teamName, $school, $teacherName, $teacherTel, $students) {
                $team = new SKITTeam();
                $team->name = $teamName;
                $team->school = $school;
                $team->teacher_name = $teacherName;
                $team->teacher_phone_number = $teacherTel;
                $team->save();
                // Students
                foreach ($students as $student) {
                    // each student
                    // create entry only if first name is present and not empty
                    if (isset($student['firstName'])) {
                        $std = new SKITStudent();
                        $std->team_id = $team->id;
                        $std->name_prefix = $student['namePrefix'];
                        $std->first_name = $student['firstName'];
                        $std->last_name = $student['lastName'];
                        $std->grade_level = $student['gradeLevel'];
                        $std->phone_number = $student['phoneNumber'];
                        $std->email = $student['email'];
                        $std->facebook = $student['facebook'];
                        $std->save();
                    }
                }
            });
        } catch (\Exception $e) {
            Log::error('Exception while processing request', [$e]);
            return view('reg-skit', ['error' => true]);
        }
        return view('reg-skit', ['registered' => true]);
    }

    private function rules()
    {
        $baseRules = [
            'team-name' => 'required',
            'school' => 'required',
            'teacher-name' => 'required',
            'teacher-tel' => 'required'
        ];
        foreach (['one', 'two', 'three'] as $no) {
            $first = $no == 'one';
            $baseRules[$no . '-' . 'intro-name'] = $first ? 'required' : 'required_with:' . $no . '-' . 'name';
            if ($first) $baseRules[$no . '-' . 'name'] = 'required';
            $baseRules[$no . '-' . 'last-name'] = $first ? 'required' : 'required_with:' . $no . '-' . 'name';
            $baseRules[$no . '-' . 'education'] = $first ? 'required' : 'required_with:' . $no . '-' . 'name';
            $baseRules[$no . '-' . 'tel'] = $first ? 'required' : 'required_with:' . $no . '-' . 'name';
            $baseRules[$no . '-' . 'email'] = $first ? 'required' : 'required_with:' . $no . '-' . 'name';
            $baseRules[$no . '-' . 'fb'] = $first ? 'required' : 'required_with:' . $no . '-' . 'name';
        }
        return $baseRules;
    }
}
