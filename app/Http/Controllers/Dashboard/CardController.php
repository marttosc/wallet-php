<?php

namespace Wallet\Http\Controllers\Dashboard;

use Auth;
use Wallet\Models\Card;
use Wallet\Models\Flag;
use Wallet\Http\Requests;
use Illuminate\Http\Request;
use Wallet\Http\Controllers\DashboardController as Dashboard;

class CardController extends Dashboard
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Auth::user()->cards;

        return view('dashboard::card.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $_flags = Flag::orderBy('name', 'asc')->get(['id', 'name']);

        $flags = [];

        foreach ($_flags as $flag)
        {
            $flags[$flag['id']] = $flag['name'];
        }

        return view('dashboard::card.create', compact('flags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $card = Card::findOrFail($id);

        $card->delete();

        return redirect()
                ->route('dashboard.card.index')
                ->with('message', 'Cartão excluído com sucesso.');
    }
}
