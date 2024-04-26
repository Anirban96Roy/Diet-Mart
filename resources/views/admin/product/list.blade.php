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
                           
														
								

                                   

							 	 
						
						</div>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->    
@endsection

