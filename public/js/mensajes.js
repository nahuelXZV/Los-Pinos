

Livewire.on('alert', function (message) {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2500,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    Toast.fire({
        icon: 'success',
        title: message
    })
})



Livewire.on('deleteArea', area => {
    Swal.fire({
        title: 'Esta seguro?',
        text: "Los datos se borraran permanentemente!",
        icon: 'Advertencia',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emitTo('area-comun.lw-area-comun', 'delete', area);
            Swal.fire(
                'Eliminado!',
                'El área común fue eliminado con éxito.',
                'éxito'
            )
        }
    })
})

Livewire.on('deleteReserva', area => {
    Swal.fire({
        title: 'Esta seguro?',
        text: "Los datos se borraran permanentemente!",
        icon: 'Advertencia',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emitTo('area-comun.lw-list-reserva', 'delete', area);
            Swal.fire(
                'Eliminado!',
                'La reserva fue eliminada con éxito.',
                'éxito'
            )
        }
    })
})
Livewire.on('deleteReservaC', area => {
    Swal.fire({
        title: 'Esta seguro?',
        text: "Los datos se borraran permanentemente!",
        icon: 'Advertencia',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emitTo('area-comun.lw-reserva', 'delete', area);
            Swal.fire(
                'Eliminado!',
                'La reserva fue eliminada con éxito.',
                'éxito'
            )
        }
    })
})

Livewire.on('deleteInvitado', invitado => {
    Swal.fire({
        title: 'Esta seguro?',
        text: "Los datos se borraran permanentemente!",
        icon: 'Advertencia',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emitTo('area-comun.lw-show-reserva', 'delete', invitado);
            Swal.fire(
                'Eliminado!',
                'El invitado fue eliminado con éxito.',
                'éxito'
            )
        }
    })
})

Livewire.on('deleteReporte', reporte => {
    Swal.fire({
        title: 'Esta seguro?',
        text: "Los datos se borraran permanentemente!",
        icon: 'Advertencia',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emitTo('area-comun.lw-reporte', 'delete', reporte);
            Swal.fire(
                'Eliminado!',
                'El reporte fue eliminado con éxito.',
                'éxito'
            )
        }
    })
})
Livewire.on('deleteResidente', persona => {
    Swal.fire({
        title: 'Esta seguro?',
        text: "Los datos se borraran permanentemente!",
        icon: 'Advertencia',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emitTo('seguridad.residente.lw-residente', 'delete', persona);
            Swal.fire(
                'Eliminado!',
                'El residente fue eliminado con éxito.',
                'éxito'
            )
        }
    })
})
Livewire.on('deleteVisitante', persona => {
    Swal.fire({
        title: 'Esta seguro?',
        text: "Los datos se borraran permanentemente!",
        icon: 'Advertencia',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emitTo('seguridad.visitante.lw-visitante', 'delete', persona);
            Swal.fire(
                'Eliminado!',
                'El visitante fue eliminado con éxito.',
                'éxito'
            )
        }
    })
})