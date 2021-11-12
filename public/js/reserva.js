

document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es',
        displayEventTime: false,
        events: "http://los_pinos.test/reserva/all",

        eventClick: function (info) {
            var reserva = info.event;
            Livewire.emit('edit', reserva.id);
        },

        dateClick: function (info) {
            Livewire.emit('register', info.dateStr);
        }

    });


    calendar.render();
});
