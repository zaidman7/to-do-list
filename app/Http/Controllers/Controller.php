<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Item;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function addPage() {
        return view('add-item');
    }

    public function add() {
        $attributes = request()->validate([
            'name' => ['required'],
            'deadline' => ['required', 'date']
        ]);

        $item = new Item();
        $item->todo = $attributes['name'];
        $item->slug = sha1(time());
        $item->deadline = $attributes['deadline'];
        $item->progress = 0;
        $item->save();

        return redirect('/items/' . $item->slug);
    }
    
    public function deletePage(Item $item) {
        return view('delete-item', [
            'item' => $item
        ]);
    }

    public function delete(Item $item) {
        $item->delete();
        return redirect('/');
    }

    public function updatePage(Item $item) {
        return view('update-progress', [
            'item' => $item
        ]);
    }

    public function update(Item $item) {
        $attributes = request()->validate([
            'progress' => ['required', 'numeric', 'min:0', 'max:100']
        ]);

        $progress = $attributes['progress'];
        if($progress == 100) {
            return $this->delete($item);
        }

        $item->progress = $progress;
        $item->save();

        return redirect('/items/' . $item->slug);
    }

    public function changeDeadlinePage(Item $item) {
        return view('change-deadline', [
            'item' => $item
        ]);
    }

    public function changeDeadline(Item $item) {
        $attributes = request()->validate([
            'deadline' => ['required', 'date']
        ]);

        $item->deadline = $attributes['deadline'];
        $item->save();

        return redirect('/items/' . $item->slug);
    }
}
