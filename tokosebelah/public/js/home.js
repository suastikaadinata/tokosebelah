var poin = 0, show = 0, slideRight = 340, slideLeft = -340;
var changeImage1 = "url('"+ $('.sub-foto1').attr('data-alt-bg')+"')";
var changeImage2 = "url('"+ $('.sub-foto2').attr('data-alt-bg')+"')";
var changeImage3 = "url('"+ $('.sub-foto3').attr('data-alt-bg')+"')";
var changeImage4 = "url('"+ $('.sub-foto4').attr('data-alt-bg')+"')";
var diskon = $('#diskon').val();
var addIklan = $('#addIklan').val();
var diterima = $('#diterima').val();
var uploadPembayaran = $('#uploadPembayaran').val();

$('.category-top').hide();  

if(!($(window).scrollTop())){
    $('.header-kategori-container, .web-logo').show();   
    $('.category-top').hide();   
    sessionStorage.setItem("scroll", 0);  
}
 
$(window).scroll(function(){
    if($(window).scrollTop() > 100){
        if(sessionStorage.getItem("poin") == 0){
            $('.header-kategori-container').hide();
        }
        $('.web-logo').hide();
        $('.category-top').show();
        sessionStorage.setItem("scroll", 1);       
    }else{
        $('.header-kategori-container, .web-logo').show();   
        $('.category-top').hide();   
        sessionStorage.setItem("scroll", 0);            
    }
});

function clickCategory(){
    if(sessionStorage.getItem("poin") == 0){    
        document.getElementById('category-top-text').innerHTML =  '<i class="fa fa-list fa-lg" aria-hidden="true"></i> Sembunyikan Kategori';
        $('.header-kategori-container').show();
        sessionStorage.setItem("poin", 1);
    }
    else{
        document.getElementById('category-top-text').innerHTML =  '<i class="fa fa-list fa-lg" aria-hidden="true"></i> Semua Kategori';
        $('.header-kategori-container').hide();
        sessionStorage.setItem("poin", 0);
    }
}

if(sessionStorage.getItem("scroll") == 1){
    if(sessionStorage.getItem("poin") == 0){
        $('.header-kategori-container').hide();
    }
    $('.web-logo').hide();
    $('.category-top').show();
}

$('.sub-foto1').click(function(){
    $('.sub-foto1').css({
        'border': '3px solid #0095DA'
    });
    $('.sub-foto2, .sub-foto3, .sub-foto4').css({
        'border': '1px solid #bdc3c7'
    });
    $('.main-foto').css({
        'background-image': changeImage1
    });
});   

$('.sub-foto2').click(function(){
    $('.sub-foto2').css({
        'border': '3px solid #0095DA'
    });
    $('.sub-foto1, .sub-foto3, .sub-foto4').css({
        'border': '1px solid #bdc3c7'
    });
    $('.main-foto').css({
        'background-image': changeImage2
    });
});  

$('.sub-foto3').click(function(){
    $('.sub-foto3').css({
        'border': '3px solid #0095DA'
    });
    $('.sub-foto1, .sub-foto2, .sub-foto4').css({
        'border': '1px solid #bdc3c7'
    });
    $('.main-foto').css({
        'background-image': changeImage3
    });
});  

$('.sub-foto4').click(function(){
    $('.sub-foto4').css({
        'border': '3px solid #0095DA'
    });
    $('.sub-foto4, .sub-foto4, .sub-foto4').css({
        'border': '1px solid #bdc3c7'
    });
    $('.main-foto').css({
        'background-image': changeImage4
    });
});  

if ($('.kabupaten-json').length) {
    var kabupaten = JSON.parse($('.kabupaten-json').val());
}

$('.provinsi-select').change(function () {
    var provinsi_id = $(this).val();
    var kabupaten_select = $('.kabupaten-select');
    kabupaten_select.html('');
    for (var i = 0; i < kabupaten.length; i++) {
        if (kabupaten[i].provinsi_id == provinsi_id) {
            kabupaten_select.append('<option value="'
                + kabupaten[i].id + '">'
                + (kabupaten[i].tipe == 'Kota' ? 'Kota' : '') + ' '
                + kabupaten[i].kabupaten
                + '</option>')              
        }
    }
    console.log(kabupaten);
});

$('.slide-right-btn').click(function(){
    $('.row-home').scrollLeft(slideRight);
    slideRight += 340;
    slideLeft += 340;   
});

$('.slide-left-btn').click(function(){
    $('.row-home').scrollLeft(slideLeft);
    slideLeft -= 340;
    slideRight -= 340;
});

if(diskon > 0){
    $('#modal-diskon').modal('toggle');
}

if(addIklan == 1){
    $('#modal-add-iklan').modal('toggle');
}

if(uploadPembayaran == 1){
    $('#modal-upload-pembayaran').modal('toggle');
}

if(diterima == 1){
    $('#modal-pesanan-diterima').modal('toggle');
}

$('.voucher-select').change(function() {
    var potongan_harga = $(this).val();
    var total_harga = ($('#total_harga').val()) - potongan_harga;
    if(total_harga < 0){
        total_harga = 0;
    }
    var replace = '<div id="info-harga">';
    replace += '<h4>Voucher: Rp. '+ potongan_harga +'</h4>';
    replace += '<h4 style="margin-top: 0px; float: right"class="harga-produk">Rp. '+ total_harga +'</h4>';
    replace += '<h4 style="margin-right: 110px;"class="h-total-belanja">Total belanja: </h4>';   
    replace += '</div>'; 
    
    var replaceBtn = '<div id="lanjut-bayar-btn">';
    replaceBtn += '<a style="width: 80%" href="/belanja/data-pengiriman/'+ potongan_harga +'" class="btn btn-default btn-lg">Lanjutkan Pembayaran</a>';
    replaceBtn += '</div>';

    $('#info-harga').replaceWith(replace);
    $('#lanjut-bayar-btn').replaceWith(replaceBtn);
});

if($(document).width() < 1025){
    $('#register-col-id').hide();
    var login = document.getElementById('login-col-id');
    login.className = "col-lg-1 col-md-1 col-sm-2 login-col";
}else{
    $('#register-col-id').show();
    var login = document.getElementById('login-col-id');
    login.className = "col-lg-1 col-md-1 col-sm-1 login-col";
}