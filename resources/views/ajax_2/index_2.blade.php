<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
     {{-- front awesome cdn --}}
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"  />
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

       <div class="container mt-4">
  <div class="table-responsive">
    <table class="table table-bordered text-center align-middle">
      <thead class="table-primary">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Image</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($item as $key => $items)
          <tr>
            <th scope="row">{{ $key+1 }}</th>
            <td>{{ $items->name }}</td>
            <td>{{ $items->price }}</td>
            <td>
              <img src="{{ asset('images/' . $items->image) }}"
                   width="40px"
                   class="rounded-circle img-thumbnail"
                   alt="Item Image">
            </td>
            <td>
              <button class="btn btn-primary btn-sm mx-1 edite" data-id="{{ $items->id }}">
                <i class="fa-solid fa-pen-to-square"></i>
              </button>
              <button class="btn btn-danger btn-sm mx-1 delete" data-id="{{ $items->id }}">
                <i class="fa-solid fa-trash"></i>
              </button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="d-flex justify-content-center">
    {{ $item->links('pagination::bootstrap-5') }}
  </div>
</div>

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
              <div class="modal fade" id="edititemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">add categori</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" id="edititemform">

                        @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">name</label>
                            <input type="text" class="form-control" id="e_name" name="name">
                            <input type="text" class="form-control" id="edit_id" name="edit_id" style="display: none">

                          </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">price</label>
                            <input type="text" class="form-control" id="e_price" name="price">
                          </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">image</label>
                            <input type="file" class="form-control" id="e_image" name="image"
                           onchange="document.getElementById('current_image').src = window.URL.createObjectURL(this.files[0])"
                            >
                          </div>
                          <img id="current_image" src="" alt="Current Image" style="width: 100px; height: 100px; display: block; margin-bottom: 10px;">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary update">update</button>
                    </div>
                </form>
                  </div>
                </div>
              </div>
          {{-- end editeitem modal --}}

    </div>

     <!-- SweetAlert2 JS -->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
 $(document).ready(function() {
 //start add item
    $(document).on('click', '.submit', function(e) {
    e.preventDefault();

    // Remove old error messages
    $('.text-danger').remove();

    let formData = new FormData($('#additemform')[0]);

    $.ajax({
        method: 'POST',
        url: '/ajax/store',
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function(response) {
            Swal.fire({
                icon: 'success', // পপআপের টাইপ: success, error, warning, info
                title: 'Add Item',
                text: response.success, // কন্ট্রোলার থেকে আসা JSON মেসেজ
                timer: 3000, // ৩ সেকেন্ড পরে অটো বন্ধ হবে
                showConfirmButton: false // কনফার্ম বাটন না দেখানোর জন্য
            });
            $('#additemform')[0].reset(); // ফর্ম রিসেট করা
            $('#additemModal').modal('hide'); // মডাল ক্লোজ করা
            $('.table').load(location.href + ' .table'); // টেবিল অটো রিফ্রেশ
        },
        error: function(xhr) {
            // Validation errors handle
            var errors = xhr.responseJSON.errors;

            if (errors.name) {
                $('#name').after('<span class="text-danger">' + errors.name[0] + '</span>');
            }
            if (errors.price) {
                $('#price').after('<span class="text-danger">' + errors.price[0] + '</span>');
            }
            if (errors.image) {
                $('#image').after('<span class="text-danger">' + errors.image[0] + '</span>');
            }
        },
    });
});

    //end add item
    //show edit button
    $(document).on('click', '.edite', function(e) {
        e.preventDefault();
       let id = $(this).data('id');
       $('#edititemModal').modal('show');
       $.ajax({
        method: 'GET',
        url: '/ajax/edite/'+id,
        success: function(response) {
          $('#e_name').val(response.item.name)
          $('#e_price').val(response.item.price)
          $('#edit_id').val(id)
        //edite page image show start
          if (response.item.image) {
                $('#current_image').attr('src', '/images/' + response.item.image); // Adjust path as needed
            } else {
                $('#current_image').attr('src', ''); // Remove image if not present
            }
        //edite page image show end
        },
       })
    });
    //end edit button
    //start update
    $(document).on('click', '.update', function(e) {
        e.preventDefault();
        let id = $('#edit_id').val();
        let editData = new FormData($('#edititemform')[0]);
        $.ajax({
            method: 'POST',
            url: '/ajax/update/'+id,
            data: editData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(response) {
                Swal.fire({
                          icon: 'success', // পপআপের টাইপ: success, error, warning, info
                          title: 'update',
                          text: response.success, // কন্ট্রোলার থেকে আসা JSON মেসেজ
                          timer: 3000, // ৩ সেকেন্ড পরে অটো বন্ধ হবে
                           showConfirmButton: false // কনফার্ম বাটন না দেখানোর জন্য
                     });
                $('#edititemform')[0].reset(); // ফর্ম রিসেট করা
                $('#edititemModal').modal('hide'); // মডাল ক্লোজ করা
                $('.table').load(location.href+' .table'); //table auto load
            },
    });
});
//end update
$(document).on('click', '.delete', function(e) {
    e.preventDefault();
    let id = $(this).data('id');

    Swal.fire({
        icon: 'warning',
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: 'GET',
                url: '/ajax/delete/' + id,
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: response.success,
                        timer: 3000,
                        showConfirmButton: false
                    });
                    $('.table').load(location.href + ' .table');
                },

            });
        }
    });
});
//delete item end


});

</script>
