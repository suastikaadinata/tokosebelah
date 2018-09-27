var tipe;
var user_id = $('#user_id_poin').val();

function klikVoucherSatu(){
    event.preventDefault();
    tipe = 1;
    ajax_tukar_poin(tipe);
}

function klikVoucherDua(){
    event.preventDefault();
    tipe = 2;
    ajax_tukar_poin(tipe);
}

function klikVoucherTiga(){
    event.preventDefault();
    tipe = 3;
    ajax_tukar_poin(tipe);
}

function klikVoucherEmpat(){
    event.preventDefault();
    tipe = 4;
    ajax_tukar_poin(tipe);
}

function ajax_tukar_poin(tipe){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var kode;
    var jumlah;
    var poin;

    switch(tipe){
        case 1:
            poin = 2000;
            kode = 'VCHTS150';
            jumlah = 150000;        
            break;
        case 2:
            poin = 4000;
            kode = 'VCHTS300';
            jumlah = 300000;
            break;
        case 3:
            poin = 6000;
            kode = 'VCHTS450';
            jumlah = 450000;
            break;
        default:
            poin = 8000;
            kode = 'VCHTS600';
            jumlah = 600000;           
    }

    var data = {
        user_id: user_id,
        tipe: tipe,
        poin: poin,
        kode: kode,
        jumlah: jumlah,
        pakai: 0
    }

    $.ajax({
        type: "POST",
        url: "/poin/voucher",
        dataType: "json",
        data: data,
        success: function(data){
            location.reload();
            sessionStorage.setItem("modal", true);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert(textStatus, errorThrown);
        }           
    });
}

if(sessionStorage.getItem('modal')){
    $('#modal-tukar-poin').modal('toggle');
    sessionStorage.removeItem('modal');
}

