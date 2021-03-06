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
                    <a href="#">Tables</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well" data-original-title="">
                        <h2><i class="glyphicon"></i>Tests</h2>
                    </div>

                    <div>
                        <div style="text-align: left">
                            <form method="GET" action="{{ route('tests.index') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right">
                                <p><select name="pages">
                                        <option {{ (request('pages') == 10 || request('pages') === null) ? 'selected' : null }} value="10">10</option>
                                        <option {{ request('pages') == 25 ? 'selected' : null }} value="25">25</option>
                                        <option {{ request('pages') == 50 ? 'selected' : null }} value="50">50</option>
                                        <option {{ request('pages') == 100 ? 'selected' : null }} value="100">100</option>
                                    </select></p>
                                <input type="hidden" name="search" value="{{ request('search') }}">
                                <input type="hidden" name="toggle" value="{{ request('toggle') }}">
                                <input type="hidden" name="sort" value="{{ request('sort') }}">
                                <p><input type="submit" style="display: none"></p>
                            </form>
                        </div>
                        <div style="text-align: right">
                            <form method="GET" action="{{ route('tests.index') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                                <div class="input-group">
                                    <input type="text" class="glyphicon glyphicon-search" name="search" placeholder="Search..." value="{{ request('search') }}">
                                    <input type="hidden" name="pages" value="{{ request('pages') }}">
									<input type="hidden" name="toggle" value="{{ request('toggle') }}">
	                                <input type="hidden" name="sort" value="{{ request('sort') }}">
                                    <span class="input-group-append">
                                        <button class="glyphicon glyphicon-search" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="box-content">
                        <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                            <thead>
                            <tr>
                                <th><input type="checkbox" id="arrDeleteAll" value="1"></th>
                                <th>Title <a href="#">
									@if (request("sort") == "title")
										<span class="{{ request("toggle") }}" name="title">
									@else
										<span class="toggle glyphicon glyphicon-arrow-down" name="title">
									@endif
										</span></a></th><th>Content <a href="#">
									@if (request("sort") == "content")
										<span class="{{ request("toggle") }}" name="content">
									@else
										<span class="toggle glyphicon glyphicon-arrow-down" name="content">
									@endif
										</span></a></th><th>Photo <a href="#">
									@if (request("sort") == "photo")
										<span class="{{ request("toggle") }}" name="photo">
									@else
										<span class="toggle glyphicon glyphicon-arrow-down" name="photo">
									@endif
										</span></a></th>
                                <th>
                                    <a href="{{ route('tests.create') }}" class="btn btn-success">
                                        <i class="glyphicon glyphicon-plus" aria-hidden="true"></i> Добавить
                                    </a>
									<form style="text-align: right" id="arrDelete" action="{{ route('tests.arrDelete') }}" method="post">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<input onclick="return confirm(&quot;Confirm delete?&quot;)" type="submit" class="del" id="del" value="Удалить отмеченные" disabled>
						            </form>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($tests as $item)
                                    <tr>
                                        {{-- <td>{{ $loop->iteration ?? $item->id }}</td> --}}
										<td><input class="arrDelete" type="checkbox" form="arrDelete" name="{{ $item->id }}" value="1"></td>
                                        <td>{{ $item->title }}</td><td>{!! $item->content !!}</td><td>@if (!empty($item->photo))<img src="{{ config('paths.tests') . $item->id . '/' . $item->photo }}">@endif</td>
                                        <td>
                                            <a class="btn btn-success" href="{{ route('tests.show', [$item->id]) }}"><i class="glyphicon glyphicon-zoom-in icon-white"></i></a>
                                            <a class="btn btn-info" href="{{ route('tests.edit', [$item->id]) }}"><i class="glyphicon glyphicon-edit icon-white"></i></a>

                                            <form method="POST" action="{{ route('tests.destroy', [$item->id]) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="glyphicon glyphicon-trash icon-white"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
						<div>
							<span>
								Showing {{ $tests->total() > 0 ? $tests->currentPage() * $tests->perPage() - $tests->perPage() + 1 : 0 }} to {{ $tests->currentPage() * $tests->perPage() <= $tests->total() ? $tests->currentPage() * $tests->perPage() : $tests->total() }} of {{ $tests->total() }} entries
							</span>
						</div>
                        <div class="pagination-wrapper" style="text-align: center"> {{ $tests->appends(['pages' => request('pages'), 'search' => request('search'), 'toggle' => request('toggle'), 'sort' => request('sort')])->links() }} </div>
                    </div>
                </div>
            </div>
            <!--/span-->

        </div><!--/row-->

        <!-- content ends -->
    </div><!--/#content.col-md-0-->

{{-- Toggle sort --}}
<script>
$(document).ready(function() {
	$(".toggle").click(function(e) {
		e.preventDefault();
		$(this).toggleClass('glyphicon-arrow-up glyphicon-arrow-down');
		var pages = '?pages=' + '{{ request("pages") }}';
		var search = '&search=' + '{{ request("search") }}';
		var toggle = '&toggle=' + $(this).attr("class");
		var sort = '&sort=' + $(this).attr("name");
		var route = $(location).attr('origin') + $(location).attr('pathname') + pages + search + toggle + sort;
		$(location).attr('href', route);
	}); 
});
</script>

@endsection
