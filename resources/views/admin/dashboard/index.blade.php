@extends('layouts.admin')
@section('title') Dashboard @endsection
@section('content')
<style>
    .styled-table {
    width: 100%;
    border-collapse: collapse;
    border: 2px solid #ddd;
}

.styled-table td, .styled-table th {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.styled-table tr:last-child td {
    border-bottom: none;
}

/* .styled-table tr:hover {
    background-color: #d9efd3;
} */

.badge {
    padding: 4px 8px;
    border-radius: 4px;
    background-color: #007bff;
    color: white;
    font-size: 0.9em;
}
</style>
<div class="wrapper">
    <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div id="main_page_div"></div>
    </div>
</div>


<script>

</script>
@endsection
