@extends('layouts.backend')

@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-note2 icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div>{{ env('APP_NAME') }} Reports
                            <div class="page-title-subheading"> This is the Backend UI for {{ env('APP_NAME') }}
                            </div>
                        </div>
                    </div>
                    <div class="page-title-actions">
                        <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom"
                            class="btn-shadow mr-3 btn btn-dark">
                            <i class="fa fa-star"></i>
                        </button>
                        <div class="d-inline-block dropdown">
                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                class="btn-shadow dropdown-toggle btn btn-info">
                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                    <i class="fa fa-building fa-w-20"></i>
                                </span>
                                Download List Format
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a href="{{route('generate.pdf')}}" class="nav-link" target="_blank">
                                            <i class="nav-link-icon lnr-inbox"></i>
                                            <span>
                                                PDF
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('generate.csv')}}" class="nav-link" target="_blank">
                                            <i class="nav-link-icon lnr-book"></i>
                                            <span>
                                                EXCEL (csv)
                                            </span>
                                        </a>
                                        <a href="{{route('generate.excel')}}" class="nav-link" target="_blank">
                                            <i class="nav-link-icon lnr-book"></i>
                                            <span>
                                                EXCEL
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header">Blacklisted Users
                            {{-- <div class="btn-actions-pane-right">
                                <div role="group" class="btn-group-sm btn-group">
                                    <button class="active btn btn-focus" onclick="window.print()">Print</button>
                                </div>
                            </div> --}}
                        </div>
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Name</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($blacklists as $blacklist)
                                        <tr>
                                            <td class="text-center text-muted">{{$blacklist->id}}</td>
                                            <td>{{$blacklist->name}}</td>
                                            <td class="text-center">{{$blacklist->phone}}</td>
                                            <td class="text-center">
                                                <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i
                                                    class="pe-7s-trash btn-icon-wrapper"> </i></button>
                                            </td>
                                        </tr> 
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center lead">No BlackListed Users</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="d-block text-center card-footer">
                            <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i
                                    class="pe-7s-trash btn-icon-wrapper"> </i></button>
                            <button class="btn-wide btn btn-success">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-wrapper-footer">
            <div class="app-footer">
                <div class="app-footer__inner">
                    <div class="app-footer-left">
                        <ul class="nav">
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    Footer Link 1
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    Footer Link 2
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="app-footer-right">
                        <ul class="nav">
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    Footer Link 3
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    <div class="badge badge-success mr-1 ml-0">
                                        <small>NEW</small>
                                    </div>
                                    Footer Link 4
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

