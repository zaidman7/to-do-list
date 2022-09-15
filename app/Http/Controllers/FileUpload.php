<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\File;
use App\Models\Item;

class FileUpload extends Controller
{
    public function createForm(Item $item) {
        return view('file-upload', [
            'item' => $item
        ]);
    }

    public function fileUpload(Request $req, Item $item) {
        $req->validate([
            'file' => 'required|mimes:jpg,jpeg|max:8192'
        ]);
        $fileModel = new File;
        if($req->file()) {
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->name = time().'_'.$req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->item_id = $item->id;
            $fileModel->save();
            return redirect('/');
        }
   }
}
