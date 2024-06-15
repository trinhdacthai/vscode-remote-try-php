function active(id ,url){
    Swal.fire({
        title: 'Kích hoạt',
        text: 'Sau khi đồng ý sẽ tiến hành kích hoạt',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Không',
        confirmButtonText: 'Đồng ý'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href=url+'/'+id;
        }
    })
}
function unactive(id ,url){
    Swal.fire({
        title: 'Hủy kích hoạt',
        text: 'Sau khi đồng ý sẽ tiến hành hủy kích hoạt',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Không',
        confirmButtonText: 'Đồng ý'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href=url+'/'+id;
        }
    })
}
function delete_item(id ,url){
    Swal.fire({
        title: 'Xác nhận xóa',
        text: 'Sau khi xóa thì không thể hoàn tác',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Không',
        confirmButtonText: 'Đồng ý'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href=url+'/'+id;
        }
    })
}
function refresh_item(id ,url){
    Swal.fire({
        title: 'Xác nhận khôi phục',
        text: 'Sau khi đồng ý thì không thể hoàn tác',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Không',
        confirmButtonText: 'Đồng ý'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href=url+'/'+id;
        }
    })
}
