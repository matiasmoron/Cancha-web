<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class MailController extends Controller
{
	public function send()
	{

      $user = Auth::user();

      $data = ["email" => $user->email, "subject" => "Reserva Exitosa", "name" => $user->name, "body" =>"Se registro tu reserva."];

      
      //se envia el array y la vista lo recibe en llaves individuales {{ $email }} , {{ $subject }}...
      \Mail::send('emails.message', $data,  function($message) use ($user)
      {
          $message->from($user->email, $user->name);

          //asunto
          $message->subject("Reserva Exitosa");
 
          //receptor
          $message->to("tucancha@noreplay.com", "Tu Cancha");
 
      });
      return redirect("usuarios/turno");
  }
}
