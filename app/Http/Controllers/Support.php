<?php

namespace App\Http\Controllers;

use App\Models\messages;
use App\Models\notification;
use App\Models\ticket_conversation;
use App\Models\ticket_description;
use App\Models\ticket_message;
use App\Models\ticket_response;
use App\Models\tickets;
use Illuminate\Http\Request;

class Support extends Controller
{


    public function index()
    {



            $tickets = tickets::where(['user_id' => auth()->user()->id])->orderBy('created_at', 'asc')->get();
            return view('support', ['tickets' => $tickets]);

    }

    public function show(Request $request)
    {

        $request->validate([
            'ticket_id' => 'required'
        ]);


            if (tickets::where(['user_id' => auth()->user()->id, 'id' => $request->ticket_id])->exists()) {

                $tickets = tickets::where(['user_id' => auth()->user()->id])->get();
                $ticket_conversations = ticket_conversation::where(['ticket_id' => $request->ticket_id])->orderBy('created_at', 'asc')->get();
                return view('support', ['tickets' => $tickets, 'conversations' => $ticket_conversations, 'concern'=>$request->ticket_id]);
            } else {
                return redirect()->route('dashboard'); // BANNIR L'UTILISATEUR A L'AVENIR
            }

    }

    public function submit(Request $request)
    {
        $request->validate([
            'order_id' => 'required|max:255|exists:orders,id',
            'text' => 'required|max:255'
        ]);

        $tickets = tickets::where(['user_id' => auth()->user()->id, 'order_id' => $request->order_id])->first();


        if (empty($tickets)) {

            $ticket_create = new tickets();
            $ticket_create->order_id = $request->order_id;
            $ticket_create->user_id  = auth()->user()->id;
            $ticket_create->save();

            $ticket_message = new ticket_message();
            $ticket_message->message = $request->text;
            $ticket_message->save();

            ticket_conversation::create([
                'ticket_id' => $ticket_create->id,
                'message_id' => $ticket_message->id,
                'user_id' => auth()->user()->id
            ]);

            return redirect()->route('orders')->with(['sent' => 'Votre demande à bien été prise en compte, vous pouvez consulter son êtat dans la section Support.']);

        } else {
            return redirect()->route('orders')->with(['unsent' => 'Vous avez déja une demande en cours concernant cet abonnement.']);
        }


    }


    public function reply(Request $request)
    {
        $request->validate([
            'message' => 'required'
        ]);


        $ticket_state = tickets::where(['id' => $request->ticket_id, 'user_id' => auth()->user()->id])->firstorfail();


            if ($ticket_state->state_id == 1) {
                if (empty($ticket_state->conversation()->get())) {
                    view('support');
                } else {


                    $ticket_message = new ticket_message();
                    $ticket_message->message = $request->message;
                    $ticket_message->save();

                    $ticket_conversation = new ticket_conversation();
                    $ticket_conversation->ticket_id    =   $request->ticket_id;
                    $ticket_conversation->message_id    =   $ticket_message->id;
                    $ticket_conversation->user_id   =   auth()->user()->id;
                    $ticket_conversation->save();

                    return redirect()->route('support')->with(['sent' => 'Votre message à bien été envoyé au support.']);
                }
            }
            else {

                echo 'Bonsoir non';

            }

    }



}
