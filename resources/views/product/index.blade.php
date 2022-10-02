
@include('assets.header')
        
@include('assets.sidebar')


<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Product</h1>
      </div>

      @if (session()->has('success'))
      <div class="alert alert-success alert-has-icon">
        <div class="alert-icon"><i class="fa fa-check"></i></i></div>
        <div class="alert-body">
          <div class="alert-title">Success</div>
          {{ session('success') }}
        </div>
      </div>
  @endif
      <div class="section-body">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">
              <a href="{{ url('products/create') }}" class="btn btn-icon btn-primary"><i class="fa fa-plus"></i> Add</a>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped table-md">
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Action</th>
                  </tr>
                  @foreach ($products as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->type }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>
                      <a href="{{ url('products/'. $item->id .'/edit') }}" class="btn btn-icon btn-warning"><i class="far fa-edit"></i></a>
                      <form action="products/{{ $item->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-icon btn-danger" onclick="return confirm('Are You Sure?')"><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>
                  @endforeach
                  
                </table>
              </div>
            </div>
            <div class="card-footer text-right">
              <nav class="d-inline-block">
                <ul class="pagination mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                  </li>
                  <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@include('assets.footer')