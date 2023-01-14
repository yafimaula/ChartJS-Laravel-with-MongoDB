<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChartJS;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use DateTime;

class ChartJSController extends Controller
{
    public function index()
    {
        // $labelnya = ChartJS::select('email')->toArray();
        $labelnya = ChartJS::all();
        $label = json_decode(json_encode($labelnya), true);
        $res = array();
        for ($i = 0; $i < count($label); $i++) {

            $login = $label[$i]['logintime'];
            $logout = $label[$i]['logouttime'];

            $jamnyax1 = explode(",", $login)[1];
            $jamnya1 = strtotime(date("H:i:s", strtotime($jamnyax1)));

            $jamnyax2 = explode(",", $logout)[1];
            $jamnya2 = strtotime(date("H:i:s", strtotime($jamnyax2)));

            $sel = number_format(($jamnya2 - $jamnya1) / 60, 0);

            $labels[] = $label[$i]['email'];

            $data[] = $sel;

        }
        
        return view('chart', ['labels' =>$labels, 'data' => $data ]);
    }
}
