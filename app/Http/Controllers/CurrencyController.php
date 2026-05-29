<?php

namespace App\Http\Controllers;

use App\Imports\CurrencyImport;
use App\Models\Currency;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CurrencyController extends Controller
{
    public function index(){
        $currencies =Currency::all();
        if($currencies->isEmpty()){
            return redirect('/currency/create');
        }
        elseif($currencies->isNotEmpty() && !$currencies->first()->created_at->isToday() && Carbon::now("Asia/Kabul")->format("h:i A") >= "10:33 AM"){
            Currency::truncate();
            redirect('/currency/create');
        }
         return view('Currency.all',compact('currencies'));
    }
    public function add(Request $request){
        $request->validate([
            "excel" => "required|file|mimes:xlsx,xls,csv"
        ]);
        Currency::truncate();
        Excel::import(new CurrencyImport(),$request->file('excel'));
        return redirect('/currency');
    }
}
