@extends('layouts.app')
@section('title','WhatsApp Link Generator')
@section('styles')
<style>
    #qrCode img{
        margin-right: auto;
        margin-left: auto;
        max-width: 100%;
        height: auto;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.css">
@endsection
@section('bg_color','bg-whatsapp')
@section('seo')
<meta name="description" content="WhatsApp Link Generator adalah alat yang inovatif dan efisien yang dirancang khusus untuk memudahkan komunikasi Anda melalui WhatsApp. Dengan alat ini, Anda dapat membuat tautan khusus yang akan mengarahkan orang langsung ke obrolan WhatsApp dengan Anda">
<meta name="keywords" content="whatsapp link generator, whatsapp link, whatsapp link generator indonesia">
<meta property="og:title" content="WhatsApp Link Generator - {{ config('app.name') }}">
<meta property="og:description" content="WhatsApp Link Generator adalah alat yang inovatif dan efisien yang dirancang khusus untuk memudahkan komunikasi Anda melalui WhatsApp. Dengan alat ini, Anda dapat membuat tautan khusus yang akan mengarahkan orang langsung ke obrolan WhatsApp dengan Anda">
<meta property="og:image" content="{{ asset('images/hero.png') }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:site_name" content="{{ config('app.name') }}">
<meta property="og:type" content="website">
<meta property="og:locale" content="id_ID">
@endsection
@section('content')
<div class="container pt-5">
    <div class="row">
        <div class="col-12">
            <div id="info-card">
                <div class="card rounded bg-white text-dark border">
                    <div class="card-body">
                        <h1 class="fs-5 fw-bold">
                            WhatsApp Link Generator - Mudah dan Cepat Kirim Pesan ke WhatsApp!
                        </h1>
                        <p>
                            Apakah Anda ingin mempermudah proses mengirim pesan melalui WhatsApp? Kami memiliki solusi tepat untuk Anda! Perkenalkan WhatsApp Link Generator, alat revolusioner yang akan membantu Anda mengirim pesan langsung ke teman, keluarga, atau pelanggan melalui WhatsApp dengan cepat dan mudah. Mari kita jelajahi fitur-fitur hebat dari alat ini!
                        </p>
                        <p>
                            WhatsApp Link Generator adalah alat yang inovatif dan efisien yang dirancang khusus untuk memudahkan komunikasi Anda melalui WhatsApp. Dengan alat ini, Anda dapat membuat tautan khusus yang akan mengarahkan orang langsung ke obrolan WhatsApp dengan Anda. Tidak perlu lagi mencari nomor WhatsApp seseorang atau menambahkannya ke daftar kontak Anda. Cukup bagikan tautan, dan orang lain dapat menghubungi Anda dengan satu klik saja!
                        </p>
                        <h2 class="fs-5 fw-bold">
                            Fitur WhatsApp Link Generator:
                        </h2>
                        <ol>
                            <li>
                                Pembuatan Tautan Kustom: Anda dapat membuat tautan khusus yang terhubung langsung ke nomor WhatsApp Anda. Tautan ini dapat Anda sesuaikan dengan nama, pesan pembuka, atau bahkan emoji untuk menarik perhatian.
                            </li>
                            <li>
                                Penggunaan Mudah dan Intuitif: WhatsApp Link Generator dirancang agar mudah digunakan, bahkan bagi orang yang tidak terbiasa dengan teknologi. Hanya dalam beberapa langkah sederhana, tautan khusus Anda siap digunakan.
                            </li>
                            <li>
                                Berbagi Langsung ke Media Sosial: Anda dapat dengan mudah berbagi tautan WhatsApp kustom Anda ke platform media sosial seperti Facebook, Instagram, Twitter, dan lainnya. Tingkatkan visibilitas Anda dan buat orang lain lebih mudah menghubungi Anda.
                            </li>
                            <li>
                                Cocok untuk Bisnis dan Komunikasi Pribadi: Alat ini berguna tidak hanya bagi individu tetapi juga bagi bisnis. Jika Anda memiliki bisnis, WhatsApp Link Generator adalah cara yang efektif untuk memudahkan pelanggan berkomunikasi dengan Anda secara langsung.
                            </li>
                            <li>
                                Gratis dan Tanpa Iklan: Kami percaya bahwa alat ini harus tersedia untuk semua orang tanpa biaya dan iklan yang mengganggu. WhatsApp Link Generator sepenuhnya gratis untuk digunakan tanpa ada gangguan iklan.
                            </li>
                        </ol>
                        <h3 class="fs-5 fw-bold">
                            Mengapa Memilih WhatsApp Link Generator?
                        </h3>
                        <ol>
                            <li>
                                Mempercepat Komunikasi: Tidak perlu lagi mengetik nomor WhatsApp atau menambahkan orang baru ke kontak. Tautan kustom akan mengarahkan orang langsung ke obrolan dengan Anda.
                            </li>
                            <li>
                                Fleksibilitas dan Kepribadian: Anda dapat menyesuaikan tautan Anda dengan nama, pesan, atau emoji yang mencerminkan kepribadian Anda atau merek bisnis Anda.
                            </li>
                            <li>
                                Praktis dan Efisien: WhatsApp Link Generator dirancang dengan fokus pada kemudahan penggunaan dan efisiensi, membuatnya menjadi alat yang sangat praktis.
                            </li>
                        </ol>
                        <p>
                            Jadi, tunggu apa lagi? Segera gunakan WhatsApp Link Generator dan nikmati kemudahan mengirim pesan melalui WhatsApp tanpa ribet. Mulai gunakan alat ini sekarang juga dan saksikan betapa cepatnya Anda dapat terhubung dengan orang-orang di sekitar Anda. Terima kasih telah memilih WhatsApp Link Generator!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection