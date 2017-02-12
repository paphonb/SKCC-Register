<?php

namespace App\Http\Controllers;

use App\SKOIStudent;
use App\SKOITeam;
use Illuminate\Http\Request;

class SKOIController extends Controller
{

    private $studentField = [
        'namePrefix', 'firstName', 'lastName', 'gradeLevel',
        'phoneNumber', 'email', 'facebook'
    ];

    public function index()
    {
        return view('skoi');
    }

    public function register()
    {
        return view('reg-skoi');
    }

    public function registerSubmit(Request $request)
    {
        $this->validate($request,$this->rules());
        $teamName = $request->input('team-name');
        $school = $request->input('school');
        $teacherName = $request->input('teacher-name');
        $teacherTel = $request->input('teacher-tel');
        $students = [];
        // The first one will be a team leader
        foreach(['one','two','three'] as $no){
            $students[] = [
                'namePrefix' => $request->input($no.'-'.'intro-name'),
                'firstName' => $request->input($no.'-'.'name'),
                'lastName' => $request->input($no.'-'.'last-name'),
                'gradeLevel' => $request->input($no.'-'.'education'),
                'phoneNumber' => $request->input($no.'-'.'tel'),
                'email' => $request->input($no.'-'.'email'),
                'facebook' => $request->input($no.'-'.'fb'),
            ];
        }
        // Team
        // if team name already exists
        if(SKOITeam::where('name',$teamName)->exists())
            return view('reg-skoi',['exists' => true]);
        // otherwise create new team
        $team = new SKOITeam();
        $team->name = $teamName;
        $team->school = $school;
        $team->teacher_name = $teamName;
        $team->teacher_phone_number = $teacherTel;
        $team->save();
        // Students
        foreach ($students as $student){
            // each student
            $std = new SKOIStudent();
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
        return view('reg-skoi',['registered' => true]);
    }

    private function rules()
    {
        $baseRules = [
            'team-name' => 'required',
            'school' => 'required',
            'teacher-name' => 'required',
            'teacher-tel' => 'required'
        ];
        foreach(['one','two','three'] as $no){
            $first = $no == 'one';
            $baseRules[$no.'-'.'intro-name'] = $first ? 'required' : 'required_with:'.$no.'-'.'name';
            if($first) $baseRules[$no.'-'.'name'] = 'required';
            $baseRules[$no.'-'.'last-name'] = $first ? 'required' : 'required_with:'.$no.'-'.'name';
            $baseRules[$no.'-'.'education'] = $first ? 'required' : 'required_with:'.$no.'-'.'name';
            $baseRules[$no.'-'.'tel'] = $first ? 'required' : 'required_with:'.$no.'-'.'name';
            $baseRules[$no.'-'.'email'] = $first ? 'required' : 'required_with:'.$no.'-'.'name';
            $baseRules[$no.'-'.'fb'] = $first ? 'required' : 'required_with:'.$no.'-'.'name';
        }
        return $baseRules;
    }
}
