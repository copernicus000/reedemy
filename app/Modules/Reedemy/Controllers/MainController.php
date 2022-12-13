<?php

namespace App\Modules\Reedemy\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Reedemy\Data\RedeemerData;
use App\Modules\Reedemy\Models\Redeemer;
use App\Modules\Reedemy\Requests\RedeemCodeRequest;
use App\Modules\Reedemy\Requests\RedeemerRequest;
use App\Modules\Reedemy\Services\VinylRegister;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{

    public function __construct(
        public VinylRegister $register,
    ){

    }
    public function index(): View
    {
        $redeemers = Redeemer::get();
        return view('index',compact('redeemers'));
    }

    public function create(): View
    {
        return view('redeemer/create');
    }

    public function store(RedeemerRequest $request, RedeemerData $data): RedirectResponse
    {
            $this->register->register($data, $request);

        return redirect('/');
    }


    public function show($id): View
    {
        $redeemer = Redeemer::where('slug', $id)->first();


        return view('redeemer.show', ['redeemer' => $redeemer]);
    }


    public function edit($id)
    {
       //
    }

    public function verify($id, RedeemCodeRequest $request)
    {
        $redeemer = Redeemer::find($id);

        //todo
        if($request->code == $redeemer->code)
        {
            return "acquired";
        }






        return redirect('/');
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
}
