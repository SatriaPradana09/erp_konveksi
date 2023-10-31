<?php

namespace App\Http\Controllers;


use App\Models\BomModel;
use App\Models\ProdukModel;
use App\Models\BomListModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function tampilall()
    {
        $produks = ProdukModel::where('status', 1)->count();
        $bahans = ProdukModel::where('status', 2)->count();
        $boms = ProdukModel::count();
        $data = ['produks' => $produks, 'bahans' => $bahans, 'boms' => $boms];
        // return view('dashboard')->with('data', $data);
        return view('dashboard',['data' =>$data]);
    }
}
