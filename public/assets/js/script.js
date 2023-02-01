let flashSuccess = $('.flash-success').data('flashdata');
if (flashSuccess) {
    Swal.fire(
        'Success',
        flashSuccess,
        'success'
    )
}

let flashError = $('.flash-error').data('flashdata');
if (flashError) {
    Swal.fire(
        'Error',
        flashError,
        'error'
    )
}

$('#data-table').DataTable();

$('#button-delete').on('click', function (event) {
    event.preventDefault();
    let href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data akan dihapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus data!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
        }
    })
})

$('#upload').on('change', function () {
    console.log(event);
    $('#prev').attr("src", URL.createObjectURL(event.target.files[0]))
})