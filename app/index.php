<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$conn = new mysqli("db", "root", "rootpass", "company");
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

$search = $_GET['search'] ?? '';
$sql = "SELECT * FROM pegawai WHERE nama LIKE '%$search%'"; // sengaja vulnerable untuk lab SQLi
$result = $conn->query($sql);
?>
<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Web Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      :root { --brand: #0ea5e9; }
      .brand-gradient { background: linear-gradient(135deg, #0ea5e9, #6366f1); }
      .card-soft { border: 0; border-radius: 1rem; box-shadow: 0 10px 30px rgba(0,0,0,.06); }
      .table thead th { background: #f8fafc; }
    </style>
  </head>
  <body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark brand-gradient">
      <div class="container">
        <a class="navbar-brand fw-bold" href="/">🏢 Web Pegawai</a>
      </div>
    </nav>

    <main class="py-5">
      <div class="container">
        <div class="row g-4">
          <div class="col-lg-4">
            <div class="card card-soft">
              <div class="card-body">
                <h5 class="mb-3">Pencarian</h5>
                <form method="get" action="/">
                  <div class="input-group">
                    <input name="search" class="form-control" placeholder="Cari nama..." value="<?php echo htmlspecialchars($search); ?>">
                    <button class="btn btn-dark" type="submit">Cari</button>
                  </div>
                </form>
                <small class="text-muted d-block mt-2">Halaman ini hanya menampilkan <strong>Nama</strong> dan <strong>Jabatan</strong>.</small>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="card card-soft">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h5 class="mb-0">Daftar Pegawai</h5>
                </div>
                <div class="table-responsive">
                  <table class="table align-middle">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Jabatan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        if ($result) {
                          while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['jabatan']) . "</td>";
                            echo "</tr>";
                          }
                        } else {
                          echo "<tr><td colspan='2' class='text-danger'>Query error: " . htmlspecialchars($conn->error) . "</td></tr>";
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <footer class="py-4 border-top bg-white">
      <div class="container d-flex justify-content-between">
        <span class="text-muted">© 2025 Web Pegawai</span>
        <span class="text-muted">Lab: SQLi</span>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
