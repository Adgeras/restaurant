@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Info restoraną</div>
    <div class="card-body">
        <h5>Restoranas: {{ $restaurant->title }}</h5>
        <h5>Klientų skaičius: {{ $restaurant->customers }}</h5>
        <h5>Darbuotojų skaičius: {{ $restaurant->employees }}</h5>
        <hr>
        <h5>Patiekalas:  {{ $restaurant->menu->title }}</h5>
        <table class="table">
        </table>
    </div>
</div>
@endsection