<div class="card-body">
    <div class="d-flex align-items-start align-items-sm-center gap-4">
        <img src="{{ isset($user->avatar)? asset('images/profil/'.$user->avatar) : asset('template/assets/img/avatars/1.png') }}" alt="user-avatar" class="d-block rounded" height="100"
            width="100" id="uploadedAvatar" />
        <div class="button-wrapper">
            <form action="{{ route('upload.avatar') }}" method="POST" enctype="multipart/form-data" id="formAvatar">
                @csrf
                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                    <span class="d-none d-sm-block">Upload new photo</span>
                    <i class="bx bx-upload d-block d-sm-none"></i>
                    <input type="file" id="upload" name="avatar" class="account-file-input" hidden accept="image/png, image/jpeg" />
                </label>
                <button type="submit" class="btn btn-outline-success mb-4" id="saveAvatar">
                    <i class="bx bx-reset d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Enregistrer</span>
                </button>
            </form>
            

            <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
        </div>
    </div>
</div>
