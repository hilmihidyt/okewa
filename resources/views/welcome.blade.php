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
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="card bg-white border rounded text-dark mb-3">
                <div class="card-header bg-white pb-0">
                    <div class="alert alert-whatsapp py-2 text-center">
                        <strong>Generate Whatsapp Link</strong>
                    </div>
                </div>
                <div class="card-body">
                   <form action="" id="form" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="phone" class="form-label">No. Whatsapp</label> <br>
                        <input type="tel" name="phone" id="phone" class="form-control" placeholder="82xxxxxxxxx" required>
                        <div id="phone_feedback"></div>
                        <input type="hidden" name="wa_id" id="wa_id">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label> <br>
                        <div class="btn-group mb-2" role="group" aria-label="Basic example">
                            <button type="button" onclick="bold()" class="btn btn-secondary" title="Bold">
                                B
                            </button>
                            <button type="button" onclick="strikethrough()" class="btn btn-secondary" title="Strikethrough">
                                S
                            </button>
                            <button type="button" onclick="italic()" class="btn btn-secondary" title="Italic">
                                I
                            </button>
                            <button type="button" onclick="monospace()" class="btn btn-secondary" title="Monospace">
                                M
                            </button>
                            {{-- <button class="btn btn-primary emoji" title="Emoji">
                                😀
                            </button> --}}
                        </div>
                        <textarea cols="30" rows="10" name="message" id="message" class="message form-control" placeholder="Message" required></textarea>
                    </div>
                    <button class="btn btn-whatsapp" type="button" id="submitBtn">
                        <span id="generatorBtn">
                            Generate
                        </span>
                        <span id="spinner" class="d-none">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </span>    
                    </button>
                   </form>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6">
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
            <div id="shortenedCard" class="d-none">
                <div class="card text-center mb-3 border bg-white rounded">
                    <div class="card-header bg-white pb-0">
                        <div class="alert alert-whatsapp py-2 text-center" role="alert">
                            <strong>
                                Your Link is Ready!
                            </strong>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="card w-50 mb-3 rounded mx-auto d-block">
                                <div class="card-body">
                                    <div id="qrCode"></div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="row mx-auto">
                                    <div class="col-lg-6 col-md-12 col-sm-12 text-start">
                                        <div class="mb-3">
                                            <div class="input-group">
                                                <input type="text" name="url_shortened" id="url_shortened" class="form-control border border-secondary" placeholder="URL" aria-label="URL" aria-describedby="copyBtn" readonly>
                                                <button class="btn btn-outline-secondary" id="copyBtn">
                                                    <i class="bi bi-clipboard-fill"></i>
                                                </button>
                                            </div>  
                                            <small class="text-muted">
                                                Fitur Edit akan segera hadir!
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <a href="javascript:void(0);" class="btn btn-primary w-100" id="downloadQrcode">Download QR Code</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border rounded bg-white">
                    <div class="card-body">
                        <label for="long_url" class="form-label text-start">
                            Long URL
                        </label>
                        <div class="input-group">
                            <input type="text" name="wa_link" id="wa_link" class="form-control border border-secondary" placeholder="URL" aria-label="waLinkCopyBtn" aria-describedby="waLinkCopyBtn" readonly>
                            <button class="btn btn-outline-secondary" id="waLinkCopyBtn">
                                <i class="bi bi-clipboard-fill"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
<script src="{{ asset('vendor/qrcode/qrcode.min.js') }}"></script>
<script>
    function bold(){
        var textarea = document.getElementById('message');
        var start = textarea.selectionStart;
        var end = textarea.selectionEnd;
        var selectedText = textarea.value.substring(start, end);
        var newText = textarea.value.substring(0, start) + '*' + selectedText + '*' + textarea.value.substring(end);
        textarea.value = newText;
    }
    function strikethrough(){
        var textarea = document.getElementById('message');
        var start = textarea.selectionStart;
        var end = textarea.selectionEnd;
        var selectedText = textarea.value.substring(start, end);
        var newText = textarea.value.substring(0, start) + '~' + selectedText + '~' + textarea.value.substring(end);
        textarea.value = newText;
    }
    function italic(){
        var textarea = document.getElementById('message');
        var start = textarea.selectionStart;
        var end = textarea.selectionEnd;
        var selectedText = textarea.value.substring(start, end);
        var newText = textarea.value.substring(0, start) + '_' + selectedText + '_' + textarea.value.substring(end);
        textarea.value = newText;
    }
    function monospace(){
        var textarea = document.getElementById('message');
        var start = textarea.selectionStart;
        var end = textarea.selectionEnd;
        var selectedText = textarea.value.substring(start, end);
        var newText = textarea.value.substring(0, start) + '```' + selectedText + '```' + textarea.value.substring(end);
        textarea.value = newText;
    }

