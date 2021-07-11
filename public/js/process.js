jQuery(function ($) {
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
  var formBuilder = $(fbTemplate).formBuilder(options);

  function getData(param) {
    $.get('http://127.0.0.1:8000/get-forms', function (data, textStatus, jqXHR) {
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
    var formData = {
      "_token": "{{ csrf_token() }}",
      title: $(".title").val(),
      content: formBuilder.actions.getData('json')
    };
    var result = $.post("http://127.0.0.1:8000/save-form", formData)
    $('#FormSaveModal').modal('hide')
    formBuilder.actions.clearFields();
    event.preventDefault();
  }

  $('body').delegate('.list-group-item', 'click', function (data) {

        $.get('http://127.0.0.1:8000/form-detail/' + this.getAttribute('data-id'), function (data, textStatus, jqXHR) {
          form.removeClass('d-none');
          formList.addClass('d-none');
          formBuilder.actions.setData(JSON.parse(data.content))

        })
      }
  );
});