@php $pagename = ' Support'; @endphp
@extends('layouts.backend')
@section('content')

    @if(session('sent'))
        <div class="toast-container position-absolute top-0 end-0 p-3">
            <!-- Toast Example 1 -->
            <div id="messagesent" class="toast fade hide" data-delay="4000" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <i class="si si-bubble text-primary me-2"></i>
                    <strong class="me-auto">Support</strong>
                    <small class="text-muted">à l'instant</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{session('sent')}}
                </div>
            </div>
            <!-- END Toast Example 1 -->
        </div>
    @endif
    @if(session('passend'))
        <div class="toast-container position-absolute top-0 end-0 p-3">
            <!-- Toast Example 1 -->
            <div id="messagesent" class="toast fade hide" data-delay="4000" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <i class="si si-bubble text-danger me-2"></i>
                    <strong class="me-auto">Support</strong>
                    <small class="text-muted">à l'instant</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{session('passend')}}
                </div>
            </div>
            <!-- END Toast Example 1 -->
        </div>
    @endif





    <div class="content content-full content-boxed">
        <h2 class="content-heading"><i class="fa fa-life-ring"></i> Support Jazonette et Vinsiuce</h2>

        <div class="block block-rounded">

            <!-- TICKETS BEGIN -->

            <div class="block-header block-header-default">
                <h3 class="block-title">Demandes ouvertes</h3>
            </div>
            <div class="block-content">
                <table class="table table-striped table-vcenter">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 30px;">#</th>
                        <th>Identifiant</th>
                        <th>Utilisateur</th>
                        <th class="d-none d-sm-table-cell" style="width: 20%;">etat</th>
                        <th class="text-center" style="width: 100px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($tickets->isEmpty())
                        <tr>
                            <td class="fw-semibold fs-sm">
                                #
                            </td>
                            <td class="fw-semibold fs-sm">
                                Aucun ticket
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Aucun</span>
                            </td>
                        </tr>
                    @else
                        @foreach($tickets as $ticket)
                            @if($ticket->state_id == 1)
                                <tr>
                                    <th class="text-center" scope="row"><img src="{{asset('assets/media/photos/')}}/{{$ticket->order->log->category->iconurl}}" style="height: {{$ticket->order->log->category->iconstylesize}}px"></th>
                                    <td class="fw-semibold fs-sm" style="font-family: monospace">
                                        {{$ticket->order->log->username_email_log}}
                                    </td>
                                    <td class="fw-semibold fs-sm">
                                        {{$ticket->order->user->username}}
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill {{$ticket->state->style}}">{{$ticket->state->name}}</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <form action="{{action('SupportAdmin@show')}}" method="POST">
                                                {{csrf_field()}}
                                                <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
                                                <button type="submit" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>

                            @endif
                        @endforeach
                    @endif
                    </tbody>



                </table>
            </div>
            <div class="block-content block-content-full bg-body-dark">

                {!! $tickets->links() !!}

            </div>

        </div>
        <!-- TICKETS END -->
        <!-- TICKETS BEGIN -->
        <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Demandes traitées</h3>
        </div>
        <div class="block-content">
            <table class="table table-striped table-vcenter">
                <thead>
                <tr>
                    <th class="text-center" style="width: 30px;">#</th>
                    <th>Identifiant</th>
                    <th>Utilisateur</th>
                    <th class="d-none d-sm-table-cell" style="width: 20%;">etat</th>
                    <th class="text-center" style="width: 100px;">Action</th>
                </tr>
                </thead>
                <tbody>
                @if($tickets->isEmpty())
                    <tr>
                        <td class="fw-semibold fs-sm">
                            #
                        </td>
                        <td class="fw-semibold fs-sm">
                            Aucun ticket
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Aucun</span>
                        </td>
                    </tr>
                @else
                    @foreach($tickets_closed as $ticket_closed)
                        @if($ticket_closed->state_id != 1)
                            <tr>
                                <th class="text-center" scope="row"><img src="{{asset('assets/media/photos/')}}/{{$ticket_closed->order->log->category->iconurl}}" style="height: {{$ticket->order->log->category->iconstylesize}}px"></th>
                                <td class="fw-semibold fs-sm" style="font-family: monospace">
                                    {{$ticket_closed->order->log->username_email_log}}
                                </td>
                                <td class="fw-semibold fs-sm">
                                    {{$ticket_closed->order->user->username}}
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill {{$ticket_closed->state->style}}">{{$ticket_closed->state->name}}</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <form action="{{action('SupportAdmin@show')}}" method="POST">
                                            {{csrf_field()}}
                                            <input type="hidden" name="ticket_id" value="{{$ticket_closed->id}}">
                                            <button type="submit" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled">
                                                <i class="fa fa-fw fa-eye"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endif

                </tbody>

            </table>

        </div>
            <div class="block-content block-content-full bg-body-dark">

                {!! $tickets_closed->links() !!}

            </div>
    </div>
    <!-- TICKETS END -->
        <!-- FORM BEGIN -->
