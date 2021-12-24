document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es',
        displayEventTime: false,
        events: "http://los-pinos.herokuapp.com/reserva/all",
        eventClick: function (info) {
            var reserva = info.event;
            Livewire.emit('open_modal_edit', reserva.id);
        },

        dateClick: function (info) {
            Livewire.emit('obtener_fecha_calendario', info.dateStr);
        }

    });


    calendar.render();
});