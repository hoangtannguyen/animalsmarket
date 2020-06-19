let Cu = {} || Cu;

// Cu.table;
// Cu.tableTrash;

Cu.drawTable = function() {
    Cu.table = $('#fs-table').DataTable({
        // processing: true,
        ajax: {
            url: '/product/all',
            dataSrc: function(jsons) {
                let i = 0;
                return jsons.map(json => {
                    return {
                        Cu: ++i,
                        Cu1:json.name,
                        // Cu2:json.description,
                        Cu3:json.price,
                        Cu4:json.promotion_price,
                        Cu5: `<img src="${json.image}" style=width:265px;height:170px;border-radius:10px;>`,
                        // Cu6:json.category_id,
                        // Cu7:json.acce_id,
                        // Cu8:json.nawing_id,
                        // Cu9:json.type_id,
                        action: `
                            <a class="btn btn-warning btn-sm text-light"  onclick="Cu.show(${json.id})">
                             <i class="fas fa-folder">
                            </i> Xem
                            </a>
                            <a class="btn btn-info btn-sm text-light" onclick="Cu.edit(${json.id})">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Sửa</a>
                            <a class="btn btn-danger btn-sm text-light" onclick="Cu.destroy(${json.id})">
                            <i class="fas fa-trash">
                            </i>
                            Xóa</a>
                        `

                    }
                });
            }
        },
        columns: [
            {
                data: "Cu"
           },
            {
                data: "Cu1"
            },
            // {
            //     data: "Cu2"
            // },
            {
                data: "Cu3"
            },
            {
                data: "Cu4"
            },
            {
                data: "Cu5"
            },
            // {
            //     data: "Cu6"
            // },
            // {
            //     data: "Cu7"
            // },
            // {
            //     data: "Cu8"
            // },
            // {
            //     data: "Cu9"
            // },
            {
                data: "action"
            }
        ]

    });
};


Cu.create = function() {

    $.ajax({
        type: "get",
        url: "/product/create",
        dataType: "json",
        success: function (data) {
            $("#category_id").empty();
            $("#acce_id").empty().append(`<option value=''>Choose ...</option>`);
            $("#type_id").empty().append(`<option value=''>Choose ...</option>`);
            $("#nawing_id").empty().append(`<option value=''>Choose ...</option>`);
            $.each(data.category,function(i,v){

                $("#category_id").append(
                    `
                        <option value='${v.id}'>${v.name}</option>
                    `
                );
            });
            $.each(data.acce,function(i,v){
                $("#acce_id").append(
                    `
                       <option value='${v.id}'>${v.name}</option>
                    `
                );
            });

            $.each(data.types,function(i,v){

                $("#type_id").append(
                    `

                        <option value='${v.id}'>${v.name}</option>
                    `
                );
            });

            $.each(data.nawings,function(i,v){

                $("#nawing_id").append(
                    `

                        <option value='${v.id}'>${v.name}</option>
                    `
                );
            });



        }
    });
    $("[name='_method']").val('post');
    $('#fs-modal').modal("show");
    $('#fs-modal form')[0].reset();
    $('#fs-modal #fs-modal-title').text("Create Factor Salary");
    $('#fs-modal #btn-save').removeData('id');
    $(`#fs-modal input`).removeClass(['is-valid', 'is-invalid']);

    $('small.badge').remove();

}





