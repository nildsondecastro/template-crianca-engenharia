<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TemplateStoreRequest;
use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public $file_path = 'public/templates';
    public $file_path_name = 'templates';

    public function index()
    {
        $templates = Template::orderBy('order')->get();
        return view('admin.templates.index', compact('templates'));
    }

    public function create()
    {
        return view('admin.templates.form');
    }

    public function store(TemplateStoreRequest $request)
    {
        $inputs = $request->all();
        if($request->hasFile('path') && $request->file('path')->isValid()){
            $file_name = uniqid(date('HisYmd')).'.'.$request->path->extension();

            if (!$request->path->storeAs($this->file_path, $file_name))
                return redirect()->back()->with(['msg_error' => 'Erro!'])->withInput();

            $inputs['path'] = "storage/{$this->file_path_name}/{$file_name}";
        }

        $created = Template::create($inputs);
        if ($created) {
            return redirect()->route('templates.index')->with(['msg_success' => 'Cadastrado!']);
        } else {
            return redirect()->back()->with(['msg_error' => 'Erro!']);
        }
    }

    public function show($id)
    {
        $model = Template::find($id);
        if(!$model){
            return redirect()->back()->with(['msg_error' => 'Não Encontrado!']);
        }
        
        return view('admin.templates.show', compact('model'));
    }

    public function edit($id)
    {
        $model = Template::find($id);
        if(!$model){
            return redirect()->back()->with(['msg_error' => 'Não Encontrado!']);
        }
        
        return view('admin.templates.form', compact('model'));
    }

    public function update(TemplateStoreRequest $request, $id)
    {
        $model = Template::find($id);
        if(!$model){
            return redirect()->back()->with(['msg_error' => 'Não Encontrado!']);
        }

        $inputs = $request->all();
        if($request->hasFile('path') && $request->file('path')->isValid()){
            $file_name = uniqid(date('HisYmd')).'.'.$request->path->extension();

            if (!$request->path->storeAs($this->file_path, $file_name))
                return redirect()->back()->with(['msg_error' => 'Erro!'])->withInput();

            $inputs['path'] = "storage/{$this->file_path_name}/{$file_name}";
        }

        $updated = $model->update($inputs);
        if ($updated) {
            return redirect()->route('templates.index')->with(['msg_success' => 'Atualizado!']);
        } else {
            return redirect()->back()->with(['msg_error' => 'Erro!']);
        }
    }

    public function destroy($id)
    {
        $model = Template::find($id);
        if(!$model){
            return redirect()->back()->with(['msg_error' => 'Não Encontrado!']);
        }

        if ($model->delete()) {
            return redirect()->route('templates.index')->with(['msg_success' => 'Deletado!']);
        } else {
            return redirect()->back()->with(['msg_error' => 'Erro!']);
        }
    }

    public function file($id)
    {
        $model = Template::find($id);
        if(!$model){
            return redirect()->back()->with(['msg_error' => 'Não Encontrado!']);
        }
        
        return view('file', compact('model'));
    }
}
