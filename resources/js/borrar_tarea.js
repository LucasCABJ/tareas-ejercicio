import Swal from "sweetalert2";

const delete_buttons = document.querySelectorAll('.delete-button');

delete_buttons.forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();

        Swal.fire({
            title: '¿Estas seguro?',
            text: "Se borrará el registro permanentemente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, borrar',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            if (result.isConfirmed) {
              btn.form.submit();
            }
          })

    });
});