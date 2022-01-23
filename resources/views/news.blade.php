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
    <div class="content">
      <!-- Quick Overview -->
      <div class="row">
        <div class="col-6 col-lg-3">
            <a class="block block-rounded block-link-shadow text-center" href="{{route('news/add')}}">
              <div class="block-content block-content-full">
                <div class="fs-2 fw-semibold text-success">
                  <i class="fa fa-plus"></i>
                </div>
              </div>
              <div class="block-content py-2 bg-body-light">
                <p class="fw-medium fs-sm text-success mb-0">
                  Haber Ekle
                </p>
              </div>
            </a>
          </div>


      <div class="block block-rounded">
        <div class="block-header block-header-default">
          <h3 class="block-title">Haber Listesi</h3>
          <div class="block-options">
            <div class="dropdown">


            </div>
          </div>
        </div>
        <div class="block-content">

          <div class="table-responsive">
            <table class="table table-borderless table-striped table-vcenter">
              <thead>
                <tr>
                  <th class="text-center" style="width: 100px;">Yazar</th>
                  <th class="d-none d-md-table-cell">Kategori</th>
                  <th class="d-none d-sm-table-cell text-center">Başlık</th>

                  <th class="d-none d-sm-table-cell text-center">Ön Yazı</th>
                  <th>İçerik</th>
                  <th class="d-none d-sm-table-cell text-end">Tarih</th>
                  <th class="text-center">İşlem</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($newsData as $key=>$value)
                  <tr>
                    <td class="text-center fs-sm">
                      <a class="fw-semibold" href="be_pages_ecom_product_edit.html">
                        <strong>{{$value->author_name}}</strong>
                      </a>
                    </td>
                    <td class="d-none d-md-table-cell fs-sm">
                      <a href="be_pages_ecom_product_edit.html">{{$value->category_name}}</a>
                    </td>
                    <td class="d-none d-sm-table-cell text-center fs-sm">{{$value->news_title}}</td>

                    <td class="d-none d-sm-table-cell text-center fs-sm">{{$value->news_coverletter}}</td>
                    <td>
                      <span class="badge bg-success">{{$value->news_content}}</span>
                    </td>
                    <td class="text-end d-none d-sm-table-cell fs-sm">
                      <strong>{{$value->date}}</strong>
                    </td>
                    <td class="text-center fs-sm">
                      <button onclick="window.location.href='{{route('newsUpdateView',['id'=>$value->news_id])}}'" class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_product_edit.html" data-bs-toggle="tooltip" title="Edit">
                        <i class="fa fa-fw fa-eye"></i>
                      </button>
                      <button onclick="deleteNews(this.value)" value="{{$value->news_id}}" class="btn btn-sm btn-alt-danger" href="javascript:void(0)" data-bs-toggle="tooltip" title="Delete">
                        <i class="fa fa-fw fa-times text-danger"></i>
                      </button>
                    </td>
                  </tr>
                  @endforeach



              </tbody>
            </table>
          </div>
          <!-- END All Products Table -->

          <!-- Pagination -->

          <!-- END Pagination -->
        </div>
      </div>
      <!-- END All Products -->
    </div>
    <!-- END Page Content -->
  </main>
  <script>
      function deleteNews(id)
      {
          var check=confirm('silmek istediğinize emin misiniz?')
          if(check)
          {
              window.location.href="/admin/newsdelete/"+id
          }
      }
  </script>
  @include("footer")
