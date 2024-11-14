<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
       <div class="alert alert-success" style="display: none">

       </div>
        <div class="item-add">
            <h1> catagori list
            <button class="btn btn-primary mt-3" style="float: right"
            data-bs-toggle="modal" data-bs-target="#additemModal">Add new</button>
        </h1>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">price</th>
                <th scope="col">image</th>
                <th scope="col">action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($catagoris as $key =>$categori)


              <tr>
                <th scope="row">{{ $key+1 }}</th>
                <td>{{ $categori->name }}</td>
                <td>{{ $categori->price }}</td>
                <td><img src="{{ asset('images/' . $categori->image) }}" width="80px" class="rounded-circle" alt=""></td>
                <td>
                    <button class="btn btn-primary edite"
                      data-id ={{ $categori->id }}
                    >edit</button>||<button class="btn btn-danger delete"
                    data-id ={{ $categori->id }}

                    >delete</button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{-- start additem modal --}}
          <div class="modal fade" id="additemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">add categori</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" id="additemform">

                    @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">name</label>
                        <input type="text" class="form-control" id="name" name="name">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">price</label>
                        <input type="text" class="form-control" id="price" name="price">
                      </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">image</label>
                        <input type="file" class="form-control" id="image" name="image">
                      </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary submit">submit</button>
                </div>
            </form>
              </div>
            </div>
          </div>
            {{-- end additem modal --}}
              {{-- start editeitem modal --}}
          <div class="modal fade" id="editeitemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">edite categori</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" id="editeitemform">

                    @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">name</label>
                        <input type="text" class="form-control" id="e_name" name="e_name">
                        <input type="text" class="form-control" style="display: none" id="e_edite" name="e_name">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">price</label>
                        <input type="text" class="form-control" id="e_price" name="e_price">
                      </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">image</label>
                        <input type="file" class="form-control" id="image" name="e_image">
                      </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary update">update</button>
                </div>
            </form>
              </div>
            </div>
          </div>

    </div>
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script>
    $(document).ready(function(){
     $(document).on('click' ,'.submit',function(e){
      formdata = new FormData($('#additemform')[0]);
      $.ajax({
             method:'POST',
             url:'store/categori/',
             data:formdata,
             cache:false,
             processData:false,
             contentType:false,
             success:function(respons){
           $('.alert').show();
           $('.alert').html('successfully data insert');
           $('#additemform')[0].reset();
        //    myModalEl.hide();
           $('#additemModal').modal('hide');
           $('.table').load(location.href+' .table');
        },
        //costom error message start
        error: function(xhr) {
                var errors = xhr.responseJSON.errors; // Get validation errors

                if (errors.name) {
                    $('#name').siblings('.text-danger').remove(); // Remove existing error
                    $('#name').after('<span class="text-danger">' + errors.name[0] + '</span>');
                }
                if (errors.price) {
                    $('#price').siblings('.text-danger').remove(); // Remove existing error
                    $('#price').after('<span class="text-danger">' + errors.price[0] + '</span>');
                }
                if (errors.image) {
                    $('#image').siblings('.text-danger').remove(); // Remove existing error
                    $('#image').after('<span class="text-danger">' + errors.image[0] + '</span>');
                }
            }
        //costom error message end
      });
     });
     $(document).on('click', '.edite',function(e){
        e.preventDefault();
        let id = $(this).data('id');
          $('#editeitemModal').modal('show');
         $.ajax({
                method:'GET',
                url: '/edite/item/' + id,
                success:function(response){
                  $('#e_name').val(response.item.name);
                  $('#e_price').val(response.item.price);
                  $('#e_edite').val(id);
                },
         });
      });
      $(document).on('click','.update',function(e){
      e.preventDefault();
    let id = $('#e_edite').val();
   let editeData = new FormData($('#editeitemform')[0]);

      $.ajax({
         method:'POST',
         url:'/update/item/' + id,
         data:editeData,
         cache:false,
         processData:false,
         contentType:false,
         success:function(respons){
           $('.alert').show();
           $('.alert').html('successfully data update');
           $('#editeitemform')[0].reset();
        //    myModalEl.hide();
           $('#editeitemModal').modal('hide');
           $('.table').load(location.href+' .table');
        },
      });
     });
     $(document).on('click', '.delete',function(e){
        e.preventDefault();
        let id = $(this).data('id');
        $.ajax({
         method:'GET',
         url:'/delete/item/' + id,
         cache:false,
         processData:false,
         contentType:false,
         success:function(respons){
           $('.alert').show();
           $('.alert').html('successfully data update');
           $('.table').load(location.href+' .table');
        },
      });
     });
    });
</script>


