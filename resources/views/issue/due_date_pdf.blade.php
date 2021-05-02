<table>
        <thead class="thead-dark">
            <tr>
            <th scope="col">Product Name</th>
            <th scope="col">CLO</th>
            <th scope="col">BTY</th>
            <th scope="col">User name</th>
            <th scope="col">Product life</th>
            <th scope="col">Qty</th>
            <th scope="col">Issued on</th>
            <th scope="col">Due on</th>
            <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
        @foreach (@$products as $product)
            <tr style="backgroundColor:#fff">
                <td >{{@$product->product->product_name}}</td>
                <td style="margin-left:5px;text-align:center">{{@$product->user->clo_card_no}}</td>
                <td style="margin-left:5px;text-align:center">{{@$product->user->battery}}</td>
                <td style="margin-left:5px;text-align:center">{{@$product->user->name}}</td>
                <td style="margin-left:5px;text-align:center">{{@$product->product->product_life_month}}</td>
                <td style="margin-left:5px;text-align:center">{{@$product->quantity}}</td>
                <td style="margin-left:5px;text-align:center">{{date('d-m-Y',strtotime($product->updated_at))}}</td>
                <td style="color:red;margin-left:5px;">{{@$product->due_date ? date('d-m-Y',strtotime($product->due_date)) : '-'}}</td>  
                <td style="margin-left:5px;text-align:center">{{@$product->status}}</td>  
            </tr>
        @endforeach
        </tbody>
    </table>
    