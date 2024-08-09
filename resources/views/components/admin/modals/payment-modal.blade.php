@if ($show)
    @props(['serviceTypes', 'vouchers', 'totalPrice', 'show' => false])

    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Bayar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.transactions.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="sub-total">Sub Total</label>
                            <input type="number" class="form-control form-control-lg" id="sub-total"
                                value="{{ isset($totalPrice) ? $totalPrice : '0' }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="service-type">Tipe Servis</label>
                            <select name="service-type" class="form-control form-control-lg" id="service-type" required>
                                <option value="" selected hidden disabled>Pilih tipe service</option>
                                @foreach ($serviceTypes as $type)
                                    <option value="{{ $type->id }}" data-type-cost="{{ $type->cost }}">
                                        {{ $type->name }} ({{ $type->getFormattedCost() }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="voucher">Voucher</label>
                            <select name="voucher" class="form-control form-control-lg" id="voucher">
                                @if (isset($vouchers) && !blank($vouchers))
                                    <option value="0" data-potong="0">Pilih voucher</option>
                                    @foreach ($vouchers as $voucher)
                                        <option value="{{ $voucher->id }}"
                                            data-potong="{{ $voucher->voucher->discount_value }}">
                                            {{ $voucher->voucher->name }}
                                        </option>
                                    @endforeach
                                @else
                                    <option value="0" data-potong="0">Tidak ada voucher yang dimiliki</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="total-harga">Harga Yang Dibayar</label>
                            <input type="number" class="form-control form-control-lg" id="total-harga"
                                value="{{ isset($totalPrice) ? $totalPrice : '0' }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="input-bayar">Bayar</label>
                            <input type="number" class="form-control form-control-lg" id="input-bayar"
                                name="payment-amount">
                        </div>
                        <div class="form-group">
                            <label for="kembalian">Kembalian</label>
                            <input type="number" class="form-control form-control-lg" id="kembalian"
                                name="change" disabled>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" id="btn-simpan" type="button" class="btn btn-primary">Bayar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- @push('js')
        <script src="{{ asset('js/input-transaksi.js') }}"></script>
    @endpush --}}
@endif
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const inputBayar = document.getElementById('input-bayar');
        const kembalian = document.getElementById('kembalian');
        const serviceType = document.getElementById('service-type');
        const voucher = document.getElementById('voucher');

        function updateTotalHarga() {
            let totalHarga = parseFloat(document.getElementById('sub-total').value);

            // Tambahkan biaya service type jika dipilih
            const selectedServiceCost = parseFloat(serviceType.options[serviceType.selectedIndex].getAttribute('data-type-cost'));
            if (!isNaN(selectedServiceCost)) {
                totalHarga += selectedServiceCost;
            }

            // Kurangi biaya voucher jika dipilih
            const selectedVoucherValue = parseFloat(voucher.options[voucher.selectedIndex].getAttribute('data-potong'));
            if (!isNaN(selectedVoucherValue)) {
                totalHarga -= selectedVoucherValue;
            }

            document.getElementById('total-harga').value = totalHarga >= 0 ? totalHarga : 0;

            // Hitung kembalian
            const bayar = parseFloat(inputBayar.value);
            const kembalianValue = bayar - totalHarga;
            kembalian.value = kembalianValue >= 0 ? kembalianValue : 0;
        }

        serviceType.addEventListener('change', updateTotalHarga);
        voucher.addEventListener('change', updateTotalHarga);
        inputBayar.addEventListener('input', updateTotalHarga);
    });
</script>

{{-- <script>
    let tempPotongan = 0;
    let tempCost = 0;

    $("#service-type").on("change", function () {
        tempCost = parseInt($(this).find(":selected").data("type-cost")) || 0;
        recalculateTotal();
    });

    $("#voucher").on("change", function () {
        tempPotongan = parseInt($(this).find(":selected").data("potong")) || 0;
        recalculateTotal();
    });

    function recalculateTotal() {
        let subTotal = parseInt($("#sub-total").val()) || 0;
        let fixTotal = subTotal - tempPotongan + tempCost;
        fixTotal = Math.max(fixTotal, 0);
        $("#total-harga").val(fixTotal);

        updateChange();
    }

    $("#input-bayar").on("keyup", function () {
        updateChange();
    });

    function updateChange() {
        let paymentAmount = parseInt($("#input-bayar").val());
        let fixTotal = parseInt($("#total-harga").val());
        let change = paymentAmount - fixTotal;
        change = Math.max(change, 0);
        $("#kembalian").html(change);
    }
</script> --}}
