<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommunityPostResource;
use App\Models\Community;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CommunityController extends Controller
{
    public function show($slug){
        $community = Community::where('slug', $slug)->firstOrFail();
        $posts = CommunityPostResource::collection($community->posts()->with(['user','postVotes'=>function($query){
            $query->where('user_id',Auth::id());
        }])->paginate(3));

        return Inertia::render('Frontend/Communities/Show', compact('community', 'posts'));
    }
}
