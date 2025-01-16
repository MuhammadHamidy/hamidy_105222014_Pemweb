<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;

class NomorEmpat {

	public function getJson () {
		$data = Event::with('user')
					 ->get()
					 ->map(function($event) {
						 return [
							 'id' => $event->id,
							 'title' => $event->name . ' (' . $event->user->name . ')',
							 'start' => $event->start,
							 'end' => $event->end,
							 'color' => $event->user_id === Auth::id() ? '#2196F3' : '#9E9E9E'
						 ];
					 });
		return response()->json($data);
	}
}

?>