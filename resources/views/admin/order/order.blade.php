@extends('admin.layout.app')

@section('child')
<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Orders</h1>
							</div>
							
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
                        @include('admin.massage')
						<div class="card"> 
                            <form action="" method="get">
						                
                           
                            <div class="card-tools">
									
								</div>
                            

								
							</div>
                        </form>
							<div class="card-body table-responsive p-0">								
								<table class="table table-hover text-nowrap">
									<thead>
										<tr>
											<th width="60">Customer Name</th>
                                            <th>Email</th>
											<th>Phone</th>
                                            <th>Product Name</th>
											
											<th>Quantity</th>
											
                                            <th>Price</th>
											<th>Payment Status</th>
                                            <th>Delivery Status</th>
											<th>Delivered</th>
										</tr>
									</thead>
								<tbody>

                                 

                                    @foreach($order as $order)
                                    <tr>
											<td>{{$order->name}}</td>
											<td>{{$order->email}}</td>
											<td>{{$order->phone}}</td>
                                            <td>{{$order->product_title}}</td>
											<td>{{$order->quantity}}</td>
											<td>{{$order->price}}</td>
                                            <td>{{$order->payment_status}}</td>
                                            <td>{{$order->delivery_status}}</td>


                                           


											<td>
                                             @if($order->delivery_status=='processing')
                                                <a href="{{route('order.delivered',['id' => $order->id])}}" onclick="return confirm('Are you sure?')" class="btn btn-primary">Delivered</a>
                                               
                                                @else

                                                <span>Delivered</span>
                                               
                                            @endif
                                            </td>
											
										</tr>
                                    @endforeach
                                    
                                  

                                </tbody>                               
</table>
</div>
							
						</div>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->    
@endsection

