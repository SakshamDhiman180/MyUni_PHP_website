@extends('parent.layouts.app', [
    'page' => __('Raise Dispute'),
    'active' => 'dispute',
])

@section('content')
    <div class="container-fluid middle-content">
        <div class="row">
            <div class="col-lg-12 position-relative z-index-2">
                <h3 class="font-weight-bold mb-3">Raise Dispute/Refund</h3>
            </div>
            <div class="col-12">
                <div class="card p-0">
                    <!-- Card header -->
                    <div class="card-header d-flex justify-content-between bg-white align-items-center p-3">
                        <h5 class="mb-0 font-weight-bold">Disputes</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-flush" id="teacherList-search">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Teacher Name</th>
                                    <th scope="col">Gift</th>
                                    <th scope="col">Reason</th>
                                    <th scope="col">Refund status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($disputes))
                                    @foreach ($disputes as $dispute)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ ($dispute->giftDonation->teacher->profile_image ?? '') != '' ? asset('storage/' . $dispute->giftDonation->teacher->profile_image) : asset('assets/teacher/img/default-user.png') }}"
                                                        class="avatar me-3" alt="">
                                                    {{ $dispute->giftDonation->teacher->full_name ?? '' }}
                                                </div>
                                            </td>
                                            <td>
                                                <img src="{{ $dispute->giftDonation?->gift_to == 'teacher' ? $dispute->giftDonation->giftcardMerchant->cover_image_url_hd ?? '' : '' }}"
                                                    class="me-3 width-35"
                                                    alt="{{ $dispute->giftDonation?->gift_to == 'teacher' ? $dispute->giftDonation->giftcardMerchant->card_name ?? '' : '' }}">
                                                ${{ $dispute->giftDonation->amount ?? ""}}
                                            </td>
                                            <td>{{ $dispute->refund_reason }}</td>
                                            <td>{{ $dispute->status }}</td>
                                            <td>
                                                <form action="{{ route('parent.disputes.destroy', $dispute) }}"
                                                    method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="donation_id"
                                                        value="{{ $dispute->giftDonation->id ?? '' }}">

                                                    @if ($dispute->status === 'pending')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirmCancelDispute(event)">Cancel</button>
                                                    @elseif ($dispute->status === 'cancelled')
                                                        <button type="button" class="btn btn-sm btn-danger"
                                                            disabled>Cancelled</button>
                                                    @elseif ($dispute->status === 'success')
                                                        <button type="button" class="btn btn-sm btn-success"
                                                            disabled>Refunded</button>
                                                    @elseif ($dispute->status === 'rejected')
                                                        <button type="button" class="btn btn-sm btn-danger"
                                                            disabled>Rejected</button>
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        function confirmCancelDispute(event) {
            if (!confirm('Are you sure you want to cancel this dispute?')) {
                event.preventDefault();
            }
        }
    </script>
@endpush
