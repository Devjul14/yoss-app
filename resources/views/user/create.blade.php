@include('assets.header')

@include('assets.sidebar')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Create Users</h1>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('users') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group col-md-6 col-lg-6">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 col-lg-6">
                                <label>Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 col-lg-6">
                                <label>Password</label>
                                <input type="text" class="form-control @error('password') is-invalid @enderror" name="password">
                                @error('password')
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