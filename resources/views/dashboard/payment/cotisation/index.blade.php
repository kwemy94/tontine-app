@extends('dashboard.layouts.app-dashboard')

@section('dashboard-title', 'Mes cotisations')

@section('dashboard-css')
    <style>
        .error {
            border-color: red !important;
        }

        .table-tontine {
            margin: 0 2% 0 2%;
            display: inline-block;
        }

        .button-list {
            float: right;
            margin: 2%;
        }

        .title-list {
            float: left;
        }
    </style>
@endsection

@section('dashboard-content')
    <hr class="my-1" />
    {{-- @dd($payments) --}}
    <!-- Bordered Table -->
    <div class="card table-tontine">

        <div class="title-list">
            <h5 class="card-header">Mes versements de cotisation</h5>
        </div>

        {{-- <div class="button-list">
            <button type="button" style="color: black" class="btn btn-outline-success btn-sm pull-right" data-bs-toggle="modal"
                data-bs-target="#basicModal">
                Tontiner
            </button>
        </div>
        <div class="col-lg-4 col-md-6"> --}}

        </div>
    </div>
    <div class="card-body">
        <div id="loader"></div>
        <div class="table-responsive text-nowrap">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>Tontine</th>
                        <th>Montant Versé</th>
                        <th>Période</th>
                        <th>Date de versement</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>



                    @forelse ($payments as $payment)
                        <tr>
                            <td>{{ isset($payment->tontine->name_tontine)? $payment->tontine->name_tontine :'' }}</td>
                            <td>{{ $payment->payment_amount }}</td>
                            <td>{{ $payment->period }}</td>
                            <td>{{ $payment->created_at }}</td>
                            <td style="color: black;">
                                @if (strtolower($payment->status) == 'pending')
                                    <span class="badge bg-label-warning me-1">{{ $payment->status }}</span>
                                @endif
                                @if ($payment->status == 'SUCCESSFUL')
                                    <span class="badge bg-label-success me-1">{{ $payment->status }}</span>
                                @endif
                                @if ($payment->status == 'FAILED')
                                    <span class="badge bg-label-danger me-1">{{ $payment->status }}</span>
                                @endif
                                @if ($payment->status == null)
                                    <span class="">-</span>
                                @endif
                            </td>

                            {{-- <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">

                                        <form class="dropdown-item" action="{{ route('payments.destroy', $payment->id) }}"
                                            method="post">
                                            @method('delete')
                                            @csrf
                                            <button class="bx bx-trash me-1"
                                                style="color: red; border: none; background-color:white "></button>
                                        </form>
                                    </div>
                                </div>
                            </td> --}}
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="text-align: center">
                                Aucun paiement réalisé
                            </td>
                        </tr>
                    @endforelse


                </tbody>
            </table>
        </div>
    </div>

@endsection

