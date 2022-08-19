<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HoldingItemStoreRequest;
use Illuminate\Http\Request;
use App\Models\Holding;
use App\Models\HoldingItem;

class HoldingItemController extends Controller
{
    public $file_path = 'public/holdings_items';
    public $file_path_name = 'holdings_items';

    public function index($holding)
    {
        $holding = Holding::find($holding);
        if(!$holding){
            return redirect()->back()->with(['msg_error' => 'Sessão Não Encontrada!']);
        }

        $holdingsitems = HoldingItem::where('id_holdings', $holding->id_holdings)
            ->orderBy('order')
            ->get();

        return view('admin.holdingsitems.index', compact('holdingsitems', 'holding'));
    }

    public function create($holding)
    {
        $holding = Holding::find($holding);
        if(!$holding){
            return redirect()->back()->with(['msg_error' => 'Sessão Não Encontrada!']);
        }

        return view('admin.holdingsitems.form', compact('holding'));
    }

    public function store($holding, HoldingItemStoreRequest $request)
    {
        $inputs = $request->all();

        //img
        if($request->hasFile('path_img') && $request->file('path_img')->isValid()){
            $file_name = uniqid(date('HisYmd')).'_img.'.$request->path_img->extension();
            if (!$request->path_img->storeAs($this->file_path, $file_name))
                return redirect()->back()->with(['msg_error' => 'Erro!'])->withInput();
            $inputs['path_img'] = "storage/{$this->file_path_name}/{$file_name}";
        }

        //file
        if($request->hasFile('path_file') && $request->file('path_file')->isValid()){
            $file_name = uniqid(date('HisYmd')).'_file.'.$request->path_file->extension();
            if (!$request->path_file->storeAs($this->file_path, $file_name))
                return redirect()->back()->with(['msg_error' => 'Erro!'])->withInput();
            $inputs['path_file'] = "storage/{$this->file_path_name}/{$file_name}";
        }

        $holding = Holding::find($holding);
        if(!$holding){
            return redirect()->back()->with(['msg_error' => 'Sessão Não Encontrada!']);
        }

        $created = HoldingItem::create($inputs);
        if ($created) {
            return redirect()->route('holding.holdings_items.index', ['holding' => $holding->id_holdings])->with(['msg_success' => 'Cadastrado!']);
        } else {
            return redirect()->back()->with(['msg_error' => 'Erro!']);
        }
    }

    public function show($holding, $id)
    {
        $holding = Holding::find($holding);
        if(!$holding){
            return redirect()->back()->with(['msg_error' => 'Sessão Não Encontrada!']);
        }

        $model = HoldingItem::find($id);
        if(!$model){
            return redirect()->back()->with(['msg_error' => 'Não Encontrado!']);
        }
        
        return view('admin.holdingsitems.show', compact('model', 'holding'));
    }

    public function edit($holding, $id)
    {
        $holding = Holding::find($holding);
        if(!$holding){
            return redirect()->back()->with(['msg_error' => 'Sessão Não Encontrada!']);
        }

        $model = HoldingItem::find($id);
        if(!$model){
            return redirect()->back()->with(['msg_error' => 'Não Encontrado!']);
        }
        
        return view('admin.holdingsitems.form', compact('model', 'holding'));
    }

    public function update($holding, HoldingItemStoreRequest $request, $id)
    {
        $holding = Holding::find($holding);
        if(!$holding){
            return redirect()->back()->with(['msg_error' => 'Sessão Não Encontrada!']);
        }

        $model = HoldingItem::find($id);
        if(!$model){
            return redirect()->back()->with(['msg_error' => 'Não Encontrado!']);
        }

        $inputs = $request->all();

        //img
        if($request->hasFile('path_img') && $request->file('path_img')->isValid()){
            $file_name = uniqid(date('HisYmd')).'_img.'.$request->path_img->extension();
            if (!$request->path_img->storeAs($this->file_path, $file_name))
                return redirect()->back()->with(['msg_error' => 'Erro!'])->withInput();
            $inputs['path_img'] = "storage/{$this->file_path_name}/{$file_name}";
        }

        //file
        if($request->hasFile('path_file') && $request->file('path_file')->isValid()){
            $file_name = uniqid(date('HisYmd')).'_file.'.$request->path_file->extension();
            if (!$request->path_file->storeAs($this->file_path, $file_name))
                return redirect()->back()->with(['msg_error' => 'Erro!'])->withInput();
            $inputs['path_file'] = "storage/{$this->file_path_name}/{$file_name}";
        }

        $updated = $model->update($inputs);
        if ($updated) {
            return redirect()->route('holding.holdings_items.index', ['holding' => $holding->id_holdings])->with(['msg_success' => 'Atualizado!']);
        } else {
            return redirect()->back()->with(['msg_error' => 'Erro!']);
        }
    }

    public function destroy($holding, $id)
    {
        $holding = Holding::find($holding);
        if(!$holding){
            return redirect()->back()->with(['msg_error' => 'Sessão Não Encontrada!']);
        }

        $model = HoldingItem::find($id);
        if(!$model){
            return redirect()->back()->with(['msg_error' => 'Não Encontrado!']);
        }

        if ($model->delete()) {
            return redirect()->route('holding.holdings_items.index', ['holding' => $holding->id_holdings])->with(['msg_success' => 'Deletado!']);
        } else {
            return redirect()->back()->with(['msg_error' => 'Erro!']);
        }
    }
}
