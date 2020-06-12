let Cr = {} || Cr;





Cr.create = function() {
    $('#modal').modal("show");
}





Cr.show = function(id) {

    $('#myModal').modal("show");
    $.ajax({
        type: "GET",
        url: "/product/show/" + id,
        success: function(response) {
            response_query = response;
            $("#category_id").text(response_query.category);
            $("#acce_id").text(response_query.acce);
            $("#nawing_id").text(response_query.nawing);
            $("#type_id").text(response_query.type);
        },
        error: function() {},
    });

}



Cr.save = function(btn) {
    // let id = $(btn).data('id');
    // let data = $(btn.form).serializeJSON();
    // console.log(id);
    // console.log(data);
    // if (id) {
    //     if (confirm('Save change')) {
    //         $.ajax({
    //             url: `/chuc-vu/${id}`,
    //             method: 'PUT',
    //             data: data,
    //             success: function(Obj) {
    //                 Cv.table.ajax.reload();
    //                 $('#fs-modal').modal("hide");
    //                 Cv.success("Update success!");
    //             },
    //             error: function(errors) {
    //                 Cv.errors(errors);
    //             }
    //         });
    //     }
    // }

        if (confirm('Save this data')) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                url: `/product/post`,
                method: 'post',
                // data: data,
                success: function() {
                    Cr.table.ajax.reload();
                    $('#modal').modal("hide");
                    // Cr.success("Create success");
                },
                // error: function(errors) {
                //     Cv.errors(errors);
                // }
            });
        }

}



