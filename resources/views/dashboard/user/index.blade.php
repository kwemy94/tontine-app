@extends('dashboard.layouts.app-dashboard')

@section('dashboard-title', 'Listes des utilisateurs')

@section('dashboard-css')
    <style>
        .error {
            border-bottom-color: red !important;
            color: #7b8a9a !important;
        }

        .table-user {
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
    <hr class="my-5" />
    <!-- Bordered Table -->
    <div class="card table-user">

        <div class="title-list">
            <h5 class="card-header">Liste des utilisateurs</h5>
        </div>

        <div class="button-list">
            <button type="button" style="color: black" class="btn btn-outline-success btn-sm pull-right" data-bs-toggle="modal"
                data-bs-target="#userForm">
                Nouveau
            </button>
        </div>
        <div class="col-lg-4 col-md-6">

        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Noms</th>
                        <th>Emails</th>
                        <th>Téléphone</th>
                        <th>Sexe</th>
                        <th>Résidence</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>



                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->sexe }}</td>
                            <td>{{ $user->residence }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('user.edit', $user->id) }}"><i
                                                class="bx bx-edit-alt me-1"></i> Edit</a>

                                        <form class="dropdown-item" action="{{ route('user.destroy', $user->id) }}"
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
                                Aucun utilisateur crée!
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
        <!-- Modal -->
        <form method="POST" action="{{ route('user.store') }}" class="modal fade" id="userForm" tabindex="-1"
            aria-hidden="true" data-bs-backdrop="static">
            @csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="user">Création d'un utilisateur</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="name" class="form-label">NOM </label>
                                <input type="text" id="name" class="form-control required" name="name"
                                    placeholder="Entrez votre nom" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="email" class="form-label">ADRESSE EMAIL </label>
                                <input type="text" id="email" class="form-control required" name="email"
                                    placeholder="Entrez votre adresse email" />
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="sexe" class="form-label">SEXE</label>
                                <input type="text" id="sexe" name="sexe" class="form-control required" />
                            </div>
                            <div class="col mb-0">
                                <label for="residence" class="form-label">RESIDENCE</label>
                                <input type="text" id="residence" name="residence" class="form-control required" />
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary" id="userSubmit">Enregistrer</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('dashboard-js')
    <script>
        $('#userSubmit').click((e) => {
            e.preventDefault();
            console.log('yes');
            if (!ControlRequiredFields($('#userForm .required'))) {
                return 0;
            }

            $('#userForm').submit();
        })

        $('#tontine_id').change(() => {
            let tontineId = $('#tontine_id').val();
            let currentTontine = $(`#tontine_${tontineId}`).val();

            $(`#payment_current`).attr('hidden', false);
            $('#payment_val').val(currentTontine);

        })
    </script>
@endsection
