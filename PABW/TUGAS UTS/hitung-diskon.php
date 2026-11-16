<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Diskon</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "SF Pro Text", "SF Pro Display", "Helvetica Neue", system-ui, sans-serif;
            background: linear-gradient(135deg, #f0f4f8 0%, #e9ecef 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: #111827;
        }

        .card {
            background: #ffffff;
            width: 100%;
            max-width: 440px;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08), 0 8px 16px rgba(0, 0, 0, 0.04);
            padding: 32px;
            border: 1px solid rgba(255, 255, 255, 0.6);
        }

        .header {
            text-align: center;
            margin-bottom: 32px;
        }

        .header h1 {
            font-size: 28px;
            font-weight: 700;
            color: #111827;
            letter-spacing: -0.5px;
            margin-bottom: 8px;
        }

        .header p {
            font-size: 15px;
            color: #6b7280;
            font-weight: 400;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 10px;
            letter-spacing: -0.2px;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .input-prefix {
            position: absolute;
            left: 16px;
            color: #9ca3af;
            font-size: 18px;
            font-weight: 600;
            z-index: 2;
            pointer-events: none;
        }

        input[type="number"] {
            width: 100%;
            padding: 16px 20px 16px 52px;
            font-size: 18px;
            font-weight: 500;
            color: #111827;
            background: #f9fafb;
            border: 2px solid #e5e7eb;
            border-radius: 16px;
            outline: none;
            transition: all 0.2s ease;
            appearance: textfield;
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"]:focus {
            background: #ffffff;
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }

        input[type="number"]:invalid:not(:placeholder-shown) {
            border-color: #ef4444;
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1);
        }

        .error-text {
            color: #ef4444;
            font-size: 13px;
            font-weight: 500;
            margin-top: 8px;
            display: none;
            animation: shake 0.4s ease;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-4px); }
            75% { transform: translateX(4px); }
        }

        button {
            width: 100%;
            padding: 16px 24px;
            font-size: 17px;
            font-weight: 600;
            color: #ffffff;
            background: #2563eb;
            border: none;
            border-radius: 16px;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
            margin-bottom: 24px;
        }

        button:hover:not(:disabled) {
            background: #1d4ed8;
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(37, 99, 235, 0.4);
        }

        button:active:not(:disabled) {
            transform: translateY(0) scale(0.98);
            box-shadow: 0 2px 8px rgba(37, 99, 235, 0.3);
        }

        button:disabled {
            background: #9ca3af;
            cursor: not-allowed;
            box-shadow: none;
        }

        .result-card {
            background: #f8fafc;
            border-radius: 20px;
            padding: 24px;
            border: 1px solid #e2e8f0;
            display: none;
            animation: slideUp 0.4s ease-out forwards;
            opacity: 0;
        }

        .result-card.show {
            display: block;
            opacity: 1;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .result-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .result-row:last-child {
            border-bottom: none;
        }

        .result-label {
            font-size: 14px;
            color: #64748b;
            font-weight: 500;
        }

        .result-value {
            font-size: 16px;
            font-weight: 700;
            color: #1e293b;
            font-variant-numeric: tabular-nums;
        }

        .result-value.discount {
            color: #d97706;
        }

        .result-value.total {
            color: #059669;
            font-size: 18px;
        }

        .divider {
            height: 1px;
            background: #e2e8f0;
            margin: 16px 0;
        }

        .rules {
            text-align: center;
            font-size: 12px;
            color: #94a3b8;
            line-height: 1.5;
        }

        .rules span {
            font-weight: 600;
            color: #64748b;
        }

        @media (max-width: 640px) {
            .card {
                padding: 24px;
                border-radius: 20px;
            }

            .header h1 {
                font-size: 24px;
            }

            input[type="number"] {
                padding: 14px 20px 14px 50px;
                font-size: 17px;
            }

            button {
                padding: 14px 20px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="header">
            <h1>Kalkulator Diskon</h1>
            <p>Hitung diskon belanja kamu dengan cepat</p>
        </div>

        <form method="POST" action="" novalidate>
            <div class="form-group">
                <label for="totalBelanja" class="form-label">Total Belanja</label>
                <div class="input-wrapper">
                    <span class="input-prefix">Rp</span>
                    <input
                        type="number"
                        id="totalBelanja"
                        name="totalBelanja"
                        min="0"
                        step="1000"
                        placeholder="0"
                        value="<?php echo isset($_POST['totalBelanja']) ? htmlspecialchars($_POST['totalBelanja']) : ''; ?>"
                        required
                        autofocus
                    >
                </div>
                <div class="error-text" id="errorMsg">Masukkan nominal yang valid</div>
            </div>

            <button type="submit" id="hitungBtn" name="hitung">Hitung Diskon</button>
        </form>

        <?php
        function hitungDiskon($totalBelanja) {
            if ($totalBelanja >= 100000) {
                return 0.10 * $totalBelanja;
            } elseif ($totalBelanja >= 50000) {
                return 0.05 * $totalBelanja;
            }
            return 0;
        }

        function formatRupiah($angka) {
            return 'Rp ' . number_format($angka, 0, ',', '.');
        }

        $totalBelanja = 0;
        $diskon = 0;
        $persenDiskon = 0;
        $totalBayar = 0;
        $hasResult = false;

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hitung'])) {
            $input = trim($_POST['totalBelanja'] ?? '');
            $totalBelanja = filter_var($input, FILTER_VALIDATE_FLOAT, ['options' => ['min_range' => 0]]);

            if ($totalBelanja === false || $totalBelanja < 0) {
                $hasResult = false;
            } else {
                $diskon = hitungDiskon($totalBelanja);
                $persenDiskon = $totalBelanja >= 100000 ? 10 : ($totalBelanja >= 50000 ? 5 : 0);
                $totalBayar = $totalBelanja - $diskon;
                $hasResult = true;
            }
        }
        ?>

        <?php if ($hasResult): ?>
        <div class="divider"></div>
        <div class="result-card show">
            <div class="result-row">
                <span class="result-label">Total Belanja</span>
                <span class="result-value"><?php echo formatRupiah($totalBelanja); ?></span>
            </div>
            <div class="result-row">
                <span class="result-label">Diskon <?php echo $persenDiskon; ?>%</span>
                <span class="result-value discount"><?php echo formatRupiah($diskon); ?></span>
            </div>
            <div class="result-row">
                <span class="result-label">Total Bayar</span>
                <span class="result-value total"><?php echo formatRupiah($totalBayar); ?></span>
            </div>
        </div>
        <?php endif; ?>

        <div class="rules">
            <span>Diskon 10%</span> untuk belanja ≥ Rp 100.000 ·
            <span>Diskon 5%</span> untuk belanja ≥ Rp 50.000
        </div>
    </div>

    <script>
        const form = document.querySelector('form');
        const input = document.getElementById('totalBelanja');
        const errorMsg = document.getElementById('errorMsg');
        const btn = document.getElementById('hitungBtn');

        input.addEventListener('input', function () {
            const val = this.value.trim();
            if (val === '' || parseFloat(val) < 0) {
                errorMsg.style.display = 'block';
                btn.disabled = true;
            } else {
                errorMsg.style.display = 'none';
                btn.disabled = false;
            }
        });

        form.addEventListener('submit', function (e) {
            const val = input.value.trim();
            if (val === '' || parseFloat(val) < 0) {
                e.preventDefault();
                errorMsg.style.display = 'block';
                btn.disabled = true;
            }
        });
    </script>
</body>
</html>