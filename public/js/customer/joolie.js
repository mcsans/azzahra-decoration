$(document).ready(function () {
    triggerSweetalert();
});

document.addEventListener("livewire:initialized", function () {
    Livewire.on("notification", function (data) {
        $(document).ready(function () {
            sweetalert(data.icon, data.title);
        });
    });
    Livewire.on("sweetalert", function (data) {
        $(document).ready(function () {
            sweetalert(data.icon, data.title, data.text);
        });
    });
    Livewire.on("initSelect2", function (data) {
        $(document).ready(function () {
            initSelect2();
        });
    });
    Livewire.on("sweetConfirm", function (data) {
        $(document).ready(function () {
            sweetConfirm(data.icon, data.title, data.text, data.wire, data.id);
        });
    });
    Livewire.on("midtrans", function (data) {
        $(document).ready(function () {
            midtrans(data.snap_token);
        });
    });
});

document.querySelectorAll(".toggle-password").forEach(function (element) {
    element.addEventListener("click", function () {
        const passwordInput = this.previousElementSibling;
        const type =
            passwordInput.getAttribute("type") === "password"
                ? "text"
                : "password";
        passwordInput.setAttribute("type", type);
        this.classList.toggle("fa-eye");
        this.classList.toggle("fa-eye-slash");
    });
});

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
        confirmButtonColor: "#ec9dab",
    });
}

function sweetConfirm(icon, title, text, wire, id) {
    Swal.fire({
        title: title ?? "Are you sure?",
        text: text ?? "",
        icon: icon ?? "warning",
        showCancelButton: true,
        confirmButtonColor: "#A103D3",
        cancelButtonColor: "#d0d0d0",
        confirmButtonText: "Yes",
        cancelButtonText: "Close",
    }).then((result) => {
        if (result.isConfirmed) {
            if (id == null) {
                Livewire.dispatch(wire);
            } else {
                Livewire.dispatch(wire, { id: id });
            }
        } else {
            window.location.reload();
        }
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

function midtrans(snap_token) {
    window.snap.pay(snap_token, {
        onSuccess: function (result) {
            sweetalert(
                "success",
                "Payment Success",
                "Congratulations! Your payment has been successfully processed."
            );

            var baseUrl = document.querySelector('meta[name="url"]').content;
            window.location.href = baseUrl + "/history";
        },
        onPending: function (result) {
            sweetalert(
                "info",
                "Payment Pending",
                "Your payment is pending. Please wait for the confirmation."
            );
        },
        onError: function (result) {
            sweetalert(
                "error",
                "Payment Failed",
                "Oops! Payment failed. Please try again later."
            );
        },
        onClose: function () {
            sweetalert(
                "info",
                "Payment Cancelled",
                "You closed the popup without completing the payment."
            );
        },
    });
}
