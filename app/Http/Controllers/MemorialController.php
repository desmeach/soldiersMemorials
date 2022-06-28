<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Soldier;
use Illuminate\Http\Request;

class MemorialController extends Controller
{
    /**
     * soldiersList
     *
     * @param  mixed $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function soldiersList(Request $request)
    {
        $fullName = $request->input('soldier-name-search');
        $fullName = \explode(' ', $fullName);
        $surname = $fullName[0] ?? '';
        $name = $fullName[1] ?? '';
        $middleName = $fullName[2] ?? '';
        $soldiers = Soldier::where('surname', 'like', $surname.'%')->where('name', 'like', $name.'%')->where('middle_name', 'like', $middleName.'%')->get();
        if (count($soldiers) > 0)
        {
            return view('soldiersList',
                    compact(
                        'soldiers'
                    ));
        }
        else
        {
            return $this->soldierNotFound();
        }
    }
    /**
     * soldier
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
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
                return $this->soldierNotFound();
            }
        }
        catch(Exception $e)
        {
            print($e->getMessage());
        }
    }

    /**
     * soldierNotFound
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function soldierNotFound()
    {
        return view('soldierNotFound');
    }
}

