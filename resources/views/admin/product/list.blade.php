@extends('admin.layout.app')

@section('child')
<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Products</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('product.create')}}" class="btn btn-primary">New Product</a>
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
                           
						<div class="card-body table-responsive p-0">								
								<table class="table table-hover text-nowrap">
									<thead>
										<tr>
											
											<th>Name</th>
											<th>Description</th>
											<th width="60">Quantity</th>
											<th width="60">Price</th>
											<th>Discount Price</th>
											<th>Category</th>
											<th>Image</th>
											<th>Action</th>

										</tr>
									</thead>
								<tbody>

                                   

                                    @foreach($products as $pro)
                                    <tr>
											
											<td>{{$pro->title}}</td>
											<td>{{$pro->description}}</td>
											<td>{{$pro->quantity}}</td>
											<td>{{$pro->price}}</td>
											<td>{{$pro->discount_price}}</td>
											<td>{{$pro->catagory}}</td>
											<td>
												<img src="/product/{{$pro->image}}">
											</td>
											
											<td>
												
												<a href="{{route('product.edit',$pro->id)}}" >
												
													<svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
														<path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
													</svg>
												</a>
												<a href="{{route('product.delete',$pro->id)}}" onclick="return confirm('Are you sure to delete it?')" class="text-danger w-4 h-4 mr-1">
													<svg wire:loading.remove.delay="" wire:target="" class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
														<path	ath fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
												  	</svg>
												</a>
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

