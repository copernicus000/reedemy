<?php

namespace App\Modules\Reedemy\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Reedemy\Data\RedeemerData;
use App\Modules\Reedemy\Helpers\RemoveFileFromStorage;
use App\Modules\Reedemy\Models\Redeemer;
use App\Modules\Reedemy\Requests\RedeemerRequest;
use App\Modules\Reedemy\Requests\RedeemerUpdateRequest;
use App\Modules\Reedemy\Services\DeleteVinylService;
use App\Modules\Reedemy\Services\VinylRegister;
use App\Modules\Reedemy\Services\VinylUpdate;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MainController extends Controller
{

    public function __construct(
        private VinylRegister $register,
        private VinylUpdate $updater,
        private DeleteVinylService $deleteService,
        private RemoveFileFromStorage $removeFile,
    ) {
    }

    public function index(): View
    {
        $redeemers = Redeemer::all();
        return view('index', ['redeemers' => $redeemers]);
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
        $redeemer = Redeemer::find($id);


        return view('redeemer.show', ['redeemer' => $redeemer]);
    }


    public function edit($id): View
    {
        $redeemer = Redeemer::find($id);
        //dd($redeemer);
        return view('redeemer.edit', [
            'redeemer' => $redeemer
        ]);
    }

    public function update($id, RedeemerUpdateRequest $request): RedirectResponse
    {
        //dd($request);
        $this->updater->update($id, $request);

        return redirect('/');
    }


    public function destroy($id): RedirectResponse
    {
        //first delete data from storage
        $this->removeFile->remove($id);

        //then delete from database
        $this->deleteService->destroy($id);

        return redirect('/');
    }
}
