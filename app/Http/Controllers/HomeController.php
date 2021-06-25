<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Governorate;
use App\Models\Protection;
use App\Models\Symptom;
use App\Models\Vaccine;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $governorates = Governorate::all();
        $injury = 0;
        $recovery = 0;
        $deaths = 0;
        foreach ($governorates as $governorate) {
            $injury += $governorate->injury;
            $recovery += $governorate->recovery;
            $deaths += $governorate->deaths;
        }
        // dd($injury);
        return view('index', [
            'injury' => $injury,
            'recovery' => $recovery,
            'deaths' => $deaths,
            'governorates' => $governorates,
            'symptom' => Symptom::all(),
            'protection' => Protection::all(),
        ]);
    }


    public function vaccine()
    {
        return view('vaccine', [
            'vaccines' => Vaccine::all(),
        ]);
    }

    public function about()
    {
        return view('about');
    }

    public function doctor(){
        return \view('doctor',[
            'doctors' => Doctor::all(),
        ]);
    }
}
