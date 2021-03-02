<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use siecrodata; // Instanciamos el modelo siecrodata
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;
use Input;
use Storage;

class siecrodataController extends Controller
{
    public function index()
    {
    	$siecrodata = siecrodata::all();
        return view('admin.siecrodata.index', compact('siecrodata')); 
    }

    public function create()
    {
        $siecrodata = siecrodata::all();
        return view('admin.siecrodata.create', compact('siecrodata'));
    }
 
    public function store(ItemCreateRequest $request)
    {
    	//$siecrodata=request()->all();
    	$siecrodata=request()->except('_token');
        siecrodata::insert($siecrodata);
        return response()->json($siecrodata);

        $siecrodata = new siecrodata;
 
        $siecrodata->No_obra = $request->No_obra;
        $siecrodata->titulo_obra = $request->titulo_obra;
        $siecrodata->temp_obra = $request->temp_obra;
        $siecrodata->caract_descrip = $request->caract_descrip;
        $siecrodata->año = $request->año;
        $siecrodata->año_confirm = $request->año_confirm;
        $siecrodata->año_aproxi = $request->año_aproxi;
        $siecrodata->epoca_obra = $request->epoca_obra;
        $siecrodata->epoca_confirm = $request->epoca_confirm;
        $siecrodata->epoca_aproxi = $request->epoca_aproxi;
        $siecrodata->tipo_bien_cultu = $request->tipo_bien_cultu;
        $siecrodata->tipo_obj_obra = $request->tipo_obj_obra;
        $siecrodata->lugar_proce_ori = $request->lugar_proce_ori;
        $siecrodata->lugar_proce_act = $request->lugar_proce_act;
        $siecrodata->no_inv_obra = $request->no_inv_obra;
        $siecrodata->forma_ingreso = $request->forma_ingreso;
        $siecrodata->sector_obra = $request->sector_obra;
        $siecrodata->respon_ecro = $request->respon_ecro;
        $siecrodata->proyecto_obra = $request->proyecto_obra;
        $siecrodata->año_proyec_obra = $request->año_proyec_obra;
        $siecrodata->no_proyec_obra = $request->no_proyec_obra;
 
        $siecrodata->save();
 
        return redirect('admin/siecrodata')->with('message','Guardado Satisfactoriamente !');
    }

    public function edit($id)
    {
        $siecrodata = siecrodata::find($id);
        return view('admin/siecrodata.edit',['siecrodata'=>$siecrodata]);
    }

    public function update(ItemUpdateRequest $request, $id)
    {
    	$siecrodata = siecrodata::find($id);
 
    	$siecrodata->No_obra = $request->No_obra;
        $siecrodata->titulo_obra = $request->titulo_obra;
        $siecrodata->temp_obra = $request->temp_obra;
        $siecrodata->caract_descrip = $request->caract_descrip;
        $siecrodata->año = $request->año;
        $siecrodata->año_confirm = $request->año_confirm;
        $siecrodata->año_aproxi = $request->año_aproxi;
        $siecrodata->epoca_obra = $request->epoca_obra;
        $siecrodata->epoca_confirm = $request->epoca_confirm;
        $siecrodata->epoca_aproxi = $request->epoca_aproxi;
        $siecrodata->tipo_bien_cultu = $request->tipo_bien_cultu;
        $siecrodata->tipo_obj_obra = $request->tipo_obj_obra;
        $siecrodata->lugar_proce_ori = $request->lugar_proce_ori;
        $siecrodata->lugar_proce_act = $request->lugar_proce_act;
        $siecrodata->no_inv_obra = $request->no_inv_obra;
        $siecrodata->forma_ingreso = $request->forma_ingreso;
        $siecrodata->sector_obra = $request->sector_obra;
        $siecrodata->respon_ecro = $request->respon_ecro;
        $siecrodata->proyecto_obra = $request->proyecto_obra;
        $siecrodata->año_proyec_obra = $request->año_proyec_obra;
        $siecrodata->no_proyec_obra = $request->no_proyec_obra;
 
    	
    	$siecrodata->save();
 
    	Session::flash('message', 'Editado Satisfactoriamente !');
    	return Redirect::to('admin/siecrodata');
    }

    public function showCapturaForm()
    {
        return view('vendor.formu');
    }

    
}
