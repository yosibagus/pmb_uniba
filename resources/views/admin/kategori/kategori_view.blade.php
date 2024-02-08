@extends('layout.template')

@section('content')
    <div class="card bg-white border-0 rounded-10 mb-4">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center border-bottom pb-20 mb-20">
                <h4 class="fw-semibold fs-18 mb-0">Kategori Informasi</h4>
                <div class="d-sm-flex align-items-center">
                    <button class="border-0 btn btn-primary py-2 px-3 px-sm-4 text-white fs-14 fw-semibold rounded-3"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        <span class="py-sm-1 d-block">
                            <i class="ri-add-line text-white"></i>
                            <span>Tambah Kategori</span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="default-table-area members-list">
                <div class="table-responsive">
                    <table class="table align-middle" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Jumlah Informasi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $get)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        {{ $get['nama_kategori'] }} <br>
                                        <small class="text-primary">Created at : {{ $get['created_at'] }}</small>
                                    </td>
                                    <td>{{ $get['jumlah'] }}</td>
                                    <td>
                                        <div class="dropdown action-opt">
                                            <button class="btn bg p-0" type="button" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i data-feather="more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end bg-white border box-shadow">
                                                <li>
                                                    <button class="dropdown-item" data-bs-toggle="offcanvas"
                                                        data-bs-target="#canvasedit{{ $get['id_kategori'] }}"
                                                        aria-controls="canvasedit{{ $get['id_kategori'] }}">
                                                        <i data-feather="edit-3"></i>
                                                        Edit
                                                    </button>
                                                </li>
                                                <li>
                                                    <button class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#modal_hapus_{{ $get['id_kategori'] }}">
                                                        <i data-feather="trash-2"></i>
                                                        Remove
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                {{-- canvas edit --}}
                                <div class="offcanvas offcanvas-end" tabindex="-1" id="canvasedit{{ $get['id_kategori'] }}"
                                    aria-labelledby="offcanvasRightLabel">
                                    <div class="offcanvas-header border-bottom p-4">
                                        <h5 class="offcanvas-title fs-18 mb-0" id="offcanvasRightLabel">Edit Kategori
                                            <span class="text-primary">{{ $get['nama_kategori'] }}</span>
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body p-4">
                                        <form method="POST" action="/kategori/{{ $get['id_kategori'] }}/edit">
                                            @csrf
                                            <div class="form-group mb-4">
                                                <label class="label">Nama Kategori</label>
                                                <input type="text" required class="form-control text-dark"
                                                    name="nama_kategori" value="{{ $get['nama_kategori'] }}"
                                                    placeholder="Masukkan kategori informasi">
                                            </div>
                                            <div class="form-group d-flex gap-3">
                                                <button class="btn btn-primary text-white fw-semibold py-2 px-2 px-sm-3">
                                                    <span class="py-sm-1 d-block">
                                                        <span>Simpan Perubahan</span>
                                                    </span>
                                                </button>
                                                <button type="button" class="btn btn-danger text-white"
                                                    data-bs-dismiss="offcanvas" aria-label="Close">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                {{-- modal hapus --}}
                                <div class="modal fade" id="modal_hapus_{{ $get['id_kategori'] }}"
                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel"><i
                                                        class="ri-error-warning-line"></i> Peringatan!</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin ingin menghapus Kategori <b>{{ $get['nama_kategori'] }}</b>
                                                <br><br>
                                                <i><small class="text-danger">Menghapus kategori juga akan menghapus data
                                                        informasi yang ada pada kategori tersebut</small></i>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary text-white"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <a href="/kategori/{{ $get['id_kategori'] }}/hapus"
                                                    class="btn btn-danger text-white">Ya! Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom p-4">
            <h5 class="offcanvas-title fs-18 mb-0" id="offcanvasRightLabel">Tambah Kategori</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-4">
            <form method="POST" action="">
                @csrf
                <div class="form-group mb-4">
                    <label class="label">Nama Kategori</label>
                    <input type="text" required class="form-control text-dark" name="nama_kategori"
                        placeholder="Masukkan kategori informasi">
                </div>
                <div class="form-group d-flex gap-3">
                    <button class="btn btn-primary text-white fw-semibold py-2 px-2 px-sm-3">
                        <span class="py-sm-1 d-block">
                            <i class="ri-add-line text-white"></i>
                            <span>Simpan Data</span>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
