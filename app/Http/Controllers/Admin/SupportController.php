<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupportRequest;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct(
        protected SupportService $service
    )
    {
        
    }

    public function index(Request $request)
    {
        //$supports = $support->all();
        // A função compact serve para enviar a variável supports para a view
        $supports = $this->service->getAll($request->filter);
        return view('admin/supports/index', compact('supports')); 
    }

    public function show(string $id){
        // Support::find($id)
        // Support::where('id', $id)->first();
        // Support::where('id', '!=', $id)->first();
        if(!$support = $this->service->findOne($id)){
            return back();
        }else{
            return view('admin/supports/show', compact('support'));
        }
        
        
    }

    public function create(){
        return view('admin/supports/create');
    }
    
    // Request é um array com os dados do formulário
    public function store(StoreSupportRequest $request, Support $support){
        $this->service->new(CreateSupportDTO::makeFromRequest($request));

        return redirect()->route('supports.index');
    }

    public function edit(string $id){
        //if(!$support = $support->where('id',$id)->first()){
        if(!$support = $this->service->findOne($id)){
            return back();
        }else{
            return view('admin/supports/edit', compact('support'));
        }
        
    }

    public function update(StoreSupportRequest $request, Support $support, string $id){
        if(!$support = $support->find($id)){
            return back();
        }else{

            // $support->subject = $request->subject;
            // $support->body = $request->body;
            // $support->save();

            $support->update($request->validated()); // Pega apenas os dados validados

            return redirect()->route('supports.index');
        }
    }

    public function destroy(string $id){
        $this->service->delete($id);
        return redirect()->route('supports.index');
    }
}
