var qrcode = new QRCode("qrCode", {
    text: "https://wa.me",
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
    if($('#phone').val() == ''){
        $('#phone').addClass('is-invalid');
        $('#phone').on('keyup',function(){
            $('#phone').removeClass('is-invalid');
            $('#phone').parent().find('.invalid-feedback').remove();
        });
        return false;
    }
    var token = $('meta[name="csrf-token"]').attr('content');
    var url   = "/whatsapp-link-generator";
    var wa_id = iti.getNumber();

    qrcode.clear(); 

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
            _token: token,
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
            $('#link_id').val(data.id);
            qrcode.makeCode(data.short_url);
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

            $('#submitBtn').attr('disabled',false);
            $('#generatorBtn').removeClass('d-none');
            $('#spinner').addClass('d-none');
        }
    });
});

$('#edit').click(function(){
    $('#edit-wrapper').removeClass('d-none');
});

$('#submitCustomUrl').click(function(){
    var link_id = $('#link_id').val();
    var token = $('meta[name="csrf-token"]').attr('content');
    var url   = "/custom-short-url/"+link_id;
    console.log(url);
    var custom_url = $('#custom_url').val();
    $.ajax({
        url: url,
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': token
        },
        data: {
            _token: token,
            custom_url: custom_url
        },
        success: function(data){
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Your custom URL has been updated!',
                showConfirmButton: false,
                timer: 1500
            });
            $('#url_shortened').val(data.short_url);
            $('#edit-wrapper').addClass('d-none');
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