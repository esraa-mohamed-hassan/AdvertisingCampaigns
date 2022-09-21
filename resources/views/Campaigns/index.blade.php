<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Laravel 9 CRUD with Image Upload Example</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('campaigns.create') }}"> Create New Campaign</a>
                        </div>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <table class="table table-bordered mt-3">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Image</th>
                        <th class="text-center">From</th>
                        <th class="text-center">To</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Daily Budget</th>
                        <th class="text-center" width="280px">Action</th>
                    </tr>
                    @if(count($campaigns) != 0)
                    @foreach ($campaigns as $campaign)
                    <tr>
                        <td>{{ $campaign->id }}</td>
                        <td>{{ $campaign->name }}</td>
                        <td><img src="/images/{{ $campaign->images }}" width="100px"></td>
                        <td>{{ $campaign->from }}</td>
                        <td>{{ $campaign->to }}</td>
                        <td>{{ $campaign->total }}</td>
                        <td>{{ $campaign->daily_budget }}</td>
                        <td>
                            <div id="app">
                               <button>
                                <card-modal :showing="true" >
                                    <h2 class="text-xl font-bold text-gray-900">Example modal</h2>
                                    <p class="mb-6">This is example text passed through to the modal via a slot.</p>
                                    <button
                                      class="bg-blue-600 text-white px-4 py-2 text-sm uppercase tracking-wide font-bold rounded-lg"

                                    >
                                      Close
                                    </button>
                                </card-modal>
                               </button>
                               </div>

                            <form action="{{ route('campaigns.destroy',$campaign->id) }}" method="POST">




                                <a class="btn btn-info" href="{{ route('campaigns.show',$campaign->id) }}">Show</a>

                                <a class="btn btn-primary" href="{{ route('campaigns.edit',$campaign->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="8" class="text-center">No Data</td>
                    </tr>
                    @endif
                </table>

                {!! $campaigns->links() !!}
            </div>
        </div>
    </div>
</x-app-layout>
