<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        a {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #666;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }
        a:hover {
            background-color: #333;
        }
        h1 {
            font-size: 32px;
            color: #333;
            margin: 10px 0;
        }
        .subtitle {
            color: #666;
            font-size: 14px;
            margin-bottom: 20px;
        }
        .section {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .section-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }
        .variable-box {
            background-color: #f9f9f9;
            border: 1px solid #e0e0e0;
            border-radius: 3px;
            padding: 10px;
            margin-bottom: 10px;
        }
        .variable-label {
            font-weight: bold;
            color: #333;
        }
        .variable-value {
            color: #666;
            font-family: monospace;
            margin-left: 10px;
        }
        .task-list {
            list-style: none;
            padding: 0;
        }
        .task-list li {
            background-color: #f9f9f9;
            border: 1px solid #e0e0e0;
            padding: 10px;
            margin-bottom: 8px;
            border-radius: 3px;
        }
        .product-card {
            background-color: #f9f9f9;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            padding: 15px;
            margin-bottom: 15px;
        }
        .product-id {
            color: #999;
            font-size: 12px;
            margin-bottom: 5px;
        }
        .product-name {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 8px;
        }
        .product-price {
            font-size: 16px;
            font-weight: bold;
            color: #27ae60;
        }
        .summary-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        .summary-item {
            background-color: #f9f9f9;
            border: 1px solid #e0e0e0;
            padding: 10px;
            border-radius: 3px;
        }
        .summary-label {
            font-weight: bold;
            color: #333;
        }
        .summary-value {
            color: #666;
            font-family: monospace;
            display: block;
            margin-top: 5px;
        }
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #999;
        }
    </style>
</head>
<body>
    <main>
        <a href="/">Back to Home</a>

        <h1>Product List</h1>
        <p class="subtitle">Data from: ProductServiceProvider via /product-list route</p>

        <!-- Shared Variables Section -->
        <div class="section">
            <div class="section-title">Shared Variables from Service Providers</div>
            <div class="variable-box">
                <span class="variable-label">Product Key (from ProductServiceProvider):</span>
                <span class="variable-value">{{ $productKey ?? 'Not set' }}</span>
            </div>
            <div class="variable-box">
                <span class="variable-label">Shared Variable (from AppServiceProvider):</span>
                <span class="variable-value">{{ $sharedVariable ?? 'Not set' }}</span>
            </div>
        </div>

        <!-- Tasks Section -->
        @if(isset($tasks) && count($tasks) > 0)
        <div class="section">
            <div class="section-title">Tasks from TaskService</div>
            <ul class="task-list">
                @foreach($tasks as $task)
                    <li>{{ $task }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Products Section -->
        <div class="section">
            <div class="section-title">Products from ProductService</div>

            @forelse($products as $product)
                <div class="product-card">
                    <div class="product-id">ID: {{ $product['id'] }}</div>
                    <div class="product-name">{{ $product['name'] }}</div>
                    <div class="product-price">${{ number_format($product['price'], 2) }}</div>
                </div>
            @empty
                <div class="empty-state">
                    <p>No products available.</p>
                </div>
            @endforelse
        </div>

        <!-- Summary Section -->
        <div class="section">
            <div class="section-title">Summary</div>
            <div class="summary-grid">
                <div class="summary-item">
                    <span class="summary-label">Total Products:</span>
                    <span class="summary-value">{{ count($products) }}</span>
                </div>
                <div class="summary-item">
                    <span class="summary-label">Total Value:</span>
                    <span class="summary-value">${{ number_format(array_sum(array_column($products, 'price')), 2) }}</span>
                </div>
                <div class="summary-item">
                    <span class="summary-label">Data Source:</span>
                    <span class="summary-value">ProductServiceProvider</span>
                </div>
                <div class="summary-item">
                    <span class="summary-label">Service Class:</span>
                    <span class="summary-value">ProductService</span>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
