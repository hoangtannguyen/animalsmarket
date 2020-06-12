
@foreach ($product as $i)
    <tr>
        <td>{{ $i->id}}</td>
        <td>{{ $i->name }}</td>
        <td>{{ $i->price}}</td>
        <td>{{ $i->quantity}}</td>
        <td> {{ number_format(Cart::getSubTotal())}}VNĐ</td>



    </tr>

@endforeach
