<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Rate;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Event;
use Inertia\Response;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Event\CreateEventRequest;

class EventController extends Controller
{
    protected $user;

    public function __construct()
    {
        $user = Auth::user();
        $this->user = User::find($user->id);
    }

    public function index(): Response
    {
      
        return Inertia::render('Event/list', [
        ]);
    }

    public function store(CreateEventRequest $request): RedirectResponse
    {
        $request->validated();

        $user = Auth::user();

        $rate = Rate::where('activity_id', $request->activity_id)
            ->where('user_id', $this->user->id)
            ->where('project_id', $request->project_id)
            ->first();
        $request->merge(['rate_id' => $rate->id]);

        Event::create(
            [
                'start_time' => Carbon::parse($request->start_time)->format('Y-m-d H:i:s'),
                'end_time'  => Carbon::parse($request->end_time)->format('Y-m-d H:i:s') ?? null,
                'user_id' =>  $this->user->id,
                'project_id' => $request->project_id,
                'rate_id' => $request->rate_id,
                'task_id'  => $request->task_id,
                'notes' => $request->notes

            ]
        );

        return back()->with('message', 'Event Created!');
    }

    public function recent(): JsonResponse
    {
        $events = Event::where('user_id', $this->user->id)
            ->with('project', 'rate', 'user')
            ->orderBy('start_time', 'desc')
            ->limit(5)
            ->get();

        return response()->json($events);
    }

    public function update(CreateEventRequest $request, Event $event): RedirectResponse
    {

        $request->validated();

        $event->update(
            [
                'start_time' => Carbon::parse($request->start_time)->format('Y-m-d H:i:s'),
                'end_time'  => Carbon::parse($request->end_time)->format('Y-m-d H:i:s') ?? null,
                'user_id' =>  $this->user->id,
                'project_id' => $request->project_id,
                'rate_id' => $request->rate_id,
                'task_id'  => $request->task_id,
                'notes' => $request->notes

            ]
        );

        return back()->with('message', 'Event Updated!');
    }

    public function destroy(Event $event): RedirectResponse
    {
        $event->delete();

        return back()->with('message', 'Event Deleted!');
    }
}
