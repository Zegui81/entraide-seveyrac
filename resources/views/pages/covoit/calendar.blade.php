@extends('layouts.app')
@section('content')
    <script>
       $(document).ready(function() {
           $('#calendar').fullCalendar({
               lang: 'fr',
			   editable: false,
               disableDragging: true,
   		       eventDurationEditable : false,
   		       theme: true,
   		       themeSystem: 'bootstrap4',
      		   height: 600,
         	   header: {
                   left: 'prev,next today',
             	   center: 'title',
             	   right: 'agendaDay,agendaWeek,month'
			   },
           	   navLinks: true, // can click day/week names to navigate views
               eventLimit: true, // allow "more" link when too many events
               events: @json($covoits)
            });
        });
    </script>
    <div id="calendar" class="container mb-4 mt-4"></div>
@endsection