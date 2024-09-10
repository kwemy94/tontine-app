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
    <hr class="my-3" />
    <!-- Bordered Table -->
    <div class="card table-tontine">

        <div class="title-list">
            <h5 class="card-header">Liste des payements</h5>
        </div>

        {{-- <div class="button-list">
            <button type="button" style="color: black" class="btn btn-outline-success btn-sm pull-right" data-bs-toggle="modal"
                data-bs-target="#paymentForm">
                Effectuer un payement
            </button>
        </div> --}}
        <div class="col-lg-4 col-md-6">

        </div>
    </div>
    <div class="card-body">
        <div id="loader"></div>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Mes tontines</th>
                        <th>Montant</th>
                        <th>Période</th>
                        <th>Reférence</th>
                        <th>Numéro de téléphone</th>

                    </tr>
                </thead>
                <tbody>



                    @forelse ($payments as $paiement)
                        <tr>
                            <td>{{ $paiement->tontine->name_tontine }}</td>
                            <td>{{ $paiement->tontine->amount_tontine }}</td>
                            <td>{{ $paiement->period }}</td>
                            <td>{{ $paiement->reference }}</td>
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
    <!--/ Bordered Table -->

    {{-- <div class="mt-3">
        <!-- Modal create -->
        @include('dashboard.payment.create')
    </div> --}}

    <div class="mt-3" id="body-edit"></div>

@endsection

@section('dashboard-js')
    <script>
        $('#paymentSubmit').click((e) => {
            e.preventDefault();
            console.log('yes');
            if (!ControlRequiredFields($('#paymentForm .required'))) {
                return 0;
            }

            $('#paymentForm').submit();
        })

        $('#tontine_id').change(() => {
            let tontineId = $('#tontine_id').val();
            let currentTontine = $(`#tontine_${tontineId}`).val();

            $(`#payment_current`).attr('hidden', false);
            $('#payment_val').val(currentTontine);

        })
        // function editer(id) {
        //     let url = $('#edit_' + id).data('url');

        //     let data = {};
        //     console.log(url, data);
        //     $('#loader').css('display', 'block');
        //     $('#loader').html(
        //         '<div class="text-center"><i style="z-index: 5000; color:green;font-size:30px;">Chargement....</i></div>'
        //     );
        //     $.ajax({
        //         url,
        //         data,
        //         success: (data) => {
        //             console.log(data);
        //             // $('#edit_method').css('display', 'blog');
        //             if (data.success) {
        //                 $('#body-edit').html(data.view)
        //                 $('#basicModal_edit').modal('show');
        //                 $('#loader').css('display', 'none');
        //             } else {

        //             }
        //         },
        //         error: (xhr, exception) => {
        //             $('#loader').css('display', 'none');
        //         }
        //     })
        // }
    </script>
@endsection