@isset($conversations)

        <div class="content" id="content-message-ticket">
            <!-- Discussion -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Conversation</h3>
                    <div class="block-options">
                        <a class="btn-block-option me-2" href="#forum-reply-form">
                            <i class="fa fa-reply me-1"></i> Répondre
                        </a>
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                    </div>
                </div>

                <p class="alert alert-dark fs-sm">
                <th class="text-center" scope="row"><img src="{{asset('assets/media/photos/')}}/{{$conversations[0]->ticket->order->log->category->iconurl }}" style="height: {{$ticket->order->log->category->iconstylesize}}px"></th>   <b >{{$conversations[0]->ticket->order->log->category->name }}</b>   {{$conversations[0]->ticket->order->log->username_email_log }}:{{$conversations[0]->ticket->order->log->password_pin_log }}
                </p>

                <div class="block-content">
                    <table class="table table-borderless">
                        @foreach($conversations as $message)

                            <tr class="bg-body-light">
                                <td class="d-none d-sm-table-cell"></td>
                                <td class="fs-sm text-muted">

                                    <a class="fw-semibold">{{$message->user->username}}</a> le <span class="text-muted">{{$message->created_at}}</span>
                                </td>
                            </tr>

                            <tr>
                                <td class="d-none d-sm-table-cell text-center" style="width: 140px;">
                                    <p>
                                        <img class="img-avatar" src="{{ asset('assets/media/avatars/'.$message->user->avatar()->select('avatar')->first()->avatar) }}" alt="">
                                    <p class="fs-sm fw-medium">{{$message->user->username}}</p>
                                    <p class="fs-sm fw-medium">{{$message->user->orders()->count()}} achats</p>

                                    </p>
                                </td>
                                <td>
                                    <p>{{$message->message->message}} </p>

                                </td>
                            </tr>



                        @endforeach
                            <tr class="table-active" id="forum-reply-form">
                                <td class="d-none d-sm-table-cell"></td>
                                <td class="fs-sm text-muted">
                                    <a class="fw-semibold" >{{auth()->user()->username}}</a> Maintenant
                                </td>
                            </tr>
                            <tr>
                                <td class="d-none d-sm-table-cell text-center">
                                    <p>

                                        <img class="img-avatar" src="{{ asset('assets/media/avatars/'.auth()->user()->avatar()->select('avatar')->first()->avatar) }}" alt="">

                                    </p>
                                </td>
                                <td>
                                    <form action="{{action('SupportAdmin@action')}}" method="POST" >
                                            {{csrf_field()}}
                                        <div class="mb-4">
                                            <!-- CKEditor 5 Classic (js-ckeditor5-classic in Helpers.jsCkeditor5()) -->
                                            <!-- For more info and examples you can check out http://ckeditor.com -->
                                            <div id="js-ckeditor5-classic" style="display: none;"></div>

                                            <input type="hidden" name="ticket_id" value="{{$ticket_id}}">
                                        </div>
                                        <div class="ck ck-editor__main" role="presentation">
                                            <textarea class="form-control" id="message" name="message" rows="5" ></textarea>

                                        </div>


                                        <div class="mb-4">
                                            <br>
                                            <button name="action" value="reply" type="submit" class="btn btn-alt-primary">

                                                <i class="fa fa-reply me-1 opacity-50"></i> Répondre
                                            </button>
                                                <button name="action" value="close" type="submit" class="btn btn-alt-primary">

                                                    <i class="fa fa-reply me-1 opacity-50"></i> Fermer
                                                </button>
                                                <button name="action" value="closeRefund" type="submit" class="btn btn-alt-primary">

                                                    <i class="fa fa-reply me-1 opacity-50"></i> Répondre et rembourser
                                                </button>
                                                <button name="action" value="closeBan" type="submit" class="btn btn-alt-primary">

                                                    <i class="fa fa-reply me-1 opacity-50"></i> Fermer et bannir
                                                </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>

                    </table>
                </div>
            </div>
        </div>

                <!-- ENF FORM -->
        @endisset

    </div>


@stop
