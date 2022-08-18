<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TemplateStoreRequest;
use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
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
        $created = Template::create($request->all());
        if ($created) {
            return redirect()->route('templates.index')->with(['msg_success' => 'Cadastrado!']);
        } else {
            return redirect()->back()->with(['msg_error' => 'Erro!']);
        }
    }

    public function show($id)
    {
        
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

        $updated = $model->update($request->all());
        if ($updated) {
            return redirect()->route('templates.index')->with(['msg_success' => 'Atualizado!']);
        } else {
            return redirect()->back()->with(['msg_error' => 'Erro!']);
        }
    }

    public function destroy($id)
    {
        //
    }
}
