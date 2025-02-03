<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <form method="POST" class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold text-center mb-6">Kalkulator Sederhana</h1>
        
        <div class="mb-4">
            <input 
                type="number" 
                name="bil1" 
                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                placeholder="Angka Pertama" 
                step="any"
                required>
        </div>

        <div class="mb-4">
            <input 
                type="number" 
                name="bil2" 
                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                placeholder="Angka Kedua" 
                step="any"
                required>
        </div>

        <div class="mb-4">
            <label for="operator" class="block text-gray-700 font-medium mb-2">Pilih Operator</label>
            <select 
                name="operator" 
                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="tambah">Tambah (+)</option>
                <option value="kurang">Kurang (-)</option>
                <option value="kali">Kali (x)</option>
                <option value="bagi">Bagi (/)</option>
            </select>
        </div>

        <div class="mb-4">
            <button 
                type="submit" 
                name="kirim" 
                class="w-full bg-blue-500 text-white p-3 rounded-lg font-semibold hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Hitung
            </button>
        </div>

        <?php 
        $hasil = 0; 
        $pesan = ""; 

        if (isset($_POST['kirim'])) {
            $bil1 = $_POST['bil1'];
            $bil2 = $_POST['bil2'];
            $operator = $_POST['operator'];

            if ($operator === "bagi" && $bil2 == 0) {
                $pesan = "Error: Tidak bisa membagi dengan 0.";
            } else {
                switch ($operator) {
                    case "tambah":
                        $hasil = $bil1 + $bil2;
                        break;
                    case "kurang":
                        $hasil = $bil1 - $bil2;
                        break;
                    case "kali":
                        $hasil = $bil1 * $bil2;
                        break;
                    case "bagi":
                        $hasil = $bil1 / $bil2;
                        break;
                }
            }
        }
        ?>

        <div>
            <input 
                type="text" 
                class="w-full p-3 border border-gray-300 rounded-lg bg-gray-100 text-gray-700 font-medium" 
                value="<?= isset($pesan) && $pesan !== "" ? $pesan : $hasil ?>" 
                readonly>
        </div>
    </form>
</body>
</html>
 