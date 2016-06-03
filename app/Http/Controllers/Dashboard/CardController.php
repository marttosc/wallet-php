<?php

namespace Wallet\Http\Controllers\Dashboard;

use Auth;
use Wallet\Models\Card;
use Wallet\Models\Flag;
use Wallet\Http\Requests;
use Illuminate\Http\Request;
use Wallet\Http\Requests\StoreCardRequest;
use Wallet\Http\Requests\UpdateCardRequest;
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
     * @param  Wallet\Http\Requests\StoreCardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCardRequest $request)
    {
        $carbon = app(\Carbon\Carbon::class);

        $card = new Card;

        $card->user_id    = Auth::id();
        $card->flag_id    = $request->input('flag');
        $card->card       = $request->input('card');
        $card->cvc        = $request->input('cvc');
        $card->expires_in = $carbon->createFromFormat('m/Y', $request->input('expires_in'))->format('Y-m-d');
        $card->closes_at  = $carbon->createFromFormat('d/m/Y', $request->input('closes_at'))->format('Y-m-d');
        $card->limit      = $request->input('limit');

        $card->save();

        return redirect()
                ->route('dashboard.card.index')
                ->with('create-message', 'Cartão cadastrado com sucesso.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $card = Card::findOrFail($id);

        return view('dashboard::card.edit', compact('card'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Wallet\Http\Requests\UpdateCardRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCardRequest $request, $id)
    {
        $carbon = app(\Carbon\Carbon::class);

        $card = Card::findOrFail($id);

        $card->closes_at = $carbon->createFromFormat('d/m/Y', $request->input('closes_at'))->format('Y-m-d');
        $card->limit     = $request->input('limit');

        $card->save();

        return redirect()
                ->route('dashboard.card.index')
                ->with('update-message', 'Cartão atualizado com sucesso.');
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
