@extends('layouts.app')

@section('contenido')
  <div id="map"></div>

  <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDY0rOo5NaiHngwJ6VIjpfah7RCFffHEcs&callback=initMap&libraries=&v=weekly"
    async
  ></script>
@stop