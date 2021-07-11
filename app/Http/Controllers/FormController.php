<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormContentRequest;
use App\Models\Form;


class FormController extends Controller
{

    /**
     * @param FormContentRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveForm(FormContentRequest $request){
        $form=new Form();
        $form->title=$request->input('title');
        $form->content = $request->input('content');
        $result = $form->save();


        return response()->json($result);
    }

    public function updateForm(FormContentRequest $request,int $id){
        $form=Form::findOrFail($id);
        $form->title=$request->input('title');
        $form->content = $request->input('content');
        $result = $form->save();


        return response()->json($result);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getForms()
    {
        return response()->json(Form::orderBy('id','desc')->get());
    }

    /**
     * @param int $id
     */
    public function showForm(int $id){
        $form=Form::findOrFail($id);
        return response()->json($form);

    }
}
