<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Micropost;

class FavoriteController extends Controller
{
    public function store(Request $request, $id)
    {
        \Auth::user()->add_to_favorite($id);
        return redirect()->back();
    }

    public function destroy($id)
    {
        \Auth::user()->delete_from_favorite($id);
        return redirect()->back();
    }
    
    public function favorite($id)
    {
        $user = User::find($id);
        $post = Micropost::find($id);
        $favorite = $user->favorite()->paginate(10);

        $data = [
            'user' => $user,
            'favorites' => $favorite,
        ];

        $data += $this->counts($user);

        return view('users.favorites', $data);
    }
}
