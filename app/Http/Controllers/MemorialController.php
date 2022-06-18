<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Soldier;
use App\Models\Birthplace;
use App\Models\Country;
use App\Models\Enlistment;

class MemorialController extends Controller
{
    public function index(Request $request)
    {
        if (isset($_GET['id']))
        {
            $soldier = Soldier::find($_GET['id']);
        }
        else
        {
            $fullName = $request->input('soldier-name-search');
            $fullName = \explode(' ', $fullName);
            $surname = $fullName[0];
            $name = $fullName[1];
            $middleName = $fullName[2];
            $soldier = Soldier::where('surname', $surname)->where('name', $name)->where('middle_name', $middleName)->first();
        }
        try
        {
            if ($soldier !== NULL)
            {
                $birthplace = $soldier->birthplace;
                $enlistment = $soldier->enlistment;
                $militaryUnit = $soldier->militaryUnit;
                $rank = $soldier->rank;
                $retire = $soldier->retire;
                $status = $soldier->status;
                $awards = $soldier->awards;

                return view('soldier', 
                compact(
                    'soldier', 
                    'birthplace', 
                    'enlistment', 
                    'militaryUnit', 
                    'rank', 
                    'retire',
                    'status',
                    'awards'
                ));
            }
            else
            {
                return view('soldierNotFound');
            }
        }
        catch(Exception $e)
        {
            print($e->getMessage());
        }
    }
}
