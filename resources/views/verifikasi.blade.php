@extends('layouts.home')
@section('title')
    Detail Kamar Kos
@endsection
@section('content')


{{-- <div class="row">
    <div class="col-mt-4">
    <h4>Hallo, minta admin untuk verifikasi akun mu</h4>
    </div>
</div> --}}

<div class="container-xxl py-5 mb-6" style="margin-bottom: 200px">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">Verifikasi</h6>
            <h3 class="mb-5">Hallo,<span class="text-primary"> minta admin untuk verifikasi akun mu</span></h4>
            <h6 class="mb-4">Chat di WhatsApp dengan +62 813-6550-5655</h6>
            <a class="btn btn-social btn btn-primary" href="https://api.whatsapp.com/send?phone=6281365505655&text=Assalamualikum+ada+kamar+kosong%3F" target="_blank">Chat admin<i class="fab fa-whatsapp" style="margin-left: 15px"></i></a>
        </div>
    </div>
</div>




@endsection