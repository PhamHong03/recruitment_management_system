$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function loadMore() {
    
    const page  = $('#page').val();

    $.ajax({
        type : 'POST',
        dataType : 'JSON',
        data : { page  },
        url : '/services/load-job-posting',
        success : function (result) {
           if(result.html !== '') {
                $('#loadProduct').append(result.html);
                $('#page').val(page + 1);
           }else{
                // alert('Đã load xong sản phẩm');
                Swal.fire({
                    icon: 'success',
                    text: 'Đã load xong bài đăng!',
                    showConfirmButton: false,
                    timer: 2000
                });
                $('#button-loadMore').css('display','none');
           }
        }
    })
}