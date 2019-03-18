$(function(){
    $('.chitiet').on('click',function(){
        var id_donhang = $(this).attr('data-id_donhang');
        $('.ct_donhang_'+id_donhang).slideToggle();
    });
});