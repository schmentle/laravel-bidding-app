<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BidController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'], ['except' => 'store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->view('bids.index', [
            'bids' => Bid::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'email' => 'required|email',
            'amount' => 'required|numeric|min:0.01,max:300.00',
            'product_id' => 'required|numeric|exists:products,id'
        ]);

        //Lets fetch the user by their email if it exists already
        $user = User::where('email', $data['email'])->first();

        if(!$user) {
            $newUser = User::create([
                'name' => 'Store Visitor',
                'email' => $data['email'],
                'password' => Hash::make('testing1234')
            ]);

            $data['user_id'] = $newUser->id;
        } else { //If it exists use this user
            $data['user_id'] = $user->id;
        }

        //Let's put the user in session for later
        session()->put('user_id', $data['user_id']);

        //Let's create the bid
        Bid::create([
            'user_id' => $data['user_id'],
            'product_id' => $data['product_id'],
            'amount' => $data['amount']
        ]);

        return redirect()->route('products.show', $data['product_id'])
                ->with('message', 'Your bid was successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function show(Bid $bid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function edit(Bid $bid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bid $bid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bid $bid)
    {
        //
    }
}
