Livewire.on('alert', function(message) {
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
            Livewire.emitTo('area-comun.area-comun.lw-area-comun', 'delete', area);
        }
    })
})

Livewire.on('deleteReserva', reserva => {
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
            Livewire.emitTo('area-comun.reserva.lw-reserva', 'delete', reserva);
        }
    })
})

Livewire.on('deleteReservaC', reserva => {
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
            Livewire.emitTo('area-comun.calendario.lw-reserva-calendario', 'delete', reserva);
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
            Livewire.emitTo('area-comun.reserva.lw-lista-invitados', 'delete', invitado);
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
            Livewire.emitTo('area-comun.reserva.lw-reporte-reserva', 'delete', reporte);
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
        }
    })
})
Livewire.on('deleteMotorizado', motorizado => {
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
            Livewire.emitTo('seguridad.motorizado.lw-motorizado', 'delete', motorizado);
        }
    })
})
Livewire.on('deleteVivienda', vivienda => {
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
            Livewire.emitTo('seguridad.vivienda.lw-vivienda', 'delete', vivienda);
        }
    })
})
Livewire.on('deleteIngreso', ingreso => {
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
            Livewire.emitTo('seguridad.ingreso.lw-ingreso', 'delete', ingreso);
        }
    })
})
Livewire.on('deleteIngresoV', ingresoV => {
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
            Livewire.emitTo('seguridad.ingreso.lw-lista-persona', 'deleteV', ingresoV);
        }
    })
})
Livewire.on('deleteIngresoR', ingresoR => {
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
            Livewire.emitTo('seguridad.ingreso.lw-lista-persona', 'deleteR', ingresoR);
        }
    })
})
Livewire.on('deleteUsuario', usuario => {
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
            Livewire.emitTo('sistema.usuario', 'delete', usuario);
        }
    })
})
Livewire.on('deleteRol', rol => {
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
            Livewire.emitTo('sistema.roles', 'delete', rol);
        }
    })
})
Livewire.on('deleteAlmacen',
    almacenID => {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Los datos se borrarán permanentemente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {

                Livewire.emitTo('equipo.almacen.show-almacens', 'delete', almacenID)

            }
        })
    });
Livewire.on('deletePersonal',
    personalCodigo => {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Los datos se borrarán permanentemente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '!Sí, eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {

                Livewire.emitTo('personal.personal.show-personal', 'delete', personalCodigo)
            }
        })
    });
Livewire.on('deleteRegreso',
    regresoID => {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Los datos se borrarán permanentemente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {

                Livewire.emitTo('equipo.regreso.show-regreso-equipos', 'delete', regresoID)

            }
        })
    });
Livewire.on('deleteReporteA',
    reporteID => {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Los datos se borrarán permanentemente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {

                Livewire.emitTo('personal.reporte-asistencia.show-reporte', 'delete', reporteID)

            }
        })
    });
Livewire.on('deletePermiso',
    permisoID => {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Los datos se borrarán permanentemente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {

                Livewire.emitTo('personal.reporte-asistencia.show-permisos', 'delete', permisoID)

            }
        })
    });

Livewire.on('deleteIngresoP',
    ingresoPID => {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Los datos se borrarán permanentemente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {

                Livewire.emitTo('personal.reporte-asistencia.show-permisos', 'deleteI',
                    ingresoPID)

            }
        })
    });

Livewire.on('deleteSalidaP',
    salidaPID => {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Los datos se borrarán permanentemente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {

                Livewire.emitTo('personal.reporte-asistencia.show-permisos', 'deleteS',
                    salidaPID)

            }
        })
    });

Livewire.on('deleteTrabajo', trabajo => {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Los datos se borrarán permanentemente",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {

            Livewire.emitTo('personal.trabajo.lw-trabajos', 'delete', trabajo);

        }
    })
});
Livewire.on('deleteHorario', horario => {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Los datos se borrarán permanentemente",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {

            Livewire.emitTo('horario.lw-horario', 'delete', horario);

        }
    })
});
Livewire.on('deleteSeccion', seccion => {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Los datos se borrarán permanentemente",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {

            Livewire.emitTo('personal.seccion.lw-seccion', 'delete', seccion);

        }
    })
});



Livewire.on('deleteResidente', residente => {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Los datos se borrarán permanentemente",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {

            Livewire.emitTo('seguridad.residente.lw-residente', 'delete', residente)

        }
    })
});
Livewire.on('deleteVisitante', visitante => {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Los datos se borrarán permanentemente",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {

            Livewire.emitTo('seguridad.visitante.lw-visitante', 'delete', visitante)

        }
    })
});

Livewire.on('deleteVivienda', vivienda => {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Los datos se borrarán permanentemente",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {

            Livewire.emitTo('seguridad.vivienda.lw-vivienda', 'delete', vivienda)

        }
    })
});
Livewire.on('deleteMotorizado', motorizado => {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Los datos se borrarán permanentemente",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {

            Livewire.emitTo('seguridad.motorizado.lw-motorizado', 'delete', motorizado)

        }
    })
});