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
              <h3 class="block-title">Haber Ekle</h3>
            </div>
            <div class="block-content">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                  <form action="{{route('news/add')}}" method="POST" >
                    {{ csrf_field() }}
                    <div class="mb-4">
                      <label class="form-label" for="one-ecom-product-id">Yazar</label>
                      <select required name="author_id" class="form-control" id="">
                        <option value="">Yazar seçiniz</option>
                          @foreach ($authorData as $key=>$value)
                          <option value="{{$value->id}}">{{$value->author_name." ".$value->author_surname}}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="one-ecom-product-name">Kategori</label>
                      <select required name="news_category_id" class="form-control" id="">
                        <option value="">Kategori seçiniz</option>
                          @foreach ($categoryData as $key=>$value)
                          <option value="{{$value->id}}">{{$value->category_name}}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                          <label class="form-label" for="one-ecom-product-price">Başlık</label>
                          <input type="text" class="form-control"  name="news_title" >
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="col-md-12">
                          <label class="form-label" for="one-ecom-product-price">Ön Yazı</label>
                          <input type="text" class="form-control"name="news_coverletter" >
                        </div>
                      </div>

                    <div class="mb-4">
                      <label class="form-label" for="one-ecom-product-description-short">Haber İçeriği</label>
                      <textarea class="form-control"  name="news_content" rows="4"></textarea>
                    </div>

                    <div class="mb-4">
                      <button type="submit" class="btn btn-alt-primary">Ekle</button>
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
