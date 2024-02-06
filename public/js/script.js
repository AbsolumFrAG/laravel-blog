$(document).ready(function () {
    /* the submit forms */
    $(document).on("submit", "form.SubmitFormAjax", getFormSubmitAjax);
});

const getFormSubmitAjax = function (event) {
    event.preventDefault();
    var form_ =  $(this);

    $.ajax({
        url: form_.attr("action"),
        type: form_.attr("method"),
        dataType: "JSON",
        data: new FormData(this),
        processData: false,
        contentType: false,
        beforeSend: function() { },
        complete: function() { },
        success: function (res) {
            if (res.id) {
                let jsn = JSON.stringify(res, undefined, 2);
                clickModal(res.slug, `<pre>${jsn}</pre>`);
                dump(res);
            }

            if (res.error) {
                dump(res);
            }

            form_.trigger("reset");
        },
        error: function (res){
            console.log(res);
        }
    });

    return false;
}

const clickModal = (title, body) => {
    var popup = document.getElementById('popupModal');

    popup.querySelector('h1').innerHTML = title;
    popup.querySelector('div.modal-body').innerHTML = body;

    var myModal = new bootstrap.Modal(popup);
    myModal.show();
}

const dump = (res) => {
    console.log(JSON.stringify(res,undefined, 2));
}
