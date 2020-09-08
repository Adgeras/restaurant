@extends('layouts.app')
@section('content')
<div class="card-body">
    <form action="{{ route('restaurants.index') }}" method="GET">
        <select name="menu_id" id="" class="form-control">
            <option value="" selected disabled>Pasirinkite patiekalą filtravimui:</option>
            @foreach ($menus as $menu)
            <option value="{{ $menu->id }}" 
                @if($menu->id == app('request')->input('menu_id')) 
                    selected="selected" 
                @endif>{{ $menu->title }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<div class="card-body">
    @if($errors->any())
    <h4 style="color: red">{{$errors->first()}}</h4>
    @endif
    <table class="table">
        <tr>
            <th>Pavadinimas</th>
            <th>Žmonių kiekis telpantis restorane</th>
            <th>Kiek dirba dabuotojų</th>
            <th>Patiekalas</th>
            <th>Veiksmai</th>
        </tr>
        @foreach ($restaurants as $restaurant)
        <tr>
            <td>{{ $restaurant->title }}</td>
            <td>{{ $restaurant->customers }}</td>
            <td>{{ $restaurant->employees }}</td>
            <td>{{ $restaurant->menu['title'] }}</td>
            <td>
                <form action={{ route('restaurants.destroy', $restaurant->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('restaurants.edit', $restaurant->id) }}>Redaguoti</a>
                    <a class="btn btn-primary" href={{ route('restaurants.travel', $restaurant->id) }}>Restorano info</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Trinti"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('restaurants.create') }}" class="btn btn-success">Pridėti</a>
    </div>
</div>
@endsection