Cu.edit = function(id) {

    $.ajax({
        type: "get",
        url: `/product/edit/${id}`,
        dataType: "json",
        success: function (data) {
            $("#category_id").empty();
            $("#acce_id").empty().append(`<option value=''>Choose ...</option>`);
            $("#type_id").empty().append(`<option value=''>Choose ...</option>`);
            $("#nawing_id").empty().append(`<option value=''>Choose ...</option>`);
            $.each(data.category,function(i,v){

                $("#category_id").append(
                    `
                        <option  value='${v.id}' ${v.id==data.category_id ?'selected':""}>${v.name}</option>
                    `
                );
            });
            $.each(data.acce,function(i,v){
                $("#acce_id").append(
                    `
                       <option value='${v.id}' ${v.id==data.acce_id ?'selected':""}>${v.name}</option>
                    `
                );
            });

            $.each(data.types,function(i,v){

                $("#type_id").append(
                    `
                        <option value='${v.id}' ${v.id==data.type_id ?'selected':""}>${v.name}</option>
                    `
                );
            });

            $.each(data.nawings,function(i,v){

                $("#nawing_id").append(
                    `

                        <option value='${v.id}' ${v.id==data.nawing_id ?'selected':""}>${v.name}</option>
                    `
                );
            });



        }
    });

    $.get(`/product/edit/${id}`).done(function(Obj) {
        $.each(Obj, (i, v) => {
            if (i != "image") {
             $(`#fs-modal input[name=${i}]`).val(v);
            }
        });
        $("[name='_method']").val('put');
        $('#fs-modal #fs-modal-title').text("Edit Factor Salary");
        $('#fs-modal #btn-save').data('id', Obj.id);
        $('#fs-modal').modal('show');
        $(`#fs-modal input`).removeClass(['is-valid', 'is-invalid']);
        $('small.badge').remove();
    });
}




Cu.save = function(btn) {
    let id = $(btn).data('id');
    // let data = $(btn.form).serializeJSON();
    let data = new FormData($('#form')[0]);
    console.log(data);
    if (id) {
        if (confirm('Save change')) {
            $.ajax({
                url: `/product/update/${id}`,
                method: 'post',
                data: data,
                processData: false,
                contentType: false,
                success: function(Obj) {
                    Cu.table.ajax.reload( );
                    $('#fs-modal').modal("hide");
                    Cu.success("Update success!");
                },
                error: function(errors) {
                    Cu.errors(errors);
                }
            });
        }
    }
    else {
        if (confirm('Save this data')) {
            $.ajax({
                url: `/product/store`,
                method: 'post',
                data: data,
                processData: false,
                contentType: false,
                success: function() {
                    Cu.table.ajax.reload();
                    $('#fs-modal').modal("hide");
                    Cu.success("Create success");
                },
                error: function(errors) {
                    Cu.errors(errors);
                }
            });
        }
    }
}


Cu.show = function(id) {
    $('#dx-modal').modal("show");
    $.ajax({
        method: "GET",
        url: "/product/show/" + id,
        success: function(response) {
            response_query = response;
            console.log(response_query.image);
            $("#category_id").find('category').text(response_query.category);
            $("#acce_id").text(response_query.acce);
            $("#nawing_id").text(response_query.nawing);
            $("#type_id").text(response_query.type);
            $("#dx-modal").find("#description").text(response_query.description);
            $("#ImageShow").attr("src", `${response_query.image}`);
        },
        error: function() {},
    });

}


Cu.destroy = function(id) {
    if (confirm('Delete this')) {
        $.ajax({
            url: `/product/delete/${id}`,
            method: 'delete',
            success: function(msg) {
                Cu.success(msg);
                Cu.table.ajax.reload(null, false);
            },
            error: function(errors) {
                alert('Delete errors');
            }
        });
    }
}


Cu.errors = function(errors) {
    // console.log(errors);
    if (errors.status == 422) {
        let msg = errors.responseJSON.errors;
        $(`#fs-modal .is-invalid`).removeClass('is-invalid');
        $(`#fs-modal .is-valid`).removeClass('is-valid');
        $(`#fs-modal .field`).addClass('is-valid');
        $('small.text').remove();
        $.each(msg, function(i, v) {
            $(`#fs-modal [name=${i}]`).addClass('is-invalid').after(`<small class="text text-danger mx-auto">${v}</small>`);
        });
    } else {
        $('#fs-modal').modal('hide');
        Cu.success("You are not authorized for this action", "Error", 'error');
    }
}

Cu.success = function(msg) {
    $.toast({
        heading: 'Success',
        text: msg,
        hideAfter: 5000,
        position: 'bottom-right',
        showHideTransition: 'slide',
        icon: 'success'
    });
}

Cu.init = function() {
    Cu.drawTable();
}


$(document).ready(function() {
    Cu.init();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});



