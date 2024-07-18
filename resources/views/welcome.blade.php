@extends('layouts.app')
@section('title','WhatsApp Link Generator')
@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.css">
@endsection
@section('seo')
<meta name="description" content="Send WhatsApp messages easily with WhatsApp Link Generator. Create custom links, share on social media, and streamline communication. Free and user-friendly!">
<meta name="keywords" content="WhatsApp, link generator, custom links, WhatsApp messages, direct chat, social media sharing, communication tool, free tool, user-friendly, business communication">
<meta property="og:title" content="WhatsApp Link Generator - {{ config('app.name') }}">
<meta property="og:description" content="Send WhatsApp messages easily with WhatsApp Link Generator. Create custom links, share on social media, and streamline communication. Free and user-friendly!">
<meta property="og:image" content="{{ asset('images/favicon.png') }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:site_name" content="{{ config('app.name') }}">
<meta property="og:type" content="website">
<meta property="og:locale" content="en_US">
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
                        <label for="phone" class="form-label fw-medium">Type your WhatsApp phone number</label> <br>
                        <input type="tel" name="phone" id="phone" class="form-control input-border" placeholder="82xxxxxxxxx" required>
                        <div id="phone_feedback"></div>
                        <input type="hidden" name="wa_id" id="wa_id">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label fw-medium">Message</label> <br>
                        <div class="btn-group mb-2" role="group" aria-label="Basic example">
                            <button type="button" onclick="bold()" class="btn btn-secondary" title="Bold">
                                <i class="bi bi-type-bold"></i>
                            </button>
                            <button type="button" onclick="strikethrough()" class="btn btn-secondary" title="Strikethrough">
                                <i class="bi bi-type-strikethrough"></i>
                            </button>
                            <button type="button" onclick="italic()" class="btn btn-secondary" title="Italic">
                                <i class="bi bi-type-italic"></i>
                            </button>
                            <button type="button" onclick="monospace()" class="btn btn-secondary" title="Monospace">
                                <i class="bi bi-code-slash"></i>
                            </button>
                            {{-- <button class="btn btn-secondary emoji" title="Emoji">
                                😀
                            </button> --}}
                        </div>
                        <textarea cols="30" rows="10" name="message" id="message" class="message form-control input-border" placeholder="Message" required></textarea>
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
                            WhatsApp Link Generator - Send Messages to WhatsApp Quickly and Easily!
                        </h1>
                        <p>
                            Do you want to simplify the process of sending messages via WhatsApp? We have the perfect solution for you! Introducing the WhatsApp Link Generator, a revolutionary tool that will help you send messages directly to friends, family, or customers via WhatsApp quickly and easily. Let's explore the great features of this tool!
                        </p>
                        <p>
                            The WhatsApp Link Generator is an innovative and efficient tool designed specifically to facilitate your communication through WhatsApp. With this tool, you can create custom links that will direct people straight to a WhatsApp chat with you. No more searching for someone's WhatsApp number or adding them to your contact list. Simply share the link, and others can contact you with just one click!
                        </p>
                        <h2 class="fs-5 fw-bold">
                            Features of the WhatsApp Link Generator:
                        </h2>
                        <ol>
                            <li>
                                Custom Link Creation: You can create custom links that connect directly to your WhatsApp number. These links can be personalized with a name, opening message, or even emojis to grab attention.
                            </li>
                            <li>
                                Easy and Intuitive Use: The WhatsApp Link Generator is designed to be user-friendly, even for those not familiar with technology. In just a few simple steps, your custom link is ready to use.
                            </li>
                            <li>
                                Direct Sharing to Social Media: You can easily share your custom WhatsApp link on social media platforms like Facebook, Instagram, Twitter, and more. Increase your visibility and make it easier for others to contact you.
                            </li>
                            <li>
                                Suitable for Business and Personal Communication: This tool is useful not only for individuals but also for businesses. If you have a business, the WhatsApp Link Generator is an effective way to make it easier for customers to communicate with you directly.
                            </li>
                            <li>
                                Free and Ad-Free: We believe this tool should be available to everyone without cost and annoying ads. The WhatsApp Link Generator is completely free to use without any ad interruptions.
                            </li>
                        </ol>
                        <h3 class="fs-5 fw-bold">
                            Why Choose the WhatsApp Link Generator?
                        </h3>
                        <ol>
                            <li>
                                Speed Up Communication: No more typing WhatsApp numbers or adding new people to your contacts. Custom links will direct people straight to a chat with you.
                            </li>
                            <li>
                                Flexibility and Personality: You can customize your link with names, messages, or emojis that reflect your personality or business brand.
                            </li>
                            <li>
                                Practical and Efficient: The WhatsApp Link Generator is designed with a focus on ease of use and efficiency, making it a very practical tool.
                            </li>
                        </ol>
                        <p>
                            So, what are you waiting for? Start using the WhatsApp Link Generator and enjoy the convenience of sending messages via WhatsApp without any hassle. Start using this tool now and see how quickly you can connect with people around you. Thank you for choosing the WhatsApp Link Generator!
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
                                    <div class="col-md-12">
                                        <a href="javascript:void(0);" class="btn btn-whatsapp w-100" id="downloadQrcode">Download QR Code</a>
                                    </div>
                                    <div class="col-md-12 text-start mt-2">
                                        <div class="mb-3">
                                            <label for="wa_link" class="form-label fw-medium text-start">
                                                Long URL
                                            </label>
                                            <div class="input-group">
                                                <input type="text" name="wa_link" id="wa_link" class="form-control border border-secondary" placeholder="URL" aria-label="waLinkCopyBtn" aria-describedby="waLinkCopyBtn" readonly>
                                                <button class="btn btn-outline-secondary" id="waLinkCopyBtn">
                                                    <i class="bi bi-clipboard-fill"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="url_shortened" class="form-label fw-medium">
                                                Shortened URL
                                            </label>
                                            <input type="hidden" name="id" id="link_id">
                                            <div class="input-group">
                                                <input type="text" name="url_shortened" id="url_shortened" class="form-control border border-secondary border-end-0" placeholder="URL" aria-label="URL" aria-describedby="copyBtn" readonly>
                                                <button class="btn btn-outline-secondary" id="copyBtn">
                                                    <i class="bi bi-clipboard-fill"></i>
                                                </button>
                                                <button class="btn btn-outline-secondary" type="button" id="edit">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </button>
                                            </div>  
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-start d-none" id="edit-wrapper">
                                        <form action="#" id="update-url" method="POST">
                                            @csrf
                                            <label for="custom_url" class="form-label fw-medium">
                                                Custom URL
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text border border-secondary bg-primary-subtle">
                                                    {{ config('app.url') }}/go/
                                                </span>
                                                <input type="text" name="custom_url" id="custom_url" class="form-control border border-secondary" placeholder="Custom URL" aria-label="Custom URL" aria-describedby="submitCustomUrl">
                                                <button class="btn btn-outline-secondary" id="submitCustomUrl" type="button">
                                                    <i class="bi bi-check2"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
<script src="{{ asset('js/copy.js') }}"></script>
<script src="{{ asset('js/home.js') }}" type="module"></script>
@endpush