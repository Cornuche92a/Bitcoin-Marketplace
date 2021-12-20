@php $pagename = 'Ajouter des fonds' @endphp
@extends('layouts.backend')
@section('content')
    <script type="text/javascript">
        function copy() {
            var button = document.getElementById("address_btn");
            var copyText = document.getElementById("address");
            copyText.select();
            document.execCommand("Copy");
            button.innerHTML = "<i class='fa fa-check'></i>";
        }
    </script>
    @if(session('paid'))
        <div class="toast-container position-absolute top-0 end-0 p-3">
            <!-- Toast Example 1 -->
            <div id="paid" class="toast fade hide" data-delay="4000" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <i class="fab fa-bitcoin text-success me-2"></i>
                    <strong class="me-auto">Paiement</strong>
                    <small class="text-muted">à l'instant</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{session('paid')}}
                </div>
            </div>
            <!-- END Toast Example 1 -->
        </div>
    @endif
    @if(session('unpaid'))
        <div class="toast-container position-absolute top-0 end-0 p-3">
            <!-- Toast Example 1 -->
            <div id="unpaid" class="toast fade hide" data-delay="4000" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <i class="fa fa-ban text-danger me-2"></i>
                    <strong class="me-auto">Paiement</strong>
                    <small class="text-muted">à l'instant</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{session('unpaid')}}
                </div>
            </div>
            <!-- END Toast Example 1 -->
        </div>
    @endif

    <div class="content content-full content-boxed"><!-- New Arrivals -->
        <h2 class="content-heading"><i class="fa fa-coins"></i> Créditer mon compte</h2>


    <div class="row">
        <div class="col-md-6">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title"><i class="fab fa-bitcoin"></i> Paiement</h3>
                    <div class="block-options">
                        <form action="{{route('payment.check')}}">
                        <button type="submit" onclick="window.location.reload()" class="btn btn-sm btn-success"><i class="si si-refresh"></i></button>
                        <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Déduits sur le montant envoyé" class="btn btn-sm btn-primary">Frais: ~5%</button>
                        </form>
                    </div>
                </div>
                <div class="block-content">

                    <p><strong>Créditez votre compte par Bitcoins !</strong></p>
                    <p>

                    @if(!isset($payments))

                    <form action="{{action('PaymentController@getaddr')}}" method="POST">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-lg btn-primary"><i class="fab fa-bitcoin"></i> Générer une adresse de dépôt Bitcoin</button>
                    </form>

                    @else

                        <center>
                        {{QrCode::size(210)->backgroundColor(31,41,55)->generate('bitcoin:'.$payments[0]->address)}}
                        </center>
                    <br>
                        <label class="form-label" for="address">Votre adresse de dépôt :</label>

                        <div class="input-group">
                            <input readonly type="email" class="form-control" name="address" id="address" value="{{$payments[0]->address}}" placeholder="Adresse BTC">
                            <button type="button" id="address_btn" onclick="copy()" class="btn btn-dark"><i class="far fa-copy"></i></button>
                        </div>

                        @endif
                    <br>
                    <p class="alert alert-dark fs-sm">
                        <i class="fa fa-fw fa-info me-1"></i>Dépôt minimum: 10€<small> <em> Montant libre </em></small>
                    </p>
                    <p class="alert alert-warning fs-sm">
                        <i class="fa fa-fw fa-info me-1"></i>Le montant vous sera automatiquement crédité après 2 confirmations sur le réseau Blockchain.
                    </p>
                    </p>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="block block-rounded table-responsive">
                <div class="block-header block-header-default table-responsive">
                    <h3 class="block-title">Transactions</h3>
                </div>
                <div class="block-content">

                    @if(isset($transactions))
                        <table class="table table-striped table-vcenter">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">état</th>
                                <th class="text-center" style="width: 100px;">Adresse</th>
                                <th class="text-center" style="width: 100px;">Montant</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transactions as $transaction)

                                <tr>
                                    <th class="text-center" scope="row">
                                        <!-- Transaction en cours -->
                                        @if($transaction->paid != 1)
                                        <div class="spinner-border text-primary" role="status"></div>
                                        @else
                                        <i class="fa fa-check"></i>
                                        @endif
                                    </th>
                                    <td class="fw-semibold fs-sm" style="font-family: monospace">
                                        <input disabled value="{{$transaction->address}}" class="form-control form-control-alt">
                                    </td>
                                    <td class="text-center" style="font-family: monospace">
                                        @if($transaction->amount_received != 0)
                                        {{$transaction->amount_received}} €
                                        @else
                                        --. €
                                        @endif
                                    </td>
                                    <!-- fin -->
                                </tr>
                            @endforeach
                            @else
                                <p><small>Vos transactions s'afficheront ici.</small></p>
                            @endif
                            </tbody>
                        </table>
                </div>
            </div>
            <div class="block block-rounded table-responsive">
                <div class="block-header block-header-default table-responsive">
                    <h3 class="block-title">PORTEFEUILLE</h3>
                </div>
                <div class="block-content">

                    <div class="block block-rounded d-flex flex-column h-100 mb-0">
                        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <div class="mb-0">
                                <dt class="fs-3 fw-bold">{{auth()->user()->amount}} €</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Solde</dd>
                            </div>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class="fa fa-wallet fs-3 text-primary"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
    </div>



@endsection
