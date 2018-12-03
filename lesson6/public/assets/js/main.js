$(document).ready(function () {
    $('#add-product').on('click', function () {
        let id = $(this).data('id');
        console.log(id);
        $.ajax({
            url: `/product/add`,
            method: 'POST',
            data: {
                id: id,
                quantity: 1
            },
            success: function (data) {
                // console.log(data);
            }
        });
    });
});
