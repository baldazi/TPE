<div id='calendar'></div>

{*-- Modal --*}
<div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="eventModalTitle">[titre]</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="flex gap">
                    <span class="fw-bold">Debut :</span>
                    <span id="eventModalStartedDate">[date]</span>
                </div>
                <div class="flex gap">
                    <span class="fw-bold">Fin :</span>
                    <span id="eventModalEndDate">[Fin]</span>
                </div>
                <div class="flex gap">
                    <span class="fw-bold">Lieu :</span>
                    <span id="eventModalLocation">[Lieu]</span>
                </div>
                <div class="flex gap">
                    <span class="fw-bold">Description :</span>
                    <span id="eventModalDescription">[Description]</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>

<!-- terst -->
<script>
    const formatDateTime = (date) =>
        date.slice(0, 4) + "-" + date.slice(4, 6) + "-" + date.slice(6, 8) +
        (date.length > 8 ? date.slice(0, 2) + ":" + date.slice(2, 4) : "");

    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        function handleDatesSet(arg) {
            console.log('viewType:', arg.view.type);
        }

        var calendar = new FullCalendar.Calendar(calendarEl, {
            dayMaxEventRows: true,
            views: {
                timeGrid: {
                    dayMaxEventRows: 3
                }
            },
            height: 800,
            initialView: 'dayGridMonth',
            locales: "fr",
            locale: "fr",
            datesSet: handleDatesSet,
            defaultDate: '2019-08-07',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            buttonText: {
                today: 'Aujourd\'hui',
                month: 'Mois',
                week: 'Semaine',
                day: 'Jour',
                list: 'Liste'
            },
            events: [
                {foreach from=$events item=e}
                {
                    "id": "{$e->eventID}",
                    title: `{$e->title}`,
                    start: "{$e->startDateTime}",
                    end: "{$e->endDateTime}",
                    color: "{$e->colorHexValue}",
                    extendedProps: {
                        created: "{$e->created}",
                        lastModified: "{$e->lastModified}",
                        description: `{$e->description}`,
                        location: `{$e->location}`,
                        status: "{$e->status}",
                        calendarID: "{$e->calendarID}"
                    },
                },
                {/foreach}
            ],

            eventClick: function (info) {
                const eventModal = new bootstrap.Modal(document.getElementById("eventModal"), {});

                const modalTitle = document.querySelector('#eventModalTitle');
                const modalStartDate = document.querySelector('#eventModalStartedDate');
                const modalEndDate = document.querySelector('#eventModalEndDate');
                const modalLocation = document.querySelector('#eventModalLocation');
                const modalDescription = document.querySelector('#eventModalDescription');

                modalTitle.textContent = info.event.title;
                modalStartDate.textContent = info.event.start;
                modalEndDate.textContent = info.event.end;
                modalLocation.textContent = info.event.extendedProps.location;
                modalDescription.textContent = info.event.extendedProps.description;

                eventModal.show();

            }
        });

        calendar.render();
    });

    //https://codepen.io/bkriss/pen/VoEWLJ
</script>
