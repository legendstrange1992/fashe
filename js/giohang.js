$(function(){
    const JPY = value => currency(value, { precision: 0, decimal: ',' });
    $('#quantity_product_detail').on('keyup',function(){
        var soluong = $(this).val();
        if(soluong>30){
            swal({
                title : 'Số lượng mua không vượt quá 30 ! ',
                text : 'Xin quý khách vui lòng đặt lại ',
                icon : 'error',
                button : 'Ok'
            });
            $(this).val(1);
        }
        if(soluong<0){
            swal({
                title : 'Số lượng không được nhỏ hơn 0 !!! ',
                text : 'Xin quý khách vui lòng đặt lại ',
                icon : 'error',
                button : 'Ok'
            });
            $(this).val(1);
        }
    });
    $('.add_to_cart').on('click',function(){
        var soluong = $('#quantity_product_detail').val();
        var id_sanpham = $(this).attr('data-id_sanpham');
        if(soluong == 0){
            swal({
                title : 'Số lượng sản phẩm phải lớn hơn 0',
                text : 'Xin quý khách vui lòng đặt lại ',
                icon : 'error',
                button : 'Ok'
            });
            $(this).val(1);
        }
        else{
            swal({
                title : 'Đã thêm sản phẩm vào giỏ hàng',
                icon : 'success',
                button : 'Ok'
            });
            $(this).val(1);
            $.ajax({
                url:'giohang.php',
                data:{soluong,id_sanpham},
                type:'GET',
                dataType:'json',
                success:function(data){
                    $('.sl_cart').html(data);
                }
            })
        }
    })
    function tang(){
        $('.tang').on('click',function(){
            var id_sanpham = $(this).attr('data-id_sanpham');
            var soluong = $('.input_soluong_'+id_sanpham).val();
            soluong++;
            if(soluong>30){
                swal({
                    title : 'Số lượng mua không vượt quá 30 !',
                    text : 'Xin quý khách vui lòng đặt lại ',
                    icon : 'error',
                    button : 'Ok'
                });
                $('.input_soluong_'+id_sanpham).val(soluong-1);
            }
            else{
                $('.input_soluong_'+id_sanpham).val(soluong);
                $.ajax({
                    url         : 'xuly/update_soluong_cart.php',
                    data        : {id_sanpham,soluong},
                    type        : 'GET',
                    dataType    : 'json',
                    success     : function(data){
                        console.log(data);
                        $('.thanhtien_'+id_sanpham).html('$'+JPY(data.thanhtien).format());
                        $('#total_cart').html('$'+JPY(data.total).format());
                    }  
                });
            }
            
        });
    }
    function giam(){
        $('.giam').on('click',function(){
            var id_sanpham = $(this).attr('data-id_sanpham');
            var soluong = $('.input_soluong_'+id_sanpham).val();
            soluong--;
            if(soluong<1){
                swal({
                    title : 'Số lượng mua phải lớn hơn 1 !',
                    text : 'Xin quý khách vui lòng đặt lại ',
                    icon : 'error',
                    button : 'Ok'
                });
                $('.input_soluong_'+id_sanpham).val(soluong+1);
            }
            else{
                $('.input_soluong_'+id_sanpham).val(soluong);
                $.ajax({
                    url         : 'xuly/update_soluong_cart.php',
                    data        : {id_sanpham,soluong},
                    type        : 'GET',
                    dataType    : 'json',
                    success     : function(data){
                        console.log(data);
                        $('.thanhtien_'+id_sanpham).html('$'+JPY(data.thanhtien).format());
                        $('#total_cart').html('$'+JPY(data.total).format());
                    }  
                });
            }
        });
    }
    giam();
    tang();
    delete_item();
    function delete_item(){
        $('.delete_item').on('click',function(){
            const id_sanpham = $(this).attr('data-id_sanpham');
            $.ajax({
                url         : 'xuly/delete_item_cart.php',
                data        : {id_sanpham},
                type        : 'GET',
                success     : function(data){
                    $('.cart-table').html(data);
                    giam();
                    tang();
                    delete_item();
                }  
            });
        });
    }
    
    
});