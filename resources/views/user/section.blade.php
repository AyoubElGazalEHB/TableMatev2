<!-- Tables Section -->
<section class="tables-section">
    <style>
        .tables-section {
            padding: 80px 20px;
            background-color: #f9f9f9;
            font-family: 'Source Sans Pro', sans-serif;
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 15px;
        }

        .section-subtitle {
            font-size: 1.2rem;
            color: #666;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .tables-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .table-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .table-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.15);
        }

        .table-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            background: linear-gradient(45deg, #f44336, #d32f2f);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            font-weight: 600;
        }

        .table-content {
            padding: 25px;
        }

        .table-number {
            font-size: 1.4rem;
            font-weight: 700;
            color: #f44336;
            margin-bottom: 10px;
        }

        .table-description {
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .table-details {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 20px;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #555;
            font-size: 0.9rem;
        }

        .detail-icon {
            width: 16px;
            height: 16px;
            color: #4caf50;
        }

        .table-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: #f44336;
            margin-bottom: 20px;
        }

        .table-actions {
            display: flex;
            gap: 10px;
        }

        .btn-outline {
            flex: 1;
            padding: 12px 20px;
            border: 2px solid #f44336;
            background: transparent;
            color: #f44336;
            text-decoration: none;
            text-align: center;
            border-radius: 6px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline:hover {
            background: #f44336;
            color: white;
            text-decoration: none;
        }

        .btn-solid {
            flex: 1;
            padding: 12px 20px;
            background: #f44336;
            color: white;
            text-decoration: none;
            text-align: center;
            border-radius: 6px;
            font-weight: 600;
            transition: background 0.3s ease;
        }

        .btn-solid:hover {
            background: #d32f2f;
            color: white;
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .tables-section {
                padding: 60px 15px;
            }

            .section-title {
                font-size: 2rem;
            }

            .tables-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .table-content {
                padding: 20px;
            }
        }
    </style>

    <div class="section-header">
        <h2 class="section-title">Available Tables</h2>
        <p class="section-subtitle">Choose from our carefully curated selection of premium dining tables, each offering a unique atmosphere for your perfect meal.</p>
    </div>

    <div class="tables-grid">
        @foreach($tables as $table)
            <div class="table-card">
                <div class="table-image">
                    Table {{ $table->tableNumber }}
                </div>

                <div class="table-content">
                    <h3 class="table-number">Table {{ $table->tableNumber }}</h3>
                    <p class="table-description">{{ $table->description }}</p>

                    <div class="table-details">
                        <div class="detail-item">
                            <svg class="detail-icon" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ $table->persons }} {{ $table->persons == 1 ? 'Person' : 'Persons' }}</span>
                        </div>
                        <div class="detail-item">
                            <svg class="detail-icon" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ $table->seatingArea }}</span>
                        </div>
                    </div>

                    <div class="table-price">€{{ number_format($table->price, 2) }} per reservation</div>

                    <div class="table-actions">
                        <a href="{{ url('detail', $table->id) }}" class="btn-outline">View Details</a>
                        <a href="{{ url('detail', $table->id) }}" class="btn-solid">Book Now</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
