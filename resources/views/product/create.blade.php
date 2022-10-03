
@include('assets.header')
        
@include('assets.sidebar')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Create Product</h1>
    </div>
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-body">
            <form action="{{ url('products') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group col-md-6 col-lg-6">
                <label class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6 col-lg-6">
                <label>Type</label>
                <input type="text" class="form-control @error('type') is-invalid @enderror" name="type">
                @error('type')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6 col-lg-6">
                <label>Price</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price">
                @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6 col-lg-6">
                <label>Stock</label>
                <input type="text" class="form-control @error('stock') is-invalid @enderror" name="stock">
                @error('stock')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6 col-lg-6">                
                <button type="submit" class="btn btn-primary text-right">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@include('assets.footer')