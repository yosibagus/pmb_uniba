@extends('layout.template')

@section('content')
    <div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
        <h3 class="mb-sm-0 mb-1 fs-18"> <i class="ri-calendar-line"></i> {{ $detail->tgl_berita }}</h3>
        <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
            <li>
                <a href="/info" class="text-decoration-none">
                    <i class="ri-home-2-line" style="position: relative; top: -1px;"></i>
                    <span>Informasi</span>
                </a>
            </li>
            <li>
                <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Details</span>
            </li>
        </ul>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card bg-white border-0 rounded-10 mb-4">
                <div class="card-body p-4">
                    <img src="{{ asset('informasi') }}/{{ $detail->foto_berita }}" class="mb-4" alt="blog">
                    <h3 class="fs-24 mb-2">{{ $detail->judul_berita }}</h3>
                    {!! $detail->isi_berita !!}
                </div>
            </div>
        </div>
    </div>
@endsection
