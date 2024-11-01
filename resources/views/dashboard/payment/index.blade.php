@extends('dashboard.layouts.app-dashboard')

@section('dashboard-title', 'Listes des payements')

@section('dashboard-css')
    <style>
        .error {
            border-bottom-color: red !important;
            color: #7b8a9a !important;
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
    <!-- Bordered Table -->
    <div class="card table-tontine">

        <div class="title-list">
            <h5 class="card-header">Liste des payements</h5>
        </div>

        <div class="col-lg-4 col-md-6">

        </div>
    </div>
    <div class="card-body">
        <div id="loader"></div>
        <div class="table-responsive text-nowrap">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>Mes tontines</th>
                        <th>Montant</th>
                        <th>Période</th>
                        <th>Statut</th>
                        <th>Reférence</th>
                        <th>Numéro de téléphone</th>

                    </tr>
                </thead>
                <tbody>



                    @forelse ($payments as $paiement)
                        @php
                            $ref = json_decode($paiement->reference, true);
                        @endphp
                        <tr>
                            <td>{{ $paiement->tontine->name_tontine }}</td>
                            <td>{{ $paiement->tontine->amount_tontine }}</td>
                            <td>{{ $paiement->period }}</td>
                            <td>
                                @isset($ref['status'])
                                    @php
                                        $status = ($ref['status'] == "FAILED")? 'danger' : (($ref['status'] == "SUCCESSFUL")? 'success':'warning')
                                    @endphp
                                    
                                    <span class="badge bg-label-{{ $status }} me-1">{{ isset($ref['status']) ? $ref['status'] : '-' }}</span>
                                @endisset
                            </td>
                            <td>{{ isset($ref['reference']) ? $ref['reference'] : '-' }}</td>
                            <td>{{ $paiement->phone_number }}</td>


                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center">
                                Aucun paiement effectué
                            </td>
                        </tr>
                    @endforelse


                </tbody>
            </table>
        </div>
    </div>
    </div>

    <div class="mt-3" id="body-edit"></div>

@endsection

@section('dashboard-js')
    <script>
        $('#integrerTontine').click((e) => {
            e.preventDefault();
            console.log('yes');
            if (!ControlRequiredFields($('#adhererTontine .required'))) {
                return 0;
            }

            $('#adhererTontine').submit();
        })

        $('#tontine_id').change(() => {
            let tontineId = $('#tontine_id').val();
            let currentTontine = $(`#tontine_${tontineId}`).val();

            $(`#payment_current`).attr('hidden', false);
            $('#payment_val').val(currentTontine);

        })
    </script>
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
@endsection
