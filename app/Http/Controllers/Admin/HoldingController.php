<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HoldingStoreRequest;
use Illuminate\Http\Request;
use App\Models\Holding;
use App\Models\Template;

class HoldingController extends Controller
{
    public $file_path = 'public/holdings';
    public $file_path_name = 'holdings';

    public function index($template)
    {
        $template = Template::find($template);
        if(!$template){
            return redirect()->back()->with(['msg_error' => 'TEMPLATE Não Encontrado!']);
        }

        $holdings = Holding::where('id_templates', $template->id_templates)
            ->orderBy('order')
            ->get();

        return view('admin.holdings.index', compact('holdings', 'template'));
    }

    public function create($template)
    {
        $template = Template::find($template);
        if(!$template){
            return redirect()->back()->with(['msg_error' => 'TEMPLATE Não Encontrado!']);
        }

        return view('admin.holdings.form', compact('template'));
    }

    public function store($template, HoldingStoreRequest $request)
    {
        $inputs = $request->all();

        if($request->hasFile('local_path') && $request->file('local_path')->isValid()){
            $file_name = uniqid(date('HisYmd')).'.'.$request->local_path->extension();
            if (!$request->local_path->storeAs($this->file_path, $file_name))
                return redirect()->back()->with(['msg_error' => 'Erro!'])->withInput();
            $inputs['local_path'] = "storage/{$this->file_path_name}/{$file_name}";
        }

        $template = Template::find($template);
        if(!$template){
            return redirect()->back()->with(['msg_error' => 'TEMPLATE Não Encontrado!']);
        }

        $created = Holding::create($inputs);
        if ($created) {
            return redirect()->route('template.holdings.index', ['template' => $template->id_templates])->with(['msg_success' => 'Cadastrado!']);
        } else {
            return redirect()->back()->with(['msg_error' => 'Erro!']);
        }
    }

    public function show($template, $id)
    {
        $template = Template::find($template);
        if(!$template){
            return redirect()->back()->with(['msg_error' => 'TEMPLATE Não Encontrado!']);
        }

        $model = Holding::find($id);
        if(!$model){
            return redirect()->back()->with(['msg_error' => 'Não Encontrado!']);
        }

        return view('admin.holdings.show', compact('model', 'template'));
    }

    public function edit($template, $id)
    {
        $template = Template::find($template);
        if(!$template){
            return redirect()->back()->with(['msg_error' => 'TEMPLATE Não Encontrado!']);
        }

        $model = Holding::find($id);
        if(!$model){
            return redirect()->back()->with(['msg_error' => 'Não Encontrado!']);
        }
        
        return view('admin.holdings.form', compact('model', 'template'));
    }

    public function update($template, HoldingStoreRequest $request, $id)
    {
        $template = Template::find($template);
        if(!$template){
            return redirect()->back()->with(['msg_error' => 'TEMPLATE Não Encontrado!']);
        }

        $model = Holding::find($id);
        if(!$model){
            return redirect()->back()->with(['msg_error' => 'Não Encontrado!']);
        }

        $inputs = $request->all();
        if($request->hasFile('local_path') && $request->file('local_path')->isValid()){
            $file_name = uniqid(date('HisYmd')).'.'.$request->local_path->extension();
            if (!$request->local_path->storeAs($this->file_path, $file_name))
                return redirect()->back()->with(['msg_error' => 'Erro!'])->withInput();
            $inputs['local_path'] = "storage/{$this->file_path_name}/{$file_name}";
        }

        $updated = $model->update($inputs);
        if ($updated) {
            return redirect()->route('template.holdings.index', ['template' => $template->id_templates])->with(['msg_success' => 'Atualizado!']);
        } else {
            return redirect()->back()->with(['msg_error' => 'Erro!']);
        }
    }

    public function destroy($template, $id)
    {
        $template = Template::find($template);
        if(!$template){
            return redirect()->back()->with(['msg_error' => 'TEMPLATE Não Encontrado!']);
        }

        $model = Holding::find($id);
        if(!$model){
            return redirect()->back()->with(['msg_error' => 'Não Encontrado!']);
        }

        if ($model->delete()) {
            return redirect()->route('template.holdings.index', ['template' => $template->id_templates])->with(['msg_success' => 'Deletado!']);
        } else {
            return redirect()->back()->with(['msg_error' => 'Erro!']);
        }
    }
}
