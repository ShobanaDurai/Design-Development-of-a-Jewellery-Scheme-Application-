@extends('admin.layouts.app')
@section('css')
{{--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  --}}


<style>
  .feedback-container {
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
            User Feedback
        </h2>
        <div class="feedback-container">
            <!-- Search Bar -->
            <div class="d-flex justify-content-between mb-3">
                <h3 class="me-3">Feedbacks</h3>
                <form action="{{ route('admin_feedback') }}" method="GET" class="d-flex" id="searchForm">
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
                        <th>Name</th>
                        <th>Occupation</th>
                        <th>Feedbacks</th>
                        <th>Ratings</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($feedback as $key=>$feedbacks)
                        <tr>
                            <td>{{$key+1 }}</td>
                            <td>{{ $feedbacks->name }}</td>
                            <td>{{ $feedbacks->occupation }}</td>
                            <td>{{ $feedbacks->thoughts }}</td>
                            <td>{{ $feedbacks->rating }}/5</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex mt-4 flex-wrap align-items-center">
                <p class="text-muted mb-sm-0">
                    Showing {{ $feedback->firstItem() }} to {{ $feedback->lastItem() }} of {{ $feedback->total() }} entries
                </p>
                <nav class="ms-auto">
                    {{ $feedback->links('pagination::bootstrap-4') }} <!-- Use 'pagination::bootstrap-4' or adjust as per your pagination style -->
                </nav>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    document.getElementById('searchIcon').addEventListener('click', function() {
        document.getElementById('searchForm').submit();
    });
</script>
@endsection
