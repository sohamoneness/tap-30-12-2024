@extends('front.layouts.app')
@section('title',' Blogger')

@section('section')
<style>
  .page_header {
    padding: 60px 0;
    display: block;
    background: #EAF4CC;
    margin-bottom: 60px;
}
.page_header h2 {
    color: #000;
    font-size: 48px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    margin-bottom: 24px;
    margin-top: 60px;
}
.page_header p {
    color: #000;
    text-align: center;
    font-size: 20px;
    font-style: normal;
    font-weight: 400;
    line-height: 32px;
}
.page_header .breadcrumb {
    margin: 0;
    justify-content: center;
}
.page_header .breadcrumb-item a {
    color: #000;
}
</style>
<section class="page_header m-0">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-sm-7">
                    <h2>Blogger Details </h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blogger</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
<div class="container mt-5 mb-5">
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>SR.</th>
                <th>Website Name</th>
                <th>Website Description</th>
                <th>Category</th>
                <th>Domain Authority</th>
                <th>Alexa Rank</th>
                <th>Link</th>
                <th>Email Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
    @if($bloggers->isEmpty())
        <?php $k = 0; ?>
        <tr>
            <td colspan="8" class="text-center text-danger">No data found</td>
        </tr>
    @else
        @foreach($bloggers as $blogger)
            <tr>
                <td>{{ $loop->iteration }}</td> <!-- Loop iteration provides auto-incremented index -->
                <td>{{ $blogger->website_name }}</td>
                <td>{{ $blogger->website_description }}</td>
                <td>{{ $blogger->categorypitch->title }}</td>
                <td>{{ $blogger->domain_authority }}</td>
                <td>{{ $blogger->alexa_rank }}</td>
                <td><a href="{{ $blogger->link }}" target="_blank">Link</a></td>
                <td>{{ $blogger->email_address }}</td>
                <td>
                    <a href="{{ url('blogger/download-csv',$blogger->id) }}">
                        <i class="fa fa-download"></i> <!-- Add a FontAwesome icon for download -->
                    </a>
                </td>
            </tr>
        @endforeach
    @endif
</tbody>


    </table>
</div>


@endsection

@section('script')
<script>
    function showMore(id) {
        $('#showMoreContent_'+id).removeClass('d-none');
        $('#showLessContent_'+id).addClass('d-none');
    }
</script>
@endsection