</script>
<script type="module">
    var qrcode = new QRCode("qrCode", {
        text: "{{ config('app.url') }}",
        width: 256,
        height: 256,
        colorDark : "#000000",
        colorLight : "#ffffff",
        correctLevel : QRCode.CorrectLevel.H
    });

    var phone = document.querySelector("#phone");
    var iti = intlTelInput(phone, {
        initialCountry: "auto",
        hiddenInput: "full_phone",
        geoIpLookup: callback => {
            fetch("https://ipapi.co/json")
            .then(res => res.json())
            .then(data => callback(data.country_code))
            .catch(() => callback("id"));
        },
        customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
            return "e.g. " + selectedCountryPlaceholder;
        },
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js",
    });

    phone.addEventListener('input', function() {
        var fullNumber = iti.getNumber();
        document.getElementById('wa_id').value = fullNumber;
    });

    phone.addEventListener('countrychange', function() {
        var fullNumber = iti.getNumber();
        document.getElementById('wa_id').value = fullNumber;
    });
    
    $('#submitBtn').on('click',function(e){
        e.preventDefault();
        //if phone number is empty
        if($('#phone').val() == ''){
            //add is-invalid class to #page_name
            $('#phone').addClass('is-invalid');
            $('#phone').on('keyup',function(){
                $('#phone').removeClass('is-invalid');
                $('#phone').parent().find('.invalid-feedback').remove();
            });
            return false;
        }
        var token = $('meta[name="csrf-token"]').attr('content');
        var url   = "{{ route('generate-whatsapp-link') }}";
        var wa_id = iti.getNumber();

        qrcode.clear(); 

        //add disabled attribute to button #submitBtn
        $('#submitBtn').attr('disabled',true);
        $('#generatorBtn').addClass('d-none');
        $('#spinner').removeClass('d-none');

        $.ajax({
            url: url,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            data: {
                _token: "{{ csrf_token() }}",
                phone: wa_id,
                message: $('#message').val()
            },
            success: function(data){
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Your link has been generated!',
                    showConfirmButton: false,
                    timer: 1500
                });

                $('#info-card').addClass('d-none');
                $('#shortenedCard').removeClass('d-none');
                $('#url_shortened').val(data.short_url);
                $('#wa_link').val(data.wa_link);
                qrcode.makeCode(data.wa_link);
                //remove disabled attribute to button #submitBtn
                $('#submitBtn').attr('disabled',false);
                $('#generatorBtn').removeClass('d-none');
                $('#spinner').addClass('d-none');
            },
            error: function(xhr){
                var res = xhr.responseJSON;
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: res.message,
                    showConfirmButton: false,
                    timer: 1500
                });

                //remove disabled attribute to button #submitBtn
                $('#submitBtn').attr('disabled',false);
                $('#generatorBtn').removeClass('d-none');
                $('#spinner').addClass('d-none');
            }
        });
    });
    $('#copyBtn').click(function(){
        $('#url_shortened').select();
        document.execCommand('copy');
        $(this).html('Copied!');
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Your link has been copied!',
            showConfirmButton: false,
            timer: 1500
        });
    });

    $('#waLinkCopyBtn').click(function(){
        $('#wa_link').select();
        document.execCommand('copy');
        $(this).html('Copied!');
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Your link has been copied!',
            showConfirmButton: false,
            timer: 1500
        });
    });

    $('#downloadQrcode').click(function(){
        var canvas = document.querySelector('#qrCode canvas');
        var dataURL = canvas.toDataURL('image/png');
        var a = document.createElement('a');
        a.href = dataURL;
        a.download = 'qrcode.png';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    });

</script>
@endpush