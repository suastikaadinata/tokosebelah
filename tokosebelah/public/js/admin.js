$('.hapus-user-btn').click(function () {
    var form = $('.hapus-user form');
    form.attr('action', form.data('url') + '/' + $(this).data('id'));
});

$('.hapus-kategori-btn').click(function (){
    var kategori = $('.kategori-select').val();
    var a = document.getElementById('hapus-kategori-btn'); 
    a.href = "/admin/kategori-iklan/hapus-kategori/"+kategori;
    console.log(kategori);
});