<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Illuminate\support\Str;

class DashboardEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.events.index", [
            "events" => Event::where("user_id", auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.events.create", [
            "categories" => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->file("image")->store("post-images");
        $validateData = $request->validate([
            "title" => "required|max:255",
            "slug" => "required|unique:events",
            "category_id" => "required",
            "image" => "image|file|max:2048",
            "body" => "required"
        ]);

        if ($request->file("image")) {
            $validateData['image'] = $request->file("image")->store("post-images");
        }

        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 100, '...');

        Event::create($validateData);
        return redirect("/dashboard/events")->with("success", "New event has been added!");
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        if ($event->author->id !== auth()->user()->id) {
            abort(403);
        } else {
            return view("dashboard.events.show", [
                "event" => $event
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        if ($event->author->id !== auth()->user()->id) {
            abort(403);
        } else {
            return view("dashboard.events.edit", [
                "event" => $event,
                "categories" => Category::all()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $rules = [
            "title" => "required|max:255",
            "category_id" => "required",
            "image" => "image|file|max:2048",
            "body" => "required"
        ];


        if ($request->slug != $event->slug) {
            $rules["slug"] = "required|unique:events";
        }

        $validateData = $request->validate($rules);


        if ($request->file("image")) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file("image")->store("post-images");
        }

        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 100, '...');


        Event::where('id', $event->id)
            ->update($validateData);

        return redirect("/dashboard/events")->with("success", "Event has been updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        if ($event->image) {
            Storage::delete($event->image);
        }
        Event::destroy($event->id);
        return redirect("/dashboard/events")->with("success", "Event has been deleted!");
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Event::class, 'slug', $request->title);
        return response()->json(["slug" => $slug]);
    }
}
