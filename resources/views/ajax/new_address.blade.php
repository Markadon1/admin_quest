@foreach($user->addresses as $address)
    <option value="{{$address->id}}">{{$address->city}}, {{$address->address}}</option>
@endforeach