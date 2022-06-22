<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Soldier;
use App\Models\Birthplace;
use App\Models\Country;
use App\Models\Enlistment;

class MemorialController extends Controller
{
    public function soldiersList(Request $request)
    {
        $fullName = $request->input('soldier-name-search');
        $fullName = \explode(' ', $fullName);
        $surname = '';
        $name = '';
        $middleName = '';
        switch (count($fullName))
        {
            case 3:
                $surname = $fullName[0];
                $name = $fullName[1];
                $middleName = $fullName[2];
                $soldiers = Soldier::where('surname', $surname)->where('name', $name)->where('middle_name', $middleName)->get();
                break;
            case 2:
                $surname = $fullName[0];
                $name = $fullName[1];
                $soldiers = Soldier::where('surname', $surname)->where('name', $name)->get();
                break;
            case 1:
                $surname = $fullName[0];
                $soldiers = Soldier::where('surname', $surname)->get();
                break;
        }
        
        return view('soldiersList', 
                compact(
                    'soldiers'
                ));
    }
    public function soldier()
    {
        if (isset($_GET['id']))
        {
            $soldier = Soldier::find($_GET['id']);
        }
        else
            $soldier = NULL;
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

