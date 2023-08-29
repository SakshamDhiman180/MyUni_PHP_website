@foreach ($notes as $note)
        <div class="row justify-content-{{$note->gift_donation_id != null ? 'start' : 'end'}} mb-4">
            <div class="col-lg-9 col-12">
                <div class="card mb-2 shadow-none card-note card-{{$note->gift_donation_id != null ? 'primary' : 'secondary'}}">
                    <div class="card-header p-3 d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0 font-weight-bolder d-flex align-items-center flex-wrap">Gift
                            @if ($note->gift_to == 'teacher')
                                <img src="{{ $note->giftcardMerchant->cover_image_url_hd ?? '' }}" class="ms-1 me-1 width-35"
                                    alt="{{ $note->giftcardMerchant->card_name ?? '' }}">
                            @endif
                            for {{ $note->gift_to ?? 0 }}
                        </h6>
                        <p class="d-flex align-items-center text-sm">{{ $note->created_at->diffForHumans() ?? '' }}</p>
                    </div>
                    <div class="card-body p-4">
                        <p>
                            Hi {{ $note->gift_donation_id != null  ? $note->parent->first_name : $note->teacher->first_name }},<br>
                            {{ $note->note }}
                            <Br />
                            Thank you!
                        </p>
                    </div>
                </div>
            </div>
        </div>
   
@endforeach
