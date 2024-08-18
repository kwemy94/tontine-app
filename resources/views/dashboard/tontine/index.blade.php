@extends('dashboard.layouts.app-dashboard')

@section('dashboard-title', 'Listes des tontines')

@section('dashboard-css')
    <style>
        .error{
            border-color: red !important;
        }
        .table-tontine{
            margin: 0 2% 0 2%;
            display: inline-block;
        }
        .button-list{
            float: right;
            margin: 2%;
        }
        .title-list{
            float: left;
        }
    </style>
@endsection

@section('dashboard-content')
    <hr class="my-3" />
    <!-- Bordered Table -->
    <div class="card table-tontine">

        <div class="title-list">
            <h5 class="card-header">Liste des tontines</h5>
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
                        <th>Nom de la tontine</th>
                        <th>Cycle</th>
                        <th>Date de début</th>
                        <th>Date de fin</th>
                        <th>Ordre de passage</th>
                        <th>Montant de la tontine</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>



                    @forelse ($tontines as $tontine)
                        <tr>
                            <td>{{ $tontine->name_tontine }}</td>
                            <td>{{ $tontine->cycle->intitule }}</td>
                            <td>{{ $tontine->start_date }}</td>
                            <td>{{ $tontine->end_date }}</td>
                            <td>{{ $tontine->order_of_passage }}</td>
                            <td>{{ $tontine->amount_tontine }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" id="edit_{{ $tontine->id }}"
                                        data-url="{{ route('tontine.edit', $tontine->id) }}"
                                        onclick="editer({{ $tontine->id }})">
                                        <i class="bx bx-edit-alt me-1"></i> Edit</a>

                                        <form class="dropdown-item" action="{{ route('tontine.destroy', $tontine->id) }}"
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
                            <td colspan="7" style="text-align: center">
                                Aucune tontine créée
                            </td>
                        </tr>
                    @endforelse


                </tbody>
            </table>
        </div>
    </div>
    </div>
    <!--/ Bordered Table -->

    <div class="mt-3">
        <!-- Modal create -->
        @include('dashboard.tontine.create')
    </div>

    <div class="mt-3" id="body-edit"></div>

@endsection

@section('dashboard-js')
    <script>
        $('#saveTontine').click((e)=>{
            e.preventDefault();
            console.log('yes');
            let startD = $('#start_date').val();
            let endD = $('#end_date').val();
            if (!ControlRequiredFields($('#basicModal .required'))) {
                return 0;
            }

            if (new Date(endD) <= new Date(startD)) {
                $('#errorDate').css({'display': 'block'})
                return 0;
            }
            $('#errorDate').css({'display': 'none'});

            $('#basicModal').submit();
        })

        function editer(id) {
            let url = $('#edit_' + id).data('url');

            let data = {};
            console.log(url, data);
            $('#loader').css('display', 'block');
            $('#loader').html(
                '<div class="text-center"><i style="z-index: 5000; color:green;font-size:30px;">Chargement....</i></div>'
                );
            $.ajax({
                url,
                data,
                success: (data) => {
                    console.log(data);
                    // $('#edit_method').css('display', 'blog');
                    if (data.success) {
                        $('#body-edit').html(data.view)
                        $('#basicModal_edit').modal('show');
                        $('#loader').css('display', 'none');
                    } else {

                    }
                },
                error: (xhr, exception) => {
                    $('#loader').css('display', 'none');
                }
            })
        }
    </script>
@endsection
