@extends('dashboard.dashboard')

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
    <hr class="my-3" />
    {{-- @dd($payments) --}}
    <!-- Bordered Table -->
    <div class="card table-tontine">

        <div class="title-list">
            <h5 class="card-header">Mes cotisations</h5>
        </div>

        <div class="button-list">
            <button type="button" style="color: black" class="btn btn-outline-success btn-sm pull-right" data-bs-toggle="modal"
                data-bs-target="#basicModal">
                Nouveau
            </button>
        </div>
        <div class="col-lg-4 col-md-6">

        </div>
    </div>
    <div class="card-body">
        <div id="loader"></div>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tontine</th>
                        <th>Montant</th>
                        <th>Période</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>



                    @forelse ($payments as $payment)
                        <tr>
                            <td>{{ $payment->tontine->name_tontine }}</td>
                            <td>{{ $payment->payment_amount }}</td>
                            <td>{{ $payment->period }}</td>
                            
                            <td>
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
                            </td>
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
