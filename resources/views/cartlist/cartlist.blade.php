<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    @if(isset($error))
        <div class="row">
            <div class="alert alert-danger" role="alert">
                A simple primary alert—check it out!
            </div>
        </div>
    @endif
   
    <div class="row">
        <form method="post" action="/logout">
            @csrf
            <button class="w-15 btn btn-lg btn-danger" type="submit">Sign Out</button>
        </form>
    </div>
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h3 class="display-4 fw-bold lh-1 mb-3">Shopping Cart Test</h3>
            <p class="col-lg-10 fs-4">by <a target="_blank" href="#">Mohammad Ricky</a></p>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
            <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="cartlist/discount">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="code" placeholder="code">
                    <label for="todo">Discount Code</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Diskon</button>
            </form>
        </div>
    </div>
    <div class="row align-items-right g-lg-5 py-5">
        <div class="mx-auto">
            <form id="deleteForm" method="post" style="display: none">

            </form>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">PRODUCT</th>
                    <th scope="col">PILIHAN HARGA</th>
                    <th scope="col">KUANTITAS</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                    @foreach ($cartlist->detail as $detail)
                    
                    <tr>
                        <td>
                            {{$no++}}
                        </td>
                        <td>
                            {{ $detail->product->product_name }}
                        </td>
                        <td>
                            {{ number_format($detail->price, 2) }}
                        </td>
                        <td>
                        <div class="btn-group" role="group">
                            <form action="/cartlist/minus" method="post">
                                @csrf()
                                <input type="hidden" name="value" value={{$detail->id}}>
                                <button class="btn btn-primary btn-sm">
                                -
                                </button>
                                </form>
                                <button class="btn btn-outline-primary btn-sm" disabled="true">
                                {{ number_format($detail->qty, 2) }}
                                </button>
                                <form action="/cartlist/add" method="post">
                               
                                @csrf()
                                <input type="hidden" name="value" value={{$detail->id}}>
                                <button class="btn btn-primary btn-sm">
                                +
                                </button>
                                </form>
                            </div>
                            </td>
                            <td>
                            {{ number_format($detail->subtotal, 2) }}
                            </td>
                            <td>
                            <form action="/cartlist/delete" method="post" style="display:inline;">
                            @csrf
                            <input type="hidden" name="value" value={{$detail->id}}>
                            <button type="submit" class="btn btn-sm btn-danger mb-2">
                                Hapus
                            </button>                    
                            </form>
                            </td>
                        </tr>
                        @endforeach
                
                </tbody>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>TOTAL</td>
                    <td> {{ number_format($cartlist->total, 2) }}</td>
                </tr>
            </table>
        </div>
    </div>  
</div>
</body>
</html>