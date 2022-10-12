@extends('templates.layout')

@section('title', 'Show')

@section('header')
    <a class="btn btn-primary" href="{{ route('create') }}">Create Products</a>
@endsection

@section('main')
    <section class="my-4">
        <h3>Show Products</h3>
    </section>

    <section class="my-4">
        @include('componentes.fail')
        @include('componentes.success')
    </section>

    <section class="my-4">
        <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price R$</th>
                <th>Description</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($products as $key => $product)
                <tr>
                    <th>{{ $key + 1 }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ date('d/m/Y', strtotime($product->created_at)) }}</td>
                    <td>{{ date('d/m/Y', strtotime($product->updated_at)) }}</td>
                    <td class="d-flex flex-wrap gap-2">
                        <a class="btn btn-success" href="{{ route('update', ['id' => $product->id]) }}">Update</a>

                        <form action="{{ route('delete') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
              @empty
                <tr>
                    <td class="text-center alert alert-danger" colspan="7">No products registered!</td>
                </tr>
              @endforelse
            </tbody>
          </table>
    </section>
@endsection
