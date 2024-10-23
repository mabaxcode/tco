"use strict";

var KTCalendarBasic = function() {

    return {
        //main function to initiate the module
        init: function() {


            // function load_events()
            // {
            //     var eventsArray = [];
            //     var eventsArrayNew = [];

            //     $.ajax({
            //         url: base_url + 'tutor/get_tutor_timetable',
            //         type: 'POST',
            //         dataType:'json',
            //         success: function(response) {
            //             // console.log(response);
            //             // response.forEach(event => {
            //             //     eventsArrayNew.push(event);
            //             // });

            //             const dataNew = {
            //                 "events": [
            //                     {
            //                         "title": "Math Class",
            //                         "start": "2024-10-01",
            //                         "description": "Introduction to Algebra",
            //                         "className": "Math101"
            //                     },
            //                     {
            //                         "title": "Science Class",
            //                         "start": "2024-10-02",
            //                         "description": "Fundamentals of Physics",
            //                         "className": "Sci101"
            //                     },
            //                     // ... other events
            //                 ]
            //             };


            //             dataNew.events.forEach(event => {
            //                 eventsArrayNew.push(event);
            //             });
            //             // console.log(dataNew);
            //             // console.log(eventsArrayNew);
            //             return eventsArrayNew;
            //         }
            //     });
            // }

            function load_events(callback) {
                var eventsArrayNew = [];

                $.ajax({
                    url: base_url + 'tutor/get_tutor_timetable',
                    type: 'POST',
                    dataType: 'json',
                    success: function(response) {
                        // If you're using the AJAX response instead of dataNew, uncomment the next line
                        // response.forEach(event => eventsArrayNew.push(event));

                        // Static example data
                        const dataNew = {
                            "events": [
                                {
                                    "title": "Math Class",
                                    "start": "2024-10-01",
                                    "description": "Introduction to Algebra",
                                    "className": "Math101"
                                },
                                {
                                    "title": "Science Class",
                                    "start": "2024-10-02",
                                    "description": "Fundamentals of Physics",
                                    "className": "Sci101"
                                }
                            ]
                        };

                        dataNew.events.forEach(event => {
                            eventsArrayNew.push(event);
                        });

                        // Call the callback with the events
                        if (callback && typeof callback === 'function') {
                            callback(eventsArrayNew);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error loading events:', error);
                    }
                });
            }

            var eventsArrayBabi = [];

            // Usage


            


            // console.log(eventsArrayNew);

            // Assuming you've fetched the JSON and stored it in 'data'
            // const data = {
            //     "events": [
            //         {
            //             "title": "Math Class",
            //             "start": "2024-10-01",
            //             "description": "Introduction to Algebra",
            //             "className": "Math101"
            //         },
            //         {
            //             "title": "Science Class",
            //             "start": "2024-10-02",
            //             "description": "Fundamentals of Physics",
            //             "className": "Sci101"
            //         },
            //         // ... other events
            //     ]
            // };

            // // Push each event into eventsArray
            // data.events.forEach(event => {
            //     eventsArray.push(event);
            // });

            // console.log(eventsArray);

            // Now you can process eventsArray as needed
            // processEvents();



            var todayDate = moment().startOf('day');
            var YM = todayDate.format('YYYY-MM');
            var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
            var TODAY = todayDate.format('YYYY-MM-DD');
            var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

            var calendarEl = document.getElementById('kt_calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid', 'list' ],
                themeSystem: 'bootstrap',

                isRTL: KTUtil.isRTL(),

                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },

                height: 800,
                contentHeight: 780,
                aspectRatio: 3,  // see: https://fullcalendar.io/docs/aspectRatio

                nowIndicator: true,
                now: TODAY + 'T09:25:00', // just for demo

                views: {
                    dayGridMonth: { buttonText: 'month' },
                    timeGridWeek: { buttonText: 'week' },
                    timeGridDay: { buttonText: 'day' }
                },

                defaultView: 'dayGridMonth',
                defaultDate: TODAY,

                editable: true,
                eventLimit: true, // allow "more" link when too many events
                navLinks: true,
                events: function(fetchInfo, successCallback, failureCallback) {
                    fetch(base_url + 'tutor/get_tutor_timetable', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(events => {
                        successCallback(events.events); // Pass the events to FullCalendar
                        // console.log(events.events);
                    })
                    .catch(error => {
                        console.error('Error fetching events:', error);
                        failureCallback(error); // Handle errors
                    });
                },

                eventRender: function(info) {
                    var element = $(info.el);

                    if (info.event.extendedProps && info.event.extendedProps.description) {
                        if (element.hasClass('fc-day-grid-event')) {
                            element.data('content', info.event.extendedProps.description);
                            element.data('placement', 'top');
                            KTApp.initPopover(element);
                        } else if (element.hasClass('fc-time-grid-event')) {
                            element.find('.fc-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
                        } else if (element.find('.fc-list-item-title').lenght !== 0) {
                            element.find('.fc-list-item-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
                        }
                    }
                }
            });

            calendar.render();
        }
    };
}();

jQuery(document).ready(function() {
    KTCalendarBasic.init();
});
