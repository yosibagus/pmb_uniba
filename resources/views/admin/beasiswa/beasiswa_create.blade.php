@extends('layout.template')

@section('content')
    <div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
        <h3 class="mb-sm-0 mb-1 fs-18">Beasiswa</h3>
        <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
            <li>
                <a href="index.html" class="text-decoration-none">
                    <i class="ri-home-2-line" style="position: relative; top: -1px;"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Tambah Beasiswa</span>
            </li>
        </ul>
    </div>

    <form class="row g-3 needs-validation" novalidate method="POST" enctype="multipart/form-data" action="">
        @csrf
        <div class="card bg-white border-0 rounded-10 mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center border-bottom pb-20 mb-20">
                    <h4 class="fw-semibold fs-18 mb-0">Form Tambah Beasiswa</h4>
                    <div class="d-sm-flex align-items-center">
                        <button type="submit"
                            class="border-0 mr-2 btn btn-primary py-2 px-3 px-sm-4 text-white fs-14 fw-semibold rounded-3">
                            <span class="d-block">
                                <i class="ri-check-line text-white"></i>
                                <span>Simpan</span>
                            </span>
                        </button>
                        &nbsp;
                        <a href="/beasiswa"
                            class="border-0 btn btn-success py-2 px-3 px-sm-4 text-white fs-14 fw-semibold rounded-3">
                            <span class="d-block">
                                <i class="ri-list-check text-white"></i>
                                <span>Daftar</span>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="nama_beasiswa" class="form-label label">Nama Beasiswa <small
                                class="text-danger">*</small></label>
                        <div class="position-relative">
                            <input type="text" class="form-control h-58 ps-5" id="nama_beasiswa" autocomplete="off"
                                value="" required name="nama_beasiswa" placeholder="Masukkan nama beasiswa...">
                            <div class="invalid-feedback">
                                Nama tidak boleh kosong
                            </div>
                            <i class="ri-edit-2-line position-absolute top-0 start-0 fs-20 text-gray-light ps-20"
                                style="top: 13px !important;"></i>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <label class="label">Banner Beasiswa <small class="text-danger">*</small></label>
                            <div class="form-control h-100 text-center position-relative p-4 p-lg-5">
                                <div class="product-upload">
                                    <label for="file-upload" class="file-upload mb-0">
                                        <span class="d-inline-block bg-body-bg rounded-10 position-relative ">
                                            <img id="blah" src="{{ asset('upload.png') }}" alt="your image"
                                                width="100%" />
                                        </span>
                                    </label>
                                    <input id="file-upload" required id="foto_beasiswa" name="foto_beasiswa"
                                        onchange="readURL(this);" type="file">
                                    <div class="invalid-feedback">
                                        Foto tidak boleh kosong
                                    </div>
                                    <i class="ri-image-add-line position-absolute top-0 start-0 fs-20 text-gray-light ps-20"
                                        style="top: 13px !important;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <label for="validationCustom01" class="form-label label">Deskripsi Beasiswa <small
                                    class="text-danger">*</small></label>
                            <textarea id="editor" placeholder="Masukkan deskipsi dari beasiswa" rows="6" name="deskripsi_beasiswa"
                                required></textarea>
                            <div class="invalid-feedback">
                                Dekripsi tidak boleh kosong
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle',
                    'ImageToolbar', 'ImageUpload'
                ],
                ckfinder: {
                    uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}"
                }
            })
            .catch(error => {
                console.error(error);
            });


        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
