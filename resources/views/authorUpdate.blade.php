@include("header")


<main id="main-container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <!-- Page Content -->
    <main id="main-container">

        <!-- Page Content -->
        <div class="content">
          <!-- Quick Overview + Actions -->

          <!-- END Quick Overview           + Actions -->

          <!-- Info -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">Yazar Güncelle</h3>
            </div>
            <div class="block-content">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                  <form action="{{route('author/update',['id'=>$authorData[0]['id']])}}" method="POST" >
                    {{ csrf_field() }}

                    <div class="row mb-4">
                        <div class="col-md-6">
                          <label class="form-label" for="one-ecom-product-price">Yazar Adı</label>
                          <input type="text" class="form-control" value="{{$authorData[0]['author_name']}}"  name="author_name" >
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="col-md-6">
                          <label class="form-label" for="one-ecom-product-price">Yazar Soyadı</label>
                          <input type="text" class="form-control" value="{{$authorData[0]['author_surname']}}"  name="author_surname" >
                        </div>
                      </div>


                    <div class="mb-4">
                      <button type="submit" class="btn btn-alt-primary">Güncelle</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- END Info -->


        </div>
        <!-- END Page Content -->
      </main>
    <!-- END Page Content -->
  </main>
  @include("footer")
