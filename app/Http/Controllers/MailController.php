<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class MailController extends Controller
{
	public function send(Request $request)
	{

      $data = $request->all();

      $user = Auth::user();
 
      //se envia el array y la vista lo recibe en llaves individuales {{ $email }} , {{ $subject }}...
      \Mail::send('emails.message', $data,  function($message) use ($request)
      {
          $message->from($request->email, $request->name);

          //asunto
          $message->subject($request->subject);
 
          //receptor
          $message->to($user->email, $user->name);
 
      });
      return redirect("usuarios/turno");
  }
}
