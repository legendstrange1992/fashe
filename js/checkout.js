$(function(){
    $('#place_order').on('click',function(){
        const fullname = $('#fullname').val();
        const address = $('#address').val();
        const email = $('#email').val();
        const zipcode = $('#zipcode').val();
        const phone = $('#phone').val();
        if(fullname == ""){
            swal({
                title : 'Bạn chưa nhập Fullname',
                icon : 'error',
                button : 'Nhập lại'
            });
            return;
        }
        if(address == ""){
            swal({
                title : 'Bạn chưa nhập Adress',
                icon : 'error',
                button : 'Nhập lại'
            });
            return;
        }
        if(address == ""){
            swal({
                title : 'Bạn chưa nhập Adress',
                icon : 'error',
                button : 'Nhập lại'
            });
            return;
        }
        if(email == ""){
            swal({
                title : 'Bạn chưa nhập Email',
                icon : 'error',
                button : 'Nhập lại'
            });
            return;
        }
        if(zipcode == ""){
            swal({
                title : 'Bạn chưa nhập Zipcode',
                icon : 'error',
                button : 'Nhập lại'
            });
            return;
        }
        if(phone == ""){
            swal({
                title : 'Bạn chưa nhập Phone',
                icon : 'error',
                button : 'Nhập lại'
            });
            return;
        }
        $.ajax({
            url:'xuly/order_cart.php',
            data : {fullname,address,email,zipcode,phone},
            type:'GET',
            success:function(data){
                if(data == 'success'){
                    swal({
                        title : 'Quý khách đã đặt mua hàng thành công',
                        text : 'Xin chân thành cảm ơn quý khách',
                        icon : "success",
                        button : 'Trang Chủ'
                    }).then(data => {
                        if(data){
                            window.location.href = 'index.php';
                        }
                    });
                    
                }
            }
        })

    });
})