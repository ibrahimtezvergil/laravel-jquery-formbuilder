require('./bootstrap');


$(document).ready(function () {

    let fbTemplate = document.getElementById("build-wrap");
    let formList = $('.form-list');
    let form = $('.form');
    let options = {
        onSave: function (evt, formData) {
            $('#FormSaveModal').modal('show')

        },
        onClearAll: function () {
            alert('all fields removed');
        }
    };

    $('.form-list-action').click(function () {
        getData();

        form.addClass('d-none');
        formList.removeClass('d-none');
    })
    $('.form-store-action').click(function () {
        form.removeClass('d-none');
        formList.addClass('d-none');
    })
    let formBuilder = $(fbTemplate).formBuilder(options);

    function getData(param) {
        $.get('/get-forms', function (data, textStatus, jqXHR) {
            formList.empty();
            for (const [key, value] of Object.entries(data)) {
                $('.form-list').append(`<a href="#" class="list-group-item list-group-item-action" id="list-group-item-action" data-id=${value.id}>
                    ${value.title}
                </a>`);
            }
        })
    }

    $("form").submit(function (event) {
        postData();
    });

    function postData() {
        let requestURL = $('.id').val() === '0' ? '/save-form' : '/update-form/'+$('.id').val();
        console.log(requestURL)
        let formData = {
            "_token": $('#token').val(),
            title: $(".title").val(),
            content: formBuilder.actions.getData('json')
        };
        let result = $.post(requestURL, formData)
        result.done(function (response){
            alert('İşlem Başarılı')
        })
        result.fail(function (error){
            alert('İşlem Başarısız')
        })
        $('#FormSaveModal').modal('hide')
        formBuilder.actions.clearFields();
        event.preventDefault();
    }

    $('body').delegate('.list-group-item', 'click', function (data) {

            $.get('/form-detail/' + this.getAttribute('data-id'), function (data, textStatus, jqXHR) {
                form.removeClass('d-none');
                formList.addClass('d-none');
                console.log(data.content)
                formBuilder.actions.setData(JSON.parse(data.content))
                $('.title').val(data.title);
                $('.id').val(data.id);
            })
        }
    );
})
