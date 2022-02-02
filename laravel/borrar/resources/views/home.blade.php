@extends('layout')

@section('title', 'Home')

@section('content')
<h1>Hola {{$nombre ?? 'Invitado'}}. ¿Empiezas a sentirte un poco más a gusto con Laravel?</h1>
@endsection
