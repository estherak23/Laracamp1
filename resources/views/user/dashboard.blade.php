@extends('layouts.app')
@section('content')

<section class="dashboard my-5">
    <div class="container">
        <div class="row text-left">
            <div class=" col-lg-12 col-12 header-wrap mt-4">
                <p class="story">
                    DASHBOARD
                </p>
                <h2 class="primary-header ">
                    My Bootcamps
                </h2>
            </div>
        </div>
        <div class="row my-5">
            {{-- manggil alert yg udah dibuat di komponen untuk kalo udah terdaftar kelas --}}
            @include('components.alert')
            <table class="table">
                <tbody>
                     {{-- ambil data dari database --}}
                    @forelse ($checkouts as $checkout)
                        <tr class="align-middle">
                            <td width="18%">
                                <img src="{{ asset('images/item_bootcamp.png') }}" height="120" alt="">
                            </td>
                            <td>
                                <p class="mb-2">
                                    {{-- ambil data dari database --}}
                                    <strong>{{ $checkout->Camp->title }}</strong>
                                </p>
                                <p>
                                    {{ $checkout->created_at->format('M d, Y') }}
                                </p>
                            </td>
                            <td>
                                <strong>${{ $checkout->Camp->price }}k</strong>
                            </td>
                            <td>

                                @if ($checkout->is_paid)
                                    <strong class="text-success">Payment Success</strong>
                                @else
                                    <strong>Waiting for Payment</strong>
                                @endif
                            </td>
                            <td>
                                <a  href="http://wa.me/082134421528?text=Hi, saya ingin bertanya tentang kelas Laracamp {{ $checkout->Camp->title }}" class="btn btn-primary">
                                    Contact Support
                                </a>
                            </td>
                        </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection