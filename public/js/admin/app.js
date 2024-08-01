$(document).ready(function () {
    datatable();
    select2();
    triggerSweetalert();
    popupImage();
    summernote();
    tooltips();
});

function datatable() {
    $("#dataTable").DataTable({
        pageLength: 5,
        lengthMenu: [
            [-1, 5, 10, 25, 50, 100],
            ["All", 5, 10, 25, 50, 100],
        ],
        drawCallback: function (settings) {
            popupImage();
            tooltips();
        },
    });
}

function select2() {
    $(".select2").select2({
        theme: "bootstrap",
    });
    $(".select2-multiple").select2();
}

// SWEETALERT
const Toast = Swal.mixin({
    toast: true,
    position: "bottom-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
});

function notification(icon, title) {
    Swal.fire({
        position: "center",
        icon: icon,
        title: title,
        showConfirmButton: false,
        timer: 1500,
    });
}

function sweetalert(icon, title, text) {
    Swal.fire({
        title: title,
        text: text,
        icon: icon,
    });
}

function triggerSweetalert() {
    if ($(".sweetalert").length > 0) {
        const icon = $(".sweetalert").data("icon");
        const title = $(".sweetalert").data("title");
        const text = $(".sweetalert").data("text");

        sweetalert(icon, title, text);
    }
}

$(".form-delete").submit(function (e) {
    e.preventDefault();
    let form = this;

    Swal.fire({
        title: "Are you sure?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes",
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
});

function popupImage() {
    $(".popup-image").magnificPopup({
        type: "image",
    });
}

function summernote() {
    $(".summernote").summernote({
        tabsize: 2,
        height: 100,
    });
}

function tooltips() {
    $(".btn-tooltip").tooltip();
}
