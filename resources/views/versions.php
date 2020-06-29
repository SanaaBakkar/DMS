<?php

public function uploadFilePost(Request $request){

        $request->validate([
            'fileToUpload' => 'required|file|max:1024',
            'categorie' => 'required'
        ]);
        $id_authorized_users = $request->input('id_user');
        $names ="";
             foreach ($id_authorized_users as $id_authorized_user) {
               $user =User::find($id_authorized_user);               
               $names .= $user->name.',';               
             }

        $name = $request->file('fileToUpload')->getClientOriginalName();
        $extension = $request->file('fileToUpload')->getClientOriginalExtension();



        $new_name=Str::substr($name, 9, -3);

        $docs_existing = DB::table('edocuments')->get();
         $nbr_duplicate = Edocument::where(DB::raw("substr('doc_name', 9, -3)"),'=',$new_name)->count();


        $request->file('fileToUpload')->storeAs('files',date("dmY").'_'.$name);
   
       

        $file= new Edocument();

        $file->doc_name=date("dmY").'_'.$name.'('.$nbr_duplicate.')';
        $file->doc_prepared_by = Auth::user()->name;
        $file->doc_status='Not yet started';
        $file->authorized_users = $names;

 
        if (!empty($_POST['description'])) 
        {
              $file->doc_description=$_POST['description'];
        }else
        {
              $file->doc_description='No description';
        }

        
  /*get the id of the type from etypdoc table and store it into document table*/
        $type = DB::table('etypdocs')->where('extension', strtoupper($extension))->first();
        $file->typdoc_id = $type->id;

 /*Get the Id of categorie choosen  */  
       $file->category_id = $request->input('categorie');

 /*Save document informations */      
        $file->save();

        return back()->with('success','You have successfully upload file.');

    }



?>