<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StyleStoreRequest;
use Illuminate\Http\Request;
use App\Models\Style;
use App\Models\Template;

class StyleController extends Controller
{
    public $file_path = 'public/styles';
    public $file_path_name = 'styles';

    public function index($template)
    {
        $template = Template::find($template);
        if(!$template){
            return redirect()->back()->with(['msg_error' => 'TEMPLATE Não Encontrado!']);
        }

        $styles = Style::where('id_templates', $template->id_templates)
            ->orderBy('order')
            ->get();

        return view('admin.styles.index', compact('styles', 'template'));
    }

    public function create($template)
    {
        $template = Template::find($template);
        if(!$template){
            return redirect()->back()->with(['msg_error' => 'TEMPLATE Não Encontrado!']);
        }

        return view('admin.styles.form', compact('template'));
    }

    public function store($template, StyleStoreRequest $request)
    {
        $inputs = $request->all();

        //if($request->hasFile('path') && $request->file('path')->isValid()){
        //    $file_name = uniqid(date('HisYmd')).'.'.$request->path->extension();
        //    if (!$request->path->storeAs($this->file_path, $file_name))
        //        return redirect()->back()->with(['msg_error' => 'Erro!'])->withInput();
        //    $inputs['path'] = "storage/{$this->file_path_name}/{$file_name}";
        //}

        $template = Template::find($template);
        if(!$template){
            return redirect()->back()->with(['msg_error' => 'TEMPLATE Não Encontrado!']);
        }

        $created = Style::create($inputs);
        if ($created) {
            return redirect()->route('template.styles.index', ['template' => $template->id_templates])->with(['msg_success' => 'Cadastrado!']);
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

        $model = Style::find($id);
        if(!$model){
            return redirect()->back()->with(['msg_error' => 'Não Encontrado!']);
        }

        return view('admin.styles.show', compact('model', 'template'));
    }

    public function edit($template, $id)
    {
        $template = Template::find($template);
        if(!$template){
            return redirect()->back()->with(['msg_error' => 'TEMPLATE Não Encontrado!']);
        }

        $model = Style::find($id);
        if(!$model){
            return redirect()->back()->with(['msg_error' => 'Não Encontrado!']);
        }
        
        return view('admin.styles.form', compact('model', 'template'));
    }

    public function update($template, StyleStoreRequest $request, $id)
    {
        $template = Template::find($template);
        if(!$template){
            return redirect()->back()->with(['msg_error' => 'TEMPLATE Não Encontrado!']);
        }

        $model = Style::find($id);
        if(!$model){
            return redirect()->back()->with(['msg_error' => 'Não Encontrado!']);
        }

        $inputs = $request->all();
        //if($request->hasFile('path') && $request->file('path')->isValid()){
        //    $file_name = uniqid(date('HisYmd')).'.'.$request->path->extension();
        //    if (!$request->path->storeAs($this->file_path, $file_name))
        //        return redirect()->back()->with(['msg_error' => 'Erro!'])->withInput();
        //    $inputs['path'] = "storage/{$this->file_path_name}/{$file_name}";
        //}

        $updated = $model->update($inputs);
        if ($updated) {
            return redirect()->route('template.styles.index', ['template' => $template->id_templates])->with(['msg_success' => 'Atualizado!']);
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

        $model = Style::find($id);
        if(!$model){
            return redirect()->back()->with(['msg_error' => 'Não Encontrado!']);
        }

        if ($model->delete()) {
            return redirect()->route('template.styles.index', ['template' => $template->id_templates])->with(['msg_success' => 'Deletado!']);
        } else {
            return redirect()->back()->with(['msg_error' => 'Erro!']);
        }
    }
}
