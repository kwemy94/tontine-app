@extends('dashboard.layouts.app-dashboard')

@section('dashboard-title', 'Listes des tirages')

@section('dashboard-css')
    <style>
        .error {
            border-color: red !important;
        }

        .table-tirage {
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
    <div class="card table-tirage">

        <div class="title-list">
            <h5 class="card-header">Liste des tirages</h5>
        </div>

        <div class="button-list">
            <button type="button" style="color: black" class="btn btn-outline-success btn-sm pull-right" data-bs-toggle="modal"
                data-bs-target="#formTirage">
                Nouveau
            </button>
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
                        <th>Tontine</th>
                        <th>Ordre de passage</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>



                    @forelse ($tirages as $tirage)
                        <tr>
                            <td>{{ $tirage->name_tontine }}</td>
                            <td>{{ $tirage->order_of_passage }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" id="edit_{{ $tirage->id }}"
                                            data-url="{{ route('tirage.edit', $tirage->id) }}"
                                            onclick="editer({{ $tirage->id }})">
                                            <i class="bx bx-edit-alt me-1"></i> Edit</a>

                                        <form class="dropdown-item" action="{{ route('tirage.destroy', $tirage->id) }}"
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
                            <td colspan="3" style="text-align: center">
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
        @include('dashboard.tirage.create')
    </div>

    <div class="mt-3" id="body-edit"></div>

@endsection


