@if (!Auth::user()->hasVerifiedEmail())
    {{-- // L'email n'est pas vérifié --}}
    @include('auth.verify-email')
@else
    @extends('dashboard.layouts.app-dashboard')

    @section('dashboard-css')

        <style>
            .profil {
                border-radius: 8px !important;
                border-color: #d9dee3 !important;
            }
        </style>

    @endsection

    @section('dashboard-title', 'Profile')

    @section('dashboard-content')

        <div class="container-xxl flex-grow-1 container-p-y">


            <div class="row">
                <div class="col-xl-2"></div>
                <div class="col-xl-8">
                    {{-- <h6 class="text-muted">Settings profil</h6> --}}
                    <div class="nav-align-top mb-4">
                        <ul class="nav nav-tabs nav-fill" role="tablist">
                            <li class="nav-item">
                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-justified-home" aria-controls="navs-justified-home"
                                    aria-selected="true">
                                    <i class="tf-icons bx bx-home"></i> Profil
                                </button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile"
                                    aria-selected="false">
                                    <i class="tf-icons bx bx-user"></i> Informations
                                </button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-justified-messages" aria-controls="navs-justified-messages"
                                    aria-selected="false">
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
                                @include('dashboard.profile.partials._update-password')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2"></div>
            </div>
            <!-- Tabs -->
        </div>
    @endsection

    @section('dashboard-js')
        <script>
            // $('#formAvatar').submit((e)=>{

            //   e.preventDefault();
            //   let avatar = $("#upload").val();
            //   let url = "{{ route('upload.avatar') }}";
            //   console.log(avatar);

            //   // Get Data form
            //   let data = new FormData(this);

            //   postData2(url, data, 'POST').then((res) =>{

            //   }).catch((err) => {

            //   });

            // });
        </script>
    @endsection
@endif
