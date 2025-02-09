<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;

class NomorDua {

	public function submit(Request $request) {
		if (!Auth::check()) {
			return redirect()->route('event.home')->with('error', 'Please login first');
		}
		
		Event::create([
			'name' => $request->name,
			'start' => $request->start,
			'end' => $request->end,
			'user_id' => Auth::id()
		]);
		
		return redirect()->route('event.home')->with('success', 'Event created successfully');
	}
}

?>