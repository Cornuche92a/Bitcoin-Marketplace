<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\notification;
use App\Models\ticket_conversation;
use App\Models\ticket_message;
use App\Models\tickets;
use App\Models\User;
use Illuminate\Http\Request;

class SupportAdmin extends Controller
{
    public function index()
    {
            if (auth()->user()->admin == 1) {
                $tickets = tickets::orderBy('created_at', 'asc')->paginate(20);
                $tickets_closed = tickets::where('state_id','!=','1')->orderBy('created_at','asc')->paginate(20);
                return view('support_admin', ['tickets' => $tickets], compact('tickets_closed'));
            } else {
                return redirect()->route('dashboard'); // BAN LUTILISATEUR A LAVENIR
            }
        }


        public function show(Request $request){

                if (tickets::where(['id' => $request->ticket_id])->exists() && auth()->user()->admin == 1) {
                    $tickets = tickets::orderBy('created_at','asc')->paginate(20);
                    $tickets_closed = tickets::where('state_id','!=','1')->orderBy('created_at','asc')->paginate(20);
                    $ticket_conversations = ticket_conversation::where(['ticket_id' => $request->ticket_id])->orderBy('created_at', 'asc')->get();
                    return view('support_admin', ['ticket_id'=>$request->ticket_id,'tickets' => $tickets,'conversations' => $ticket_conversations],compact('tickets_closed'));
                } else {
                    return redirect()->route('supportadmin.index');
                }



        }


        public function action(Request $request)
        {
            if (auth()->user()->admin == 1) {

                if ($request->action == "reply") {

                    $request->validate([
                        'message' => 'required'
                    ]);

                    $ticket_message = new ticket_message();
                    $ticket_message->message = $request->message;
                    $ticket_message->save();

                    $ticket_conversation = new ticket_conversation();
                    $ticket_conversation->ticket_id = $request->ticket_id;
                    $ticket_conversation->message_id = $ticket_message->id;
                    $ticket_conversation->user_id = auth()->user()->id;
                    $ticket_conversation->save();

                    $notification = new notification();
                    $notification->user_id = tickets::select('user_id')->where(['id' => $request->ticket_id])->firstorfail()->user_id;
                    $notification->notification_id = 1;
                    $notification->save();

                    return redirect()->route('supportadmin.index')->with(['sent' => 'Ticket traité.']);

                }
                    if ($request->action == "close") {
                        if (auth()->user()->admin == 1) {
                            if($request->message != ''){

                                $ticket_message = new ticket_message();
                                $ticket_message->message = $request->message;
                                $ticket_message->save();

                                $ticket_conversation = new ticket_conversation();
                                $ticket_conversation->ticket_id = $request->ticket_id;
                                $ticket_conversation->message_id = $ticket_message->id;
                                $ticket_conversation->user_id = auth()->user()->id;
                                $ticket_conversation->save();

                                $notification = new notification();
                                $notification->user_id = tickets::select('user_id')->where(['id' => $request->ticket_id])->first()->user_id;
                                $notification->notification_id = 1;
                                $notification->save();

                                $ticket = tickets::where('id',$request->ticket_id)->firstorfail();
                                $ticket->state_id=2;
                                $ticket->save();

                                return  redirect()->route('supportadmin.index')->with('sent' , 'Ticket traité.');

                            }
                            else {

                                $ticket = tickets::where('id',$request->ticket_id)->firstorfail();
                                $ticket->state_id=2;
                                $ticket->save();


                                return redirect()->route('supportadmin.index')->with('sent' , 'Ticket traité.');
                            }

                        } else {
                            echo 'Bonsoir non';
                        }
                    }
                        if ($request->action == "closeRefund") {
                            if($request->message != ''){

                                $ticket_message = new ticket_message();
                                $ticket_message->message = $request->message;
                                $ticket_message->save();


                                $ticket_conversation = new ticket_conversation();
                                $ticket_conversation->ticket_id = $request->ticket_id;
                                $ticket_conversation->message_id = $ticket_message->id;
                                $ticket_conversation->user_id = auth()->user()->id;
                                $ticket_conversation->save();

                                $notification = new notification();
                                $notification->user_id = tickets::select('user_id')->where(['id' => $request->ticket_id])->first()->user_id;
                                $notification->notification_id = 1;
                                $notification->save();

                            }
                            else {

                                $ticket = tickets::where('id', $request->ticket_id)->firstorfail();

                                $notification = new notification();
                                $notification->user_id = tickets::select('user_id')->where(['id' => $request->ticket_id])->first()->user_id;
                            }
                            $ticket = tickets::where('id', $request->ticket_id)->firstorfail();
                            $user = User::where(['id' => $ticket->user_id])->firstorfail();
                            $order = \App\Models\Order::where('id', $ticket->order_id)->firstorfail();

                            if($ticket->order->states_id != 3 && $ticket->state_id != 3) {
                                $ticket->state_id = 3;
                                $ticket->save();
                                $order->states_id = 3;
                                $order->save();
                                $user->increment('amount', $ticket->order->log->category->price);

                                $notification->notification_id = 2;
                                $notification->save();

                                return redirect()->route('supportadmin.index')->with(['sent' => 'Ticket traité.']);

                            }
                            else {
                                return redirect()->route('supportadmin.index')->with('passend', 'Tu veut nous faire perdre des sous ou quoi fdp ? tu la déja remboursé.');
                            }


                        }
                if ($request->action == "closeBan") {

                    $ticket = tickets::where('id','=',$request->ticket_id)->firstorfail();
                    $user = User::where(['id'=>$ticket->user_id])->firstorfail();
                    $user->delete();

                    return view('support_admin')->with(['sent' => 'Fils de pute banni.']);
                }
            }


                    else{
                            echo 'Bonsoir non';
                        }

     }



}


