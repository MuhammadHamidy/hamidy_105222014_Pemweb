<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;

class NomorTiga {

	public function getData () {
		$events = [];
		if (Auth::check()) {
			$events = Event::where('user_id', Auth::id())->get();
		}
		
		return view('home.index', ['events' => $events]);
	}

	public function getSelectedData (Request $request) {
		try {
			$data = Event::where('user_id', Auth::id())
						->where('id', $request->id)
						->firstOrFail();
			return response()->json($data);
		} catch (\Exception $e) {
			return response()->json(['error' => 'Data tidak ditemukan'], 404);
		}
	}

	public function update (Request $request) {
		$event = Event::where('user_id', Auth::id())
					  ->where('id', $request->id)
					  ->firstOrFail();
					  
		$event->update([
			'name' => $request->name,
			'start' => $request->start,
			'end' => $request->end
		]);
		
		return redirect()->route('event.home')->with('success', 'Event updated successfully');
	}

	public function delete (Request $request) {
		Event::where('user_id', Auth::id())
			 ->where('id', $request->id)
			 ->delete();
			 
		return redirect()->route('event.home')->with('success', 'Event deleted successfully');
	}
}

?>