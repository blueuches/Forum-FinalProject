<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommunityStoreRequest;
use App\Models\Community;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class CommunityController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $communities = Community::where('user_id',Auth::id())->paginate(5)->through(fn($community)=>[
            'id' => $community->id,
            'name'=> $community->name,
            'slug'=> $community->slug,
        ]);
        return Inertia::render('Communities/Index',compact('communities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Communities/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommunityStoreRequest $request)
    {
        Community::create($request->validated()+['user_id'=>Auth::id()]);

        return to_route('communities.index')->with('message','Community created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Community $community)
    {
        $this->authorize('update',$community);
        return Inertia::render('Communities/Edit', compact('community'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommunityStoreRequest $request, Community $community)
    {
        $this->authorize('update',$community);
        $community->update($request->validated());

        return to_route('communities.index')->with('message','Community updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Community $community)
    {
        $this->authorize('delete',$community);
        $community->delete();

        return back()->with('message','Community deleted successfully');
    }
}
