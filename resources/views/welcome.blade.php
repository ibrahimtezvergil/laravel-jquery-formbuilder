<!DOCTYPE html>
<html>
<head>
    <title>Example formBuilder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body class="bg-light">
<div class="container">
    <div class="row col-md-12 mt-4 mb-4">
        <button class="btn btn-info col-md-4 form-store-action m-auto">Form Tasarla</button>
        <button class="btn btn-info col-md-4 form-list-action m-auto">Form Listele</button>
    </div>
    <div class="row col-md-12 form">
        <div id="build-wrap"></div>
        <div class="render-wrap"></div>
    </div>
    <div class="row col-md-12 form-list d-none">
        <div class="container">
            <div class="list-group"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="FormSaveModal" tabindex="-1" role="dialog" aria-labelledby="FormSaveModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="FormSaveModalLabel">Form Kaydet</h5>
            </div>
            <form action="{{ route('save.form') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <input type="hidden" class="id" name="id" id="id" value="0">
                        <input class="form-control title" id="title" name="title" type="text" placeholder="Form Başlığı">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>
<script>

</script>
<script src="/js/app.js"></script>

<script>
    {{--jQuery(function ($) {--}}
    {{--    let fbTemplate = document.getElementById("build-wrap");--}}
    {{--    let formList = $('.form-list');--}}
    {{--    let form = $('.form');--}}
    {{--    let options = {--}}
    {{--        onSave: function (evt, formData) {--}}
    {{--            $('#FormSaveModal').modal('show')--}}

    {{--        },--}}
    {{--        onClearAll: function () {--}}
    {{--            alert('all fields removed');--}}
    {{--        }--}}
    {{--    };--}}

    {{--    $('.form-list-action').click(function () {--}}
    {{--        getData();--}}

    {{--        form.addClass('d-none');--}}
    {{--        formList.removeClass('d-none');--}}
    {{--    })--}}
    {{--    $('.form-store-action').click(function () {--}}
    {{--        form.removeClass('d-none');--}}
    {{--        formList.addClass('d-none');--}}
    {{--    })--}}
    {{--    var formBuilder = $(fbTemplate).formBuilder(options);--}}

    {{--    function getData(param) {--}}
    {{--        $.get('/get-forms', function (data, textStatus, jqXHR) {--}}
    {{--            formList.empty();--}}
    {{--            for (const [key, value] of Object.entries(data)) {--}}
    {{--                $('.form-list').append(`<a href="#" class="list-group-item list-group-item-action" id="list-group-item-action" data-id=${value.id}>--}}
    {{--                ${value.title}--}}
    {{--            </a>`);--}}
    {{--            }--}}
    {{--        })--}}
    {{--    }--}}

    {{--    $("form").submit(function (event) {--}}
    {{--        postData();--}}
    {{--    });--}}

    {{--    function postData() {--}}
    {{--        var formData = {--}}
    {{--            "_token": "{{ csrf_token() }}",--}}
    {{--            title: $(".title").val(),--}}
    {{--            content: formBuilder.actions.getData('json')--}}
    {{--        };--}}
    {{--        var result = $.post("/save-form", formData)--}}
    {{--        $('#FormSaveModal').modal('hide')--}}
    {{--        formBuilder.actions.clearFields();--}}
    {{--        event.preventDefault();--}}
    {{--    }--}}

    {{--    $('body').delegate('.list-group-item', 'click', function (data) {--}}

    {{--            $.get('/form-detail/' + this.getAttribute('data-id'), function (data, textStatus, jqXHR) {--}}
    {{--                form.removeClass('d-none');--}}
    {{--                formList.addClass('d-none');--}}
    {{--                formBuilder.actions.setData(JSON.parse(data.content))--}}

    {{--            })--}}
    {{--        }--}}
    {{--    );--}}
    {{--});--}}


</script>
</body>
</html>