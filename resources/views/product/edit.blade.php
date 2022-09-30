
@include('assets.header')
        
@include('assets.sidebar')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Update Product</h1>
    </div>
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-body">
            <form action="{{ url('products/'. $product->id ) }}" method="post" enctype="multipart/form-data">
            @method('put')
              @csrf
              <div class="form-group col-md-6 col-lg-6">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}" autofocus>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6 col-lg-6">
                <label>Type</label>
                <input type="text" class="form-control" name="type" value="{{ old('type', $product->type) }}">
                @error('type')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6 col-lg-6">
                <label>Price</label>
                <input type="text" class="form-control" name="price" value="{{ old('price', $product->price) }}">
                @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6 col-lg-6">
                <label>Stock</label>
                <input type="text" class="form-control" name="stock" value="{{ old('stock', $product->stock) }}">
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