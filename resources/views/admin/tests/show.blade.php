@extends('admin.layouts.app')

@section('content')

<div id="content" class="col-lg-10 col-sm-10">
    <!-- content starts -->
    <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Forms</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="box-header well" data-original-title="">
            <h2><i class="glyphicon glyphicon-edit"></i>Test {{ $test->id }}</h2>
        </div>
        <div class="box-content">
            <div class="card-body">

                <a href="{{ route('tests.index') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <a href="{{ route('tests.edit', [$test->id]) }}" title="Edit Test"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                <form method="POST" action="{{ route('tests.destroy', [$test->id]) }}" accept-charset="UTF-8" style="display:inline">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Test" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                </form>
                <br/>
                <br/>

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th>ID</th><td>{{ $test->id }}</td>
                        </tr>
                        <tr><th> Title </th><td> {{ $test->title }} </td></tr><tr><th> Content </th><td> {!! $test->content !!} </td></tr><tr><th> Photo </th><td>@if (!empty($test->photo))<img src="{{ config('paths.tests') . $test->id . '/big' . $test->photo }}">@endif</td></tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!--/span-->

    </div><!--/row-->

    <!-- content ends -->
</div><!--/#content.col-md-0-->

@endsection
