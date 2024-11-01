@extends('dashboard.layouts.app-dashboard')

@section('dashboard-title', 'Profile')

@section('dashboard-content')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Profile') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('dashboard.profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('dashboard.profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('dashboard.profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    <div class="container-xxl flex-grow-1 container-p-y">
        

        <div class="row">
            <div class="col-xl-2"></div>
          <div class="col-xl-8">
            {{-- <h6 class="text-muted">Settings profil</h6> --}}
            <div class="nav-align-top mb-4">
              <ul class="nav nav-tabs nav-fill" role="tablist">
                <li class="nav-item">
                  <button
                    type="button"
                    class="nav-link active"
                    role="tab"
                    data-bs-toggle="tab"
                    data-bs-target="#navs-justified-home"
                    aria-controls="navs-justified-home"
                    aria-selected="true"
                  >
                    <i class="tf-icons bx bx-home"></i> Profil
                  </button>
                </li>
                <li class="nav-item">
                  <button
                    type="button"
                    class="nav-link"
                    role="tab"
                    data-bs-toggle="tab"
                    data-bs-target="#navs-justified-profile"
                    aria-controls="navs-justified-profile"
                    aria-selected="false"
                  >
                    <i class="tf-icons bx bx-user"></i> Informations
                  </button>
                </li>
                <li class="nav-item">
                  <button
                    type="button"
                    class="nav-link"
                    role="tab"
                    data-bs-toggle="tab"
                    data-bs-target="#navs-justified-messages"
                    aria-controls="navs-justified-messages"
                    aria-selected="false"
                  >
                    <i class="tf-icons bx bx-message-square"></i> Sécurité
                  </button>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
                  @include('dashboard.profile.partials._update-avatar')
                </div>

                <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
                  @include('dashboard.profile.partials._update-profile-information')
                </div>
                
                <div class="tab-pane fade" id="navs-justified-messages" role="tabpanel">
                  <p>
                    Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon gummies
                    cupcake gummi bears cake chocolate.
                  </p>
                  <p class="mb-0">
                    Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie brownie cake. Sweet
                    roll icing sesame snaps caramels danish toffee. Brownie biscuit dessert dessert. Pudding jelly
                    jelly-o tart brownie jelly.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-2"></div>
        </div>
        <!-- Tabs -->
    </div>
    {{-- <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link active" href="#"><i class="bx bx-bell me-1"></i>
                            Sécurité</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><i
                                class="bx bx-link-alt me-1"></i> Delete Account</a>
                    </li>
                </ul>
                <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{ asset('template/assets/img/avatars/1.png') }}" alt="user-avatar"
                                class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" class="account-file-input" hidden
                                        accept="image/png, image/jpeg" />
                                </label>
                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button>

                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        
                    </div>
                    <!-- /Account -->
                </div>
                
            </div>
        </div>
    </div> --}}
@endsection
