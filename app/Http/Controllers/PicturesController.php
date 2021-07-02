<?php

namespace App\Http\Controllers;

use App\Pictures;
use App\Advances;
use App\Task;
use Image;
use Illuminate\Http\Request;

class PicturesController extends Controller
{
    public function store(Request $request)
    {

            //obtiene los archivos de la request
            $input = $request->all();
            $file = $request->file('picture');
            $description = $input['descripcion'];
            $advance_id = $input['advance_id'];
          


            //genera el nombre que tendra el archivo
            $file_name = time()."-".$advance_id."-".$file->getClientOriginalName();


            //comprime el archivo
            $file = $request->file('picture');
            $file = Image::make($file);
            $file->resize(1024,768);
            $file->encode('jpg',30);
            $file->orientate();


            //sube el archivo original
            $upload = Storage::disk('s3')->put('trabajo-controlado/'.$file_name, $file->stream(),'public');
            //$file_name = str_replace("sectorcontrolado//","",$upload);
            $url = "https://laravelbucketosvaldo.s3-sa-east-1.amazonaws.com/trabajo-controlado/" . $file_name;

            //sube el archivo comprimido
            $file_thumb = $request->file('picture');
            $file_thumb = Image::make($file_thumb);
            $file_thumb->resize(128,128);
            $file_thumb->encode('jpg',30);
            $file_thumb->orientate();

            $upload_thumb = Storage::disk('s3')->put('trabajo-controlado/thumb_'.$file_name, $file_thumb->stream(),'public');
            $url_thumb = "https://laravelbucketosvaldo.s3-sa-east-1.amazonaws.com/trabajo-controlado/thumb_" .$file_name;

            //instancia la fotografia para escribir en la BD
            $picture = New Pictures;
            $picture->uri = $url;
            $picture->name = $file_name;
            $picture->advance_id = $advance_id;
            $picture->thumb_uri = $url_thumb;
            if(isset($description)){
                $picture->description = $description;
            }

            if(isset($input['latitude']) and isset($input['longitude'])){
                $picture->latitude = $input['latitude'];
                $picture->longitude = $input['longitude'];
            }

            //valida que la imagen se subio correctamente para escribir la BD
            if($upload && $upload_thumb){
                if($picture->save()){
                    return response()->json($picture, 201,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
                }else{
                    return response()->json(['Error:'=>'Error al subir archivo'],400);
                }
            }else{
                return response()->json(['Error:'=>'Error al subir archivo'],400);
            }

    }
    public function imagesProcess( Request $request, $advanceid_url){
         //obtiene los archivos de la request
         $input = $request->all();
         $file = $request->file('picture');

         $advance_id = $advanceid_url;
         $description = $input['description'];


         //genera el nombre que tendra el archivo
         $file_name = time()."-".$advance_id."-".$file->getClientOriginalName();


         //comprime el archivo
         $file = $request->file('picture');
         $file = Image::make($file);
         $file->resize(1024,768);
         $file->encode('jpg',30);
         $file->orientate();


         //sube el archivo original
         $upload = Storage::disk('s3')->put('sectorcontrolado/'.$file_name, $file->stream(),'public');
         //$file_name = str_replace("sectorcontrolado//","",$upload);
         $url = "https://laravelbucketosvaldo.s3-sa-east-1.amazonaws.com/sectorcontrolado/" . $file_name;

         //sube el archivo comprimido
         $file_thumb = $request->file('picture');
         $file_thumb = Image::make($file_thumb);
         $file_thumb->resize(128,128);
         $file_thumb->encode('jpg',30);
         $file_thumb->orientate();

         $upload_thumb = Storage::disk('s3')->put('sectorcontrolado/thumb_'.$file_name, $file_thumb->stream(),'public');
         $url_thumb = "https://laravelbucketosvaldo.s3-sa-east-1.amazonaws.com/sectorcontrolado/thumb_" .$file_name;

         //instancia la fotografia para escribir en la BD
         $picture = New Pictures;
         $picture->uri = $url;
         $picture->name = $file_name;
         $picture->incident_id = $incident_id;
         $picture->thumb_uri = $url_thumb;
         if(isset($description)){
             $picture->description = $description;
         }

         if(isset($input['latitude']) and isset($input['longitude'])){
             $picture->latitude = $input['latitude'];
             $picture->longitude = $input['longitude'];
         }

         //valida que la imagen se subio correctamente para escribir la BD
         if($upload && $upload_thumb){
             if($picture->save()){
                 
                 $sucess = true;
                 $returnUrl = url('/')."/advances/".$advance_id;
                 return view('pages.genericprocess',compact('returnUrl','sucess'));
             }else{
                
                 $sucess = false;
                 $returnUrl = url('/')."/advances/{advance_id}";
                 return view('pages.genericprocess',compact('returnUrl','sucess'));
             }
         }else{
            $sucess = false;
            $returnUrl = url('/')."/advances/{advance_id}";
            return view('pages.genericprocess',compact('returnUrl','sucess'));
         }

    }

    public function index(Request $request){

    }


    public function show($incident_id){

    }
}
