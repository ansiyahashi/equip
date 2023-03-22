@extends('layouts.master')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/arrobefr-jquery-calendar-bs4@1.0.3/dist/css/jquery-calendar.min.css">
    
@endsection

@section('main-content')
<div class="row">
    <div class="box box-solid">
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-js')
<script src='http://fullcalendar.io/js/fullcalendar-2.1.1/fullcalendar.min.js'></script>

<script type="text/javascript">

    $(document).ready(function(){
        var events = [];
        $.each($("input[name='events']:checked"), function(){
            events.push($(this).val());
        });

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next,today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listWeek'
            },
            contentHeight: 'auto',
            eventLimit: 2,
            eventSources: [
                {
                    url: '/calendar', 
                    type: 'get',
                    data: {
                        events: events
                    }
                     
                }
            ] ,
            eventRender: function (event, element) {
                if (event.title_html) {
                    element.find('.fc-title').html(event.title_html);
                }
                if (event.event_url) {
                    element.attr('href', event.event_url);
                }
            }
        });
    });

    $(document).on('change', '#user_id, #location_id', function(){
        reload_calendar();
    });

    $(document).on('ifChanged', '.event_check', function(){
        reload_calendar();
    }) 

    function reload_calendar(){
        data = [];
        if($('select#location_id').length) {
            data.location_id = $('select#location_id').val();
        }
        if($('select#user_id').length) {
            data.user_id = $('select#user_id').val();
        }

        var events = [];
        $.each($("input[name='events']:checked"), function(){
            events.push($(this).val());
        });

        data.events = events;

        var events_source = {
            url: '/calendar',
            type: 'get',
            data: data
        }
        $('#calendar').fullCalendar( 'removeEventSource', events_source);
        $('#calendar').fullCalendar( 'addEventSource', events_source);
    }
</script>
@endsection