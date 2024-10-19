@extends('dashboard.layouts.app-dashboard')

@section('dashboard-title', 'Mes cotisations')

@section('dashboard-css')
    <style>
        .error {
            border-color: red !important;
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
    {{-- @dd($payments) --}}
    <!-- Bordered Table -->
    <div class="card table-tontine">

        <div class="title-list">
            <h5 class="card-header">Mes tontines</h5>
        </div>

        <div class="button-list">
            <button type="button" style="color: black" class="btn btn-outline-success btn-sm pull-right" data-bs-toggle="modal"
                data-bs-target="#basicModal">
                Adhérer
            </button>
        </div>
        <div class="col-lg-4 col-md-6">

        </div>
    </div>
    <div class="card-body">
        <div id="loader"></div>
        <div class="row">
            <p>
                <span class="badge rounded-pill bg-success">Cotisation OK</span>
                <span class="badge rounded-pill bg-danger">Non cotisé</span>
                <span class="badge rounded-pill bg-primary">Retard de cotisation</span>
            </p>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tontine </th>
                        <th>Nom</th>
                        <th>Etat cotisation</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>



                    @forelse ($myTontines as $item)
                        <tr>
                            <td>{{ $item->tontine->name_tontine }}</td>
                            <td>{{ $item->nombre_de_nom }}</td>
                            <td>
                                <p>
                                    <span class="badge badge-center rounded-pill bg-primary">1</span>
                                    <span class="badge badge-center rounded-pill bg-danger">2</span>
                                    <span class="badge badge-center rounded-pill bg-success">3</span>
                                </p>
                            </td>

                            <td>
                                <div class="dropdown">
                                    <button type="button" class="p-0 btn dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" id="cotiser_{{ $item->id }}"
                                            data-url="{{ route('current-user.tontine', $item->id) }}"
                                            onclick="cotiser({{ $item->tontine->id }})" title="Cotiser">
                                            <i class="bx bx-money me-1"></i></a>
                                        <form class="dropdown-item" action="{{ route('current-user.tontine', $item->id) }}"
                                            method="post">
                                            @method('delete')
                                            @csrf
                                            <button class="bx bx-trash me-1" title="Quitter la tontine"
                                                style="color: red; border: none; background-color:white "></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="text-align: center">
                                Vous n'avez souscrit à aucune tontine
                            </td>
                        </tr>
                    @endforelse


                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-3">
        <!-- Modal create -->
        @include('dashboard.payment.my-tontine.create')
    </div>
    <div class="mt-3" id="tontiner_modal">
        {{--  Modal tontiner --}}

    </div>



@endsection

@section('dashboard-js')
    <script>
        $('#tontine').change(() => {
            let tontineId = $('#tontine').val();
            let currentTontine = $(`#tontine_${tontineId}`).val();

            $(`#tontine_current`).attr('hidden', false);
            $('#tontine_val').val(currentTontine);

        })
        $('#saveTontine').click((e) => {
            e.preventDefault();
            if (!ControlRequiredFields($('#basicModal .required'))) {
                return 0;
            }
            $('#saveTontine').attr('disabled', true);
            $('#basicModal').submit();
        })


        function cotiser(tontineId){
            console.log(tontineId);
            let url = '{{route("my-current-tontine.tontiner", "")}}'+'/'+ tontineId;

            $('#tontiner_modal').empty();

            postData(url, {}, 'post').then((res)=>{
                console.log(res);
                if(res.success){
                    $('#tontiner_modal').html(res.view);
                    $('#paymentForm').modal('show');
                }
            })

        }

    </script>
@endsection
