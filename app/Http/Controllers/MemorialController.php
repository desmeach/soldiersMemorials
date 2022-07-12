<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Soldier;
use Illuminate\Http\Request;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class MemorialController extends Controller
{
    /**
     * soldiersList
     *
     * @param  mixed $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function downloadQR()
    {
        $filepath = public_path('/images/soldiers_qr/').$_GET["file"];
        return Response::download($filepath);
    }
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
            if ($soldier)
            {
                $birthplace = $soldier->birthplace;
                $enlistment = $soldier->enlistment;
                $militaryUnit = $soldier->militaryUnit;
                $rank = $soldier->rank;
                $retire = $soldier->retire;
                $status = $soldier->status;
                $awards = $soldier->soldierAwards;
                if (!$soldier->qr_path)
                {
                    $fileName = $soldier->surname."_".$soldier->name."_".$soldier->middle_name."_qr.svg";
                    DB::table('soldiers')->where('id', $soldier->id)->update(['qr_path' => $fileName]);
                    if (!file_exists('/images/soldiers_qr/'.$fileName))
                    {
                        $options = new QROptions(
                            [
                              'eccLevel' => QRCode::ECC_L,
                              'outputType' => QRCode::OUTPUT_MARKUP_SVG,
                              'version' => 5,
                            ]
                        );
                        $qrcode = (new QRCode($options))->render('http://localhost:8000/soldier?id='.$soldier->id, './images/soldiers_qr/'.$fileName);
                    }
                }
                return view('soldier',
                compact(
                    'soldier',
                    'birthplace',
                    'enlistment',
                    'militaryUnit',
                    'rank',
                    'retire',
                    'status',
                    'awards',
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

