@extends('dashboard.layouts.app-dashboard')

@section('dashboard-title', 'Listes des tontines')

@section('dashboard-content')
    <hr class="my-5" />
    <!-- Bordered Table -->
    <div class="card">

        <h5 class="card-header">Liste des tontines</h5>

        <div class="col-lg-4 col-md-6">
            <button type="button" style="color: black" class="btn btn-outline-success btn-sm pull-right" data-bs-toggle="modal"
                data-bs-target="#basicModal">
                Nouveau
            </button>

        </div>
    </div>
    <div class="card-body">
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
                            <td>{{ $tontine->cycle }}</td>
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
                                        <a class="dropdown-item" href="{{ route('tontine.edit', $tontine->id) }}"><i
                                                class="bx bx-edit-alt me-1"></i> Edit</a>

                                        <form class="dropdown-item" action="{{ route('tontine.destroy', $tontine->id) }}"
                                            method="DELETE">
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
        <!-- Modal -->
        <form method="POST" action="{{ route('tontine.store') }}"
        class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
            @csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Création d'une tontine</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="name_tontine" class="form-label">NOM DE LA TONTINE </label>
                                <input type="text" id="name_tontine" class="form-control" name="name_tontine"
                                    placeholder="Entrez le nom de la tontine" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="cycle" class="form-label">Cycle</label>
                                <select class="form-select" id="cycle" name="cycle"
                                    aria-label="Default select example">
                                    <option selected="" disabled>Choisir le cycle</option>
                                    <option value="1">Journalier</option>
                                    <option value="2">Hebdomadaire</option>
                                    <option value="3">Mensuel</option>
                                    <option value="4">Trimestriel</option>
                                    <option value="5">Semestriel</option>
                                </select>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="start_date" class="form-label">DATE DE DEBUT</label>
                                <input type="date" id="start_date" name="start_date" class="form-control" />
                            </div>
                            <div class="col mb-0">
                                <label for="end_date" class="form-label">DATE DE FIN</label>
                                <input type="date" id="end_date" name="end_date" class="form-control" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <label for="amount_tontine" class="form-label">MONTANT DE LA TONTINE </label>
                                <input type="number" id="amount_tontine" name="amount_tontine" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
