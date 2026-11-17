<?php

namespace App\Http\Controllers;

use App\Models\Christmasgifs;
use App\Models\User;
use Illuminate\Http\Request;

class ChristmasController extends Controller
{

    public function gifts(){

        $Chgifts = Christmasgifs::join('users', 'christmasgifs.user_id', '=', 'users.id')
            ->select('christmasgifs.id','christmasgifs.name as giftname','christmasgifs.predicted_value','christmasgifs.actual_value','users.name as username')
            ->get();



        // dd($Chgifts);

        return view('chgifts.allgifts', compact('Chgifts'));
    }

    public function addGifts(){

        $giftPersonInfo = User::select('name','id')
        ->get();

        // dd($taskPersonInfo);

        return view('chgifts.addgifts', compact('giftPersonInfo'));
    }

    public function deleteGifts($id){

        Christmasgifs::where('id', $id)->delete();

        return back();
    }

    public function editGifts($id){

        $giftInfo = Christmasgifs::where('christmasgifs.id', $id)
        ->join('users', 'christmasgifs.user_id', '=', 'users.id')
        ->select('christmasgifs.id','christmasgifs.name as giftname','christmasgifs.predicted_value','christmasgifs.actual_value','users.name as username', 'user_id')
        ->first();

        $giftPersonInfo = User::select('name','id')
        ->get();

        return view('chgifts.editgifts', compact('giftInfo','giftPersonInfo'));

    }

    public function storeGifts(Request $request){
        //validar os dados no servidor
        $request->validate([
            'prenda' => 'required|max:50',
            'vp' => 'required|max:50',
            'id' => 'required|exists:users,id',
            'vg' => 'max:50'
        ]);

        //depois de validados, inserir na bd
        Christmasgifs::insert([
            'name' => $request->prenda,
            'predicted_value' => $request->vp,
            'user_id' => $request->id,
            'actual_value' => $request->vg,
        ]);

        return redirect()->route('gifts.all')->with('message','Prenda adicionado com sucesso!');
    }

    public function updateGifts(Request $request){

        $request->validate([
            'giftname' => 'required|max:50',
            'vp' => 'required|integer',
            'name' => 'required',
            'vg' => 'integer',
        ]);

        Christmasgifs::where('id', $request->id)->update([
            'name'=> $request->giftname,
            'predicted_value'=> $request->vp,
            'user_id'=> $request->name,
            'actual_value' => $request->vg,
        ]);

        return redirect()->route('gifts.all')->with('message','Prenda actualizada com sucesso!');
    }
}
