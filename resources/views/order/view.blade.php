<div class="card">
    <div class="card-header">
        <h4>Transaction Summary</h4>
    </div>

    <div class="card-body">

        <div class="order-meta">

            <div class="order-meta-item">
                <div class="order-meta-label">
                    Total Price
                </div>

                <div class="order-meta-value price">
                    Rp {{ number_format($order->total_price, 0, ',', '.') }}
                </div>
            </div>

            <div class="order-meta-item">
                <div class="order-meta-label">
                    Transaction Time
                </div>

                <div class="order-meta-value">
                    {{ $order->created_at }}
                </div>
            </div>

            <div class="order-meta-item">
                <div class="order-meta-label">
                    Total Item
                </div>

                <div class="order-meta-value">
                    {{ $order->total_item }}
                </div>
            </div>

        </div>

    </div>
</div>
