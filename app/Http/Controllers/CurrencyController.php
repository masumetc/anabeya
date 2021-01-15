<?php

namespace App\Http\Controllers;

use App\Currency;
use App\User;
use App\CurrencySession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencys = Currency::where('id', '!=', '1')->orderBy('id', 'desc')->get();
        return view('Backend.currency.list', compact('currencys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.currency.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'currency_name' => 'required',
            'symbol' => 'required',
            'rate' => 'required',
        ]);

        $currency = new Currency();
        $currency->currency_name = $request->currency_name;
        $currency->symbol = $request->symbol;
        $currency->rate = $request->rate;
        $currency->taka = '1';
        $currency->save();
        return redirect()->route('currency.index')->with('success','Currency created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $currency = Currency::find($id);
        return view('Backend.currency.edit', compact('currency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sid = Session::getId();
        $session_ids = CurrencySession::where('sid', $sid)->get();

        if ($session_ids->count() != null){
            foreach ($session_ids as $session_id){
                $update_sid = CurrencySession::find($session_id);
                $update_sid->currency_id = $id;
                $update_sid->save();
            }
        }else{
            $currency_session = new CurrencySession();
            $currency_session->sid = $sid;
            $currency_session->currency_id = $sid;
            $currency_session->save();
        }

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'currency_name' => 'required',
            'symbol' => 'required',
            'rate' => 'required',
        ]);

        $currency = Currency::find($id);
        $currency->currency_name = $request->currency_name;
        $currency->symbol = $request->symbol;
        $currency->rate = $request->rate;
        $currency->taka = '1';
        $currency->save();
        return redirect()->route('currency.index')->with('success','Currency updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function currencyDelete($id){
        $currency = Currency::find($id);
        $currency->delete();
        return redirect()->route('currency.index')->with('success','Currency deleted successfully');
    }
    
    public function currencyRefresh(){
        return redirect()->back();
    }
}
