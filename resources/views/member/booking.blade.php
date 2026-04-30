@extends('member.layout')

@section('title', 'Book A Class')

@section('content')
    <section class="member-booking-page mx-auto max-w-[1400px] px-4 md:px-8 pb-10 pt-8 md:pt-10">
        <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-5 md:gap-8 mb-8 md:mb-10">
            <h1 class="font-[Cormorant_Garamond] text-[54px] md:text-[72px] leading-none">Book A Session</h1>

            <div class="flex items-center gap-3 md:gap-4">
                <button type="button" class="member-chip inline-flex items-center gap-3 px-5 py-2.5 rounded-xl text-[12px] font-semibold" disabled>
                    <span class="member-chip-icon">≋</span>
                    All Program
                    <svg class="w-4 h-4 text-[#d8b15c]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 9l6 6 6-6" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <a href="{{ route('member.booking.history') }}" class="member-chip inline-flex items-center gap-3 px-5 py-2.5 rounded-xl text-[12px] font-semibold">
                    <span class="member-chip-icon">⌂</span>
                    History
                </a>
            </div>
        </div>

        @if($schedules->isEmpty())
            <div class="member-card rounded-2xl p-8 text-center text-white/70">
                Belum ada jadwal kelas tersedia.
            </div>
        @else
            <section class="grid sm:grid-cols-2 xl:grid-cols-4 gap-5">
                @foreach($schedules as $schedule)
                    @php
                        $remaining = max($schedule->quota - $schedule->bookings_count, 0);
                        $isFull = $remaining === 0;
                        $className = strtoupper($schedule->yogaClass->name ?? 'Yoga Session');
                        $coachName = $schedule->trainer->name ?? 'TBA';
                        $dateLabel = \Carbon\Carbon::parse($schedule->date)->format('D d');
                        $timeLabel = \Carbon\Carbon::parse($schedule->start_time)->format('H:i') . ' - ' . \Carbon\Carbon::parse($schedule->end_time)->format('H:i');
                    @endphp
                    <article class="member-card member-session-card rounded-[22px] overflow-hidden">
                        <div class="px-4 pt-3.5 pb-3 border-b border-[#b98f38]/45 min-h-[82px]">
                            <div class="flex items-start justify-between gap-3">
                                <p class="text-[10px] uppercase text-white/60 tracking-[0.08em]">{{ $dateLabel }}</p>
                                <span class="text-[9px] px-2.5 py-1 rounded-full border {{ $isFull ? 'border-rose-400/75 text-rose-300' : 'border-[#b98f38]/85 text-[#d8b15c]' }} tracking-[0.08em] uppercase">
                                    {{ $remaining }}/{{ $schedule->quota }} Slots
                                </span>
                            </div>
                            <h2 class="font-[Cormorant_Garamond] text-[24px] md:text-[28px] mt-2 leading-none">{{ $className }}</h2>
                            <p class="text-[11px] text-white/65 mt-2">{{ $timeLabel }}</p>
                        </div>

                        <div class="p-4 md:p-5 space-y-3.5">
                            <div class="flex items-center gap-3">
                                <div class="w-5 h-5 md:w-6 md:h-6 rounded-full bg-white/85 flex-shrink-0"></div>
                                <p class="uppercase text-[12px] md:text-[13px] tracking-[0.08em] text-white/90 font-semibold">Coach {{ $coachName }}</p>
                            </div>
                            <div class="flex items-center gap-3 pl-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#d8b15c]"></span>
                                <p class="uppercase text-[12px] md:text-[13px] tracking-[0.08em] text-white/80 font-semibold">{{ $schedule->yogaClass->name ?? 'Studio Session' }} Studio</p>
                            </div>

                            <button
                                type="button"
                                class="js-open-session mt-4 w-full rounded-[10px] border border-[#b98f38] py-3 text-[11px] tracking-[0.16em] uppercase {{ $isFull ? 'opacity-45 cursor-not-allowed' : 'hover:bg-[#b98f38]/12' }}"
                                {{ $isFull ? 'disabled' : '' }}
                                data-schedule-id="{{ $schedule->id }}"
                                data-class-name="{{ e($className) }}"
                                data-coach-name="{{ e($coachName) }}"
                                data-studio-name="{{ e($schedule->yogaClass->name ?? 'Studio Session') }}"
                                data-date-label="{{ e($dateLabel) }}"
                                data-time-label="{{ e($timeLabel) }}"
                                data-rate="IDR 300.000"
                                data-member-name="{{ e(auth()->user()->name) }}"
                                data-member-phone="{{ e(auth()->user()->phone_number ?? '') }}"
                            >
                                Book Sanctuary
                            </button>
                        </div>
                    </article>
                @endforeach
            </section>
        @endif
    </section>

    <div id="bookingModal" class="member-modal hidden" aria-hidden="true">
        <div class="member-modal-backdrop js-close-modal"></div>
        <div class="member-modal-panel">
            <div class="member-modal-head">
                <h3 class="font-[Cormorant_Garamond] text-[28px] md:text-[34px]">Confirm Session</h3>
                <button type="button" class="js-close-modal text-white text-2xl leading-none" aria-label="Close">&times;</button>
            </div>

            <div class="p-6 md:p-8 bg-[#b8bfca] text-[#0d2550]">
                <div class="member-confirm-card rounded-2xl border border-[#3b5076] bg-[#d9dde3] p-4 md:p-5">
                    <div class="flex items-start justify-between gap-4 mb-4">
                        <div>
                            <p class="text-[10px] uppercase tracking-[0.1em] text-[#9a761d] font-semibold">Elite Yoga</p>
                            <h4 id="modalClassName" class="font-[Cormorant_Garamond] text-[28px] md:text-[32px] leading-none mt-1">VINYASA FLOW</h4>
                        </div>
                        <div class="text-right">
                            <p class="text-[10px] uppercase tracking-[0.1em] text-[#9a761d] font-semibold">Rate</p>
                            <p id="modalRate" class="text-[16px] md:text-[18px] font-semibold">IDR 300.000</p>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4 text-[#0f2344]">
                        <div>
                            <p class="text-[10px] uppercase tracking-[0.1em] text-[#8190a4] font-semibold">Coach</p>
                            <p id="modalCoach" class="mt-1 font-semibold">Alya</p>
                        </div>
                        <div>
                            <p class="text-[10px] uppercase tracking-[0.1em] text-[#8190a4] font-semibold">Schedule</p>
                            <p id="modalSchedule" class="mt-1 font-semibold">MON, 07:00 - 08:00</p>
                        </div>
                        <div>
                            <p class="text-[10px] uppercase tracking-[0.1em] text-[#8190a4] font-semibold">Studio</p>
                            <p id="modalStudio" class="mt-1 font-semibold">DYNAMIC STUDIO</p>
                        </div>
                    </div>

                    <div class="mt-5 border-t border-[#7e8a9d] pt-4">
                        <p class="text-[10px] uppercase tracking-[0.1em] text-[#8190a4] font-semibold">Personal Verification</p>
                        <div class="mt-3 space-y-3">
                            <input id="modalMemberName" type="text" class="w-full rounded-xl border border-[#3b5076] bg-white px-4 py-2.5 text-sm text-[#0f2344] outline-none" readonly>
                            <input id="modalMemberPhone" type="text" class="w-full rounded-xl border border-[#3b5076] bg-white px-4 py-2.5 text-sm text-[#0f2344] outline-none" readonly>
                        </div>
                    </div>
                </div>

                <div class="mt-4 rounded-2xl bg-[#a5acb9] px-4 py-4 md:px-5 md:py-4 flex items-start gap-3 text-[#f7f8fa]">
                    <input type="checkbox" checked class="mt-1 h-5 w-5 rounded border-[#223c63] text-[#0d2550] focus:ring-[#0d2550]">
                    <p class="text-[11px] md:text-[12px] leading-relaxed text-[#f4f5f7]">I agree to the Flex Yoga Sanctuary Terms & Conditions and cancellation policy. I verify my personal data is accurate.</p>
                </div>

                <button type="button" id="openPaymentModal" class="mt-4 w-full rounded-xl bg-[#08224c] py-3.5 text-[12px] tracking-[0.18em] uppercase text-white hover:bg-[#061b3b]">
                    Continue to Payment
                </button>
            </div>
        </div>
    </div>

    <div id="paymentModal" class="member-modal hidden" aria-hidden="true">
        <div class="member-modal-backdrop js-close-payment"></div>
        <div class="member-modal-panel member-payment-panel">
            <div class="member-modal-head">
                <button type="button" class="js-back-to-confirm text-white text-2xl leading-none" aria-label="Back">&lsaquo;</button>
                <h3 class="font-[Cormorant_Garamond] text-[26px] md:text-[32px]">Payment Method</h3>
                <button type="button" class="js-close-payment text-white text-2xl leading-none" aria-label="Close">&times;</button>
            </div>

            <div class="p-5 md:p-6 bg-[#d6d7db] text-[#0d2550]">
                <div class="rounded-2xl border border-[#3b5076] bg-[#ebedf0] px-4 py-4 flex items-center justify-between gap-4">
                    <p class="text-[11px] uppercase tracking-[0.1em] text-[#0d2550] font-semibold">Total Invoice</p>
                    <p id="paymentTotal" class="text-[18px] md:text-[20px] font-bold">IDR 300.000</p>
                </div>

                <form id="paymentForm" method="POST" class="mt-4">
                    @csrf
                    <input type="hidden" id="selectedScheduleId" name="schedule_id" value="">

                    <div class="space-y-3">
                        <label class="payment-option">
                            <input type="radio" name="payment_method" value="credit_card" class="sr-only js-payment-option" checked>
                            <span class="payment-option-box">
                                <span class="payment-icon">▣</span>
                                <span>
                                    <span class="block font-semibold tracking-[0.15em] uppercase">Credit/Debit Card</span>
                                    <span class="block text-[11px] text-[#70809d]">Visa, Mastercard, Amex</span>
                                </span>
                                <span class="payment-radio"></span>
                            </span>
                        </label>

                        <label class="payment-option">
                            <input type="radio" name="payment_method" value="qris" class="sr-only js-payment-option">
                            <span class="payment-option-box">
                                <span class="payment-icon">◫</span>
                                <span>
                                    <span class="block font-semibold tracking-[0.15em] uppercase">QRIS / E-Wallet</span>
                                    <span class="block text-[11px] text-[#70809d]">GoPay, OVO, ShopeePay</span>
                                </span>
                                <span class="payment-radio"></span>
                            </span>
                        </label>

                        <label class="payment-option">
                            <input type="radio" name="payment_method" value="virtual_account" class="sr-only js-payment-option">
                            <span class="payment-option-box">
                                <span class="payment-icon">◰</span>
                                <span>
                                    <span class="block font-semibold tracking-[0.15em] uppercase">Virtual Account</span>
                                    <span class="block text-[11px] text-[#70809d]">BCA, Mandiri, BNI</span>
                                </span>
                                <span class="payment-radio"></span>
                            </span>
                        </label>
                    </div>

                    <button type="button" id="paymentSubmit" class="mt-4 w-full rounded-xl bg-[#08224c] py-3.5 text-[12px] tracking-[0.18em] uppercase text-white hover:bg-[#061b3b]">
                        Pay With CC
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div id="paymentDetailsModal" class="member-modal hidden" aria-hidden="true">
        <div class="member-modal-backdrop js-close-details"></div>
        <div class="member-modal-panel member-details-panel">
            <div class="member-modal-head">
                <button type="button" class="js-back-to-payment text-white text-2xl leading-none" aria-label="Back">&lsaquo;</button>
                <h3 class="font-[Cormorant_Garamond] text-[26px] md:text-[32px]">Payment Details</h3>
                <button type="button" class="js-close-details text-white text-2xl leading-none" aria-label="Close">&times;</button>
            </div>

            <div class="payment-details-body bg-[#d8d9dd] p-5 md:p-6">
                <section id="ccDetails" class="payment-detail-section">
                    <div class="cc-card-preview rounded-[20px] p-5 md:p-6">
                        <div class="flex justify-between items-start">
                            <span class="w-6 h-4 rounded-sm bg-[#c09a4a]/70"></span>
                            <span class="text-[#c09a4a] text-sm">▭</span>
                        </div>
                        <p class="mt-8 md:mt-10 text-[20px] tracking-[0.2em] text-white/90">•••• •••• •••• ••••</p>
                        <div class="mt-5 flex items-end justify-between">
                            <div>
                                <p class="text-[10px] uppercase text-white/55 tracking-[0.08em]">Card Holder</p>
                                <p class="mt-1 uppercase text-[27px] font-semibold tracking-[0.03em]">{{ strtoupper(auth()->user()->name) }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-[10px] uppercase text-white/55 tracking-[0.08em]">Expires</p>
                                <p class="mt-1 text-[36px] font-semibold">00/00</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 space-y-3">
                        <div>
                            <p class="payment-field-label">Card Number</p>
                            <input type="text" class="payment-field" placeholder="0000 0000 0000 0000">
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <p class="payment-field-label">Expiry Date</p>
                                <input type="text" class="payment-field" placeholder="MM/YY">
                            </div>
                            <div>
                                <p class="payment-field-label">CVV</p>
                                <input type="text" class="payment-field" placeholder="***">
                            </div>
                        </div>
                    </div>

                    <button type="button" id="confirmCcPayment" class="payment-confirm-btn mt-4">Confirm Final Transaction</button>
                </section>

                <section id="qrisDetails" class="payment-detail-section hidden text-center">
                    <p class="text-[13px] md:text-[14px] uppercase tracking-[0.23em] text-[#0f2a52] font-semibold">Scan To Secure Space</p>
                    <div class="qris-card mx-auto mt-4 rounded-2xl px-6 py-5">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=220x220&data=FLEXYOGA-IDR300000" alt="QRIS" class="w-[170px] h-[170px] md:w-[220px] md:h-[220px] mx-auto rounded-md">
                        <p class="mt-4 text-[40px] md:text-[46px] font-bold tracking-[0.1em] text-[#0f2a52]">IDR 300.000</p>
                        <p class="text-[10px] md:text-[11px] uppercase tracking-[0.15em] text-[#2d4568] mt-1">Merchant: XYZ Yoga Indonesia</p>
                    </div>
                    <p class="mt-4 text-[10px] md:text-[11px] uppercase tracking-[0.17em] text-[#0f2a52] font-semibold">Screenshot this QR and open your preferred bank or e-wallet application to complete.</p>
                    <button type="button" id="confirmQrisPayment" class="payment-confirm-btn mt-4">Confirm Final Transaction</button>
                </section>

                <section id="vaDetails" class="payment-detail-section hidden">
                    <div class="va-card rounded-3xl p-6 md:p-8 text-center">
                        <p class="text-[11px] uppercase tracking-[0.2em] text-[#0f2a52] font-semibold">Virtual Account Number</p>
                        <div class="mt-5 flex items-center justify-center gap-3">
                            <p class="text-[42px] md:text-[50px] tracking-[0.16em] font-bold text-[#0f2a52]">8809 3456 1222</p>
                            <button type="button" class="w-9 h-9 rounded-md bg-[#08224c] text-white">⧉</button>
                        </div>
                        <p class="mt-4 text-[11px] uppercase tracking-[0.16em] text-[#9c7417] font-semibold">BCA Virtual Account</p>
                        <div class="mt-5 border-t border-[#b89f74] pt-4">
                            <p class="text-[10px] uppercase tracking-[0.18em] text-[#7f93b3] font-semibold">Wait for auto-confirmation or</p>
                            <button type="button" class="payment-confirm-btn mt-4">Upload Payment Proof</button>
                        </div>
                    </div>
                    <button type="button" id="confirmVaPayment" class="payment-confirm-btn mt-4">Confirm Final Transaction</button>
                </section>
            </div>
        </div>
    </div>

    <div id="securingModal" class="member-modal hidden" aria-hidden="true">
        <div class="member-modal-backdrop js-close-securing"></div>
        <div class="member-modal-panel member-securing-panel">
            <div class="member-modal-head">
                <h3 class="font-[Cormorant_Garamond] text-[26px] md:text-[32px]">Securing Sanctuary</h3>
                <button type="button" class="js-close-securing text-white text-2xl leading-none" aria-label="Close">&times;</button>
            </div>
            <div class="bg-[#f4f4f6] text-[#0f2a52] px-6 py-14 text-center">
                <div class="secure-loader mx-auto"></div>
                <h4 class="font-[Cormorant_Garamond] text-[48px] md:text-[56px] mt-5">Connecting To Sanctuary</h4>
                <p class="text-[11px] uppercase tracking-[0.22em] text-[#334f77] font-semibold mt-2">Transaction is being secured</p>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const bookingModal = document.getElementById('bookingModal');
            const paymentModal = document.getElementById('paymentModal');
            const paymentDetailsModal = document.getElementById('paymentDetailsModal');
            const securingModal = document.getElementById('securingModal');
            const paymentForm = document.getElementById('paymentForm');
            const paymentSubmit = document.getElementById('paymentSubmit');
            const selectedScheduleId = document.getElementById('selectedScheduleId');
            const modalClassName = document.getElementById('modalClassName');
            const modalCoach = document.getElementById('modalCoach');
            const modalSchedule = document.getElementById('modalSchedule');
            const modalStudio = document.getElementById('modalStudio');
            const modalRate = document.getElementById('modalRate');
            const modalMemberName = document.getElementById('modalMemberName');
            const modalMemberPhone = document.getElementById('modalMemberPhone');
            const paymentTotal = document.getElementById('paymentTotal');
            const sessionButtons = document.querySelectorAll('.js-open-session');
            const paymentOptions = document.querySelectorAll('.js-payment-option');
            const detailSections = {
                credit_card: document.getElementById('ccDetails'),
                qris: document.getElementById('qrisDetails'),
                virtual_account: document.getElementById('vaDetails'),
            };

            const openModal = (modal) => {
                modal.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            };

            const closeModals = () => {
                bookingModal.classList.add('hidden');
                paymentModal.classList.add('hidden');
                paymentDetailsModal.classList.add('hidden');
                securingModal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            };

            const openPaymentDetails = (method) => {
                Object.values(detailSections).forEach((section) => section.classList.add('hidden'));
                if (detailSections[method]) {
                    detailSections[method].classList.remove('hidden');
                }
                paymentModal.classList.add('hidden');
                openModal(paymentDetailsModal);
            };

            sessionButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    if (button.disabled) return;

                    selectedScheduleId.value = button.dataset.scheduleId;
                    paymentForm.action = '{{ url('/booking') }}/' + button.dataset.scheduleId;
                    modalClassName.textContent = button.dataset.className;
                    modalCoach.textContent = button.dataset.coachName;
                    modalSchedule.textContent = button.dataset.dateLabel.toUpperCase() + ', ' + button.dataset.timeLabel;
                    modalStudio.textContent = button.dataset.studioName.toUpperCase();
                    modalRate.textContent = button.dataset.rate;
                    modalMemberName.value = button.dataset.memberName;
                    modalMemberPhone.value = button.dataset.memberPhone || '-';
                    paymentTotal.textContent = button.dataset.rate;
                    paymentSubmit.textContent = 'Pay With CC';
                    paymentOptions.forEach((option) => {
                        option.checked = option.value === 'credit_card';
                    });

                    openModal(bookingModal);
                });
            });

            document.getElementById('openPaymentModal').addEventListener('click', () => {
                bookingModal.classList.add('hidden');
                openModal(paymentModal);
            });

            document.querySelectorAll('.js-close-modal').forEach((el) => el.addEventListener('click', closeModals));
            document.querySelectorAll('.js-close-payment').forEach((el) => el.addEventListener('click', closeModals));
            document.querySelectorAll('.js-close-details').forEach((el) => el.addEventListener('click', closeModals));
            document.querySelectorAll('.js-close-securing').forEach((el) => el.addEventListener('click', closeModals));
            document.querySelector('.js-back-to-confirm').addEventListener('click', () => {
                paymentModal.classList.add('hidden');
                openModal(bookingModal);
            });
            document.querySelector('.js-back-to-payment').addEventListener('click', () => {
                paymentDetailsModal.classList.add('hidden');
                openModal(paymentModal);
            });

            paymentOptions.forEach((option) => {
                option.addEventListener('change', () => {
                    const labels = {
                        credit_card: 'Pay With CC',
                        qris: 'Pay With QRIS',
                        virtual_account: 'Pay With VA',
                    };
                    paymentSubmit.textContent = labels[option.value] || 'Pay With CC';
                });
            });

            paymentSubmit.addEventListener('click', () => {
                const selected = document.querySelector('.js-payment-option:checked');
                openPaymentDetails(selected ? selected.value : 'credit_card');
            });

            document.getElementById('confirmCcPayment').addEventListener('click', () => {
                paymentDetailsModal.classList.add('hidden');
                openModal(securingModal);
                setTimeout(() => {
                    paymentForm.submit();
                }, 1400);
            });

            document.getElementById('confirmQrisPayment').addEventListener('click', () => {
                paymentForm.submit();
            });

            document.getElementById('confirmVaPayment').addEventListener('click', () => {
                paymentForm.submit();
            });

            [bookingModal, paymentModal, paymentDetailsModal, securingModal].forEach((modal) => {
                modal.addEventListener('click', (event) => {
                    if (event.target === modal) {
                        closeModals();
                    }
                });
            });
        });
    </script>
    @endpush
@endsection
