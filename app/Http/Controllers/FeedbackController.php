<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cargo;
use App\Models\ContactForm;
use App\Models\Feedback;
use App\Models\Order;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function create()
    {
        $datas = Feedback::orderBy('created_at', 'desc')->get();

        return view('about', compact('datas'));
    }

    public function store(Request $request)
    {
        $rating = $request->input('rating');
        $comment = $request->input('comment');
        $id_order = $request->input('id_order');

        $user = $request->user();
        Feedback::create([
            'id_client' => $user->id,
            'stars' => $rating,
            'id_order' => $id_order,
            'comment' => $comment
        ]);

        $request->session()->flash('message', 'Спасибо за отзыв!');
        return redirect()->back();
    }
}
