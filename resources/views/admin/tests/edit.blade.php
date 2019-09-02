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
            <h2><i class="glyphicon glyphicon-edit"></i>Edit Test #{{ $test->id }}</h2>
        </div>
        <div class="box-content">
            <div class="card-body">
                <a href="{{ route('tests.index') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <br />
                <br />

                <form method="POST" action="{{ route('tests.update', [$test->id]) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    @include ('admin.tests.form', ['formMode' => 'edit'])

                </form>

            </div>
        </div>
        <!--/span-->

    </div><!--/row-->

    <!-- content ends -->
</div><!--/#content.col-md-0-->

@endsection

