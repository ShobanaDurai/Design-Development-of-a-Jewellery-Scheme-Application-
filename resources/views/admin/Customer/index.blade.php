@extends('admin.layouts.app')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
{{--  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">  --}}
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<style>
  .customer-reg {
        margin-left: 250px;
        padding: 40px 20px 20px 20px;
        flex: 1;
        top: 30%;
        max-width: 100%;
        margin: 0 auto;
        margin-top: 30px;
        margin-bottom: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4); /* Add box shadow */
    }

    .cust-title h1 {
        font-size: 24px;
        color: #333;
        margin-bottom: 10px;
    }
    table {

        width: 100%;
        border-collapse: collapse;
        table-layout: auto; /* Ensures table adapts to its container */
    }
    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #f4f4f4;
    }
    @media (max-width: 768px) {
        table, thead, tbody, th, td, tr {
            display: block;
        }
        thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
            visibility: hidden;
        }
        tr { border: 1px solid #ccc; }
        td {
            border: none;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 50%;
            text-align: right;
        }
        td::before {
            content: attr(data-label);
            position: absolute;
            left: 0;
            width: 50%;
            padding-left: 10px;
            white-space: nowrap;
            font-weight: bold;
            text-align: left;
        }
    }
</style>
@endsection
@section('content')
    <div class="content">
        <h2 style="font-size: 1.5rem; color: #333; margin-bottom: 10px;margin-top: 1px; font-weight: bold;">
            All Customer
        </h2>
        <div class="customer-reg ">
            <!-- Search Bar -->

            <div class="d-flex justify-content-between mb-3">
                <h3 class="me-3">Customer Details</h3>
                <form action="{{ route('admin_customer') }}" method="GET" class="d-flex" id="searchForm">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control rounded-start" placeholder="Search..." value="{{ request('search') }}" id="searchInput" style="background-color: #fcf9f9; color: #333; border-color: #ccc;">
                        <span class="input-group-text rounded-end" id="searchIcon" style="cursor: pointer; background-color: #fcf9f9; color: #333; border-color: #ccc;">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                </form>
            </div>



            <table >
                <thead>
                    <tr>
                        <th>S.no</th>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key=>$user)
                        <tr>
                            <td>{{$key+1 }}</td>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <!-- Delete Button -->
                                    {{--  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal"  data-id="{{ $user->id }}" title="Delete" id="delete_customer">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>  --}}

                                    <button
                                    data-toggle="modal"
                                    data-target="#deleteModal"
                                    data-id="{{ $user->id }}"
                                    id="delete_customer"
                                    style="border: none; background: none; padding: 0; cursor: pointer; display: flex; justify-content: center; align-items: center; width: 50px; height: 20px;">
                                    <i class="fas fa-trash" title="Delete" style="font-size: 20px;"></i>
                                </button>



                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex mt-4 flex-wrap align-items-center">
                <p class="text-muted mb-sm-0">Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} entries</p>
                <nav class="ms-auto">
                    {{ $users->links('pagination::bootstrap-4') }} <!-- Use 'pagination::bootstrap-4' or adjust as per your pagination style -->
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('modal')

<!-- Modal HTML -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Record</h5>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this record?
      </div>
      <div class="modal-footer deletecustomer">
        <form id="deleteForm" method="POST" action="{{ route('admin_customer_destroy') }}">
          @csrf
          <input type="hidden" id="model_id" name="id" >
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection


@section('script')

<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
        var icon = $(event.relatedTarget); // Icon that triggered the modal
        var id = icon.data('id'); // Extract info from data-* attributes

        // Use a template string to correctly format the route URL with the ID
        var route = "{{ route('admin_customer_destroy', ['id' => 'ID_PLACEHOLDER']) }}";
        route = route.replace('ID_PLACEHOLDER', id); // Replace placeholder with actual ID

        var form = $(this).find('form');
        form.attr('action', route); // Update action URL with the record ID
      });
</script>

<script>
    $(document).on("click", "#delete_customer", function(){
        var id = $(this).data("id");
        $(".deletecustomer #model_id").val(id);
    });
</script>

<script>
    document.getElementById('searchIcon').addEventListener('click', function() {
        document.getElementById('searchForm').submit();
    });
</script>



@endsection
