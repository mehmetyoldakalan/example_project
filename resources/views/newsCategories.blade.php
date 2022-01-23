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
            <a class="block block-rounded block-link-shadow text-center" href="{{route('news/categories/add')}}">
              <div class="block-content block-content-full">
                <div class="fs-2 fw-semibold text-success">
                  <i class="fa fa-plus"></i>
                </div>
              </div>
              <div class="block-content py-2 bg-body-light">
                <p class="fw-medium fs-sm text-success mb-0">
                  Kategori Ekle
                </p>
              </div>
            </a>
          </div>


      <div class="block block-rounded">
        <div class="block-header block-header-default">
          <h3 class="block-title">Kategori Listesi</h3>
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
                  <th class="text-center" style="width: 100px;">Kategori Adı</th>

                  <th class="text-center">İşlem</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($newsCategoryData as $key=>$value)
                  <tr>
                    <td class="text-center fs-sm">

                        <strong>{{$value->category_name}}</strong>

                    </td>

                    <td class="text-center fs-sm">
                      <button onclick="window.location.href='{{route('news/categories/update/view',['id'=>$value->id])}}'" class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_product_edit.html" data-bs-toggle="tooltip" title="Edit">
                        <i class="fa fa-fw fa-eye"></i>
                      </button>
                      <button onclick="deleteNewsCategories(this.value)" value="{{$value->id}}" class="btn btn-sm btn-alt-danger" href="javascript:void(0)" data-bs-toggle="tooltip" title="Delete">
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
      function deleteNewsCategories(id)
      {
          var check=confirm('silmek istediğinize emin misiniz?')
          if(check)
          {
              window.location.href="/admin/news/categories/delete/"+id
          }
      }
  </script>
  @include("footer")
