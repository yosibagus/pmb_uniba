@extends('layout.template')

@section('content')
    <div class="card bg-white border-0 rounded-10 mb-4">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center border-bottom pb-20 mb-20">
                <h4 class="fw-semibold fs-18 mb-0">Data Informasi</h4>
                <div class="d-sm-flex align-items-center">
                    <a href="/informasi/tambah"
                        class="border-0 btn btn-primary py-2 px-3 px-sm-4 text-white fs-14 fw-semibold rounded-3">
                        <span class="py-sm-1 d-block">
                            <i class="ri-add-line text-white"></i>
                            <span>Tambah Kategori</span>
                        </span>
                    </a>
                </div>
            </div>
            <div class="default-table-area members-list">
                <div class="table-responsive">
                    <table class="table align-middle" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($informasi as $get)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $get->nama_kategori }}</td>
                                    <td>
                                        @if ($get->status_post == 1)
                                            <i class="ri-checkbox-circle-fill text-success"></i>
                                        @else
                                            <i class="ri-close-circle-fill text-danger"></i>
                                        @endif
                                        <a
                                            href="/info/{{ $get->token_berita }}">{{ Str::substr($get->judul_berita, 0, 70) }}...</a>
                                        <br>
                                        <a target="blank" href="{{ asset('informasi') }}/{{ $get->foto_berita }}">
                                            <small>Lihat Foto &raquo;</small>
                                        </a>
                                    </td>
                                    <td>{{ date('d-m-Y', strtotime($get->tgl_berita)) }}</td>
                                    <td>
                                        @if ($get->status_post == 1)
                                            Ditampilkan
                                        @else
                                            Disembunyikan
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown action-opt">
                                            <button class="btn bg p-0" type="button" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i data-feather="more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end bg-white border box-shadow">
                                                <li>
                                                    <a class="dropdown-item" href="/informasi/{{ $get->token_berita }}">
                                                        <i data-feather="share-2"></i>
                                                        Detail
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="javascript:;">
                                                        <i data-feather="edit"></i>
                                                        Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <button class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#modal_del_{{ $get->id_berita }}">
                                                        <i data-feather="trash-2"></i>
                                                        Hapus
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                {{-- modal hapus --}}
                                <div class="modal fade" id="modal_del_{{ $get->id_berita }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel"><i
                                                        class="ri-error-warning-line"></i> Peringatan!</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin ingin menghapus Informasi <b>{{ $get->judul_berita }}</b>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary text-white"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <a href="/informasi/{{ $get->token_berita }}/hapus"
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
@endsection
